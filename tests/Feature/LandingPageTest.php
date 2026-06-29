<?php

use App\Models\ContactEnquiry;
use App\Notifications\NewContactEnquiry;
use Illuminate\Support\Facades\Notification;

it('renders the landing page with brand content', function () {
    $this->get(route('home'))
        ->assertOk()
        ->assertSee('StackVera Core', false)
        ->assertSee('Engineering the')
        ->assertSee('/images/stackvera-logo.svg', false);
});

it('stores a valid contact enquiry and notifies the recipient', function () {
    Notification::fake();

    $this->post(route('contact.store'), [
        'name' => 'Jane Doe',
        'company' => 'Acme GmbH',
        'email' => 'jane@acme.com',
        'message' => 'We need help modernising our cloud platform.',
    ])
        ->assertRedirect(route('home').'#contact')
        ->assertSessionHas('contact_success', true);

    $this->assertDatabaseHas('contact_enquiries', [
        'name' => 'Jane Doe',
        'company' => 'Acme GmbH',
        'email' => 'jane@acme.com',
        'read_at' => null,
    ]);

    Notification::assertSentOnDemand(NewContactEnquiry::class);
});

it('accepts a contact enquiry without a company', function () {
    Notification::fake();

    $this->post(route('contact.store'), [
        'name' => 'John Roe',
        'email' => 'john@example.com',
        'message' => 'Just a quick question about your services.',
    ])->assertSessionHas('contact_success', true);

    $this->assertDatabaseHas('contact_enquiries', [
        'email' => 'john@example.com',
        'company' => null,
    ]);
});

it('rejects an invalid contact enquiry', function () {
    $this->post(route('contact.store'), [
        'name' => '',
        'email' => 'not-an-email',
        'message' => '',
    ])->assertSessionHasErrors(['name', 'email', 'message']);

    expect(ContactEnquiry::count())->toBe(0);
});

it('rejects an email with a non-existent domain', function () {
    $this->post(route('contact.store'), [
        'name' => 'Jane Doe',
        'email' => 'sadsa@sad',
        'message' => 'Looks like a real message.',
    ])->assertSessionHasErrors('email');

    expect(ContactEnquiry::count())->toBe(0);
});

it('silently drops a submission that fills the honeypot', function () {
    Notification::fake();

    $this->post(route('contact.store'), [
        'name' => 'Spam Bot',
        'email' => 'spam@bot.com',
        'message' => 'Buy cheap things now.',
        'website' => 'http://spam.example.com',
    ])->assertSessionHas('contact_success', true);

    expect(ContactEnquiry::count())->toBe(0);
    Notification::assertNothingSent();
});
