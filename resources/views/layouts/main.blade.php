<!DOCTYPE html>
<html lang="en">

<head>
    <x-meta />
    @vite('resources/css/app.css')
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.18/index.global.min.js'></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

</head>

<body>
    <header>
        <x-navbar />
    </header>

    <main class="overflow-x-hidden">
        @yield('content')
    </main>

    <x-newsletter />

    <x-footer />

    <x-flash-message />

    <x-popup-ad />

    {{-- <a class="fixed left-0 top-30 translate-y-50 -rotate-90 my-5 w-fit group inline-block rounded-md bg-gradient-to-r from-[#71A129] to-[#588B22] p-[2px] hover:text-[#588B22] text-white focus:ring-3 focus:outline-hidden transition duration-300 mx-auto md:mx-0"
        id="donate-btn" href="{{ route('donation') }}">
        <span class="block rounded-full group-hover:bg-white px-8 py-3 text-sm font-medium bg-transparent">
            Donate Now
        </span>
    </a> --}}

    <a href="{{ route('donation') }}" class="fixed -left-[52px] top-30 translate-y-50 -rotate-90 flex items-center justify-center text-xl h-[40px] w-[140px] bg-gradient-to-r from-yellow-500 to-yellow-300 font-bold text-white uppercase rounded-b-xl z-40">
        Donation
    </a>

    @vite('resources/js/app.js')

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
