<x-app-layout>
    <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6 space-y-4">
            @include('posts.partials.search', [
                'keyword' => $keyword,
                'date_from' => $date_from,
                'date_until' => $date_until,
                'target' => 'my_index',
            ])
            @include('posts.partials.list', ['posts' => $posts])
        </div>
    </div>
</x-app-layout>
