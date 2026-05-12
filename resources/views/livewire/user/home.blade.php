<div>
    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Administration</p>
    <h2 class="font-bold text-slate-900 text-2xl mb-1">Mitarbeiterverwaltung</h2>
    <p class="text-slate-500 text-sm mb-6">Mitarbeiter-Zugänge anlegen und verwalten.</p>

    <form wire:submit.prevent='submit' class="bg-slate-50 border border-slate-200 rounded-xl p-4 mb-6 space-y-3">
        <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Neuen Mitarbeiter anlegen</p>
        <div class="grid grid-cols-2 gap-3">
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">Benutzername</label>
                <input type="text" wire:model="username"
                    class="w-full bg-white border border-slate-300 rounded-lg px-3 py-2.5 text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition font-mono"
                    placeholder="benutzername">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">Name</label>
                <input type="text" wire:model="name"
                    class="w-full bg-white border border-slate-300 rounded-lg px-3 py-2.5 text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition"
                    placeholder="Vor- und Nachname">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">Passwort</label>
                <input type="password" wire:model="password"
                    class="w-full bg-white border border-slate-300 rounded-lg px-3 py-2.5 text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition font-mono"
                    placeholder="••••••••">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">Rolle</label>
                <select wire:model='admin'
                    class="w-full bg-white border border-slate-300 rounded-lg px-3 py-2.5 text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition h-[42px]">
                    <option value="0">Mitarbeiter</option>
                    <option value="1">Administrator</option>
                </select>
            </div>
        </div>
        <button type="submit"
            class="flex items-center space-x-2 bg-slate-900 hover:bg-slate-800 text-amber-400 font-semibold px-5 py-2.5 rounded-lg transition text-sm border border-slate-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span>Mitarbeiter anlegen</span>
        </button>
    </form>

    <div class="rounded-xl border border-slate-200 overflow-hidden">
        <div class="bg-slate-900 grid grid-cols-3 px-4 py-2 text-xs font-semibold text-slate-400 uppercase tracking-wider">
            <span class="col-span-2">Mitarbeiter</span>
            <span class="text-right">Aktionen</span>
        </div>
        @foreach($users as $user)
            <div class="grid grid-cols-3 px-4 py-3 border-t border-slate-100 items-center @if($loop->even) bg-slate-50 @else bg-white @endif">
                <div class="col-span-2 flex items-center space-x-3">
                    <div class="w-9 h-9 rounded-full flex items-center justify-center font-bold flex-shrink-0 text-sm border
                        @if($user->admin) bg-amber-400 text-slate-900 border-amber-500 @else bg-slate-200 text-slate-600 border-slate-300 @endif">
                        {{ mb_substr($user->name, 0, 1) }}
                    </div>
                    <div>
                        <div class="flex items-center space-x-2">
                            <p class="font-semibold text-slate-800 text-sm">{{ $user->name }}</p>
                            @if($user->admin)
                                <span class="text-xs bg-amber-100 text-amber-800 px-1.5 py-0.5 rounded font-semibold uppercase tracking-wide">Admin</span>
                            @endif
                        </div>
                        <p class="text-xs text-slate-400 font-mono">{{ $user->username }}</p>
                    </div>
                </div>
                <div class="flex items-center justify-end space-x-2">
                    @if($selectedUser == $user)
                        <input type="password" wire:keydown.enter='savePassword' wire:model="userPassword"
                            class="bg-white border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition w-32 font-mono"
                            placeholder="Neues Passwort" autofocus>
                    @else
                        <button wire:click='selectUser({{ $user->id }})'
                            class="text-slate-500 hover:text-slate-800 text-xs bg-slate-100 hover:bg-slate-200 px-3 py-2 rounded-lg transition font-medium">
                            Passwort
                        </button>
                    @endif
                    <button wire:click='delete({{ $user->id }})'
                        class="text-red-600 hover:text-red-800 hover:bg-red-50 p-2 rounded-lg transition"
                        onclick="return confirm('Mitarbeiter wirklich löschen?')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</div>
