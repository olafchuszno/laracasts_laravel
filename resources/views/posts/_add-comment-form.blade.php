@auth
    <x-panel>

        <form method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf

            <header class="flex items-center">
                <img src="{{ isset(auth()->user()->avatar) ?
                        asset('storage/' . auth()->user()->avatar) :
                        'https://i.pravatar.cc/60?id=' . $comment->user_id
                    }}" 
                    alt="user's avatar"
                    width="40"
                    height="40"
                    class="rounded-full"
                >

                <h2 class="ml-4">Want to participate?</h2>
            </header>

            <div class="mt-6">
                <textarea name="body"
                class="w-full text-sm px-2 py-1 focus:outline-none focus:ring" 
                id="body" 
                rows="5" 
                placeholder="Quick, think of something to say!"
                required
                ></textarea>
            </div>

            @error('body')
                <span>{{ $message }}</span>
            @enderror

            <div class="flex justify-end mt-6 border-t border-gray-200">
                <x-form.button>Post</x-form.button>
            </div>

        </form>

    </x-panel>
@else
    <p class="font-semibold">
    <a href="/register" class="text-blue-500 hover:underline">Register</a> or <a href="/login" class="text-blue-500 hover:underline">log in</a> to leave a comment.
    </p>
@endauth