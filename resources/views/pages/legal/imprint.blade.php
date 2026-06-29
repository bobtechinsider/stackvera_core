<x-legal-layout
    :title="__('legal.imprint.title')"
    :description="__('legal.imprint.meta_description')"
>
    <p class="text-sm text-[#112138]/45">{{ __('legal.imprint.intro') }}</p>

    <section>
        <h2>{{ __('legal.imprint.company_heading') }}</h2>
        <p>
            StackVera Core GmbH<br>
            Westendstraße 193<br>
            80686 München<br>
            {{ __('legal.imprint.country') }}
        </p>
    </section>

    <section>
        <h2>{{ __('legal.imprint.represented_heading') }}</h2>
        <p>
            {{ __('legal.imprint.managing_director') }} Bob Molitor
        </p>
    </section>

    <section>
        <h2>{{ __('legal.imprint.contact_heading') }}</h2>
        <p>
            {{ __('legal.imprint.email') }} <a href="mailto:hello@stackvera.io">hello@stackvera.io</a>
        </p>
    </section>

    <section>
        <h2>{{ __('legal.imprint.register_heading') }}</h2>
        <p>
            {{ __('legal.imprint.register_intro') }}<br>
            {{ __('legal.imprint.register_court') }} <span class="placeholder">[Register court]</span><br>
            {{ __('legal.imprint.register_number') }} <span class="placeholder">[HRB number]</span>
        </p>
    </section>

    <section>
        <h2>{{ __('legal.imprint.vat_heading') }}</h2>
        <p>
            {{ __('legal.imprint.vat_intro') }}<br>
            <span class="placeholder">[VAT ID, e.g. DE000000000]</span>
        </p>
    </section>

    <section>
        <h2>{{ __('legal.imprint.responsible_heading') }}</h2>
        <p>
            {{ __('legal.imprint.responsible_intro') }}<br>
            Bob Molitor, {{ __('legal.imprint.responsible_address') }}
        </p>
    </section>

</x-legal-layout>
