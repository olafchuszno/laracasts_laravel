<x-layout>
    <section class="px-6 py-8 max max-w-md mx-auto">

        <h1 class="text-lg font-bold mb-4 text-center">Publish New Post</h1>
        
        <x-panel class="max-w-md mx-auto mt-10 bg-gray-100">
            <form method="POST" action="/admin/posts" enctype="multipart/form-data">
                @csrf

                <x-form.input name="title" />

                <x-form.input name="slug" />

                <x-form.input name="thumbnail" type="file" />

                <x-form.textarea name="excerpt" />

                <x-form.textarea name="body" />

                <x-form.field>

                    <x-form.label name="category" />
                    
                    <select name="category_id" id="category_id">
                        @foreach (\App\Models\Category::all() as $category)
                            <option 
                                value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}
                            >
                                {{ ucwords($category->name) }}
                            </option>  
                        @endforeach
                    </select>

                    <x-form.error name="category" />

                </x-form.field>


                <x-form.button>Publish</x-form.button>
            </form>
        </x-panel>

    </section>
</x-layout>