@if (session()->has('message'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
        class="fixed border border-white bottom-32 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-48 py-3">
        <p>
            {{ session('message') }}
        </p>
    </div>
@endif
