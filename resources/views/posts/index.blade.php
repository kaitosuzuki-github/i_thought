<x-app-layout>
    <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6 space-y-4">
            <div>
                <form action="{{ route('posts.index') }}" method="GET">
                    @csrf
                    <div class="w-full">
                        <div class="flex flex-col rounded-lg w-full gap-2 md:flex-row">
                            <input type="text" name="keyword" placeholder="{{ __('Search') }}"
                                class="w-full rounded-lg border-none" value="{{ old('keyword', $keyword) }}" />
                            <div class="flex items-center">
                                <input type="date" name="date_from" value="{{ old('date_from', $date_from) }}"
                                    class="rounded-lg border-none">
                                <span class="mx-2">~</span>
                                <input type="date" name="date_until" value="{{ old('date_until', $date_until) }}"
                                    class="rounded-lg border-none">
                            </div>
                            <button type="submit"
                                class="bg-gray-700 text-white px-4 text-md font-semibold py-2 rounded-lg w-32">{{ __('Go') }}</button>
                        </div>
                    </div>
                </form>
            </div>
            @foreach ($posts as $post)
                <div class="mb-4 p-6 flex-1 bg-white shadow-sm rounded-lg">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-gray-800">{{ $post->user->name }}</span>
                            <small
                                class="ml-2 text-sm text-gray-600">{{ $post->created_at->isoFormat('YYYY/MM/DD(ddd)') }}</small>
                            @unless ($post->created_at->eq($post->updated_at))
                                <small class="text-sm text-gray-600">{{ __('edited') }}</small>
                            @endunless
                        </div>
                        @if ($post->user->is(auth()->user()))
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('posts.edit', $post)">
                                        {{ __('Edit') }}
                                    </x-dropdown-link>
                                    <form method="POST" action="{{ route('posts.destroy', $post) }}">
                                        @csrf
                                        @method('delete')
                                        <x-dropdown-link :href="route('posts.destroy', $post)"
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Delete') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        @endif
                    </div>
                    <div class="pl-4 divide-y">
                        <p class="mt-4 text-md text-gray-900">
                            <span class="font-semibold">{{ __('Event') }}: </span>{{ $post->event }}
                        </p>
                        <p class="mt-4 pt-4 text-md text-gray-900">
                            <span class="font-semibold">{{ __('Emotion') }}: </span>{{ $post->emotion }}
                        </p>
                        <p class="mt-4 pt-4 text-md text-gray-900">
                            <span class="font-semibold">{{ __('Emotion Num') }}: </span>{{ $post->emotion_num }}
                        </p>

                    </div>
                </div>
            @endforeach
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
