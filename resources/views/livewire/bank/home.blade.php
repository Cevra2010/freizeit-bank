<div>
    @if($customer)
        @if(!$groups->count())
            @if(auth()->user()->admin)
                <div class="text-center py-16">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-amber-100 rounded-full mb-4 border-2 border-amber-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <p class="text-slate-600 font-medium mb-4">Bitte zunächst mindestens eine Buchungskategorie anlegen.</p>
                    <a href="#" wire:click='$emit("menu_clicked","groups")'
                        class="inline-flex items-center space-x-2 bg-slate-900 hover:bg-slate-800 text-amber-400 font-semibold px-6 py-3 rounded-lg transition border border-slate-700 uppercase text-sm tracking-wide">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span>Jetzt anlegen</span>
                    </a>
                </div>
            @else
                <div class="text-center py-16 text-slate-500">Keine Buchungskategorien hinterlegt.</div>
            @endif
        @else
            {{-- Kontoinhaber-Header --}}
            <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-100">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-slate-900 rounded-full flex items-center justify-center text-amber-400 font-bold text-xl border-2 border-amber-400 shadow">
                        {{ mb_substr($customer->name, 0, 1) }}
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Kontoinhaber</p>
                        <h1 class="font-bold text-slate-900 text-xl leading-tight">{{ $customer->name }}</h1>
                    </div>
                </div>
                <button wire:click="resetCustomer"
                    class="flex items-center space-x-1.5 text-slate-500 hover:text-slate-800 bg-slate-100 hover:bg-slate-200 px-3 py-2 rounded-lg text-sm transition font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span>Zurück</span>
                </button>
            </div>

            {{-- Kontostand-Karte --}}
            <div class="bg-slate-900 rounded-xl p-6 mb-6 shadow-lg relative overflow-hidden border border-slate-700">
                {{-- Dekoratives Muster --}}
                <div class="absolute right-0 top-0 opacity-5">
                    <svg width="160" height="160" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="27" cy="27" r="27" fill="white"/>
                        <polygon points="10,25 27,10 44,25" fill="#B8963E"/>
                        <rect x="13" y="25" width="4" height="15" fill="#B8963E"/>
                        <rect x="21" y="25" width="4" height="15" fill="#B8963E"/>
                        <rect x="29" y="25" width="4" height="15" fill="#B8963E"/>
                        <rect x="37" y="25" width="4" height="15" fill="#B8963E"/>
                    </svg>
                </div>
                <p class="text-slate-400 text-xs uppercase tracking-widest mb-1 font-semibold">Verfügbares Guthaben</p>
                <p class="text-4xl font-bold font-mono text-amber-400 tracking-tight">{{ $customer->amount() }}</p>
                <p class="text-slate-500 text-xs mt-3">Bank of Freetime &bull; Freizeitkonto</p>
            </div>

            {{-- Transaktion --}}
            <div class="bg-slate-50 rounded-xl border border-slate-200 p-4 mb-6">
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-3">Neue Transaktion</p>
                <div class="flex space-x-3 mb-3">
                    <div class="flex-1">
                        <label class="block text-xs text-slate-500 mb-1 font-medium">Betrag (€)</label>
                        <input type="text" wire:model='amount'
                            class="w-full bg-white border border-slate-300 rounded-lg px-4 py-3 text-xl font-mono text-slate-900 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition"
                            placeholder="0,00" autofocus inputmode="decimal">
                    </div>
                    <div class="flex-1">
                        <label class="block text-xs text-slate-500 mb-1 font-medium">Kategorie</label>
                        <select wire:model="type"
                            class="w-full bg-white border border-slate-300 rounded-lg px-4 py-3 text-slate-900 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition h-[52px]">
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex space-x-3">
                    <button wire:click="sub"
                        class="flex-1 flex items-center justify-center space-x-2 bg-red-700 hover:bg-red-800 active:bg-red-900 text-white font-bold py-4 rounded-lg text-base transition shadow-sm uppercase tracking-wide border border-red-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M20 12H4" />
                        </svg>
                        <span>Belastung</span>
                    </button>
                    <button wire:click="add"
                        class="flex-1 flex items-center justify-center space-x-2 bg-emerald-700 hover:bg-emerald-800 active:bg-emerald-900 text-white font-bold py-4 rounded-lg text-base transition shadow-sm uppercase tracking-wide border border-emerald-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                        </svg>
                        <span>Einzahlung</span>
                    </button>
                </div>
            </div>

            {{-- Kontoauszug --}}
            <div>
                <div class="flex items-center space-x-2 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Kontoauszug</p>
                </div>

                <div class="rounded-xl border border-slate-200 overflow-hidden">
                    {{-- Tabellen-Header --}}
                    <div class="bg-slate-900 grid grid-cols-3 px-4 py-2 text-xs font-semibold text-slate-400 uppercase tracking-wider">
                        <span>Kategorie</span>
                        <span>Ausgeführt von</span>
                        <span class="text-right">Betrag</span>
                    </div>
                    @forelse($customer->transactions()->latest()->get() as $transaction)
                        <div class="grid grid-cols-3 px-4 py-3 border-t border-slate-100 items-center @if($loop->even) bg-slate-50 @else bg-white @endif">
                            <div class="flex items-center space-x-2">
                                <div class="w-6 h-6 rounded-full flex items-center justify-center flex-shrink-0
                                    @if($transaction->direction == 'add') bg-emerald-100 text-emerald-700 @else bg-red-100 text-red-700 @endif">
                                    @if($transaction->direction == 'add')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/></svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M20 12H4"/></svg>
                                    @endif
                                </div>
                                <span class="text-sm text-slate-700 font-medium">
                                    @if(!$transaction->group()->count()) <span class="text-slate-400 italic">gelöscht</span> @else {{ $transaction->group->name }} @endif
                                </span>
                            </div>
                            <span class="text-xs text-slate-500">
                                @if(!$transaction->user()->count()) — @else {{ $transaction->user->name }} @endif
                            </span>
                            <span class="text-right font-mono font-bold text-sm @if($transaction->direction == 'add') text-emerald-700 @else text-red-700 @endif">
                                @if($transaction->direction == 'add') + @else &minus; @endif{{ $transaction->amount() }}
                            </span>
                        </div>
                    @empty
                        <div class="py-10 text-center text-slate-400 text-sm bg-white">
                            Keine Buchungen vorhanden.
                        </div>
                    @endforelse
                </div>
            </div>
        @endif

    @else
        {{-- Kontosuche --}}
        <div>
            <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Bank of Freetime</p>
            <h2 class="font-bold text-slate-900 text-2xl mb-1">Konto aufrufen</h2>
            <p class="text-slate-500 text-sm mb-6">Name des Kontoinhabers eingeben, um fortzufahren.</p>

            <div class="relative">
                <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" wire:model='search'
                    class="w-full bg-slate-50 border border-slate-300 rounded-lg pl-12 pr-4 py-4 text-lg text-slate-900 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition font-medium"
                    placeholder="Kontoinhaber suchen …" autofocus>
            </div>

            @if($search)
                <div class="mt-2 bg-white border border-slate-200 rounded-xl shadow-lg overflow-hidden">
                    @forelse ($searchResult as $result)
                        <a href="#" wire:click="selectCustomer({{ $result->id }})"
                            class="flex items-center justify-between px-5 py-4 hover:bg-amber-50 transition border-b border-slate-100 last:border-0 group">
                            <div class="flex items-center space-x-3">
                                <div class="w-9 h-9 bg-slate-900 rounded-full flex items-center justify-center text-amber-400 font-bold border border-slate-700 group-hover:border-amber-400 transition">
                                    {{ mb_substr($result->name, 0, 1) }}
                                </div>
                                <span class="font-semibold text-slate-800">{{ $result->name }}</span>
                            </div>
                            <span class="font-mono text-slate-600 font-semibold">{{ $result->amount() }}</span>
                        </a>
                    @empty
                        <div class="px-5 py-8 text-center text-slate-400 text-sm">
                            Kein Konto gefunden.
                        </div>
                    @endforelse
                </div>
            @endif
        </div>
    @endif
</div>
