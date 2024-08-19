<x-layout>
    <x-card
    class="max-w-lg mx-auto mt-24"
>
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
           Forgot password?
        </h2>
        <p class="mb-4"> 
            Enter your email address and we'll send you a link to reset your password.
        </p>
    </header>

    <form action="/login" method="POST">
     @csrf
      <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
          for="email"
        >
          Email
        </label>
        <input
          class="border border-gray-400 p-2 w-full"
          type="email"
          name="email"
          id="email"
          required
        >
      </div> 
      <div class="mb-6">
        <button
          type="submit"
          class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
        >
          Send Password Reset Link
        </button>
      </div>
    </form>
   
    </x-card>
</x-layout>