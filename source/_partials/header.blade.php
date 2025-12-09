@php
    $lang = $page->language ?? 'es';
    $t = $page->translations[$lang];
    $otherLang = $lang === 'es' ? 'en' : 'es';
    $otherLangUrl = $lang === 'es' ? '/en/' : '/';
    $otherLangName = $lang === 'es' ? 'EN' : 'ES';
@endphp

<header class="bg-white border-b border-gray-100">
    <nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ $lang === 'es' ? '/' : '/en/' }}" class="flex items-center gap-2">
                    <img src="/assets/images/logo.svg" alt="Finerdy" class="h-8 w-auto">
                    <span class="text-xl font-bold text-gray-900">{{ $page->siteName }}</span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex md:items-center md:gap-8">
                <a href="#features" class="text-sm font-medium text-gray-600 hover:text-primary-600 transition-colors">
                    {{ $t['nav']['features'] }}
                </a>
                <a href="#how-it-works" class="text-sm font-medium text-gray-600 hover:text-primary-600 transition-colors">
                    {{ $t['nav']['howItWorks'] }}
                </a>

                <!-- Language Switcher -->
                <a href="{{ $otherLangUrl }}" class="ml-4 inline-flex items-center gap-1 rounded-md bg-gray-100 px-3 py-1.5 text-sm font-medium text-gray-700 hover:bg-gray-200 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5a17.92 17.92 0 0 1-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
                    </svg>
                    {{ $otherLangName }}
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="flex md:hidden">
                <button type="button" id="mobile-menu-button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-600 hover:bg-gray-100 hover:text-gray-900">
                    <span class="sr-only">Open menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden pb-4">
            <div class="flex flex-col gap-2">
                <a href="#features" class="block rounded-md px-3 py-2 text-base font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-900">
                    {{ $t['nav']['features'] }}
                </a>
                <a href="#how-it-works" class="block rounded-md px-3 py-2 text-base font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-900">
                    {{ $t['nav']['howItWorks'] }}
                </a>
                <a href="{{ $otherLangUrl }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-900">
                    {{ $otherLangName === 'EN' ? 'English' : 'Español' }}
                </a>
            </div>
        </div>
    </nav>
</header>
