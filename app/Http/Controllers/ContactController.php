<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Handle a landing page contact enquiry.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        Log::info('New contact enquiry', $validated);

        // TODO: wire up Mail::to(...)->send(new ContactEnquiry($validated)) once SMTP is configured.

        return redirect()
            ->route('home')
            ->with('contact_success', true)
            ->withFragment('contact');
    }
}
