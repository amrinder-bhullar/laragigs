@props(['listing'])
<x-card class="relative">
    <div class="absolute top-3 right-3">
        <form action="/listings/{{ $listing->id }}/bookmark" method="POST">
            @csrf
            <button type="submit">
                <i class="fa-regular fa-bookmark"></i>
            </button>
        </form>
    </div>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block"
            src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png') }}"
            alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{ $listing->id }}">{{ $listing->title }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>
            <x-listing-tags :listing="$listing" />
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
            </div>
        </div>
    </div>
</x-card>
