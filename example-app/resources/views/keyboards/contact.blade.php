<x-layout>

    <x-card class=" p-10 ">
        <header>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                Contact Seller
            </h1>
        </header>
        <form action="/contact" method="POST">
            @csrf   
            

            <div class="mb-6">
                <label
                    for="email"
                    class="inline-block text-lg mb-2"
                    >Your Email</label
                >
                <input
                    type="email"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="email"
                    value="{{ old('email') }}"
                />
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            
            <div class="mb-6">
                <label
                    for="messsage"
                    class="inline-block text-lg mb-2"
                >
                    Your Question
                </label>
                <textarea
                    class="border border-gray-200 rounded p-2 w-full"
                    name="message"
                    rows="10"
                    placeholder="Ask here you're question...."
                    value="{{ old('message') }}"
                > </textarea>
                @error('message')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <button  class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Send Question
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    
    </x-card>


</x-layout>
