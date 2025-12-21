@php
    $lang = $page->language ?? 'en';
    $t = $page->translations[$lang];

    $icons = [
        // Simple - lightning bolt
        '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" /></svg>',
        // Reports for nerds - command line
        '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="m6.75 7.5 3 2.25-3 2.25m4.5 0h3m-9 8.25h13.5A2.25 2.25 0 0 0 21 18V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v12a2.25 2.25 0 0 0 2.25 2.25Z" /></svg>',
        // Privacy - lock
        '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" /></svg>',
    ];
@endphp

<section class="bg-white py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <!-- Section header -->
        <div class="text-center">
            <h3 class="text-xl font-semibold text-gray-900">
                {{ $t['extras']['title'] }}
            </h3>
        </div>

        <!-- Extras list -->
        <div class="mt-10 grid gap-6 sm:grid-cols-3">
            @foreach($t['extras']['items'] as $index => $item)
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0 flex h-10 w-10 items-center justify-center rounded-lg bg-gray-100 text-gray-600">
                    {!! $icons[$index] !!}
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-900">{{ $item['title'] }}</h4>
                    <p class="mt-1 text-sm text-gray-500">{{ $item['description'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
