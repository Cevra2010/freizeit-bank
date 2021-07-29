<div class="bg-gray-50 mt-5 p-10 shadow-lg">
    <h1 class="font-semibold text-xl text-green-500">Bitte anmelden</h1>
    @if(session()->has("auth_error"))
    <div class="bg-red-200 ring-2 ring-red-300 p-2 rounded-md mt-4 text-sm text-red-900">
        {{ session()->get("auth_error") }}
    </div>
    @endif
    <form wire:submit.prevent='submit'>
        <div class="mt-6">
            <label for="username">Benutzername</label>
            <input type="text" wire:model='username' class="w-full mt-2 bg-gray-200 rounded-md p-2 ring-green-200 border-0 focus:outline-none focus:ring-2 focus:ring-green-400">
        </div>
        <div class="mt-4">
            <label for="password">Passwort</label>
            <input type="password" wire:model='password' class="w-full mt-2 bg-gray-200 rounded-md p-2 ring-green-200 border-0 focus:outline-none focus:ring-2 focus:ring-green-400">
        </div>
        <div class="mt-4">
            <button class="p-2 pl-4 pr-4 bg-green-600 hover:bg-green-500 text-green-50 rounded-md" type="submit">Anmelden</button>
        </div>
    </form>
</div>
