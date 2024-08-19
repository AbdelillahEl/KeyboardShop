<x-layout>
    <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit: {{ $user->email }}
            </h2>
        </header>

        <form action="/profile/{{ $user->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">User Name</label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="name"
                    value="{{ old('name', $user->name) }}"
                />
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input
                    type="email"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="email"
                    value="{{ old('email', $user->email) }}"
                />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="birthdate" class="inline-block text-lg mb-2">Birthdate</label>
                <input
                    type="date"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="birthdate"
                    value="{{ old('birthdate', $user->birthdate) }}"
                />
                @error('birthdate')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">New Password</label>
                <input
                    type="password"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="password"
                    placeholder="Enter new password (optional)"
                />
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="inline-block text-lg mb-2">Confirm New Password</label>
                <input
                    type="password"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="password_confirmation"
                    placeholder="Re-enter new password (optional)"
                />
                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="profilepicture" class="inline-block text-lg mb-2">Profile Picture</label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="profilepicture"
                />
                <img
                    class="w-48 mr-6 mb-6"
                    src="{{ $user->profilepicture ? asset('images/' . $user->profilepicture) : asset('images/no-image.png') }}"
                    alt="User profile picture"
                />
                @error('profilepicture')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="bio" class="inline-block text-lg mb-2">Biography</label>
                <textarea
                    class="border border-gray-200 rounded p-2 w-full"
                    name="bio"
                    rows="10"
                    placeholder="Write a few sentences about yourself"
                >{{ old('bio', $user->bio) }}</textarea>
                @error('bio')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Edit Profile
                </button>
                <a href="/" class="text-black ml-4">Back</a>
            </div>
        </form>
    </x-card>
</x-layout>
