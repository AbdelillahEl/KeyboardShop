<x-layout>

    <x-card class="max-w-lg mx-auto mt-24">

        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Profile
            </h2>
            <p class="mb-4">Personal Details</p>
        </header>
        <h3 class="text-2xl mb-2">{{ $user->name }}</h3>
        <div
                        class="flex flex-col items-center justify-center text-center"
                    >
                        <img
                            class="w-48 mr-6 mb-6"
                            src="{{ $user->profilepicture ? asset('images/' . $user->profilepicture) : asset('images/no-image.png') }}"
                             alt="images/profile+.png"/>
                        
                       
        </div>
        <div>
            <h3 class="text-3xl  mb-4">
                About Me
            
            </h3>
            <div class="text-lg space-y-6">
                <p>
                    {{ $user->bio }}
                </p>
            </div>
            <h3 class="text-3xl  mb-4">
                Birthday
            </h3>
            <div class="text-lg space-y-6">
                <p>
                    {{ $user->birthdate }}
                </p>
                
            </div>

            @if (auth()->user()->id == $user->id)
                <a href="/profile/{{$user->id}}/edit">
                <i class="fa-solid fa-pencil"></i> Edit
                </a>
            
            @endif

        </div>




    </x-card>


</x-layout>