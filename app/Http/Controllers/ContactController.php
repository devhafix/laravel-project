<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __invoke(Request $request)
    {
        // Process the contact form submission
        // Send email to predefined address with submitted data

        return redirect('/contact')->with('success', 'Thank you for contacting us!');
    }
}
