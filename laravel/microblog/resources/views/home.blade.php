<x-layout>
    <x-slot:title>
        Welcome
    </x-slot:title>
    <div class="max-w-2xl mx-auto">
        @forelse ($posts as $post)
            <div class="card bg-base-100 shadow mt-8">
                <div class="card-body">
                    <div>
                        <div class="font-semibold"> {{ $post->user ? $post->user->name : 'Anonymous' }}</div>
                        <div class="mt-1">{{ $post->message }}</div>
                        <div class="text-sm text-gray-500 mt-2">
                            {{ $post->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-gray-500">No posts yet. Be the first to post something!</p>
        @endforelse
    </div>
</x-layout>