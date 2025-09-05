<!DOCTYPE html>
<html lang="en">

<head>
    <x-meta  />
    @vite('resources/css/app.css')
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.18/index.global.min.js'></script>
</head>

<body>
    <header>
        <x-navbar />
    </header>

    <main class="overflow-x-hidden">
        @yield('content')
    </main>

    <x-footer />

    <x-flash-message />


    @vite('resources/js/app.js')

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
