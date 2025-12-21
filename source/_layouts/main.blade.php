@php
    $lang = $page->language ?? 'en';
    $currentPath = $page->getPath();
    $altLangUrl = $lang === 'en'
        ? $page->baseUrl . '/es' . ($currentPath === '/' ? '/' : $currentPath)
        : $page->baseUrl . str_replace('/es', '', $currentPath ?: '/');
@endphp
<!DOCTYPE html>
<html lang="{{ $lang }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="canonical" href="{{ $page->getUrl() }}">
        <meta name="description" content="{{ $page->description ?? $page->siteDescription }}">

        <title>{{ $page->title ? $page->title . ' | ' . $page->siteName : $page->siteName }}</title>

        <!-- Favicon -->
        <link rel="icon" type="image/svg+xml" href="/assets/images/favicon.svg">
        <link rel="icon" type="image/x-icon" href="/favicon.ico">

        <!-- Hreflang -->
        <link rel="alternate" hreflang="en" href="{{ $lang === 'en' ? $page->getUrl() : $altLangUrl }}">
        <link rel="alternate" hreflang="es" href="{{ $lang === 'es' ? $page->getUrl() : $altLangUrl }}">
        <link rel="alternate" hreflang="x-default" href="{{ $page->baseUrl }}/">

        <!-- Open Graph -->
        <meta property="og:title" content="{{ $page->title ?? $page->siteName }}">
        <meta property="og:description" content="{{ $page->description ?? $page->siteDescription }}">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ $page->getUrl() }}">
        <meta property="og:image" content="{{ $page->baseUrl }}/assets/images/og-image.png">
        <meta property="og:image:width" content="512">
        <meta property="og:image:height" content="512">
        <meta property="og:locale" content="{{ $lang === 'en' ? 'en_US' : 'es_ES' }}">
        <meta property="og:site_name" content="{{ $page->siteName }}">

        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary">
        <meta name="twitter:title" content="{{ $page->title ?? $page->siteName }}">
        <meta name="twitter:description" content="{{ $page->description ?? $page->siteDescription }}">
        <meta name="twitter:image" content="{{ $page->baseUrl }}/assets/images/og-image.png">

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
        <script type="application/ld+json">
        {"@@context":"https://schema.org","@@type":"WebSite","name":"{{ $page->siteName }}","url":"{{ $page->baseUrl }}/","description":"{{ $page->siteDescriptionEn }}","inLanguage":["en","es"]}
        </script>
        <script type="application/ld+json">
        {"@@context":"https://schema.org","@@type":"SoftwareApplication","name":"{{ $page->siteName }}","applicationCategory":"FinanceApplication","operatingSystem":"Web","description":"{{ $page->siteDescriptionEn }}"}
        </script>
    </head>
    <body class="bg-white text-gray-900 antialiased">
        @yield('body')
    </body>
</html>
