<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * ContactController - Handles contact form submissions
 */
class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        // In production: send email / save to DB
        // Mail::to('hello@igloo.inc')->send(new ContactMail($validated));

        return back()->with('success', 'Thank you for reaching out. We\'ll be in touch soon.');
    }
}
