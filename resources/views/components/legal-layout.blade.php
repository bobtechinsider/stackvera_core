@props([
    'title',
    'description' => null,
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }} - StackVera Core GmbH</title>
    @if ($description)
        <meta name="description" content="{{ $description }}">
    @endif

    @include('partials.seo-meta', [
        'seoTitle' => $title.' - StackVera Core GmbH',
        'seoDescription' => $description ?? __('landing.meta.description'),
        'seoNoindex' => true,
    ])

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <link rel="preconnect" href="https://api.fontshare.com" crossorigin>
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@700,500,900,400&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans text-[#112138] antialiased selection:bg-[#6304ec] selection:text-white">

    {{-- ============================ HEADER ============================ --}}
    <header class="border-b border-zinc-200/80 bg-white/80 shadow-[0_1px_20px_-12px_rgba(17,33,56,0.4)] backdrop-blur-xl">
        <nav class="mx-auto flex max-w-4xl items-center justify-between px-6 py-4 lg:px-8">
            <a href="{{ route('home') }}" class="flex items-center" aria-label="StackVera Core — home">
                <img src="/images/stackvera-logo.svg" alt="StackVera Core" class="h-9 w-auto">
            </a>
            <div class="flex items-center gap-4">
                <x-language-switcher />
                <a href="{{ route('home') }}"
                   class="inline-flex items-center gap-2 text-sm font-semibold text-[#112138]/70 transition hover:text-[#6304ec]">
                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 10H4m0 0 5 5m-5-5 5-5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    {{ __('legal.layout.back_to_home') }}
                </a>
            </div>
        </nav>
    </header>

    {{-- ============================ CONTENT ============================ --}}
    <main class="relative overflow-hidden pt-20 pb-24 lg:pt-24 lg:pb-32">
        <div class="pointer-events-none absolute inset-0 -z-10">
            <div class="absolute -top-40 right-[-10%] h-[34rem] w-[34rem] rounded-full bg-[#6304ec]/10 blur-3xl"></div>
            <div class="absolute top-24 left-[-12%] h-[26rem] w-[26rem] rounded-full bg-[#00dffe]/15 blur-3xl"></div>
        </div>

        <div class="mx-auto max-w-3xl px-6 lg:px-8">
            <span class="text-sm font-bold font-body uppercase tracking-[0.18em] text-[#6304ec]">{{ __('legal.layout.eyebrow') }}</span>
            <h1 class="mt-4 font-display text-4xl font-black tracking-tight text-[#112138] sm:text-5xl">{{ $title }}</h1>

            <div class="prose-legal mt-12 space-y-8 text-[#112138]/75">
                {{ $slot }}
            </div>
        </div>
    </main>

    {{-- ============================ FOOTER ============================ --}}
    <footer class="border-t border-zinc-200 bg-white py-10">
        <div class="mx-auto flex max-w-4xl flex-col items-start justify-between gap-4 px-6 text-xs text-[#112138]/45 sm:flex-row sm:items-center lg:px-8">
            <p>© {{ date('Y') }} {{ __('landing.footer.rights') }}</p>
            <div class="flex gap-6">
                <a href="{{ route('legal.imprint') }}" class="hover:text-[#6304ec]">{{ __('landing.footer.imprint') }}</a>
                <a href="{{ route('legal.privacy') }}" class="hover:text-[#6304ec]">{{ __('landing.footer.privacy') }}</a>
            </div>
        </div>
    </footer>

    <style>
        .prose-legal h2 { font-family: 'Satoshi', sans-serif; font-weight: 800; font-size: 1.5rem; line-height: 2rem; color: #112138; margin-top: 2.5rem; }
        .prose-legal h3 { font-family: 'Satoshi', sans-serif; font-weight: 700; font-size: 1.125rem; color: #112138; margin-top: 1.5rem; }
        .prose-legal p { line-height: 1.75; }
        .prose-legal a { color: #6304ec; font-weight: 600; }
        .prose-legal a:hover { text-decoration: underline; }
        .prose-legal ul { list-style: disc; padding-left: 1.25rem; }
        .prose-legal ul li { margin-top: 0.5rem; }
        .prose-legal .placeholder { background-color: #6304ec1a; color: #5505c8; font-weight: 600; padding: 0 0.25rem; border-radius: 0.25rem; }
    </style>
</body>
</html>
