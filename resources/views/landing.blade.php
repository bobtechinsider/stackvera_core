<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>StackVera Core GmbH - IT Consulting for Cloud, AI &amp; Security</title>
    <meta name="description" content="StackVera Core GmbH is a European IT consultancy delivering cloud &amp; DevOps, AI &amp; data, cybersecurity and EU-trusted platforms for ambitious organisations.">

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
    <header
        x-data="{ open: false, scrolled: false }"
        @scroll.window="scrolled = window.scrollY > 12"
        :class="scrolled ? 'border-zinc-200/80 bg-white/80 shadow-[0_1px_20px_-12px_rgba(17,33,56,0.4)] backdrop-blur-xl' : 'border-transparent bg-transparent'"
        class="fixed inset-x-0 top-0 z-50 border-b transition-all duration-300"
    >
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4 lg:px-8">
            <a href="#top" class="flex items-center" aria-label="StackVera Core — home">
                <img src="/images/stackvera-logo.svg" alt="StackVera Core" class="h-9 w-auto">
            </a>

            <div class="hidden items-center gap-9 lg:flex">
                <a href="#services" class="text-sm font-semibold text-[#112138]/70 transition hover:text-[#6304ec]">Services</a>
                <a href="#approach" class="text-sm font-semibold text-[#112138]/70 transition hover:text-[#6304ec]">Approach</a>
                <a href="#why" class="text-sm font-semibold text-[#112138]/70 transition hover:text-[#6304ec]">Why us</a>
                <a href="#contact" class="text-sm font-semibold text-[#112138]/70 transition hover:text-[#6304ec]">Contact</a>
            </div>

            <div class="hidden items-center gap-3 lg:flex">
                <a href="https://calendar.app.google/vGVv6Sh6EPv8do3M8" target="_blank" rel="noopener"
                   class="text-sm font-semibold text-[#112138] transition hover:text-[#6304ec]">Book a call</a>
                <a href="#contact"
                   class="group inline-flex items-center gap-2 rounded-full bg-[#6304ec] px-5 py-2.5 text-sm font-bold text-white shadow-lg shadow-[#6304ec]/25 transition hover:-translate-y-0.5 hover:bg-[#5505c8] hover:shadow-xl hover:shadow-[#6304ec]/30">
                    Start a project
                    <svg class="h-4 w-4 transition group-hover:translate-x-0.5" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 10h12m0 0-5-5m5 5-5 5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
            </div>

            <button @click="open = !open" class="lg:hidden" aria-label="Toggle menu">
                <svg x-show="!open" class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M4 7h16M4 12h16M4 17h16"/></svg>
                <svg x-show="open" x-cloak class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M6 6l12 12M18 6 6 18"/></svg>
            </button>
        </nav>

        {{-- Mobile menu --}}
        <div x-show="open" x-cloak x-transition class="border-t border-zinc-200 bg-white px-6 py-6 lg:hidden">
            <div class="flex flex-col gap-4">
                <a @click="open=false" href="#services" class="text-base font-semibold">Services</a>
                <a @click="open=false" href="#approach" class="text-base font-semibold">Approach</a>
                <a @click="open=false" href="#why" class="text-base font-semibold">Why us</a>
                <a @click="open=false" href="#contact" class="text-base font-semibold">Contact</a>
                <a @click="open=false" href="#contact" class="mt-2 inline-flex items-center justify-center rounded-full bg-[#6304ec] px-5 py-3 text-sm font-bold text-white">Start a project</a>
            </div>
        </div>
    </header>

    {{-- ============================ HERO ============================ --}}
    <section id="top" class="relative overflow-hidden pt-36 pb-24 lg:pt-44 lg:pb-32">
        {{-- Background flourishes --}}
        <div class="pointer-events-none absolute inset-0 -z-10">
            <div class="absolute -top-40 right-[-10%] h-[34rem] w-[34rem] rounded-full bg-[#6304ec]/15 blur-3xl"></div>
            <div class="absolute top-24 left-[-12%] h-[26rem] w-[26rem] rounded-full bg-[#00dffe]/20 blur-3xl"></div>
            <div class="absolute inset-0 opacity-[0.5] [background-image:linear-gradient(to_right,rgba(17,33,56,0.045)_1px,transparent_1px),linear-gradient(to_bottom,rgba(17,33,56,0.045)_1px,transparent_1px)] [background-size:64px_64px] [mask-image:radial-gradient(ellipse_at_top,black,transparent_70%)]"></div>
        </div>

        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-4xl text-center">
                <span class="inline-flex items-center gap-2 rounded-full border border-[#6304ec]/20 bg-[#6304ec]/5 px-4 py-1.5 text-xs font-bold font-body uppercase tracking-[0.18em] text-[#6304ec]">
                    <span class="h-1.5 w-1.5 rounded-full bg-[#00dffe]"></span>
                    European IT Consultancy
                </span>

                <h1 class="mt-7 font-display text-5xl font-black leading-[1.05] tracking-tight text-[#112138] sm:text-6xl lg:text-7xl">
                    Engineering the
                    <span class="relative whitespace-nowrap">
                        <span class="bg-gradient-to-r from-[#6304ec] via-[#5505c8] to-[#00dffe] bg-clip-text text-transparent">core</span>
                    </span>
                    of your<br class="hidden sm:block"> digital business.
                </h1>

                <p class="mx-auto mt-7 max-w-2xl text-lg leading-relaxed text-[#112138]/65">
                    StackVera Core GmbH helps ambitious organisations modernise their stack with
                    cloud, AI and security expertise. Sovereign, compliant and built to last,
                    engineered in Europe.
                </p>

                <div class="mt-10 flex flex-col items-center justify-center gap-3 sm:flex-row">
                    <a href="#contact"
                       class="group inline-flex w-full items-center justify-center gap-2 rounded-full bg-[#6304ec] px-7 py-3.5 text-base font-bold text-white shadow-xl shadow-[#6304ec]/25 transition hover:-translate-y-0.5 hover:bg-[#5505c8] sm:w-auto">
                        Start a project
                        <svg class="h-4 w-4 transition group-hover:translate-x-0.5" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 10h12m0 0-5-5m5 5-5 5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                    <a href="#services"
                       class="inline-flex w-full items-center justify-center gap-2 rounded-full border border-zinc-300 bg-white px-7 py-3.5 text-base font-bold text-[#112138] transition hover:border-[#6304ec]/40 hover:text-[#6304ec] sm:w-auto">
                        Explore services
                    </a>
                </div>

                <p class="mt-6 text-sm text-[#112138]/45">Trusted by teams across DACH and the EU · GDPR-first · ISO-aligned</p>
            </div>

            {{-- Stat band --}}
            <div class="mx-auto mt-20 grid max-w-4xl grid-cols-2 gap-px overflow-hidden rounded-3xl border border-zinc-200 bg-zinc-200 shadow-sm md:grid-cols-4">
                @foreach ([
                    ['12+', 'Years of combined delivery'],
                    ['99.95%', 'Average platform uptime'],
                    ['40+', 'Cloud & AI projects shipped'],
                    ['EU', 'Data residency by default'],
                ] as [$stat, $label])
                    <div class="bg-white px-6 py-8 text-center">
                        <div class="font-display text-3xl font-black text-[#6304ec]">{{ $stat }}</div>
                        <div class="mt-1 text-xs font-semibold font-body uppercase tracking-wide text-[#112138]/50">{{ $label }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============================ CLIENTS ============================ --}}
    <section id="clients" class="border-y border-zinc-200 bg-zinc-50/60 py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <p class="text-center text-sm font-bold font-body uppercase tracking-[0.18em] text-[#112138]/45">
                Trusted by teams at leading organisations
            </p>
        </div>

        @php
            $clients = [
                ['file' => 'siemens.png', 'alt' => 'Siemens'],
                ['file' => 'cariad.png', 'alt' => 'CARIAD'],
                ['file' => 'adidas.png', 'alt' => 'Adidas'],
                ['file' => 'n26.png', 'alt' => 'N26'],
                ['file' => 'dkb.png', 'alt' => 'DKB'],
                ['file' => 'dekra.png', 'alt' => 'DEKRA'],
                ['file' => 'mobilezone.png', 'alt' => 'Mobilezone'],
                ['file' => 'soprasteria.png', 'alt' => 'Sopra Steria'],
                ['file' => 'dfl.png', 'alt' => 'DFL'],
                ['file' => 'qlar.png', 'alt' => 'Qlar'],
                ['file' => 'kpfilms.png', 'alt' => 'KP Films'],
                ['file' => 'natrangroupe.png', 'alt' => 'Natran Groupe'],
                ['file' => 'zimmer-rohde.png', 'alt' => 'Zimmer + Rohde'],
            ];
            $clients = array_values(array_filter($clients, fn ($c) => file_exists(public_path('images/companies/'.$c['file']))));
        @endphp

        <div class="marquee group mt-12 [--marquee-duration:45s] [mask-image:linear-gradient(to_right,transparent,black_8%,black_92%,transparent)]">
            <div class="marquee__track flex w-max items-center gap-16 pr-16 group-hover:[animation-play-state:paused]">
                {{-- Two identical sets for a seamless loop --}}
                @foreach (array_merge($clients, $clients) as $client)
                    <img src="/images/companies/{{ $client['file'] }}" alt="{{ $client['alt'] }}"
                         loading="lazy" aria-hidden="false"
                         class="h-10 w-auto shrink-0 object-contain opacity-50 grayscale transition duration-300 hover:opacity-100 hover:grayscale-0 sm:h-12">
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============================ SERVICES ============================ --}}
    <section id="services" class="relative py-24 lg:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="max-w-2xl">
                <span class="text-sm font-bold font-body uppercase tracking-[0.18em] text-[#6304ec]">What we do</span>
                <h2 class="mt-4 font-display text-4xl font-black tracking-tight text-[#112138] sm:text-5xl">
                    Four disciplines, one accountable partner.
                </h2>
                <p class="mt-5 text-lg text-[#112138]/65">
                    We embed senior engineers alongside your team to design, build and run the
                    systems that move your business forward.
                </p>
            </div>

            <div class="mt-16 grid gap-6 md:grid-cols-2">
                @php
                    $services = [
                        [
                            'title' => 'Cloud & DevOps',
                            'desc' => 'Cloud migration, infrastructure as code, Kubernetes and CI/CD pipelines that ship safely and scale on demand.',
                            'points' => ['AWS · Azure · Hetzner', 'Terraform & GitOps', 'Observability & SRE'],
                            'accent' => '#6304ec',
                        ],
                        [
                            'title' => 'AI & Data',
                            'desc' => 'From data foundations to production AI, we integrate models and analytics that create measurable leverage.',
                            'points' => ['LLM & RAG integration', 'Data pipelines & warehousing', 'Decision dashboards'],
                            'accent' => '#5505c8',
                        ],
                        [
                            'title' => 'Cybersecurity',
                            'desc' => 'Threat detection, incident response and zero-trust architecture that keep your systems resilient and your customers confident.',
                            'points' => ['Threat detection & response', 'Incident response & recovery', 'Zero-trust architecture'],
                            'accent' => '#00b8d4',
                        ],
                        [
                            'title' => 'EU-Trusted Platforms',
                            'desc' => 'Sovereign, compliant platforms with European data residency, built for organisations that cannot compromise on trust.',
                            'points' => ['EU data residency', 'Sovereign cloud', 'Digital compliance (DSA · NIS2)'],
                            'accent' => '#112138',
                        ],
                    ];
                @endphp

                @foreach ($services as $service)
                    <div class="group relative overflow-hidden rounded-3xl border border-zinc-200 bg-white p-8 transition duration-300 hover:-translate-y-1 hover:border-transparent hover:shadow-2xl hover:shadow-[#112138]/10 lg:p-10">
                        <div class="absolute inset-x-0 top-0 h-1 origin-left scale-x-0 bg-gradient-to-r from-[#6304ec] to-[#00dffe] transition-transform duration-300 group-hover:scale-x-100"></div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl" style="background-color: {{ $service['accent'] }}1a; color: {{ $service['accent'] }}">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75 12 2.25l8.25 4.5M3.75 6.75 12 11.25l8.25-4.5M3.75 6.75v10.5L12 21.75m8.25-15v10.5L12 21.75m0-10.5v10.5"/></svg>
                        </div>
                        <h3 class="mt-6 font-display text-2xl font-bold text-[#112138]">{{ $service['title'] }}</h3>
                        <p class="mt-3 text-[#112138]/65">{{ $service['desc'] }}</p>
                        <ul class="mt-6 space-y-2.5">
                            @foreach ($service['points'] as $point)
                                <li class="flex items-center gap-3 text-sm font-semibold text-[#112138]/75">
                                    <svg class="h-4 w-4 shrink-0 text-[#6304ec]" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 0 1 0 1.4l-7.5 7.5a1 1 0 0 1-1.4 0l-3.5-3.5a1 1 0 1 1 1.4-1.4l2.8 2.79 6.8-6.79a1 1 0 0 1 1.4 0Z" clip-rule="evenodd"/></svg>
                                    {{ $point }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============================ APPROACH ============================ --}}
    <section id="approach" class="bg-[#112138] py-24 text-white lg:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="grid gap-16 lg:grid-cols-[0.9fr_1.1fr] lg:items-center">
                <div>
                    <span class="text-sm font-bold font-body uppercase tracking-[0.18em] text-[#00dffe]">How we work</span>
                    <h2 class="mt-4 font-display text-4xl font-black tracking-tight sm:text-5xl">
                        A delivery model built on clarity and ownership.
                    </h2>
                    <p class="mt-5 text-lg text-white/65">
                        No black boxes, no endless decks. We move from discovery to production in
                        focused increments, with senior people accountable at every step.
                    </p>
                    <a href="#contact" class="mt-8 inline-flex items-center gap-2 rounded-full bg-white px-6 py-3 text-sm font-bold text-[#112138] transition hover:bg-[#00dffe]">
                        Book a discovery call
                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 10h12m0 0-5-5m5 5-5 5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    @php
                        $steps = [
                            ['01', 'Discover', 'We map your goals, constraints and architecture to define what success looks like.'],
                            ['02', 'Design', 'A pragmatic technical plan with clear milestones, costs and trade-offs.'],
                            ['03', 'Build', 'Senior engineers deliver in short cycles with continuous, demonstrable progress.'],
                            ['04', 'Run', 'We operate, secure and optimise, or hand over a system your team can own.'],
                        ];
                    @endphp
                    @foreach ($steps as [$num, $title, $desc])
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-6 transition hover:border-[#00dffe]/40 hover:bg-white/[0.07]">
                            <div class="font-display text-2xl font-black text-[#00dffe]">{{ $num }}</div>
                            <h3 class="mt-3 font-display text-lg font-bold">{{ $title }}</h3>
                            <p class="mt-2 text-sm leading-relaxed text-white/60">{{ $desc }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ============================ WHY US ============================ --}}
    <section id="why" class="py-24 lg:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="grid gap-16 lg:grid-cols-2 lg:items-center">
                <div class="relative order-2 lg:order-1">
                    <div class="relative overflow-hidden rounded-3xl border border-zinc-200 bg-gradient-to-br from-[#6304ec] to-[#5505c8] p-10 text-white shadow-2xl shadow-[#6304ec]/20">
                        <div class="pointer-events-none absolute -right-24 -top-24 h-72 w-72 rounded-full bg-white/10 blur-2xl"></div>
                        <div class="pointer-events-none absolute -bottom-20 -left-10 h-56 w-56 rounded-full bg-[#00dffe]/15 blur-3xl"></div>
                        <h3 class="relative font-display text-2xl font-bold">Sovereignty, by design.</h3>
                        <p class="mt-4 text-white/80">
                            Your data stays in the EU, your architecture stays auditable, and your
                            compliance obligations are engineered in from day one, not bolted on later.
                        </p>
                        <div class="mt-8 grid grid-cols-3 gap-4 border-t border-white/15 pt-8">
                            <div><div class="font-display text-2xl font-black">100%</div><div class="text-xs text-white/70">EU hosting</div></div>
                            <div><div class="font-display text-2xl font-black">24/7</div><div class="text-xs text-white/70">Monitoring</div></div>
                            <div><div class="font-display text-2xl font-black">0</div><div class="text-xs text-white/70">Lock-in</div></div>
                        </div>
                    </div>
                </div>

                <div class="order-1 lg:order-2">
                    <span class="text-sm font-bold font-body uppercase tracking-[0.18em] text-[#6304ec]">Why StackVera Core</span>
                    <h2 class="mt-4 font-display text-4xl font-black tracking-tight text-[#112138] sm:text-5xl">
                        Senior expertise without the agency overhead.
                    </h2>
                    <div class="mt-8 space-y-6">
                        @php
                            $reasons = [
                                ['Senior-only teams', 'You work directly with the engineers building your systems, no layers, no hand-offs.'],
                                ['Vendor-neutral advice', 'We recommend what fits your context, not what fills a licence quota.'],
                                ['Compliance-first', 'GDPR, ISO 27001 and EU sovereignty considered from the first line of architecture.'],
                                ['Built to be owned', 'Clean, documented systems your own team can confidently maintain.'],
                            ];
                        @endphp
                        @foreach ($reasons as [$title, $desc])
                            <div class="flex gap-4">
                                <div class="mt-0.5 flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-[#6304ec]/10 text-[#6304ec]">
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 0 1 0 1.4l-7.5 7.5a1 1 0 0 1-1.4 0l-3.5-3.5a1 1 0 1 1 1.4-1.4l2.8 2.79 6.8-6.79a1 1 0 0 1 1.4 0Z" clip-rule="evenodd"/></svg>
                                </div>
                                <div>
                                    <h3 class="font-display text-lg font-bold text-[#112138]">{{ $title }}</h3>
                                    <p class="mt-1 text-[#112138]/65">{{ $desc }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================ CONTACT ============================ --}}
    <section id="contact" class="relative overflow-hidden py-24 lg:py-32">
        <div class="pointer-events-none absolute inset-0 -z-10">
            <div class="absolute bottom-[-20%] left-1/2 h-[30rem] w-[30rem] -translate-x-1/2 rounded-full bg-[#00dffe]/10 blur-3xl"></div>
        </div>

        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="grid gap-14 rounded-[2.5rem] border border-zinc-200 bg-white p-8 shadow-2xl shadow-[#112138]/5 lg:grid-cols-2 lg:p-14">
                <div>
                    <span class="text-sm font-bold font-body uppercase tracking-[0.18em] text-[#6304ec]">Let's talk</span>
                    <h2 class="mt-4 font-display text-4xl font-black tracking-tight text-[#112138] sm:text-5xl">
                        Tell us what you're building.
                    </h2>
                    <p class="mt-5 text-lg text-[#112138]/65">
                        Share a few details and a senior consultant will get back to you within one
                        business day. Prefer to talk first? Book a call or email us directly.
                    </p>

                    <div class="mt-10 space-y-4">
                        <a href="mailto:hello@stackvera.io" class="flex items-center gap-4 rounded-2xl border border-zinc-200 p-4 transition hover:border-[#6304ec]/40 hover:bg-[#6304ec]/[0.03]">
                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#6304ec]/10 text-[#6304ec]">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75 12 13.5l9.75-6.75M3.75 5.25h16.5a1.5 1.5 0 0 1 1.5 1.5v10.5a1.5 1.5 0 0 1-1.5 1.5H3.75a1.5 1.5 0 0 1-1.5-1.5V6.75a1.5 1.5 0 0 1 1.5-1.5Z"/></svg>
                            </div>
                            <div>
                                <div class="text-xs font-semibold font-body uppercase tracking-wide text-[#112138]/45">Email</div>
                                <div class="font-semibold text-[#112138]">hello@stackvera.io</div>
                            </div>
                        </a>
                        <a href="https://calendar.app.google/vGVv6Sh6EPv8do3M8" target="_blank" rel="noopener" class="flex items-center gap-4 rounded-2xl border border-zinc-200 p-4 transition hover:border-[#6304ec]/40 hover:bg-[#6304ec]/[0.03]">
                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#00dffe]/15 text-[#00b8d4]">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3.75 8.25h16.5M4.5 5.25h15a.75.75 0 0 1 .75.75v13.5a.75.75 0 0 1-.75.75h-15a.75.75 0 0 1-.75-.75V6a.75.75 0 0 1 .75-.75Z"/></svg>
                            </div>
                            <div>
                                <div class="text-xs font-semibold font-body uppercase tracking-wide text-[#112138]/45">Book a call</div>
                                <div class="font-semibold text-[#112138]">30-minute intro · free</div>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Form --}}
                <div>
                    <livewire:pages::contact-form />
                </div>
            </div>
        </div>
    </section>

    {{-- ============================ FOOTER ============================ --}}
    <footer class="border-t border-zinc-200 bg-white py-14">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="flex flex-col items-start justify-between gap-10 lg:flex-row">
                <div class="max-w-sm">
                    <img src="/images/stackvera-logo.svg" alt="StackVera Core" class="h-9 w-auto">
                    <p class="mt-5 text-sm leading-relaxed text-[#112138]/55">
                        European IT consultancy for cloud, AI, security and sovereign platforms.
                        Engineering the core of your digital business.
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-12 sm:grid-cols-3">
                    <div>
                        <h4 class="text-xs font-bold font-body uppercase tracking-wider text-[#112138]/45">Services</h4>
                        <ul class="mt-4 space-y-2.5 text-sm font-semibold text-[#112138]/70">
                            <li><a href="#services" class="hover:text-[#6304ec]">Cloud &amp; DevOps</a></li>
                            <li><a href="#services" class="hover:text-[#6304ec]">AI &amp; Data</a></li>
                            <li><a href="#services" class="hover:text-[#6304ec]">Cybersecurity</a></li>
                            <li><a href="#services" class="hover:text-[#6304ec]">EU Platforms</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold font-body uppercase tracking-wider text-[#112138]/45">Company</h4>
                        <ul class="mt-4 space-y-2.5 text-sm font-semibold text-[#112138]/70">
                            <li><a href="#approach" class="hover:text-[#6304ec]">Approach</a></li>
                            <li><a href="#why" class="hover:text-[#6304ec]">Why us</a></li>
                            <li><a href="#contact" class="hover:text-[#6304ec]">Contact</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold font-body uppercase tracking-wider text-[#112138]/45">Contact</h4>
                        <ul class="mt-4 space-y-2.5 text-sm font-semibold text-[#112138]/70">
                            <li><a href="mailto:hello@stackvera.io" class="hover:text-[#6304ec]">hello@stackvera.io</a></li>
                            <li><a href="https://calendar.app.google/vGVv6Sh6EPv8do3M8" target="_blank" rel="noopener" class="hover:text-[#6304ec]">Book a call</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="mt-12 flex flex-col items-start justify-between gap-4 border-t border-zinc-200 pt-8 text-xs text-[#112138]/45 sm:flex-row sm:items-center">
                <p>© {{ date('Y') }} StackVera Core GmbH. All rights reserved.</p>
                <div class="flex gap-6">
                    <a href="#" class="hover:text-[#6304ec]">Impressum</a>
                    <a href="#" class="hover:text-[#6304ec]">Datenschutz</a>
                    <a href="#" class="hover:text-[#6304ec]">AGB</a>
                </div>
            </div>
        </div>
    </footer>

    <style>
        [x-cloak]{display:none !important;}
        .marquee{overflow:hidden;}
        .marquee__track{animation:marquee var(--marquee-duration,45s) linear infinite;}
        @keyframes marquee{from{transform:translateX(0);}to{transform:translateX(-50%);}}
        @media (prefers-reduced-motion:reduce){.marquee__track{animation:none;}}
    </style>
</body>
</html>
