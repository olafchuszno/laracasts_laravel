@props(['post'])

<div>
    <form action="/posts/{{ $post->slug }}/bookmarks" method="POST">
        @csrf
        @method('store')
        
        <button type="submit"
            class="px-3 py-1 border flex flex-grow-1 border-yellow-300 bg-yellow-200 rounded-full text-gray-500 text-xs uppercase font-semibold"
            style="font-size: 10px"
        >
            Add Post to bookmarked
        </button>

    </form>
</div>