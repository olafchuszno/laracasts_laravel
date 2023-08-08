@props(['trigger'])

<div x-data="{ show:false }" @click.away="show = false">

    <!-- trigger -->
    <div @click="show = ! show">
        {{ $trigger }}
    </div>

    <!-- Links -->
    {{ $slot }}
</div>