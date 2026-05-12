<div>
    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Konfiguration</p>
    <h2 class="font-bold text-slate-900 text-2xl mb-1">Buchungskategorien</h2>
    <p class="text-slate-500 text-sm mb-6">Definiere Kategorien für Transaktionen (z.&nbsp;B. Eisdiele, Ausflug, Snacks).</p>

    <form wire:submit.prevent='submit' class="bg-slate-50 border border-slate-200 rounded-xl p-4 mb-6">
        <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-3">Neue Kategorie anlegen</p>
        <div class="flex space-x-2">
            <input type="text" wire:model='group_field'
                class="flex-1 bg-white border border-slate-300 rounded-lg px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition"
                placeholder="z. B. Eisdiele, Ausflug, Snacks …">
            <button type="submit"
                class="flex items-center space-x-2 bg-slate-900 hover:bg-slate-800 text-amber-400 font-semibold px-5 py-3 rounded-lg transition border border-slate-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Anlegen</span>
            </button>
        </div>
    </form>

    <div class="rounded-xl border border-slate-200 overflow-hidden">
        <div class="bg-slate-900 grid grid-cols-3 px-4 py-2 text-xs font-semibold text-slate-400 uppercase tracking-wider">
            <span class="col-span-2">Kategorie</span>
            <span class="text-right">Aktion</span>
        </div>
        @forelse($groups as $group)
            <div class="grid grid-cols-3 px-4 py-3 border-t border-slate-100 items-center @if($loop->even) bg-slate-50 @else bg-white @endif">
                <div class="col-span-2 flex items-center space-x-3">
                    <div class="w-8 h-8 bg-amber-100 rounded-lg flex items-center justify-center text-amber-700 flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                    </div>
                    <span class="font-semibold text-slate-800">{{ $group->name }}</span>
                </div>
                <div class="flex justify-end">
                    <button wire:click="delete({{ $group->id }})"
                        class="flex items-center space-x-1 text-red-600 hover:text-red-800 hover:bg-red-50 px-3 py-2 rounded-lg text-xs transition font-medium"
                        onclick="return confirm('Kategorie wirklich löschen?')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        <span>Löschen</span>
                    </button>
                </div>
            </div>
        @empty
            <div class="py-12 text-center text-slate-400 text-sm bg-white">
                Noch keine Kategorien angelegt.
            </div>
        @endforelse
    </div>
</div>
