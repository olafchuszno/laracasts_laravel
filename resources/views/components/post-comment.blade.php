@props(['comment'])

<article class="flex space-x-4 bg-gray-100 border border-gray-200 rounded-xl p-6">
    <div style="flex-shrink: 0">
        <img src="https://i.pravatar.cc/60?id={{ $comment->id }}" 
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
                <time>{{ $comment->created_at->diffForHumans() }}</time>
            </p>
        </header>

        <p>
            {{ $comment->body }}
        </p>
    </div>
</article>