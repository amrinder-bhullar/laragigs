<div x-show="SignUpShow" style="display: none" {{-- class="fixed border border-laravel top-10 left-1/2 transform -translate-x-1/2 bg-white text-black px-4 py-3 z-10" --}}
    class="fixed border border-laravel top-0 left-0 w-full bg-laravel text-black px-4 py-3 z-10 h-full">
    <div class="relative">

        @guest
            <x-card class="p-2 w-full mx-auto mt-5 relative w-72 opacity-100">
                <header class="text-center">
                    <h2 class="text-2xl font-bold uppercase mb-1">
                        Register
                    </h2>
                    <p class="mb-4">Create an account to post gigs</p>
                </header>
                <div class="absolute top-2 right-2 cursor-pointer z-10" @click="SignUpShow = false">X</div>

                <form action="/users" method="POST" class="grid grid-rows-2">
                    @csrf
                    <div class="mb-2">
                        <label for="name" class="inline-block text-lg mb-2">
                            Name
                        </label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
                            value="{{ old('name') }}" />

                        @error('name')
                            <p class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="email" class="inline-block text-lg mb-2">Email</label>
                        <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email"
                            value="{{ old('email') }}" />

                        @error('email')
                            <p class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password" class="inline-block text-lg mb-2">
                            Password
                        </label>
                        <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" />

                        @error('password')
                            <p class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password2" class="inline-block text-lg mb-2">
                            Confirm Password
                        </label>
                        <input type="password" class="border border-gray-200 rounded p-2 w-full"
                            name="password_confirmation" />

                        @error('password_confirmation')
                            <p class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                            Sign Up
                        </button>
                    </div>

                    <div class="mt-8">
                        <p>
                            Already have an account?
                            <a href="/login" class="text-laravel">Login</a>
                        </p>
                    </div>
                </form>
            </x-card>
        @else
            <p class="p-48">You are already logged in</p>
        @endguest
    </div>
</div>
