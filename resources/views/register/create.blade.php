<x-layout>

    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">

            <h1 class="text-center font-bold text-xl">Register!</h1>

            <form method="POST" action="/register" class="mt-10" enctype="multipart/form-data">

                @csrf

                <x-form.input name="name">name</x-form.input>

                <x-form.input type="file" name="avatar" label="Avatar (optional)"/>

                <x-form.input name="username">username</x-form.input>

                <x-form.input name="email" type="email">email</x-form.input>

                <x-form.input name="password" type="password" autocomplete="new-password">password</x-form.input>

                <x-form.button>Submit</x-form.button>

                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-red-500 text-xs">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                

            </form>
        </main>

    </section>

</x-layout>