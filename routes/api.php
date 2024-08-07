<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Events\NewNotification;
use App\Http\Controllers\NotificationController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/send-notification', [NotificationController::class, 'sendNotification']);

Route::post('/broadcast-notification', function (Request $request) {
    $message = $request->input('message', 'Default notification message');

    broadcast(new NewNotification($message));

    return response()->json(['status' => 'Yoi Berhasil']);
});
