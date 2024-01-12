<x-layout>
    <x-card class="p-10 rounded max-w-lg mx-auto mt-24" >
                    <header class="text-center">
                        <h2 class="text-2xl font-bold uppercase mb-1">
                            Create a Keyboard Post
                        </h2>
                    
                    </header>

                    <form action="/keyboard" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="mb-6">
                            <label
                                for="title"
                                class="inline-block text-lg mb-2"
                                >Keyboard Name</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="title"
                                value="{{ old('title') }}"
                            />
                            @error('title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="description" class="inline-block text-lg mb-2"
                                >Description</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="description"
                                placeholder="Example: Wireless mechanical gaming keyboard with low-latency connectivity."
                                value="{{ old('description') }}"
                            />
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="price"
                                class="inline-block text-lg mb-2"

                                >Keyboard Price</label
                                
                            >
                            <input
                                type="number"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="price"
                                placeholder="Example: $50.00"
                                value="{{ old('price') }}"
                            />
                            @error('price')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-6">
                            <label
                                for="switches"
                                class="inline-block text-lg mb-2"
                            >
                               Type of Switches
                            </label>
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="switches"
                                placeholder="Example: RGB, Optical, Mechanical, etc"
                                value="{{ old('switches') }}"
                            />
                            @error('switches')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror

                        </div>

                        
                        <div class="mb-6">
                            <label for="image" class="inline-block text-lg mb-2">
                                Keyboard Image
                            </label>
                            <input
                                type="file"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="image"
                            />
                            @error('image')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="details"
                                class="inline-block text-lg mb-2"
                            >
                                Keyboard Details
                            </label>
                            <textarea
                                class="border border-gray-200 rounded p-2 w-full"
                                name="details"
                                rows="10"
                                placeholder="A long description of the keyboard ..."
                                value="{{ old('details') }}"
                            ></textarea>
                            @error('details')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <button  class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                                Create Keyboard Post
                            </button>

                            <a href="/" class="text-black ml-4"> Back </a>
                        </div>
                    </form>
    </x-card>



</x-layout>