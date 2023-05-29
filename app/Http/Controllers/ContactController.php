<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $message = 'Your message has been sent successfully!';

        // Send email
        $to = 'your-email@example.com'; // Replace with the recipient email address
        $subject = 'New Contact Form Submission';
        $data = [
            'name' => $name,
            'email' => $email,
            'message' => $message,
        ];

        Mail::send('emails.contact', $data, function ($message) use ($to, $subject) {
            $message->to($to)
                ->subject($subject);
        });

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
