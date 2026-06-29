<?php

namespace App\Http\Controllers;

use App\Models\ContactEnquiry;
use App\Notifications\NewContactEnquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    /**
     * Handle a landing page contact enquiry.
     */
    public function store(Request $request): RedirectResponse
    {
        if (filled($request->input('website'))) {
            return $this->success();
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'regex:/^.+@.+\..+$/', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        $enquiry = ContactEnquiry::create($validated);

        Log::info('New contact enquiry', $validated);

        $recipient = config('services.contact.recipient');

        if (filled($recipient)) {
            Notification::route('mail', $recipient)->notify(new NewContactEnquiry($enquiry));
        }

        return $this->success();
    }

    private function success(): RedirectResponse
    {
        return redirect()
            ->route('home')
            ->with('contact_success', true)
            ->withFragment('contact');
    }
}
