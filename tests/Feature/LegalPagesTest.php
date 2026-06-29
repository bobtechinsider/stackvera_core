<?php

it('renders the imprint page in English by default', function () {
    $this->get(route('legal.imprint'))
        ->assertOk()
        ->assertSee('Imprint')
        ->assertSee('StackVera Core GmbH')
        ->assertDontSee('Impressum');
});

it('renders the imprint page in German when the locale cookie is set', function () {
    $this->withUnencryptedCookie('locale', 'de')
        ->get(route('legal.imprint'))
        ->assertOk()
        ->assertSee('Impressum')
        ->assertSee('Angaben gemäß § 5 DDG (Digitale-Dienste-Gesetz).')
        ->assertDontSee('German Digital Services Act');
});

it('renders the privacy policy page in English by default', function () {
    $this->get(route('legal.privacy'))
        ->assertOk()
        ->assertSee('Privacy Policy')
        ->assertSee('GDPR')
        ->assertDontSee('Datenschutzerklärung');
});

it('renders the privacy policy page in German when the locale cookie is set', function () {
    $this->withUnencryptedCookie('locale', 'de')
        ->get(route('legal.privacy'))
        ->assertOk()
        ->assertSee('Datenschutzerklärung')
        ->assertSee('DSGVO')
        ->assertDontSee('General Data Protection Regulation');
});

it('links to the legal pages from the landing footer', function () {
    $this->get(route('home'))
        ->assertOk()
        ->assertSee(route('legal.imprint'), false)
        ->assertSee(route('legal.privacy'), false)
        ->assertSee('Imprint')
        ->assertSee('Privacy Policy');
});
