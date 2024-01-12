

<x-layout>
@include('partials._hero')

@include('partials._search')

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

@unless (count($keyboards)==0)
    


    @foreach($keyboards as $keyboard)
       <x-keyboard-card :keyboard="$keyboard" />
        
    @endforeach
    
    @else
    <p>No keyboards found</p>
    @endunless

</div>
<div class="t-6 p-4">{{$keyboards->links()}}</div>

</x-layout>

