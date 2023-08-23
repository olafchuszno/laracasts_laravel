<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 p-6 rounded-xl">
            <x-panel>

                <h1 class="text-center font-bold text-xl">Log In!</h1>

                <form method="POST" action="/sessions" class="mt-10">

                    @csrf

                    <x-form.input name="email" type="email" autocomplete="username">email</x-form.input>

                    <x-form.input name="password" type="password" autocomplete="current-password">password</x-form.input>

                    <x-form.button>Log in</x-form.button>

                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-red-500 text-xs">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    

                </form>

            </x-panel>
        </main>
    </section>
</x-layout>