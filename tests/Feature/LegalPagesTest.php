<?php

it('renders the imprint page', function () {
    $this->get(route('legal.imprint'))
        ->assertOk()
        ->assertSee('Imprint')
        ->assertSee('StackVera Core GmbH')
        ->assertDontSee('Impressum');
});

it('renders the privacy policy page', function () {
    $this->get(route('legal.privacy'))
        ->assertOk()
        ->assertSee('Privacy Policy')
        ->assertSee('GDPR')
        ->assertDontSee('Datenschutz');
});

it('links to the legal pages from the landing footer', function () {
    $this->get(route('home'))
        ->assertOk()
        ->assertSee(route('legal.imprint'), false)
        ->assertSee(route('legal.privacy'), false)
        ->assertSee('Imprint')
        ->assertSee('Privacy Policy');
});
