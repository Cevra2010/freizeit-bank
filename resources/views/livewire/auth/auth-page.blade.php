<div>
    <div class="max-w-sm mx-auto">

        {{-- Bank-Login-Header --}}
        <div class="bg-slate-900 rounded-xl p-6 mb-0 border border-slate-700 border-b-0 rounded-b-none">
            <div class="flex items-center space-x-3 mb-4">
                <svg width="36" height="36" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="27" cy="27" r="27" fill="#B8963E"/>
                    <circle cx="27" cy="27" r="24" fill="#0f172a"/>
                    <polygon points="10,25 27,10 44,25" fill="#B8963E"/>
                    <rect x="13" y="25" width="4" height="15" fill="#B8963E"/>
                    <rect x="21" y="25" width="4" height="15" fill="#B8963E"/>
                    <rect x="29" y="25" width="4" height="15" fill="#B8963E"/>
                    <rect x="37" y="25" width="4" height="15" fill="#B8963E"/>
                    <rect x="10" y="40" width="34" height="3" rx="1" fill="#B8963E"/>
                    <rect x="8"  y="43" width="38" height="3" rx="1" fill="#B8963E"/>
                </svg>
                <div>
                    <p class="text-amber-400 font-display text-lg leading-none">Bank of Freetime</p>
                    <p class="text-slate-500 text-xs tracking-widest uppercase">Online Banking</p>
                </div>
            </div>
            <h2 class="text-white font-semibold text-lg">Mitarbeiter-Login</h2>
            <p class="text-slate-400 text-sm mt-0.5">Bitte mit deinen Zugangsdaten anmelden.</p>
        </div>

        {{-- Formular --}}
        <div class="bg-white rounded-b-xl border border-slate-200 p-6 shadow-lg">

            @if(session()->has("auth_error"))
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 rounded-lg p-3 mb-5 flex items-center space-x-2 text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session()->get("auth_error") }}</span>
            </div>
            @endif

            <form wire:submit.prevent='submit' class="space-y-4">
                <div>
                    <label for="username" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">Benutzername</label>
                    <input type="text" wire:model='username' id="username"
                        class="w-full bg-slate-50 border border-slate-300 rounded-lg px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition font-mono"
                        placeholder="benutzername" autocomplete="username">
                </div>
                <div>
                    <label for="password" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">Passwort</label>
                    <input type="password" wire:model='password' id="password"
                        class="w-full bg-slate-50 border border-slate-300 rounded-lg px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition font-mono"
                        placeholder="••••••••" autocomplete="current-password">
                </div>
                <button type="submit"
                    class="w-full bg-slate-900 hover:bg-slate-800 active:bg-slate-950 text-amber-400 font-bold py-3.5 rounded-lg transition shadow-sm tracking-wide uppercase text-sm mt-2 border border-slate-700">
                    Anmelden
                </button>
            </form>

            <div class="mt-5 pt-4 border-t border-slate-100 flex items-center justify-center space-x-1 text-slate-400 text-xs">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
                <span>Verschlüsselte Verbindung &bull; Bank of Freetime</span>
            </div>
        </div>

    </div>
</div>
