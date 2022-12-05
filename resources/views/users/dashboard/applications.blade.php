<x-dashboard-layout>
    <div class="mx-4">
        <x-card>
            <header>
                <h1 class="text-3xl text-center font-bold my-6 uppercase">
                    applied jobs
                </h1>
            </header>

            <table class="w-full table-auto rounded-sm">
                <tbody>
                    @unless($applications->isEmpty())


                        @foreach ($applications as $application)
                            <tr class="border-gray-300">
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <a href="/listings/{{ $application->listing->id }}">
                                        {{ $application->listing->title }}
                                    </a>
                                </td>
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <a href="/listings/{{ $application->listing->id }}">
                                        <button class="text-blue-600"><i class="fa-solid fa-eye"></i> View</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="border-gray-300">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                You have not applied for any jobs yet
                            </td>
                        </tr>
                    @endunless
                </tbody>
            </table>
        </x-card>
    </div>
</x-dashboard-layout>
