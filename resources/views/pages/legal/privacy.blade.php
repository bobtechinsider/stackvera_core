<x-legal-layout
    :title="__('legal.privacy.title')"
    :description="__('legal.privacy.meta_description')"
>
    <p class="text-sm text-[#112138]/45">{{ __('legal.privacy.last_updated') }} {{ __('legal.privacy.last_updated_date') }}</p>

    <section>
        <h2>{{ __('legal.privacy.overview_heading') }}</h2>
        <p>{{ __('legal.privacy.overview_body') }}</p>
    </section>

    <section>
        <h2>{{ __('legal.privacy.controller_heading') }}</h2>
        <p>{{ __('legal.privacy.controller_intro') }}</p>
        <p>
            StackVera Core GmbH<br>
            Westendstraße 193<br>
            80686 München<br>
            {{ __('legal.imprint.email') }} <a href="mailto:hello@stackvera.io">hello@stackvera.io</a>
        </p>
    </section>

    <section>
        <h2>{{ __('legal.privacy.access_heading') }}</h2>
        <p>{{ __('legal.privacy.access_body') }}</p>
        <p>
            {{ __('legal.privacy.access_hosting') }} {{ __('legal.privacy.access_hosting_value') }}
        </p>
    </section>

    <section>
        <h2>{{ __('legal.privacy.cookies_heading') }}</h2>
        <p>{{ __('legal.privacy.cookies_body') }}</p>
    </section>

    <section>
        <h2>{{ __('legal.privacy.fonts_heading') }}</h2>
        <p>{{ __('legal.privacy.fonts_body') }}</p>
    </section>

    <section>
        <h2>{{ __('legal.privacy.contact_form_heading') }}</h2>
        <p>{{ __('legal.privacy.contact_form_body') }}</p>
    </section>

    <section>
        <h2>{{ __('legal.privacy.booking_heading') }}</h2>
        <p>{{ __('legal.privacy.booking_body') }}</p>
    </section>

    <section>
        <h2>{{ __('legal.privacy.rights_heading') }}</h2>
        <p>{{ __('legal.privacy.rights_intro') }}</p>
        <ul>
            <li>{{ __('legal.privacy.rights_access') }}</li>
            <li>{{ __('legal.privacy.rights_rectification') }}</li>
            <li>{{ __('legal.privacy.rights_erasure') }}</li>
            <li>{{ __('legal.privacy.rights_restriction') }}</li>
            <li>{{ __('legal.privacy.rights_portability') }}</li>
            <li>{{ __('legal.privacy.rights_object') }}</li>
        </ul>
        <p>
            {{ __('legal.privacy.rights_complaint') }}
            Bayerisches Landesamt für Datenschutzaufsicht (BayLDA), Promenade 18, 91522 Ansbach.
        </p>
    </section>

    <section>
        <h2>{{ __('legal.privacy.dpo_heading') }}</h2>
        <p>
            {{ __('legal.privacy.dpo_body_before') }}
            <a href="mailto:hello@stackvera.io">hello@stackvera.io</a>.
        </p>
    </section>
</x-legal-layout>
