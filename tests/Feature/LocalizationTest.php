<?php

it('serves the landing page in English by default', function () {
    $this->get(route('home'))
        ->assertOk()
        ->assertSee('Engineering the')
        ->assertDontSee('Wir entwickeln den');
});

it('serves the landing page in German when the locale cookie is set', function () {
    $this->withUnencryptedCookie('locale', 'de')
        ->get(route('home'))
        ->assertOk()
        ->assertSee('Wir entwickeln den')
        ->assertSee('Leistungen')
        ->assertDontSee('Engineering the');
});

it('stores the chosen locale in a cookie and redirects back', function () {
    $this->from(route('home'))
        ->get(route('locale.switch', 'de'))
        ->assertRedirect(route('home'))
        ->assertCookie('locale', 'de', encrypted: false);
});

it('rejects an unsupported locale', function () {
    $this->get(route('locale.switch', 'fr'))
        ->assertNotFound();
});
