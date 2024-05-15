<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reclamation;
use Illuminate\Support\Facades\Mail;



class AdminController extends Controller
{

    public function AdminDashboard(){
        $reclamation = Reclamation::all();
        return view('admin.admin_dashboard',['reclamations' => $reclamation]);

    }

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

    public function treat($id)
    {
        $reclamation = Reclamation::findOrFail($id);
        $reclamation->status = 1;
        $reclamation->save();

        // Additional logic for treating the form

        return redirect()->route('admin.admin_dashboard')->with('success', 'Form treated successfully.');
    }

}

