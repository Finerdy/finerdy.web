<!DOCTYPE html>
<html lang="{{ $page->language ?? 'es' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="canonical" href="{{ $page->getUrl() }}">
        <meta name="description" content="{{ $page->description ?? 'Documentación de Finerdy' }}">

        <title>{{ $page->title }} | Docs | {{ $page->siteName }}</title>

        <!-- Favicon -->
        <link rel="icon" type="image/svg+xml" href="/assets/images/favicon.svg">
        <link rel="icon" type="image/x-icon" href="/favicon.ico">

        @viteRefresh()
        <link rel="stylesheet" href="{{ vite('source/_assets/css/main.css') }}">
        <script defer type="module" src="{{ vite('source/_assets/js/main.js') }}"></script>
    </head>
    <body class="bg-white text-gray-900 antialiased">
        @php
            $lang = $page->language ?? 'es';
            $docsBase = $lang === 'es' ? '/docs' : '/en/docs';
            $homeUrl = $lang === 'es' ? '/' : '/en/';
            $otherLangUrl = $lang === 'es' ? '/en/docs/' : '/docs/';
            $otherLangName = $lang === 'es' ? 'EN' : 'ES';

            $navItems = $lang === 'es' ? [
                ['url' => $docsBase . '/', 'title' => 'Introducción'],
                ['url' => $docsBase . '/conceptos/', 'title' => 'Conceptos básicos'],
                ['url' => $docsBase . '/transacciones/', 'title' => 'Transacciones'],
                ['url' => $docsBase . '/correcciones/', 'title' => 'Correcciones'],
                ['url' => $docsBase . '/reportes/', 'title' => 'Reportes'],
                ['url' => $docsBase . '/presupuestos/', 'title' => 'Presupuestos'],
                ['url' => $docsBase . '/workspaces/', 'title' => 'Workspaces'],
                ['url' => 'https://api.finerdy.app/docs/api#/', 'title' => 'API Docs', 'external' => true],
            ] : [
                ['url' => $docsBase . '/', 'title' => 'Introduction'],
                ['url' => $docsBase . '/concepts/', 'title' => 'Basic concepts'],
                ['url' => $docsBase . '/transactions/', 'title' => 'Transactions'],
                ['url' => $docsBase . '/corrections/', 'title' => 'Corrections'],
                ['url' => $docsBase . '/reports/', 'title' => 'Reports'],
                ['url' => $docsBase . '/budgets/', 'title' => 'Budgets'],
                ['url' => $docsBase . '/workspaces/', 'title' => 'Workspaces'],
                ['url' => 'https://api.finerdy.app/docs/api#/', 'title' => 'API Docs', 'external' => true],
            ];
        @endphp

        <!-- Header -->
        <header class="sticky top-0 z-50 bg-white border-b border-gray-200">
            <nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center gap-8">
                        <a href="{{ $homeUrl }}" class="flex items-center gap-2">
                            <img src="/assets/images/logo.svg" alt="Finerdy" class="h-8 w-auto">
                            <span class="text-xl font-bold text-gray-900">{{ $page->siteName }}</span>
                        </a>
                        <span class="hidden sm:block text-sm font-medium text-gray-500 bg-gray-100 px-2 py-1 rounded">Docs</span>
                    </div>

                    <div class="flex items-center gap-4">
                        <a href="{{ $otherLangUrl }}" class="inline-flex items-center gap-1 rounded-md bg-gray-100 px-3 py-1.5 text-sm font-medium text-gray-700 hover:bg-gray-200 transition-colors">
                            {{ $otherLangName }}
                        </a>
                    </div>
                </div>
            </nav>
        </header>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex gap-8 py-8">
                <!-- Sidebar -->
                <aside class="hidden lg:block w-64 flex-shrink-0">
                    <nav class="sticky top-24 space-y-1">
                        @foreach($navItems as $item)
                            @php
                                $isActive = rtrim($page->getPath(), '/') === rtrim($item['url'], '/');
                            @endphp
                            <a href="{{ $item['url'] }}"
                               @if($item['external'] ?? false) target="_blank" rel="noopener noreferrer" @endif
                               class="flex items-center gap-1 px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ $isActive ? 'bg-primary-50 text-primary-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                                {{ $item['title'] }}
                                @if($item['external'] ?? false)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="12" height="12" class="w-3 h-3 flex-shrink-0">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                    </svg>
                                @endif
                            </a>
                        @endforeach
                    </nav>
                </aside>

                <!-- Mobile nav -->
                <div class="lg:hidden w-full mb-6">
                    <select onchange="window.location.href=this.value" class="w-full rounded-lg border-gray-300 text-sm">
                        @foreach($navItems as $item)
                            <option value="{{ $item['url'] }}" {{ rtrim($page->getPath(), '/') === rtrim($item['url'], '/') ? 'selected' : '' }}>
                                {{ $item['title'] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Content -->
                <main class="flex-1 min-w-0">
                    <article class="prose prose-gray max-w-none prose-headings:font-bold prose-h1:text-3xl prose-h2:text-2xl prose-h2:border-b prose-h2:border-gray-200 prose-h2:pb-2 prose-h2:mt-10 prose-h3:text-xl prose-a:text-primary-600 prose-a:no-underline hover:prose-a:underline prose-code:bg-gray-100 prose-code:px-1 prose-code:py-0.5 prose-code:rounded prose-code:before:content-none prose-code:after:content-none prose-pre:bg-gray-100 prose-pre:text-gray-800 prose-pre:border prose-pre:border-gray-200">
                        @yield('content')
                    </article>

                    <!-- Navigation -->
                    <nav class="mt-16 pt-8 border-t border-gray-200 flex justify-between">
                        @php
                            $currentIndex = null;
                            foreach ($navItems as $i => $item) {
                                if (rtrim($page->getPath(), '/') === rtrim($item['url'], '/')) {
                                    $currentIndex = $i;
                                    break;
                                }
                            }
                            $prev = $currentIndex > 0 ? $navItems[$currentIndex - 1] : null;
                            $next = $currentIndex !== null && $currentIndex < count($navItems) - 1 ? $navItems[$currentIndex + 1] : null;
                        @endphp

                        <div>
                            @if($prev)
                                <a href="{{ $prev['url'] }}" class="group flex items-center gap-2 text-sm text-gray-500 hover:text-gray-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                                    </svg>
                                    {{ $prev['title'] }}
                                </a>
                            @endif
                        </div>
                        <div>
                            @if($next)
                                <a href="{{ $next['url'] }}" class="group flex items-center gap-2 text-sm text-gray-500 hover:text-gray-900">
                                    {{ $next['title'] }}
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </nav>
                </main>
            </div>
        </div>

        <!-- Footer -->
        <footer class="border-t border-gray-200 mt-16">
            <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 text-center text-sm text-gray-500">
                &copy; {{ date('Y') }} {{ $page->siteName }}
            </div>
        </footer>
    </body>
</html>
