@php
    $lang = $page->language ?? 'en';
    $t = $page->translations[$lang];
    $otherLang = $lang === 'en' ? 'es' : 'en';
    $otherLangUrl = $lang === 'en' ? '/es/' : '/';
    $otherLangName = $lang === 'en' ? 'Español' : 'English';
@endphp

<footer class="bg-gray-50 border-t border-gray-100">
    <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
        <div class="flex flex-col items-center gap-8 md:flex-row md:justify-between">
            <!-- Logo and tagline -->
            <div class="flex flex-col items-center md:items-start gap-2">
                <a href="{{ $lang === 'en' ? '/' : '/es/' }}" class="flex items-center gap-2">
                    <img src="/assets/images/logo.svg" alt="Finerdy" class="h-8 w-auto">
                    <span class="text-lg font-bold text-gray-900">{{ $page->siteName }}</span>
                </a>
                <p class="text-sm text-gray-500">{{ $t['footer']['tagline'] }}</p>
            </div>

            <!-- Links -->
            <div class="flex items-center gap-6">
                <a href="#features" class="text-sm text-gray-500 hover:text-primary-600 transition-colors">
                    {{ $t['nav']['features'] }}
                </a>
                <a href="#waitlist" class="text-sm text-gray-500 hover:text-primary-600 transition-colors">
                    {{ $t['nav']['waitlist'] }}
                </a>
                <a href="{{ $otherLangUrl }}" class="text-sm text-gray-500 hover:text-primary-600 transition-colors">
                    {{ $otherLangName }}
                </a>
            </div>
        </div>

        <!-- Copyright -->
        <div class="mt-8 border-t border-gray-200 pt-8 text-center">
            <p class="text-sm text-gray-400">
                &copy; {{ date('Y') }} {{ $page->siteName }}. {{ $t['footer']['copyright'] }}
            </p>
        </div>
    </div>
</footer>
