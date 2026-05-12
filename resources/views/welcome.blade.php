<!doctype html>
<html lang="de">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Freizeit Bank</title>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @livewireStyles
    </head>
    <body class="bg-slate-100 min-h-screen">
        <div class="min-h-screen flex flex-col">
            <header class="bg-gradient-to-r from-indigo-700 to-violet-700 shadow-lg">
                <div class="container mx-auto max-w-3xl px-4 py-4 flex items-center space-x-3">
                    <div class="bg-white bg-opacity-20 rounded-xl p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-white font-bold text-xl tracking-tight">Freizeit Bank</h1>
                        <p class="text-indigo-200 text-xs">Kassen&shy;verwaltung</p>
                    </div>
                </div>
            </header>

            <main class="flex-1 container mx-auto max-w-3xl px-4 py-6">
                @livewire("base.base")
            </main>

            <footer class="text-center py-4 text-slate-400 text-xs">
                Freizeit Bank &mdash; Kassenverwaltung für Kinder- und Jugendfreizeiten
            </footer>
        </div>
        @livewireScripts
    </body>
</html>
