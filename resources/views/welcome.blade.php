<!doctype html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @livewireStyles
    </head>
    <body class="bg-gray-200">
        <div class="container mx-auto max-w-2xl">
            @livewire("base.base")
        </div>
        @livewireScripts
    </body>
</html>
