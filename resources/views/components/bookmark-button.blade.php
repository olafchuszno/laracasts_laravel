@props(['post'])

<div>
    <form action="posts/{{ $post->slug }}/bookmarks" method="POST">
        @csrf
        @method('store')
        
        <button type="submit"
            class="px-3 py-1 border border-red-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
            style="font-size: 10px"
        >
            Add Post to bookmarked
        </button>

    </form>
</div>