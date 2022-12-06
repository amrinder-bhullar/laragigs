<x-dashboard-layout>
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
                        src="https://i.pravatar.cc/100?u={{ auth()->id() }}" alt="Bonnie image" />
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $profile->user->name }}</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">{{ $profile->address }}</span>
                    <div class="flex mt-4 space-x-3 md:mt-6">
                        <a href="#"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-laravel rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</a>
                        {{-- <div
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">
                        Message</div> --}}
                    </div>
                </div>
            </div>
            <div class="w-9/12 px-10 text-gray-800 text-xl space-y-4">
                <form action="/profile/{{ $profile->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <label for="address" class="inline-block text-lg mb-2">Address</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="address"
                            placeholder="What is your primary address?" value="{{ $profile->address }}" />
                    </div>

                    @error('address')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror

                    <div class="mb-6">
                        <label for="skills" class="inline-block text-lg mb-2">
                            Skills (Comma Separated)
                        </label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="skills"
                            placeholder="Example: Laravel, Backend, Postgres, etc" value="{{ $profile->skills }}" />
                    </div>

                    @error('skills')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror

                    <div class="mb-6">
                        <label for="image" class="inline-block text-lg mb-2">
                            Profile Picture
                        </label>
                        <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image" />
                    </div>

                    @error('image')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror

                    <div class="mb-6">
                        <label for="education" class="inline-block text-lg mb-2">
                            Education
                        </label>
                        <textarea class="border border-gray-200 rounded p-2 w-full" name="education" rows="10"
                            placeholder="Include tasks, requirements, salary, etc">{{ $profile->education }}</textarea>
                    </div>

                    @error('education')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror

                    <div class="mb-6">
                        <label for="experience" class="inline-block text-lg mb-2">
                            Experience
                        </label>
                        <textarea class="border border-gray-200 rounded p-2 w-full" name="experience" rows="10"
                            placeholder="Include tasks, requirements, salary, etc">{{ $profile->experience }}</textarea>
                    </div>

                    @error('experience')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror

                    <div class="mb-6">
                        <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                            Update
                        </button>

                        <a href="/profile" class="text-black ml-4"> Back </a>
                    </div>
                </form>
            </div>
        </div>
    </x-card>
</x-dashboard-layout>
