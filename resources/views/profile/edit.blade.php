<x-layout>
    <x-user-setting heading="Profile">

        <div class="text-center mt-2 mb-10">
            <heading class="text-blue-500 font-semibold border-2 rounded-xl border-blue-500 p-2"
            >
                Change your Profile information
            </heading>
        </div>

        <form action="/profile" method="POST">
            @csrf
            @method('PATCH')

            <x-form.input placeholder="Current name: {{ auth()->user()->username }}" label="New Name" name="name" />

            <x-form.button>Update</x-form.button>

        </form>

    </x-user-setting>
</x-layout>