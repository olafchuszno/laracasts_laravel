@props(['post'])

<div>
    <form action="posts/{{ $post->slug }}/bookmarks" method="POST">
        @csrf
        @method('store')
        
        <button type="submit">
            Add to bookmarked
        </button>

    </form>
</div>