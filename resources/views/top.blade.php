<x-app-layout>
    <div class="h-screen w-screen flex justify-center items-center">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <div class="flex flex-col items-center">
                <div class="flex max-w-xl flex-col items-center pb-16 pt-8 text-center lg:pb-48 lg:pt-32">
                    <p class="mb-4 font-semibold text-gray-800 md:mb-6 md:text-lg xl:text-xl">
                        {{ __('Keep a journal of your feelings') }}
                    </p>
                    <h1 class="mb-8 text-4xl font-bold text-white sm:text-5xl md:mb-12 md:text-6xl">
                        {{ config('app.name', 'Laravel') }}
                    </h1>
                    @guest
                        <div class="flex w-full flex-col gap-2.5 sm:flex-row sm:justify-center">
                            <a href="{{ route('login') }}"
                                class="inline-block rounded-lg bg-gray-800 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-gray-300 transition duration-100 hover:bg-gray-600 focus-visible:ring active:bg-gray-700 md:text-base">{{ __('Login') }}</a>
                            <a href="{{ route('register') }}"
                                class="inline-block rounded-lg bg-gray-200 px-8 py-3 text-center text-sm font-semibold text-gray-500 outline-none ring-gray-300 transition duration-100 hover:bg-gray-300 focus-visible:ring active:text-gray-700 md:text-base">{{ __('Register') }}</a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
