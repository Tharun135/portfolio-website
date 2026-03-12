<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * NewsletterController - Handles newsletter subscriptions
 */
class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255',
        ]);

        // In production: save to DB and send confirmation email
        // Newsletter::create(['email' => $validated['email']]);

        return back()->with('success', 'You\'ve been added to the Igloo Inc. newsletter.');
    }
}
