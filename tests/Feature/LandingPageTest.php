<?php

use Illuminate\Support\Facades\Log;

it('renders the landing page with brand content', function () {
    $this->get(route('home'))
        ->assertOk()
        ->assertSee('StackVera Core', false)
        ->assertSee('Engineering the')
        ->assertSee('/images/stackvera-logo.svg', false);
});

it('accepts a valid contact enquiry', function () {
    Log::shouldReceive('info')->once();

    $this->post(route('contact.store'), [
        'name' => 'Jane Doe',
        'company' => 'Acme GmbH',
        'email' => 'jane@acme.com',
        'message' => 'We need help modernising our cloud platform.',
    ])
        ->assertRedirect(route('home').'#contact')
        ->assertSessionHas('contact_success', true);
});

it('rejects an invalid contact enquiry', function () {
    $this->post(route('contact.store'), [
        'name' => '',
        'email' => 'not-an-email',
        'message' => '',
    ])->assertSessionHasErrors(['name', 'email', 'message']);
});
