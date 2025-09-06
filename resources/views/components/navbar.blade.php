<nav class="fixed top-0 left-0 w-full bg-green-300 backdrop-blur-md z-50 flex items-center justify-between px-6 md:px-10 shadow h-20">
    {{-- bg-[#adf802] --}}
    {{-- Logo --}}
    <a href="{{ route('home') }}">
        @if ($logo)
            <img src="{{ $logo }}" alt="" class="h-[60px] w-auto">
        @else
            <h1 class="text-2xl font-bold text-slate-600">Logo</h1>
        @endif
    </a>

    {{-- Hamburger Button (Mobile) --}}
    <button id="menu-toggle" class="md:hidden text-slate-600 focus:outline-none cursor-pointer">
        <span class="menu">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </span>
        <span class="close hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </span>
    </button>

    {{-- Nav Links --}}
    <ul id="menu"
        class="hidden md:flex flex-col md:flex-row md:items-center md:space-y-0 md:space-x-6 text-slate-600 absolute md:static top-full right-0 w-full max-w-[300px] md:max-w-full md:w-auto bg-white backdrop-blur-md md:backdrop-blur-none md:bg-transparent shadow-md md:shadow-none px-6 md:px-0 py-6 md:py-0 transition-all duration-300 h-screen md:h-auto">
        <li class="text-left md:text-center border-b md:border-0 border-slate-600 py-3 px-1 md:px-0 md:py-0"><a class="text-slate-700 text-lg hover:text-slate-600"
                href="{{ route('home') }}">Home</a></li>
        <li class="text-left md:text-center border-b md:border-0 border-slate-600 py-3 px-1 md:px-0 md:py-0"><a class="text-slate-700 text-lg hover:text-slate-600"
                href="{{ route('about') }}">About</a></li>
        <li class="text-left md:text-center border-b md:border-0 border-slate-600 py-3 px-1 md:px-0 md:py-0"><a class="text-slate-700 text-lg hover:text-slate-600"
                href="{{ route('news') }}">News</a></li>
        <li class="text-left md:text-center border-b md:border-0 border-slate-600 py-3 px-1 md:px-0 md:py-0"><a class="text-slate-700 text-lg hover:text-slate-600"
                href="{{ route('events') }}">Events</a></li>
        <li class="text-left md:text-center border-b md:border-0 border-slate-600 py-3 px-1 md:px-0 md:py-0"><a class="text-slate-700 text-lg hover:text-slate-600"
                href="{{ route('gallery') }}">Gallery</a></li>
        <li class="text-left md:text-center border-b md:border-0 border-slate-600 py-3 px-1 md:px-0 md:py-0"><a class="text-slate-700 text-lg hover:text-slate-600"
                href="{{ route('contact') }}">Contact</a></li>
        @auth
            <li class="text-left md:text-center border-b md:border-0 border-slate-600 py-3 px-1 md:px-0 md:py-0"><a class="text-slate-700 text-lg hover:text-slate-600"
                    href="{{ route('forum') }}">Forum</a></li>
        @endauth
        @guest
            <li class="text-left md:text-center border-b md:border-0 border-slate-600 py-3 px-1 md:px-0 md:py-0">
                <a class="text-[#FD6584] md:text-white text-lg py-2 md:px-4 md:bg-[#FD6584] md:hover:bg-red-300 rounded-full cursor-pointer"
                    href="{{ route('login') }}">Login</a>
            </li>
        @endguest
        @auth
            <li class="text-left md:text-center border-b md:border-0 border-slate-600 py-3 px-1 md:px-0 md:py-0">
                <a class="text-[#FD6584] md:text-white text-lg py-2 md:px-4 md:bg-[#FD6584] md:hover:bg-red-300 rounded-full cursor-pointer"
                    href="{{ route('profile') }}">Profile</a>
            </li>
        @endauth
    </ul>
</nav>

<div class="h-20"></div>

{{-- Script to toggle menu --}}
<script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
        document.getElementById('menu').classList.toggle('hidden');
        document.getElementsByClassName('menu')[0].classList.toggle('hidden');
        document.getElementsByClassName('close')[0].classList.toggle('hidden');
    });
</script>
