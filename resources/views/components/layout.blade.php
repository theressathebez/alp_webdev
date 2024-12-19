<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $layoutTitle }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body>
    <div class="flex flex-col min-h-screen font-sans antialiased bg-gradient-to-b from-sky-100 to-white text-text-color">

        <x-header></x-header>

        <main class="flex-1 px-5 py-12 text-center">
            <div>
                {{ $slot }}
            </div>
        </main>

        <x-footer></x-footer>
    </div>
</body>

</html>
