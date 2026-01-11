<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
   public function sendmail(Request $request){
    $request->validate([
            'email' => 'required|email',
        ]);

        Mail::raw("New newsletter subscription from: " . $request->email, function ($message) {
            $message->to('abhishek666126@gmail.com')
                    ->subject('New Newsletter Subscriber');
        });

        return back()->with('success', 'Thanks for subscribing!');
   }

   public function contact(Request $request){
    $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $messageContent = "Name: " . $request->name . "\n";
        $messageContent .= "Email: " . $request->email . "\n";
        $messageContent .= "Subject: " . $request->subject . "\n\n";
        $messageContent .= "Message:\n" . $request->message;

        Mail::raw($messageContent, function ($message) use ($request) {
            $message->to('abhishek666126@gmail.com')
                    ->subject('Contact Form: ' . $request->subject);
        });

        return back()->with('success', 'Thank you for contacting us! We will get back to you soon.');
   }
}
