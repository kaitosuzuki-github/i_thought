<div>
    @if ($target == 'index')
        <form action="{{ route('posts.index') }}" method="GET">
        @elseif ($target == 'my_index')
            <form action="{{ route('posts.my_index') }}" method="GET">
    @endif
    @csrf
    <div class="w-full space-y-2">
        <div class="flex flex-col rounded-lg w-full gap-2 md:flex-row">
            <input type="text" name="keyword" placeholder="{{ __('Search') }}" class="w-full rounded-lg border-none"
                value="{{ old('keyword', $keyword) }}" />
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
        <div class="space-y-1">
            <x-input-error :messages="$errors->get('date_from')" />
            <x-input-error :messages="$errors->get('date_until')" />
        </div>
    </div>
    </form>
</div>
