@props(['listing', 'bookmarks'])
<x-card class="relative">
    <div class="absolute top-3 right-3">

        @if ($bookmarks && $bookmarks->contains('listing_id', $listing->id))
            @php
                $bookmark = $bookmarks
                    ->where('user_id', auth()->id())
                    ->where('listing_id', $listing->id)
                    ->first();
            @endphp
            <form {{-- action="/listings/{{ $listing->id }}/bookmark/delete"  --}} action="/bookmarks/{{ $bookmark['id'] }}/delete" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="listing_id" value="{{ $listing->id }}">
                <button type="submit">
                    <i class="fa-solid fa-bookmark"></i>
                </button>
            </form>
        @else
            <form action="/listings/{{ $listing->id }}/bookmark" method="POST">
                @csrf
                <input type="hidden" name="listing_id" value="{{ $listing->id }}">
                <button type="submit">
                    <i class="fa-regular fa-bookmark"></i>
                </button>
            </form>
        @endif

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
