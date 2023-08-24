@props(['name'])

<x-form.field>

    <x-form.label name="{{ $name }}" />
    
    <textarea class="border border-gray-200 p-2 w-full rounded-xl"
            type="text"
            name="{{ $name }}"
            id="{{ $name }}"
            required
            {{ $attributes }}
    >{{ old($name) ?? $slot }}</textarea>

    <x-form.error name="{{ $name }}" />

</x-form.field>