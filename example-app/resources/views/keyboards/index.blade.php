

<x-layout>
@include('partials._hero')

@include('partials._search')

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">



    @foreach($keyboards as $keyboard)
       <x-keyboard-card :keyboard="$keyboard" />
        
    @endforeach


</div>
</x-layout>

