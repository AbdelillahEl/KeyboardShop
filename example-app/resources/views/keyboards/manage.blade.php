<x-layout>

    <x-card class=" p-10 ">
        <header>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                Manage Keyboards
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless($keyboards->isEmpty())
                @foreach ($keyboards as $keyboard)
                <tr class="border-gray-300">
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <a href="/keyboard/{{ $keyboard->id }}">
                            {{ $keyboard->title }}
                        </a>
                    </td>
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <a
                            href="/keyboard/{{ $keyboard->id }}/edit"
                            class="text-blue-400 px-6 py-2 rounded-xl"
                            ><i
                                class="fa-solid fa-pen-to-square"
                            ></i>
                            Edit</a
                        >
                    </td>
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <form action="/keyboards/{{ $keyboard->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button>
                                <i  class="fa-solid fa-trash"></i>
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
            
                <tr class="border-grey-300">
                    <td class="px-4 py-8 border-t border-gray-300 text--lg">
                        <p class="text-center">No keyboards found</p>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>

                <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                Contact Messages
            </h1>
                <table class="w-full table-auto rounded-sm">
                    <tbody>
                @foreach($contacts as $contact)
                <tr class="border-gray-300">
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <p>
                            {{ $contact->email }}
                        </p>
                    </td>
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <p>
                            {{ $contact->message }}
                        </p>
                    </td>
                    <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >
                    <a
                        href="mailto:{{ $contact->email }}"
                        class="text-blue-400 px-6 py-2 rounded-xl"
                        ><i
                            class="fa-solid fa-mail-bulk"
                        ></i>
                        Send Mail</a
                    >
                </td>
                </tr>
                @endforeach
                         
            </tbody>
        </table>
    </x-card>

</x-layout>