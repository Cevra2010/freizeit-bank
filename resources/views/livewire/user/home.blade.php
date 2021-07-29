<div>

    <h1 class="pb-2 pt-2 font-semibold text-xl">Benutzer hinzufügen</h1>

    <form wire:submit.prevent='submit'>
    <label for="username">Benutzername</label>
    <input type="text" wire:model="username" class="w-full mt-2 bg-gray-200 rounded-md p-2 ring-green-200 border-0 focus:outline-none focus:ring-2 focus:ring-green-400">

    <label for="name">Name</label>
    <input type="text" wire:model="name" class="w-full mt-2 bg-gray-200 rounded-md p-2 ring-green-200 border-0 focus:outline-none focus:ring-2 focus:ring-green-400">

    <label for="password">Passwort</label>
    <input type="password" wire:model="password" class="w-full mt-2 bg-gray-200 rounded-md p-2 ring-green-200 border-0 focus:outline-none focus:ring-2 focus:ring-green-400">
    <label for="password">Benutzerrechte</label>
    <select wire:model='admin' class="w-full mt-2 bg-gray-200 rounded-md p-2 ring-green-200 border-0 focus:outline-none focus:ring-2 focus:ring-green-400">
        <option value="0">kein Administrator</option>
        <option value="1">Administrator</option>
    </select>
    <button type="submit" class="mt-2 bg-green-700 p-2 text-white rounded-md">Speichern</button>
    </form>



    <h1 class="pb-2 pt-2 font-semibold text-xl">Benutzerübersicht</h1>
    <table class="w-full">
        <thead>
            <tr>
                <td class="w-2/5 p-2">Benutzername</td>
                <td class="w-2/5 p-2">Passwort</td>
                <td class="w-1/5 p-2">Aktionen</td>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="w-2/5 p-2">{{ $user->name }}</td>
                    <td class="w-2/5 p-2">
                        @if($selectedUser == $user)
                            <input type="password" wire:keydown.enter='savePassword' wire:model="userPassword" class="w-full mt-2 bg-gray-200 rounded-md p-2 ring-green-200 border-0 focus:outline-none focus:ring-2 focus:ring-green-400">
                        @else
                            <a href="#" wire:click='selectUser({{ $user->id }})'>*********</a>
                        @endif
                    </td>
                    <td class="w-1/5 p-2">
                        <a href="#" wire:click='delete({{ $user->id }})' class="bg-red-700 p-2 text-white rounded-md">Löschen</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
