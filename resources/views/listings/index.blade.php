<x-layout>
    <x-hero />
    <x-search />
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @foreach ($listings as $listing)
            <x-listing-card :listing="$listing" :bookmarks="$bookmarks" />
        @endforeach
    </div>
    <div class="mt-6">
        {{ $listings->links() }}
    </div>
</x-layout>
