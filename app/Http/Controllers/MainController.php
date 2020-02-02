<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class MainController extends Controller
{
	protected $serviceAccount;

	public function __construct()
	{
		$this->serviceAccount = ServiceAccount::fromArray([
            "type" => "service_account",
            "project_id" => config('services.firebase.project_id'),
            "private_key_id" => config('services.firebase.private_key_id'),
            "private_key" => config('services.firebase.private_key'),
            "client_email" => config('services.firebase.client_email'),
            "client_id" => config('services.firebase.client_id'),
            "auth_uri" => "https://accounts.google.com/o/oauth2/auth",
            "token_uri" => "https://oauth2.googleapis.com/token",
            "auth_provider_x509_cert_url" => "https://www.googleapis.com/oauth2/v1/certs",
            "client_x509_cert_url" => config('services.firebase.client_x509_cert_url')
        ]);
	}

    public function index( Request $request )
    {
        // Get email and plan name from Memberful
        // $email = $request->subscription['member']['email'];
        // $newPlan = $request->subscription['subscription_plan']['name'];

        // // Get the event name
        // $event = $request->event;

        $factory = (new Factory)
            ->withServiceAccount($this->serviceAccount)
            ->withDatabaseUri("https://live-all-in-17081.firebaseio.com");

        $database = $factory->createDatabase();

        $initFirestore = $factory->createFirestore();
        $firestore = $initFirestore->database();

        $email = "1112robert.gartside83@gmail.com12";

        $document = $firestore->document('users2/' . $email);

        // $snapshot = $document->snapshot();


        $document->update([
            ['path' => 'planName', 'value' => "Loans"],
        ]);
        // dd($document);

        // if ( $event == "order.purchased" ) {
        // 	// add information
        // }

        // dd($snapshot['planName']);

        if(is_array($snapshot['planName'])){
            $oldPlan = $snapshot['planName'][0];
        }else{
            $oldPlan = $snapshot['planName'];
        }

        // Check if there is an existing plan
        if($oldPlan == ""){
            // Define Array of Plans
            $subscriptions = array($newPlan);
        }else if($oldPlan == NULL){
            // Define Array of Plans
            $subscriptions = array($newPlan);
        }else if($oldPlan == $newPlan){
            // Define Array of Plans
            $subscriptions = array($newPlan);
        }else{
            // Define Array of Plans
            $subscriptions = array($oldPlan, $newPlan);
        }

        $document->update([
            ['path' => 'planName', 'value' => $subscriptions],
        ]);

        // Compile Response
        $json_response = array($email, $oldPlan, $newPlan, $subscriptions);
        return response()->json($json_response);
    }
}
