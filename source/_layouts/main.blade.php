<!DOCTYPE html>
<html lang="{{ $page->language ?? 'en' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="canonical" href="{{ $page->getUrl() }}">
        <meta name="description" content="{{ $page->description ?? $page->siteDescription }}">

        <title>{{ $page->title ? $page->title . ' | ' . $page->siteName : $page->siteName }}</title>

        <!-- Favicon -->
        <link rel="icon" type="image/svg+xml" href="/assets/images/favicon.svg">
        <link rel="icon" type="image/x-icon" href="/favicon.ico">

        <!-- Open Graph -->
        <meta property="og:title" content="{{ $page->title ?? $page->siteName }}">
        <meta property="og:description" content="{{ $page->description ?? $page->siteDescription }}">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ $page->getUrl() }}">
        <meta property="og:image" content="{{ $page->baseUrl }}/assets/images/logo.svg">

        @viteRefresh()
        <link rel="stylesheet" href="{{ vite('source/_assets/css/main.css') }}">
        <script defer type="module" src="{{ vite('source/_assets/js/main.js') }}"></script>
    </head>
    <body class="bg-white text-gray-900 antialiased">
        @yield('body')
    </body>
</html>
