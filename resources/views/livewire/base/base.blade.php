<div>
    @if($auth)
        {{-- Navigation --}}
        <nav class="bg-slate-800 rounded-xl shadow-lg mb-6 overflow-hidden border border-slate-700">
            <div class="flex overflow-x-auto">
                <a class="bof-nav @if($show == 'home') bof-nav-active @endif"
                   href="#" wire:click='$emit("menu_clicked","home")'>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                    <span>Buchungen</span>
                </a>

                @if(auth()->user()->admin)
                <a class="bof-nav @if($show == 'groups') bof-nav-active @endif"
                   href="#" wire:click='$emit("menu_clicked","groups")'>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                    <span>Kategorien</span>
                </a>
                <a class="bof-nav @if($show == 'customer') bof-nav-active @endif"
                   href="#" wire:click='$emit("menu_clicked","customer")'>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>Konten</span>
                </a>
                <a class="bof-nav @if($show == 'user') bof-nav-active @endif"
                   href="#" wire:click='$emit("menu_clicked","user")'>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16" />
                    </svg>
                    <span>Mitarbeiter</span>
                </a>
                @endif

                <a class="bof-nav ml-auto border-l border-slate-700 text-slate-400 hover:bg-slate-700 hover:text-rose-400"
                   href="#" wire:click='$emit("menu_clicked","logout")'>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span>Abmelden</span>
                </a>
            </div>
        </nav>

        {{-- Content Card --}}
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
            @switch($show)
                @case("home")
                    @livewire("bank.home")
                    @break
                @case("user")
                    @livewire("user.home")
                    @break
                @case("customer")
                    @livewire("customer.home")
                    @break
                @case("groups")
                    @livewire("groups.home")
                    @break
                @default
                    <p class="text-slate-400">Seite nicht gefunden</p>
                    @break
            @endswitch
        </div>
    @else
        @livewire("auth.auth-page")
    @endif
</div>
