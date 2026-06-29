<?php

use App\Models\ContactEnquiry;
use App\Notifications\NewContactEnquiry;

it('builds the mail from the branded view with a reply-to header', function () {
    $enquiry = ContactEnquiry::factory()->create(['name' => 'Jane Doe', 'email' => 'jane@acme.com']);

    $mail = (new NewContactEnquiry($enquiry))->toMail($enquiry);

    expect($mail->view)->toBe(['mail.contact-enquiry', 'mail.contact-enquiry-text'])
        ->and($mail->viewData['enquiry'])->toBe($enquiry)
        ->and($mail->replyTo)->toBe([['jane@acme.com', 'Jane Doe']]);
});

it('renders the branded contact enquiry view', function () {
    $enquiry = ContactEnquiry::factory()->create([
        'name' => 'Jane Doe',
        'company' => 'Acme GmbH',
        'email' => 'jane@acme.com',
        'message' => 'We need help modernising our cloud platform.',
    ]);

    $rendered = view('mail.contact-enquiry', ['enquiry' => $enquiry])->render();

    expect($rendered)
        ->toContain('stackvera-logo-email.png')
        ->toContain('Jane Doe')
        ->toContain('Acme GmbH')
        ->toContain('jane@acme.com')
        ->toContain('We need help modernising our cloud platform.')
        ->toContain('#6304ec');
});

it('shows the received time in Europe/Berlin', function () {
    $enquiry = ContactEnquiry::factory()->create([
        'created_at' => '2026-06-29 10:00:00',
    ]);

    $rendered = view('mail.contact-enquiry', ['enquiry' => $enquiry])->render();

    expect($rendered)->toContain('29 Jun 2026, 12:00');
});

it('omits the company row when no company is given', function () {
    $enquiry = ContactEnquiry::factory()->create(['company' => null]);

    $rendered = view('mail.contact-enquiry', ['enquiry' => $enquiry])->render();

    expect($rendered)->not->toContain('>Company</p>');
});
