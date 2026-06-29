@php
    $currentLocale = app()->getLocale();
    $locales = ['en' => 'EN', 'de' => 'DE'];
@endphp

<div {{ $attributes->merge(['class' => 'flex items-center gap-1 text-sm font-semibold']) }} aria-label="Language">
    @foreach ($locales as $locale => $label)
        @if ($locale === $currentLocale)
            <span class="rounded-full bg-[#6304ec]/10 px-2.5 py-1 text-[#6304ec]" aria-current="true">{{ $label }}</span>
        @else
            <a href="{{ route('locale.switch', $locale) }}"
               class="rounded-full px-2.5 py-1 text-[#112138]/50 transition hover:text-[#6304ec]"
               hreflang="{{ $locale }}">{{ $label }}</a>
        @endif
    @endforeach
</div>
