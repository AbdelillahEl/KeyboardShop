
<x-layout>

@include('partials._search')

<a href="/" class="inline-block text-black ml-4 mb-4"
                ><i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <div class="mx-4">
                <x-card class="p-10 bg-black">
                    <div
                        class="flex flex-col items-center justify-center text-center"
                    >
                        <img
                            class="w-48 mr-6 mb-6"
                            src="{{ $keyboard->image ? asset('images/' . $keyboard->image) : asset('images/no-image.png') }}"
                             alt="images/keyboard.png"
                           
                        />

                        <h3 class="text-2xl mb-2">{{ $keyboard['title'] }}</h3>
                        <div class="text-xl font-bold mb-4">{{ $keyboard['switches'] }}</div>
                        
                        <div class="text-lg my-4">
                            <i class="fa-solid fa-dollar-sign"></i> {{ $keyboard['price'] }}
                        </div>
                        <div class="border border-gray-200 w-full mb-6"></div>
                        <div>
                            <h3 class="text-3xl font-bold mb-4">
                                Keyboard Details
                            
                            </h3>
                            <div class="text-lg space-y-6">
                                <p>
                                    {{ $keyboard['details'] }}
                                </p>

                                <a
                                    href="https://test.com"
                                    target="_blank"
                                    class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-shopping-cart"></i> 
                                    Buy Now
                            </a>
                                <a
                                    href="/contact"
                                    class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-envelope"></i>
                                    Contact Seller/Admin </a
                                >

                                
                            </div>
                        </div>
                    </div>
                </x-card>
                @if(auth()->check() && auth()->user()->role == \App\Models\User::ROLE_ADMIN)
                <x-card class="mt-4 p-2 flex space-x-6">
                    <a href="/keyboard/{{$keyboard->id}}/edit">
                    <i class="fa-solid fa-pencil"></i> Edit
                    </a>
                    <form action="/keyboard/{{$keyboard}}" method="POST" class="inline ">
                        @csrf
                        @method('DELETE')

                        <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
                    </form>
                </x-card>
                @endif
            </div>
</x-layout>