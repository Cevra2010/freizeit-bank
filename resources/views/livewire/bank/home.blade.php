<div>
    @if($customer)
        @if(!$groups->count())
            @if(auth()->user()->admin)
                <div class="text-center py-16">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-amber-100 rounded-2xl mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <p class="text-slate-600 font-medium mb-4">Lege zuerst mindestens einen Verwendungszweck an!</p>
                    <a href="#" wire:click='$emit("menu_clicked","groups")'
                        class="inline-flex items-center space-x-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-3 rounded-xl transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span>Jetzt anlegen</span>
                    </a>
                </div>
            @else
                <div class="text-center py-16 text-slate-500">
                    Es sind noch keine Verwendungszwecke hinterlegt.
                </div>
            @endif
        @else
            {{-- Kundenheader --}}
            <div class="flex items-center justify-between mb-5">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center text-indigo-700 font-bold text-lg">
                        {{ mb_substr($customer->name, 0, 1) }}
                    </div>
                    <div>
                        <h1 class="font-bold text-slate-800 text-lg leading-tight">{{ $customer->name }}</h1>
                        <span class="text-slate-400 text-xs">Guthaben</span>
                    </div>
                </div>
                <button wire:click="resetCustomer"
                    class="flex items-center space-x-1 text-slate-500 hover:text-slate-700 bg-slate-100 hover:bg-slate-200 px-3 py-2 rounded-xl text-sm transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span>Zurück</span>
                </button>
            </div>

            {{-- Kontostand --}}
            <div class="bg-gradient-to-br from-indigo-600 to-violet-600 rounded-2xl p-5 mb-5 text-white shadow-md">
                <p class="text-indigo-200 text-sm mb-1">Aktuelles Guthaben</p>
                <p class="text-4xl font-bold font-mono tracking-tight">{{ $customer->amount() }}</p>
            </div>

            {{-- Eingabe --}}
            <div class="space-y-3 mb-5">
                <div class="flex space-x-3">
                    <div class="flex-1">
                        <label class="block text-xs font-medium text-slate-500 mb-1">Betrag (€)</label>
                        <input type="text" wire:model='amount'
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-xl font-mono text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition"
                            placeholder="0,00" autofocus inputmode="decimal">
                    </div>
                    <div class="flex-1">
                        <label class="block text-xs font-medium text-slate-500 mb-1">Verwendungszweck</label>
                        <select wire:model="type"
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition h-[52px]">
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Buttons --}}
                <div class="flex space-x-3">
                    <button wire:click="sub"
                        class="flex-1 flex items-center justify-center space-x-2 bg-rose-500 hover:bg-rose-600 active:bg-rose-700 text-white font-bold py-4 rounded-2xl text-lg transition shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M20 12H4" />
                        </svg>
                        <span>Abbuchen</span>
                    </button>
                    <button wire:click="add"
                        class="flex-1 flex items-center justify-center space-x-2 bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700 text-white font-bold py-4 rounded-2xl text-lg transition shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4" />
                        </svg>
                        <span>Einzahlen</span>
                    </button>
                </div>
            </div>

            {{-- Transaktionen --}}
            <div>
                <h2 class="font-semibold text-slate-700 text-sm mb-3 flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <span>Buchungshistorie</span>
                </h2>
                <div class="space-y-2">
                    @forelse($customer->transactions()->latest()->get() as $transaction)
                        <div class="flex items-center justify-between bg-slate-50 rounded-xl px-4 py-3 border border-slate-100">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0
                                    @if($transaction->direction == 'add') bg-emerald-100 text-emerald-600 @else bg-rose-100 text-rose-600 @endif">
                                    @if($transaction->direction == 'add')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                        </svg>
                                    @endif
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-slate-700">
                                        @if(!$transaction->group()->count()) <span class="text-slate-400">Zweck gelöscht</span> @else {{ $transaction->group->name }} @endif
                                    </p>
                                    <p class="text-xs text-slate-400">
                                        @if(!$transaction->user()->count()) Benutzer gelöscht @else {{ $transaction->user->name }} @endif
                                    </p>
                                </div>
                            </div>
                            <div class="font-bold font-mono @if($transaction->direction == 'add') text-emerald-600 @else text-rose-600 @endif">
                                @if($transaction->direction == 'add') + @else - @endif{{ $transaction->amount() }}
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-slate-400 text-sm py-6">Noch keine Buchungen vorhanden.</p>
                    @endforelse
                </div>
            </div>
        @endif
    @else
        {{-- Kindersuche --}}
        <div>
            <h2 class="font-bold text-slate-800 text-xl mb-1">Buchung durchführen</h2>
            <p class="text-slate-400 text-sm mb-4">Suche ein Kind, um eine Buchung vorzunehmen.</p>

            <div class="relative">
                <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" wire:model='search'
                    class="w-full bg-slate-50 border border-slate-200 rounded-2xl pl-12 pr-4 py-4 text-lg text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition"
                    placeholder="Kind suchen..." autofocus>
            </div>

            @if($search)
                <div class="mt-2 bg-white border border-slate-200 rounded-2xl shadow-lg overflow-hidden">
                    @forelse ($searchResult as $result)
                        <a href="#" wire:click="selectCustomer({{ $result->id }})"
                            class="flex items-center justify-between px-5 py-4 hover:bg-indigo-50 transition border-b border-slate-100 last:border-0">
                            <div class="flex items-center space-x-3">
                                <div class="w-9 h-9 bg-indigo-100 rounded-full flex items-center justify-center text-indigo-700 font-bold">
                                    {{ mb_substr($result->name, 0, 1) }}
                                </div>
                                <span class="font-medium text-slate-800">{{ $result->name }}</span>
                            </div>
                            <span class="font-mono text-slate-600 font-semibold">{{ $result->amount() }}</span>
                        </a>
                    @empty
                        <div class="px-5 py-6 text-center text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto mb-2 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Kein Kind gefunden.
                        </div>
                    @endforelse
                </div>
            @endif
        </div>
    @endif
</div>
