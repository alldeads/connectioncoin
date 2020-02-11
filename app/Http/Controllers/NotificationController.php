<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index( Request $request )
    {
        if ( count( $request->all() ) > 1 ) {

            if ( $request->url && $request->notif_id ) {

                foreach (auth()->user()->unreadNotifications as $notification) {
                    
                    if ( $notification->id == $request->notif_id ) {
                        $notification->markAsRead();
                        break;
                    }
                }

                return redirect($request->url);
            }
        }

        return redirect('/feed');
    }

}
