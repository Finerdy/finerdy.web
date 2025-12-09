@php
    $lang = $page->language ?? 'es';
    $t = $page->translations[$lang];
@endphp

<section id="how-it-works" class="bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <!-- Section header -->
        <div class="text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                {{ $t['howItWorks']['title'] }}
            </h2>
        </div>

        <!-- Steps -->
        <div class="mt-16 grid gap-8 md:grid-cols-3">
            @foreach($t['howItWorks']['steps'] as $step)
            <div class="relative text-center">
                <!-- Step number -->
                <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-full bg-primary-600 text-2xl font-bold text-white">
                    {{ $step['number'] }}
                </div>

                <!-- Content -->
                <h3 class="text-xl font-semibold text-gray-900">
                    {{ $step['title'] }}
                </h3>
                <p class="mt-2 text-gray-600">
                    {{ $step['description'] }}
                </p>

                <!-- Connector line (hidden on mobile and last item) -->
                @if(!$loop->last)
                <div class="absolute left-1/2 top-8 hidden h-0.5 w-full -translate-y-1/2 bg-gradient-to-r from-primary-200 to-primary-100 md:block" style="left: 75%; width: 50%;"></div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
