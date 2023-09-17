<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <textarea name="event" placeholder="{{ __('What happened today?') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('event') }}</textarea>
            <x-input-error :messages="$errors->get('event')" class="mt-2" />
            <textarea name="emotion" placeholder="{{ __('What did you feel?') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-4">{{ old('emotion') }}</textarea>
            <x-input-error :messages="$errors->get('emotion')" class="mt-2" />
            <input type="text" name="emotion_num"
                placeholder="{{ __('What is the numerical value of feeling?(0〜100)') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-4"
                value="{{ old('emotion_num') }}">
            <x-input-error :messages="$errors->get('emotion_num')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Post') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>
