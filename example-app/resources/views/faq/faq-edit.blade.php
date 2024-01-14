<x-layout>

    <x-card class="p-10 rounded max-w-lg mx-auto mt-24" >
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit: {{ $faq['question'] }}
      </h2>
      <form action="/faq/{{ $faq['id'] }}" method="POST"  >
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label
                for="question"
                class="inline-block text-lg mb-2"
                >Question</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="question"
                value="{{ $faq['question'] }}"
            />
            @error('question')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="answer" class="inline-block text-lg mb-2"
                >Answer</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="answer"
                placeholder="{{ $faq['answer'] }}"
                value="{{$faq['answer'] }}"
            />
            @error('answer')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror

           
        </div>
        <button class="bg-blue-500 text-white rounded py-2 px-4 hover:bg-blue-600" type="submit">Update</button>
    </form>
    </x-card>
</x-layout>