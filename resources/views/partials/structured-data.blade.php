@php
    $baseUrl = url('/');
    $logo = asset('images/stackvera-logo-email.png');
    $ogImage = asset('images/og-image.png');

    $services = collect(__('landing.services.items'))
        ->map(fn (array $service): array => [
            '@type' => 'Service',
            'name' => $service['title'],
            'description' => $service['description'],
        ])
        ->all();

    $structuredData = [
        '@context' => 'https://schema.org',
        '@graph' => [
            [
                '@type' => ['Organization', 'ProfessionalService'],
                '@id' => $baseUrl.'/#organization',
                'name' => 'StackVera Core GmbH',
                'url' => $baseUrl,
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => $logo,
                ],
                'image' => $ogImage,
                'email' => 'hello@stackvera.io',
                'description' => __('landing.meta.description'),
                'slogan' => __('landing.footer.tagline'),
                'foundingLocation' => [
                    '@type' => 'Country',
                    'name' => 'Germany',
                ],
                'address' => [
                    '@type' => 'PostalAddress',
                    'addressCountry' => 'DE',
                ],
                'areaServed' => [
                    ['@type' => 'Country', 'name' => 'Germany'],
                    ['@type' => 'Country', 'name' => 'Austria'],
                    ['@type' => 'Country', 'name' => 'Switzerland'],
                    ['@type' => 'AdministrativeArea', 'name' => 'European Union'],
                ],
                'knowsAbout' => [
                    'Cloud computing',
                    'DevOps',
                    'Kubernetes',
                    'Infrastructure as code',
                    'Artificial intelligence',
                    'Large language models',
                    'Data engineering',
                    'Cybersecurity',
                    'Zero-trust architecture',
                    'GDPR compliance',
                    'EU data sovereignty',
                ],
                'makesOffer' => collect($services)
                    ->map(fn (array $service): array => [
                        '@type' => 'Offer',
                        'itemOffered' => $service,
                    ])
                    ->all(),
            ],
            [
                '@type' => 'WebSite',
                '@id' => $baseUrl.'/#website',
                'url' => $baseUrl,
                'name' => 'StackVera Core GmbH',
                'description' => __('landing.meta.description'),
                'inLanguage' => ['en', 'de'],
                'publisher' => ['@id' => $baseUrl.'/#organization'],
            ],
        ],
    ];
@endphp

<script type="application/ld+json">
{!! json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR) !!}
</script>
