<x-layout>

    <x-card class="p-10 rounded max-w-lg mx-auto mt-24" >
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit: {{ $user['email'] }}
      </h2>
        


        </header>

        <form action="/profile/{{ $user['id'] }}/" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label
                    for="name"
                    class="inline-block text-lg mb-2"
                    >User Name</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="name"
                    value="{{ $user['name'] }}"
                    />
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2"
                    >Email</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="email"
                    placeholder="Email"
                    value="{{$user['email'] }}"
                />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="birthdate"
                    class="inline-block text-lg mb-2"

                    >Birthdate </label
                    
                >
                <input
                    type="date"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="birthdate"
                    placeholder="[YYYY-MM-DD]"
                    value="birthdate"
                />
                @error('birthdate')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-6">
                <label
                    for="password"
                    class="inline-block text-lg mb-2"
                >
                   New Password
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="password"
                    placeholder="Write here your password"
                    value="{{ $user['password'] }}"
                />
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>

            
            <div class="mb-6">
                <label for="image" class="inline-block text-lg mb-2">
                    User Avatar
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="image"
                />
                <img
                class="w-48 mr-6 mb-6"
                src="{{ $user->image ? asset('images/' . $user->image) : asset('images/no-image.png') }}"
                 alt="images/user.png"
               
            />
                @error('image')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="bio"
                    class="inline-block text-lg mb-2"
                >
                    Biography
                </label>
                <textarea
                    class="border border-gray-200 rounded p-2 w-full"
                    name="bio"
                    rows="10"
                    placeholder="Write a few sentences about yourself"
                  cvalue="{{ $user['bio'] }}"
                > {{ $user['bio'] }}</textarea>
                @error('bio')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button  class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Edit Profile
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>


