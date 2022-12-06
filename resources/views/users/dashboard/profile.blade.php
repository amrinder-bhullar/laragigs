<x-dashboard-layout>
    <div class="mx-4">
        <x-card>
            <header>
                <h1 class="text-3xl text-center font-bold my-6 uppercase">
                    {{ request()->url('/profile') ? 'Your profile' : 'Edit your profile' }}
                </h1>
            </header>
            <div class="flex">
                <div class="w-3/12  relative max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700"
                    x-data="{ profileCardDropDown: false }">
                    <div class="flex justify-end px-4 pt-4">
                        <button id="dropdownButton" data-dropdown-toggle="dropdown"
                            x-on:click="profileCardDropDown = ! profileCardDropDown"
                            class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                            type="button">
                            <span class="sr-only">Open dropdown</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                </path>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdown" x-show="profileCardDropDown" @click.outside="profileCardDropDown = false"
                            class="z-10 absolute top-12 right-12 text-base list-none bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700">
                            <ul class="py-1" aria-labelledby="dropdownButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Export
                                        Data</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex flex-col items-center pb-10">
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg"
                            src="{{ $profile->image ? asset('storage/' . $profile->image) : 'https://i.pravatar.cc/100?u=1' }}"
                            alt="Bonnie image" />
                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $profile->user->name }}
                        </h5>
                        <span class="text-sm text-gray-500 dark:text-gray-400">{{ $profile->user->email }}</span>
                        <div class="flex mt-4 space-x-3 md:mt-6">
                            <a href="/profile/{{ $profile->id }}/edit"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-laravel rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</a>
                            {{-- <div
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">
                        Message</div> --}}
                        </div>
                    </div>
                </div>
                <div class="w-9/12 px-10 text-gray-800 text-xl space-y-4">
                    <div>
                        Your address: {{ $profile->address ?? 'Please edit your profile to add your info' }}
                    </div>
                    <hr>
                    <div>
                        Education: {{ $profile->education ?? 'add' }}
                    </div>
                    <hr>
                    <div>
                        Expirence: {{ $profile->experience ?? 'add' }}
                    </div>
                    <hr>
                    <div>
                        Skills: {{ $profile->skills ?? 'add' }}
                    </div>
                    <hr>
                </div>
            </div>
        </x-card>
    </div>
</x-dashboard-layout>
