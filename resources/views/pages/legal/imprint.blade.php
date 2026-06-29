<x-legal-layout
    :title="__('legal.imprint.title')"
    :description="__('legal.imprint.meta_description')"
>
    <p class="text-sm text-[#112138]/45">{{ __('legal.imprint.intro') }}</p>

    <section>
        <h2>{{ __('legal.imprint.company_heading') }}</h2>
        <p>
            StackVera Core GmbH<br>
            <span class="placeholder">[Street and house number]</span><br>
            <span class="placeholder">[Postal code and city]</span><br>
            <span class="placeholder">[Country]</span>
        </p>
    </section>

    <section>
        <h2>{{ __('legal.imprint.represented_heading') }}</h2>
        <p>
            {{ __('legal.imprint.managing_director') }} <span class="placeholder">[Name of managing director]</span>
        </p>
    </section>

    <section>
        <h2>{{ __('legal.imprint.contact_heading') }}</h2>
        <p>
            {{ __('legal.imprint.phone') }} <span class="placeholder">[Phone number]</span><br>
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
            <span class="placeholder">[Name]</span>, <span class="placeholder">[{{ __('legal.imprint.responsible_address') }}]</span>
        </p>
    </section>

</x-legal-layout>
