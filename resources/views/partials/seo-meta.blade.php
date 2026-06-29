@php
    /**
     * Reusable SEO / social meta tags.
     *
     * @var string|null $seoTitle        Document & social title.
     * @var string|null $seoDescription  Meta & social description.
     * @var string|null $seoImage        Absolute URL of the share image.
     * @var string|null $seoType         Open Graph type (e.g. "website").
     * @var bool|null   $seoNoindex      Whether to discourage indexing.
     */
    $seoTitle ??= __('landing.meta.title');
    $seoDescription ??= __('landing.meta.description');
    $seoImage ??= asset('images/og-image.png');
    $seoType ??= 'website';
    $seoNoindex ??= false;

    $canonical = url()->current();
    $localeMap = ['en' => 'en_US', 'de' => 'de_DE'];
    $ogLocale = $localeMap[app()->getLocale()] ?? 'en_US';
@endphp

<link rel="canonical" href="{{ $canonical }}">

@if ($seoNoindex)
    <meta name="robots" content="noindex, follow">
@else
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
@endif

<meta name="author" content="StackVera Core GmbH">
<meta name="theme-color" content="#6304ec">

{{-- Open Graph --}}
<meta property="og:type" content="{{ $seoType }}">
<meta property="og:site_name" content="StackVera Core GmbH">
<meta property="og:title" content="{{ $seoTitle }}">
<meta property="og:description" content="{{ $seoDescription }}">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:image" content="{{ $seoImage }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="StackVera Core GmbH">
<meta property="og:locale" content="{{ $ogLocale }}">
@foreach ($localeMap as $alternate)
    @if ($alternate !== $ogLocale)
        <meta property="og:locale:alternate" content="{{ $alternate }}">
    @endif
@endforeach

{{-- Twitter / X --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $seoTitle }}">
<meta name="twitter:description" content="{{ $seoDescription }}">
<meta name="twitter:image" content="{{ $seoImage }}">
<meta name="twitter:image:alt" content="StackVera Core GmbH">
