<x-app-layout>
    <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6">
            @foreach ($posts as $post)
                <div class="mb-4 p-6 flex-1 bg-white shadow-sm rounded-lg">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-gray-800">{{ $post->user->name }}</span>
                            <small class="ml-2 text-sm text-gray-600">{{ $post->created_at->format('j M Y') }}</small>
                        </div>
                    </div>
                    <div class="pl-4 divide-y">
                        <p class="mt-4 text-md text-gray-900">
                            <span class="font-semibold">{{ __('event: ') }}</span>{{ $post->event }}
                        </p>
                        <p class="mt-4 pt-4 text-md text-gray-900">
                            <span class="font-semibold">{{ __('emotion: ') }}</span>{{ $post->emotion }}
                        </p>
                        <p class="mt-4 pt-4 text-md text-gray-900">
                            <span class="font-semibold">{{ __('emotion_num: ') }}</span>{{ $post->emotion_num }}
                        </p>

                    </div>
                </div>
            @endforeach
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
