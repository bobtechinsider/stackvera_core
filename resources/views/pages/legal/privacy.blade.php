<x-legal-layout
    :title="__('legal.privacy.title')"
    :description="__('legal.privacy.meta_description')"
>
    <p class="text-sm text-[#112138]/45">{{ __('legal.privacy.last_updated') }} <span class="placeholder">[Date]</span></p>

    <section>
        <h2>{{ __('legal.privacy.overview_heading') }}</h2>
        <p>{{ __('legal.privacy.overview_body') }}</p>
    </section>

    <section>
        <h2>{{ __('legal.privacy.controller_heading') }}</h2>
        <p>{{ __('legal.privacy.controller_intro') }}</p>
        <p>
            StackVera Core GmbH<br>
            <span class="placeholder">[Street and house number]</span><br>
            <span class="placeholder">[Postal code and city]</span><br>
            {{ __('legal.imprint.email') }} <a href="mailto:hello@stackvera.io">hello@stackvera.io</a>
        </p>
    </section>

    <section>
        <h2>{{ __('legal.privacy.access_heading') }}</h2>
        <p>{{ __('legal.privacy.access_body') }}</p>
        <p>
            {{ __('legal.privacy.access_hosting') }} <span class="placeholder">[Name and address of hosting provider]</span>.
        </p>
    </section>

    <section>
        <h2>{{ __('legal.privacy.contact_form_heading') }}</h2>
        <p>{{ __('legal.privacy.contact_form_body') }}</p>
    </section>

    <section>
        <h2>{{ __('legal.privacy.cookies_heading') }}</h2>
        <p>
            <span class="placeholder">[Describe any cookies, analytics or third-party tools you use, or state that none are used.]</span>
        </p>
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
            <span class="placeholder">[Name of the competent data protection authority]</span>.
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
