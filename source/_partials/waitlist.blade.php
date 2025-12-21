@php
    $lang = $page->language ?? 'en';
    $t = $page->translations[$lang];
@endphp

<section id="waitlist" class="bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <!-- Section header -->
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                {{ $t['waitlist']['title'] }}
            </h2>
            <p class="mt-4 text-lg text-gray-600">
                {{ $t['waitlist']['subtitle'] }}
            </p>

            <!-- Form -->
            <form
                id="waitlist-form"
                action="https://formspree.io/f/{{ $page->formspreeId }}"
                method="POST"
                class="mt-10"
            >
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <input
                        type="email"
                        name="email"
                        id="waitlist-email"
                        required
                        placeholder="{{ $t['waitlist']['placeholder'] }}"
                        class="min-w-0 flex-auto rounded-lg border-0 px-4 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6"
                    >
                    <input type="hidden" name="_language" value="{{ $lang }}">
                    <button
                        type="submit"
                        id="waitlist-button"
                        class="flex-none rounded-lg bg-primary-600 px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-primary-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600 transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                    >
                        <span id="button-text">{{ $t['waitlist']['button'] }}</span>
                        <span id="button-loading" class="hidden">
                            <svg class="animate-spin h-5 w-5 inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </span>
                    </button>
                </div>

                <!-- Success message -->
                <p id="success-message" class="mt-4 text-sm text-success-600 hidden">
                    {{ $t['waitlist']['success'] }}
                </p>

                <!-- Error message -->
                <p id="error-message" class="mt-4 text-sm text-primary-600 hidden">
                    {{ $t['waitlist']['error'] }}
                </p>

                <!-- Privacy note -->
                <p id="privacy-note" class="mt-4 text-sm text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline w-4 h-4 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                    </svg>
                    {{ $t['waitlist']['privacy'] }}
                </p>
            </form>
        </div>
    </div>
</section>
