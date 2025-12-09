@php
    $lang = $page->language ?? 'es';
    $t = $page->translations[$lang];
@endphp

<section class="relative overflow-hidden bg-white">
    <div class="mx-auto max-w-7xl px-4 py-24 sm:px-6 sm:py-32 lg:px-8">
        <div class="text-center">
            <!-- Logo grande -->
            <div class="mb-8">
                <img src="/assets/images/logo.svg" alt="Finerdy" class="mx-auto h-32 w-auto">
            </div>

            <!-- Headline -->
            <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl md:text-6xl">
                {{ $t['hero']['title'] }}
            </h1>

            <!-- Subheadline -->
            <p class="mx-auto mt-6 max-w-2xl text-lg text-gray-600 sm:text-xl">
                {{ $t['hero']['subtitle'] }}
            </p>

            <!-- Decorative element -->
            <div class="mt-12 flex justify-center">
                <div class="flex items-center gap-4">
                    <div class="h-px w-16 bg-gradient-to-r from-transparent to-primary-300"></div>
                    <div class="h-2 w-2 rounded-full bg-primary-500"></div>
                    <div class="h-px w-16 bg-gradient-to-l from-transparent to-primary-300"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Background decoration -->
    <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
        <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-primary-100 to-primary-200 opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"></div>
    </div>
</section>
