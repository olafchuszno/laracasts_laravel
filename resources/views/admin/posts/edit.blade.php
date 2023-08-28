<x-layout>
    <x-setting heading="Edit Post:  {{ $post->title }}">
        <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="old('title', $post->title)"/>

            <x-form.input name="slug" :value="old('slug', $post->slug)"/>

            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" />
                </div>

                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl ml-6" width="50">
            </div>

            <x-form.textarea name="excerpt">{{ $post->excerpt }}</x-form.textarea>

            <x-form.textarea name="body">{{ old('body', $post->body) }}</x-form.textarea>

            <x-form.field>

                <x-form.label name="category" />
                
                <select name="category_id" id="category_id">
                    @foreach ($categories as $category)
                        <option 
                            value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                        >
                            {{ ucwords($category->name) }}
                        </option>  
                    @endforeach
                </select>

                <x-form.error name="category" />

            </x-form.field>

            <x-form.field>

                <x-form.label name="author" />

                <select name="user_id" id="user_id">
                    @foreach ($authors as $author)
                        <option value="{{ old('user_id') ?? $author->id }}"
                            {{ old('user_id', $post->user_id) == $author->id ? 'selected' : '' }}
                        >
                            {{ ucwords($author->username) }}
                        </option>
                    @endforeach
                </select>

                <x-form.error name="user_id" />

            </x-form.field>


            <x-form.button>Publish</x-form.button>
        </form>
    </x-setting>
</x-layout>