@php
    $lang = $page->language ?? 'en';
    $baseUrl = rtrim($page->baseUrl, '/');

    // main.blade.php is used for the bilingual marketing pages (homepage today).
    // Resolve hreflang alternates via an explicit map — no string-munging.
    $enUrl = $baseUrl . '/';
    $esUrl = $baseUrl . '/es/';

    $localizedDescription = $lang === 'es' ? $page->siteDescription : $page->siteDescriptionEn;
    $description = $page->description ?? $localizedDescription;
    $ogImageUrl = $baseUrl . '/assets/images/og-image.png';
@endphp
<!DOCTYPE html>
<html lang="{{ $lang }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#ef4444">
        <link rel="canonical" href="{{ $page->getUrl() }}">
        <meta name="description" content="{{ $description }}">

        <title>{{ $page->title ? $page->title . ' | ' . $page->siteName : $page->siteName }}</title>

        <!-- Favicon / PWA -->
        <link rel="icon" type="image/svg+xml" href="/assets/images/favicon.svg">
        <link rel="icon" type="image/x-icon" href="/favicon.ico">
        <link rel="apple-touch-icon" href="/assets/images/apple-touch-icon.png">
        <link rel="manifest" href="/site.webmanifest">

        <!-- Hreflang -->
        <link rel="alternate" hreflang="en" href="{{ $enUrl }}">
        <link rel="alternate" hreflang="es" href="{{ $esUrl }}">
        <link rel="alternate" hreflang="x-default" href="{{ $enUrl }}">

        <!-- Open Graph -->
        <meta property="og:title" content="{{ $page->title ?? $page->siteName }}">
        <meta property="og:description" content="{{ $description }}">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ $page->getUrl() }}">
        <meta property="og:image" content="{{ $ogImageUrl }}">
        <meta property="og:image:width" content="512">
        <meta property="og:image:height" content="512">
        <meta property="og:locale" content="{{ $lang === 'en' ? 'en_US' : 'es_ES' }}">
        <meta property="og:locale:alternate" content="{{ $lang === 'en' ? 'es_ES' : 'en_US' }}">
        <meta property="og:site_name" content="{{ $page->siteName }}">

        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary">
        <meta name="twitter:title" content="{{ $page->title ?? $page->siteName }}">
        <meta name="twitter:description" content="{{ $description }}">
        <meta name="twitter:image" content="{{ $ogImageUrl }}">

        @viteRefresh()
        <link rel="stylesheet" href="{{ vite('source/_assets/css/main.css') }}">
        <script defer type="module" src="{{ vite('source/_assets/js/main.js') }}"></script>

        <!-- Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-4PYXV6Y0ZJ"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'G-4PYXV6Y0ZJ');
        </script>

        <!-- Structured Data -->
        @php
            $organizationLd = [
                '@context' => 'https://schema.org',
                '@type' => 'Organization',
                'name' => $page->siteName,
                'url' => $baseUrl . '/',
                'logo' => $baseUrl . '/assets/images/logo.svg',
            ];
            $websiteLd = [
                '@context' => 'https://schema.org',
                '@type' => 'WebSite',
                'name' => $page->siteName,
                'url' => $baseUrl . '/',
                'description' => $description,
                'inLanguage' => $lang,
            ];
            $softwareLd = [
                '@context' => 'https://schema.org',
                '@type' => 'SoftwareApplication',
                'name' => $page->siteName,
                'applicationCategory' => 'FinanceApplication',
                'operatingSystem' => 'Web',
                'description' => $description,
                'inLanguage' => $lang,
                'offers' => [
                    '@type' => 'Offer',
                    'price' => '0',
                    'priceCurrency' => 'USD',
                ],
            ];
        @endphp
        <script type="application/ld+json">{!! json_encode($organizationLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
        <script type="application/ld+json">{!! json_encode($websiteLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
        <script type="application/ld+json">{!! json_encode($softwareLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
    </head>
    <body class="bg-white text-gray-900 antialiased">
        @yield('body')
    </body>
</html>
