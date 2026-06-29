<?php

use App\Models\ContactEnquiry;
use App\Models\User;
use Livewire\Livewire;

it('redirects guests away from the enquiries page', function () {
    $this->get(route('contactEnquiries.index'))->assertRedirect(route('login'));
});

it('lists enquiries for an authenticated user', function () {
    $this->actingAs(User::factory()->create());

    $enquiry = ContactEnquiry::factory()->create(['name' => 'Jane Doe']);

    Livewire::test('pages::contact-enquiries.index')
        ->assertOk()
        ->assertSee($enquiry->name);
});

it('marks an enquiry as read', function () {
    $this->actingAs(User::factory()->create());

    $enquiry = ContactEnquiry::factory()->create();

    expect($enquiry->isUnread())->toBeTrue();

    Livewire::test('pages::contact-enquiries.index')
        ->call('markAsRead', $enquiry->id);

    expect($enquiry->refresh()->read_at)->not->toBeNull();
});

it('deletes an enquiry', function () {
    $this->actingAs(User::factory()->create());

    $enquiry = ContactEnquiry::factory()->create();

    Livewire::test('pages::contact-enquiries.index')
        ->call('delete', $enquiry->id);

    $this->assertDatabaseMissing('contact_enquiries', ['id' => $enquiry->id]);
});
