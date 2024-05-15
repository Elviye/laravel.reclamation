<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $message = $request->input('message');

        // Send the email using Laravel's mail functionality
        Mail::raw($message, function ($email) {
            $email->to('recipient@example.com');
            $email->subject('New Email');
        });

        return response()->json(['message' => 'Email sent']);
    }
}
