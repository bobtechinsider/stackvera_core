<?php

use App\Models\ContactEnquiry;
use App\Notifications\ContactEnquiryConfirmation;

it('builds the confirmation mail from the branded view', function () {
    $enquiry = ContactEnquiry::factory()->create(['name' => 'Jane Doe']);

    $mail = (new ContactEnquiryConfirmation($enquiry))->toMail($enquiry);

    expect($mail->view)->toBe(['mail.contact-confirmation', 'mail.contact-confirmation-text'])
        ->and($mail->viewData['enquiry'])->toBe($enquiry)
        ->and($mail->subject)->toBe("We've received your message");
});

it('renders the branded confirmation view with the enquiry details', function () {
    $enquiry = ContactEnquiry::factory()->create([
        'name' => 'Jane Doe',
        'message' => 'We need help modernising our cloud platform.',
    ]);

    $rendered = view('mail.contact-confirmation', ['enquiry' => $enquiry])->render();

    expect($rendered)
        ->toContain('stackvera-logo-email.png')
        ->toContain('Thanks for reaching out')
        ->toContain('Jane Doe')
        ->toContain('We need help modernising our cloud platform.')
        ->toContain('calendar.app.google');
});

it('renders the confirmation in German when the locale is German', function () {
    app()->setLocale('de');

    $enquiry = ContactEnquiry::factory()->create(['name' => 'Erika Mustermann']);

    $mail = (new ContactEnquiryConfirmation($enquiry))->toMail($enquiry);
    $rendered = view('mail.contact-confirmation', ['enquiry' => $enquiry])->render();

    expect($mail->subject)->toBe('Wir haben Ihre Nachricht erhalten')
        ->and($rendered)
        ->toContain('Danke für Ihre Nachricht')
        ->toContain('Hallo Erika Mustermann');
});
