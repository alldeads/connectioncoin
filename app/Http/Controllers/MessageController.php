<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $messages = Message::select('from_user_id', 'to_user_id')
        ->where(function ($q) {
            $q->where('from_user_id', auth()->id());
        })->orWhere(function ($q){
            $q->where('to_user_id', auth()->id());
        })->groupBy('from_user_id', 'to_user_id')->get();

        $this->views['messages'] = $messages;

        return view('messages.index', $this->views);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request )
    {
        if ( count($request->all()) == 0) {

            return view('messages.create');
        }

        $message = new Message;
        $message->to_user_id = $request->input('to_user_id');
        $message->from_user_id = auth()->id();
        $message->text = $request->input('message');
        $message->save();

        return redirect('/messages/' . $request->input('to_user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = new Message;
        $message->to_user_id = $request->input('to_user_id');
        $message->from_user_id = auth()->id();
        $message->text = $request->input('text');
        $message->save();

        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {

        // if (!$request->ajax()) {
        //     abort(404);
        // }

        $messages = Message::where(function ($q) use ($user_id) {
            $q->where('from_user_id', auth()->id());
            $q->where('to_user_id', $user_id);
        })->orWhere(function ($q) use ($user_id) {
            $q->where('from_user_id', $user_id);
            $q->where('to_user_id', auth()->id());
        })->get();

        $this->views['messages']   = $messages;
        $this->views['to_user_id'] = $user_id;

        // return response()->json($messages);

        return view('messages.show', $this->views);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }

    public function users( Request $request )
    {
        $search = $request->search;

        if ( $search == '' ){
            $users = User::orderby('first_name','asc')
                            ->select('id','first_name','last_name')
                            ->whereNotNull('email')
                            ->limit(5)->get();
        }else{
            $users = User::orderby('first_name','asc')
                            ->select('id','first_name','last_name')
                            ->where('first_name', 'like', '%' .$search . '%')
                            ->orWhere('last_name', 'like', '%' .$search . '%')
                            ->whereNotNull('email')
                            ->limit(5)->get();
        }

        $response = array();

        foreach($users as $users){
            $response[] = array(
                "id"   =>$users->id,
                "text" =>$users->first_name . ' ' . $users->last_name
            );
        }

        echo json_encode($response);
        exit;
    }

}
