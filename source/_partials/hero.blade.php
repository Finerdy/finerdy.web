@php
    $lang = $page->language ?? 'en';
    $t = $page->translations[$lang];
@endphp

<section class="relative overflow-hidden bg-white">
    <div class="mx-auto max-w-7xl px-4 py-24 sm:px-6 sm:py-32 lg:px-8">
        <div class="text-center">
            <!-- Logo grande -->
            <div class="mb-8">
                <img src="/assets/images/logo.svg" alt="Finerdy" class="mx-auto h-28 w-auto">
            </div>

            <!-- Headline -->
            <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl md:text-6xl">
                {{ $t['hero']['title'] }}
            </h1>

            <!-- Subheadline -->
            <p class="mx-auto mt-6 max-w-2xl text-lg text-gray-600 sm:text-xl leading-relaxed">
                {{ $t['hero']['subtitle'] }}
            </p>

            <!-- CTA Button -->
            <div class="mt-10">
                <a href="#waitlist" class="inline-flex items-center gap-2 rounded-lg bg-primary-600 px-6 py-3 text-base font-semibold text-white shadow-sm hover:bg-primary-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600 transition-colors">
                    {{ $t['hero']['cta'] }}
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Background decoration -->
    <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
        <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-primary-100 to-primary-200 opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"></div>
    </div>
</section>
