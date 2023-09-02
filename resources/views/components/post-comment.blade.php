@props(['comment'])

<x-panel class="bg-gray-50">
    <article class="flex space-x-4">
        <div style="flex-shrink: 0">
            <img src="{{ isset($comment->author->avatar) ?
                    asset('storage/' . $comment->author->avatar) :
                    'https://i.pravatar.cc/60?id=' . $comment->user_id
                }}" 
                alt="user's avatar"
                width="60"
                height="60"
                class="rounded-xl"
            >
        </div>

        <div>
            <header class="mb-4">
                <h3 class="font-bold">{{ $comment->author->name }}</h3>
                <p class="text-xs">
                    Posted
                    <time>{{ $comment->created_at->format("F j, Y, g:i a") }}</time>
                </p>
            </header>

            <p>
                {{ $comment->body }}
            </p>
        </div>
    </article>
</x-panel>