<x-dashboard-layout>
    <div class="mx-4">
        <x-card>
            <header>
                <h1 class="text-3xl text-center font-bold my-6 uppercase">
                    Saved Gigs
                </h1>
            </header>

            <table class="w-full table-auto rounded-sm">
                <tbody>
                    @unless($bookmarks->isEmpty())


                        @foreach ($bookmarks as $bookmark)
                            <tr class="border-gray-300">
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <a href="/listings/{{ $bookmark->listing->id }}">
                                        {{ $bookmark->listing->title }}
                                    </a>
                                </td>
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <form action="/bookmarks/{{ $bookmark->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600"><i class="fa-solid fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="border-gray-300">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                You have not saved any listings yet
                            </td>
                        </tr>
                    @endunless
                </tbody>
            </table>
        </x-card>
    </div>
</x-dashboard-layout>
