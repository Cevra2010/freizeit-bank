<div>
    <h2 class="font-bold text-slate-800 text-xl mb-1">Kinder verwalten</h2>
    <p class="text-slate-400 text-sm mb-5">Lege neue Kinder an oder entferne bestehende Einträge.</p>

    <form wire:submit.prevent='submit' class="bg-slate-50 border border-slate-200 rounded-2xl p-4 mb-6">
        <label class="block text-sm font-medium text-slate-700 mb-2">Kind hinzufügen</label>
        <div class="flex space-x-2">
            <input type="text" wire:model='customer_field'
                class="flex-1 bg-white border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition"
                placeholder="Vor- und Nachname">
            <button type="submit"
                class="flex items-center space-x-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-5 py-3 rounded-xl transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Anlegen</span>
            </button>
        </div>
    </form>

    <div class="space-y-2">
        @forelse($customers as $customer)
            <div class="flex items-center justify-between bg-slate-50 border border-slate-100 rounded-xl px-4 py-3">
                <div class="flex items-center space-x-3">
                    <div class="w-9 h-9 bg-indigo-100 rounded-full flex items-center justify-center text-indigo-700 font-bold flex-shrink-0">
                        {{ mb_substr($customer->name, 0, 1) }}
                    </div>
                    <div>
                        <p class="font-medium text-slate-800">{{ $customer->name }}</p>
                        <p class="text-xs text-slate-400 font-mono">{{ $customer->amount() }}</p>
                    </div>
                </div>
                <button wire:click="delete({{ $customer->id }})"
                    class="flex items-center space-x-1 text-rose-500 hover:text-rose-700 hover:bg-rose-50 px-3 py-2 rounded-xl text-sm transition"
                    onclick="return confirm('Kind wirklich löschen?')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    <span>Löschen</span>
                </button>
            </div>
        @empty
            <div class="text-center py-10 text-slate-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto mb-3 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Noch keine Kinder angelegt.
            </div>
        @endforelse
    </div>
</div>
