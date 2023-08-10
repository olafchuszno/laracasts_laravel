@if (session()->has('success'))
    <div x-data="{show:true}"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show"
        class="fixed bg-blue-500 text-white rounded-xl px-4 bottom-3 right-3 text-sm py-2">
        <p>{{ session('success') }}</p>
    </div>
@endif