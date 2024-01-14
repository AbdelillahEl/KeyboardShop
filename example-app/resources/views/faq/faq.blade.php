<x-layout>
    <x-card class="p-10 bg-black">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Frequently Asked Questions
            </h2>
            
        </header>
   @foreach($faqs as $faq)
   <x-card class="p-10 bg-black">
   
    <h3 class="text-2xl">
        {{$faq->question}}
    </h3>
    <p>
        {{$faq->answer}}
    </p>
    @if(auth()->user()->role == \App\Models\User::ROLE_ADMIN)
    <x-card class="mt-4 p-2">
        <div class="flex space-x-6 items-end">
            <a href="/faq/{{$faq->id}}/edit" class="flex items-center">
                <i class="fa-solid fa-pencil"></i>
                <span class="ml-2">Edit</span>
            </a>
            <form action="/faq/{{$faq->id}}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button class="flex items-center text-red-500">
                    <i class="fa-solid fa-trash"></i>
                    <span class="ml-2">Delete</span>
                </button>
            </form>
        </div>
    </x-card>
@endif

   </x-card>
@endforeach
</x-card>






</x-layout>