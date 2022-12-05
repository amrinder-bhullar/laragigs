<x-layout>
    <x-search />
    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card class="max-w-lg mx-auto mt-10">
            <div class="flex flex-col items-center justify-center text-center">
                <img class="w-48 mr-6 mb-6"
                    src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png') }}"
                    alt="" />

                <h3 class="text-2xl mb-2">{{ $listing->title }}</h3>
                <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>
                <x-listing-tags :listing="$listing" />
                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Job Description
                    </h3>
                    <div class="text-lg space-y-6">
                        <p>
                            {{ $listing->description }}
                        </p>
                        <div class="mt-4">
                            <a href="mailto:{{ $listing->email }}"
                                class=" px-4 bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80 max-w-sm"><i
                                    class="fa-solid fa-envelope"></i>
                                Contact Employer</a>

                            <a href="{{ $listing->website }}" target="_blank"
                                class="px-4 bg-black text-white py-2 rounded-xl hover:opacity-80 max-w-sm"><i
                                    class="fa-solid fa-globe"></i> Visit
                                Website</a>
                        </div>
                        <div class="mt-4">
                            <form action="/listings/{{ $listing->id }}/apply" method="POST">
                                @csrf
                                <input type="hidden" name="listing_id" value="{{ $listing->id }}">
                                <button type="submit"
                                    class=" px-4 bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80 max-w-sm">
                                    <i class="fa-sharp fa-solid fa-arrow-up-from-bracket"></i> Apply
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </x-card>
        @auth
            @if (auth()->user()->id === $listing->user->id)
                <x-card class="mt-4 p-2 flex space-x-6">
                    <a href="/listings/{{ $listing->id }}/edit"><i class="fa-solid fa-pencil"> Edit</i></a>

                    <form action="/listings/{{ $listing->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500"><i class="fa-solid fa-trash"></i>DELETE</button>
                    </form>
                </x-card>
            @endif
        @endauth
    </div>
</x-layout>
