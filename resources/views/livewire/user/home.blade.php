<div>
    <h2 class="font-bold text-slate-800 text-xl mb-1">Betreuer verwalten</h2>
    <p class="text-slate-400 text-sm mb-5">Lege Betreuer-Konten an und verwalte Berechtigungen.</p>

    <form wire:submit.prevent='submit' class="bg-slate-50 border border-slate-200 rounded-2xl p-4 mb-6 space-y-3">
        <h3 class="font-semibold text-slate-700 text-sm">Neuen Betreuer anlegen</h3>
        <div class="grid grid-cols-2 gap-3">
            <div>
                <label class="block text-xs font-medium text-slate-500 mb-1">Benutzername</label>
                <input type="text" wire:model="username"
                    class="w-full bg-white border border-slate-200 rounded-xl px-3 py-2.5 text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition"
                    placeholder="benutzername">
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-500 mb-1">Name</label>
                <input type="text" wire:model="name"
                    class="w-full bg-white border border-slate-200 rounded-xl px-3 py-2.5 text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition"
                    placeholder="Vor- und Nachname">
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-500 mb-1">Passwort</label>
                <input type="password" wire:model="password"
                    class="w-full bg-white border border-slate-200 rounded-xl px-3 py-2.5 text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition"
                    placeholder="Passwort">
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-500 mb-1">Rolle</label>
                <select wire:model='admin'
                    class="w-full bg-white border border-slate-200 rounded-xl px-3 py-2.5 text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition h-[42px]">
                    <option value="0">Betreuer</option>
                    <option value="1">Administrator</option>
                </select>
            </div>
        </div>
        <button type="submit"
            class="flex items-center space-x-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-5 py-2.5 rounded-xl transition text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span>Betreuer anlegen</span>
        </button>
    </form>

    <div class="space-y-2">
        @foreach($users as $user)
            <div class="flex items-center justify-between bg-slate-50 border border-slate-100 rounded-xl px-4 py-3">
                <div class="flex items-center space-x-3">
                    <div class="w-9 h-9 rounded-full flex items-center justify-center font-bold flex-shrink-0
                        @if($user->admin) bg-amber-100 text-amber-700 @else bg-slate-200 text-slate-600 @endif">
                        {{ mb_substr($user->name, 0, 1) }}
                    </div>
                    <div>
                        <p class="font-medium text-slate-800 text-sm">{{ $user->name }}</p>
                        <div class="flex items-center space-x-2">
                            <span class="text-xs text-slate-400">@{{ $user->username }}</span>
                            @if($user->admin)
                                <span class="text-xs bg-amber-100 text-amber-700 px-1.5 py-0.5 rounded-md font-medium">Admin</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    @if($selectedUser == $user)
                        <input type="password" wire:keydown.enter='savePassword' wire:model="userPassword"
                            class="bg-white border border-slate-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition w-36"
                            placeholder="Neues Passwort" autofocus>
                    @else
                        <button wire:click='selectUser({{ $user->id }})'
                            class="text-slate-400 hover:text-slate-600 text-xs bg-slate-100 hover:bg-slate-200 px-3 py-2 rounded-xl transition">
                            Passwort ändern
                        </button>
                    @endif
                    <button wire:click='delete({{ $user->id }})'
                        class="flex items-center space-x-1 text-rose-500 hover:text-rose-700 hover:bg-rose-50 px-3 py-2 rounded-xl text-sm transition"
                        onclick="return confirm('Betreuer wirklich löschen?')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</div>
