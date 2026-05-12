<!doctype html>
<html lang="de">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Bank of Freetime &mdash; Private Leisure Banking</title>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @livewireStyles
    </head>
    <body class="bg-slate-100 min-h-screen font-sans">
        <div class="min-h-screen flex flex-col">

            {{-- Info-Leiste --}}
            <div class="bg-slate-950 text-slate-400 text-xs py-1.5 hidden sm:block">
                <div class="container mx-auto max-w-4xl px-4 flex justify-between">
                    <span class="tracking-wide">Sicher &bull; Zuverlässig &bull; Für Abenteurer</span>
                    <span class="font-mono">{{ now()->format('d.m.Y') }}</span>
                </div>
            </div>

            {{-- Header --}}
            <header class="bg-slate-900 shadow-2xl border-b-2 border-amber-500">
                <div class="container mx-auto max-w-4xl px-4 py-5 flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="27" cy="27" r="27" fill="#B8963E"/>
                            <circle cx="27" cy="27" r="24" fill="#0f172a"/>
                            <polygon points="10,25 27,10 44,25" fill="#B8963E"/>
                            <rect x="13" y="25" width="4" height="15" rx="0.5" fill="#B8963E"/>
                            <rect x="21" y="25" width="4" height="15" rx="0.5" fill="#B8963E"/>
                            <rect x="29" y="25" width="4" height="15" rx="0.5" fill="#B8963E"/>
                            <rect x="37" y="25" width="4" height="15" rx="0.5" fill="#B8963E"/>
                            <rect x="10" y="40" width="34" height="3" rx="1" fill="#B8963E"/>
                            <rect x="8"  y="43" width="38" height="3" rx="1" fill="#B8963E"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="font-display text-white text-2xl tracking-wide leading-none">
                            Bank <span class="text-amber-400">of</span> Freetime
                        </h1>
                        <p class="text-slate-400 text-xs mt-1 tracking-widest uppercase">Private Leisure Banking</p>
                    </div>
                    <div class="ml-auto hidden sm:flex items-center space-x-1 text-slate-500 text-xs border border-slate-700 rounded-lg px-3 py-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <span>Gesicherte Verbindung</span>
                    </div>
                </div>
            </header>

            {{-- Main --}}
            <main class="flex-1 container mx-auto max-w-4xl px-4 py-8">
                @livewire("base.base")
            </main>

            {{-- Footer --}}
            <footer class="bg-slate-900 border-t border-slate-800 mt-8">
                <div class="container mx-auto max-w-4xl px-4 py-5">
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-3">
                        <div class="flex items-center space-x-2">
                            <svg width="18" height="18" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                            <span class="text-slate-400 text-xs font-medium">Bank of Freetime</span>
                        </div>
                        <span class="text-slate-600 text-xs text-center">
                            Guthaben sind ausschließlich innerhalb der Freizeit gültig &bull; &copy; {{ now()->year }}
                        </span>
                    </div>
                </div>
            </footer>

        </div>
        @livewireScripts
    </body>
</html>
