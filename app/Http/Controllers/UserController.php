<?php

namespace App\Http\Controllers;

use App\User;
use App\UserSocialMediaLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Exception\GuzzleException;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;
use GuzzleHttp\Client as GuzzleClient;

class UserController extends Controller implements WithHeadings
{

    public function __construct()
    {
        $this->middleware('verified')->except('edit', 'update', 'show', 'get_users');
    }

    public function headings(): array
    {
        return [
            'First Name',
            'Last Name',
            'Email Address',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->views['user'] = $user;
        return view('users.show', $this->views);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $this->authorize('update', $user);

        $this->views['user'] = $user;

        return view('users.edit', $this->views);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $wpData = [];

        $this->validate($request, [
            'first_name' => 'required|min:1',
            'last_name' => 'required|min:1',
            'email' => 'required|unique:users,email,' . $user->id,
            'photo' => 'nullable|image',
            'cover' => 'nullable|image',
            'password' => 'nullable|min:6|confirmed',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'linkedin' => 'nullable',
            'instagram' => 'nullable',
        ]);

        $verifyEmail = false;

        $inputs = $request->all();

        if ( ! empty($inputs['password'])) {
            $originalPassword = $inputs['password'];
            $inputs['password'] = bcrypt($inputs['password']);
            $wpData['password'] = $originalPassword;
        } else {
            // $inputs = array_except($inputs, $inputs['password']);
            $inputs['password'] = $user->password;
        }

        if ($request->hasFile('photo')) {

            $image = $request->crop_photo;

            list($type, $image) = explode(';', $image);
            list(, $image)      = explode(',', $image);
            $image = base64_decode($image);

            $image_name = time().'.png';
            $path       = public_path('uploads/user/profilephoto/'. $image_name);

            file_put_contents( $path, $image );
            // $path = Storage::putfile('public/user/profilephoto', $request->file('photo'));
            $inputs['photo'] = $image_name;
        } else {
            $inputs['photo'] = $user->photo;
        }

        if ($request->hasFile('coverphoto')) {

            $image = $request->crop_cover;

            list($type, $image) = explode(';', $image);
            list(, $image)      = explode(',', $image);
            $image = base64_decode($image);

            $image_name = time().'.png';
            $path       = public_path('uploads/user/coverphoto/'. $image_name);

            file_put_contents( $path, $image );
            // $path = Storage::putfile('public/user/coverphoto', $request->file('coverphoto'));
            $inputs['coverphoto'] = $image_name;
        } else {
            $inputs['coverphoto'] = $user->coverphoto;
        }

        if ($inputs['email'] != $user->email) {
            $inputs['email_verified_at'] = null;
            $verifyEmail = true;
            $wpData['email'] = $user->email;
            $wpData['new_email'] = $inputs['email'];
        } else {
            $inputs['email_verified_at'] = $user->email_verified_at;
            $wpData['email'] = $user->email;
        }

        $user = User::find($user->id);
        $user->email_verified_at = $inputs['email_verified_at'];
        $user->photo = $inputs['photo'];
        $user->coverphoto = $inputs['coverphoto'];
        $user->first_name = $inputs['first_name'];
        $user->last_name = $inputs['last_name'];
        $user->email = $inputs['email'];
        $user->password = $inputs['password'];
        $user->bio = $inputs['bio'];
        $user->save();

        $guzzleClient = new GuzzleClient;
        $response = $guzzleClient->post('http://store.connectioncoin.com/wp-json/connectioncoin/v1/store/user', [
            'form_params' => [
                'email' => $wpData['email'],
                'password' => isset($wpData['password']) ? $wpData['password'] : null,
                'new_email' => isset($wpData['new_email']) ? $wpData['new_email'] : null
            ]
        ]);

        $verifyEmail ? $user->sendEmailVerificationNotification() : '';

        if ($user->socialmedialinks()->exists()) {
            $user->socialmedialinks()->update($request->only(['facebook', 'twitter', 'linkedin', 'instagram']));
        } else {
            $socialMediaLinks = new UserSocialMediaLink($request->only(['facebook', 'twitter', 'linkedin', 'instagram']));
            $user->socialmedialinks()->save($socialMediaLinks);
        }

        return redirect()->back()->with('success', 'Profile has been updated.');

    }

    public function get_users( Request $request )
    {
        $users = User::where('email', '!=', NULL)->paginate(10);

        $this->views['users'] = $users;

        if ( $request->export ) {

            return Excel::download(new UsersExport, 'users.xlsx');
        }

        return view('api.index', $this->views);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
