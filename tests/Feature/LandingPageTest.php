<?php

use App\Models\ContactEnquiry;
use App\Notifications\ContactEnquiryConfirmation;
use App\Notifications\NewContactEnquiry;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Support\Facades\Notification;
use Livewire\Livewire;

beforeEach(function () {
    cache()->flush();
});

it('renders the landing page with brand content', function () {
    $this->get(route('home'))
        ->assertOk()
        ->assertSee('StackVera Core', false)
        ->assertSee('Engineering the')
        ->assertSee('/images/stackvera-logo.svg', false);
});

it('stores a valid contact enquiry and notifies the recipient', function () {
    Notification::fake();

    Livewire::test('pages::contact-form')
        ->set('name', 'Jane Doe')
        ->set('company', 'Acme GmbH')
        ->set('email', 'jane@acme.com')
        ->set('message', 'We need help modernising our cloud platform.')
        ->call('submit')
        ->assertHasNoErrors()
        ->assertSet('submitted', true)
        ->assertSet('name', '');

    $this->assertDatabaseHas('contact_enquiries', [
        'name' => 'Jane Doe',
        'company' => 'Acme GmbH',
        'email' => 'jane@acme.com',
        'read_at' => null,
    ]);

    Notification::assertSentOnDemand(NewContactEnquiry::class);

    Notification::assertSentOnDemand(
        ContactEnquiryConfirmation::class,
        fn ($notification, $channels, AnonymousNotifiable $notifiable) => $notifiable->routes['mail'] === 'jane@acme.com',
    );
});

it('sends the customer confirmation in the active locale', function () {
    Notification::fake();

    app()->setLocale('de');

    Livewire::test('pages::contact-form')
        ->set('name', 'Erika Mustermann')
        ->set('email', 'erika@example.com')
        ->set('message', 'Wir brauchen Unterstützung bei unserer Cloud.')
        ->call('submit')
        ->assertHasNoErrors();

    Notification::assertSentOnDemand(
        ContactEnquiryConfirmation::class,
        fn (ContactEnquiryConfirmation $notification) => $notification->locale === 'de',
    );
});

it('accepts a contact enquiry without a company', function () {
    Notification::fake();

    Livewire::test('pages::contact-form')
        ->set('name', 'John Roe')
        ->set('email', 'john@example.com')
        ->set('message', 'Just a quick question about your services.')
        ->call('submit')
        ->assertHasNoErrors()
        ->assertSet('submitted', true);

    $this->assertDatabaseHas('contact_enquiries', [
        'email' => 'john@example.com',
        'company' => null,
    ]);
});

it('rejects an invalid contact enquiry', function () {
    Livewire::test('pages::contact-form')
        ->set('name', '')
        ->set('email', 'not-an-email')
        ->set('message', '')
        ->call('submit')
        ->assertHasErrors(['name', 'email', 'message'])
        ->assertSet('submitted', false);

    expect(ContactEnquiry::count())->toBe(0);
});

it('rejects an email with a non-existent domain', function () {
    Livewire::test('pages::contact-form')
        ->set('name', 'Jane Doe')
        ->set('email', 'sadsa@sad')
        ->set('message', 'Looks like a real message.')
        ->call('submit')
        ->assertHasErrors('email');

    expect(ContactEnquiry::count())->toBe(0);
});

it('silently drops a submission that fills the honeypot', function () {
    Notification::fake();

    Livewire::test('pages::contact-form')
        ->set('name', 'Spam Bot')
        ->set('email', 'spam@bot.com')
        ->set('message', 'Buy cheap things now.')
        ->set('website', 'http://spam.example.com')
        ->call('submit')
        ->assertHasNoErrors()
        ->assertSet('submitted', true);

    expect(ContactEnquiry::count())->toBe(0);
    Notification::assertNothingSent();
});

it('rate limits repeated submissions from the same client', function () {
    Notification::fake();

    $component = Livewire::test('pages::contact-form');

    foreach (range(1, 5) as $attempt) {
        $component
            ->set('name', "Sender {$attempt}")
            ->set('email', "sender{$attempt}@example.com")
            ->set('message', 'A genuine enquiry message.')
            ->call('submit')
            ->assertHasNoErrors();
    }

    $component
        ->set('name', 'Sender 6')
        ->set('email', 'sender6@example.com')
        ->set('message', 'One too many.')
        ->call('submit')
        ->assertHasErrors('email');

    expect(ContactEnquiry::count())->toBe(5);
});
