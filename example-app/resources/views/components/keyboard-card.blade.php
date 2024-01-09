@props(['keyboard'])
<x-card>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="
            {{ asset('images/no-image.png') }}
            "

            alt="keyboard-image"
        />
        <div>
            <h3 class="text-2xl">
                <a href="/keyboard/{{ $keyboard['id'] }}">{{ $keyboard['title'] }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $keyboard['description'] }}</div>
            
            <div class="text-lg mt-4">
                <i class="fa-solid fa-dollar-sign"></i> {{ $keyboard['price'] }}
            </div>
        </div>
    </div>
</x-card>