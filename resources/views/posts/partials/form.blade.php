<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        @if ($target == 'store')
            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="space-y-2">
            @elseif ($target == 'update')
                <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data"
                    class="space-y-2">
                    @method('patch')
        @endif
        @csrf
        <div>
            <x-input-label :value="__('Event')" />
            <textarea name="event" placeholder="{{ __('What happened today?') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('event', $post->event) }}</textarea>
            <x-input-error :messages="$errors->get('event')" />
        </div>
        <div>
            <x-input-label :value="__('Emotion')" />
            <textarea name="emotion" placeholder="{{ __('What did you feel?') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('emotion', $post->emotion) }}</textarea>
            <x-input-error :messages="$errors->get('emotion')" />
        </div>
        <div>
            <x-input-label :value="__('Emotion Num')" />
            <input type="text" name="emotion_num"
                placeholder="{{ __('What is the numerical value of feeling?(0〜100)') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                value="{{ old('emotion_num', $post->emotion_num) }}">
            <x-input-error :messages="$errors->get('emotion_num')" />
        </div>
        <div>
            <x-input-label :value="__('Image')" />
            <input type="file" name="image"
                class="block w-full border-gray-300 cursor-pointer bg-white focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:text-sm file:font-semibold file:bg-gray-800 file:text-white">
            <x-input-error :messages="$errors->get('image')" />
        </div>
        <x-primary-button>{{ __('Post') }}</x-primary-button>
        <x-secondary-button onclick="history.back()">
            {{ __('Cancel') }}
        </x-secondary-button>
        </form>
    </div>
</x-app-layout>
