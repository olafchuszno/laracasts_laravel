@props(['name', 'type' => 'text'])


<x-form.field>

    <x-form.label name="{{ $name }}" />
    
    <input class="border border-gray-200 p-2 w-full rounded-xl"
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            {{ $attributes(['value' => old($name)]) }}
    >

    <x-form.error name="{{ $name }}" />

</x-form.field>