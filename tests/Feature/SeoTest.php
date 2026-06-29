<?php

it('exposes social and canonical meta tags on the landing page', function () {
    $this->get(route('home'))
        ->assertOk()
        ->assertSee('<link rel="canonical"', false)
        ->assertSee('property="og:title"', false)
        ->assertSee('property="og:image"', false)
        ->assertSee('name="twitter:card"', false)
        ->assertSee('max-image-preview:large', false);
});

it('embeds valid Organization structured data on the landing page', function () {
    $html = $this->get(route('home'))->assertOk()->getContent();

    expect($html)->toMatch('/<script type="application\/ld\+json">\s*(\{.*?\})\s*<\/script>/s');

    preg_match('/<script type="application\/ld\+json">\s*(\{.*?\})\s*<\/script>/s', $html, $matches);
    $data = json_decode($matches[1], true, flags: JSON_THROW_ON_ERROR);

    expect($data['@graph'][0]['name'])->toBe('StackVera Core GmbH')
        ->and($data['@graph'][0]['@type'])->toContain('ProfessionalService')
        ->and($data['@graph'][0]['makesOffer'])->toHaveCount(4);
});

it('marks legal pages as noindex', function () {
    $this->get(route('legal.imprint'))
        ->assertOk()
        ->assertSee('noindex, follow', false)
        ->assertSee('<link rel="canonical"', false);
});

it('serves a valid xml sitemap listing the home page', function () {
    $this->get('/sitemap.xml')
        ->assertOk()
        ->assertHeader('Content-Type', 'application/xml')
        ->assertSee('<urlset', false)
        ->assertSee(route('home'), false);
});

it('serves robots.txt and llms.txt for crawlers and AI assistants', function () {
    expect(file_get_contents(public_path('robots.txt')))
        ->toContain('Sitemap:')
        ->toContain('GPTBot')
        ->toContain('ClaudeBot');

    expect(file_get_contents(public_path('llms.txt')))
        ->toContain('# StackVera Core GmbH')
        ->toContain('## Services');
});
