<form wire:submit.prevent='submit' class="bg-gray-900 opacity-75 w-full shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4">
    <div class="mb-4" x-data="{ showAlert: true }">
        <label class="block text-blue-300 py-2 font-bold mb-2" for="email">
            Signup for our newsletter
        </label>
        <input wire:model.lazy='email' id="email" type="text" class="shadow appearance-none border rounded w-full p-3 text-gray-700 leading-tight focus:ring transform transition hover:scale-105 duration-300 ease-in-out" placeholder="you@somewhere.com"/>
        @if ($success)
        <div x-show="showAlert" x-init="setTimeout(() => showAlert = false, 5000)">
            <p><span class="font-semibold text-green-400 text-md">{{ $success }}</span></p>  
        </div>              
        @endif
        @error('email') <span class="text-sm text-pink-600 error">{{ $message }}</span> @enderror                
    </div>

    <div class="flex items-center justify-between pt-4">
        <button type="submit" class="bg-gradient-to-r from-purple-800 to-green-500 hover:from-pink-500 hover:to-green-500 text-white font-bold py-2 px-4 rounded focus:ring transform transition hover:scale-105 duration-300 ease-in-out">
            Sign Up
        </button>
    </div>
</form>
