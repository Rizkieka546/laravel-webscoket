<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NewNotification;

class NotificationController extends Controller
{
    public function sendNotification(Request $request)
    {
        $message = $request->input('message', 'Default message');
        broadcast(new NewNotification($message));
        return response()->json(['status' => 'Notification sent']);
    }
}
