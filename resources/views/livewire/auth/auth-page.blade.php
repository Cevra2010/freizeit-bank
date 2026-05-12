<div class="flex items-center justify-center py-6">
    <div class="w-full max-w-sm">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-indigo-100 rounded-2xl mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-slate-800">Willkommen!</h2>
            <p class="text-slate-500 mt-1 text-sm">Bitte melde dich an, um fortzufahren.</p>
        </div>

        @if(session()->has("auth_error"))
        <div class="bg-rose-50 border border-rose-200 text-rose-700 rounded-xl p-3 mb-5 flex items-center space-x-2 text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session()->get("auth_error") }}</span>
        </div>
        @endif

        <form wire:submit.prevent='submit' class="space-y-4">
            <div>
                <label for="username" class="block text-sm font-medium text-slate-700 mb-1">Benutzername</label>
                <input type="text" wire:model='username' id="username"
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition"
                    placeholder="Benutzername eingeben" autocomplete="username">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-slate-700 mb-1">Passwort</label>
                <input type="password" wire:model='password' id="password"
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition"
                    placeholder="Passwort eingeben" autocomplete="current-password">
            </div>
            <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white font-semibold py-3 rounded-xl transition shadow-sm mt-2">
                Anmelden
            </button>
        </form>
    </div>
</div>
