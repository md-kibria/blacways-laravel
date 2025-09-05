<nav class="fixed top-0 left-0 w-full backdrop-blur-md z-50 flex items-center justify-between px-6 md:px-10 py-7 shadow">
    {{-- Logo --}}
    <a href="{{ route('home') }}">
        @if ($logo)
            <img src="{{ $logo }}" alt="" class="h-[50px] w-auto">
        @else
            <h1 class="text-2xl font-bold text-slate-600">Logo</h1>
        @endif
    </a>

    {{-- Hamburger Button (Mobile) --}}
    <button id="menu-toggle" class="md:hidden text-slate-600 focus:outline-none cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    {{-- Nav Links --}}
    <ul id="menu"
        class="hidden md:flex flex-col md:flex-row md:items-center space-y-4 md:space-y-0 md:space-x-6 text-slate-600 absolute md:static top-full left-0 w-full md:w-auto backdrop-blur-md md:backdrop-blur-none md:bg-transparent shadow-md md:shadow-none px-6 md:px-0 py-10 md:py-0">
        <li class="text-center"><a class="text-slate-700 text-lg hover:text-slate-600"
                href="{{ route('home') }}">Home</a></li>
        <li class="text-center"><a class="text-slate-700 text-lg hover:text-slate-600"
                href="{{ route('about') }}">About</a></li>
        <li class="text-center"><a class="text-slate-700 text-lg hover:text-slate-600"
                href="{{ route('news') }}">News</a></li>
        <li class="text-center"><a class="text-slate-700 text-lg hover:text-slate-600"
                href="{{ route('events') }}">Events</a></li>
        <li class="text-center"><a class="text-slate-700 text-lg hover:text-slate-600"
                href="{{ route('gallery') }}">Gallery</a></li>
        <li class="text-center"><a class="text-slate-700 text-lg hover:text-slate-600"
                href="{{ route('contact') }}">Contact</a></li>
        @auth
            <li class="text-center"><a class="text-slate-700 text-lg hover:text-slate-600"
                    href="{{ route('forum') }}">Forum</a></li>
        @endauth
        @guest
            <li class="text-center">
                <a class="text-white text-lg py-2 px-4 bg-[#FD6584] hover:bg-red-300 rounded-full cursor-pointer"
                    href="{{ route('login') }}">Login</a>
            </li>
        @endguest
        @auth
            <li class="text-center">
                <a class="text-white text-lg py-2 px-4 bg-[#FD6584] hover:bg-red-300 rounded-full cursor-pointer"
                    href="{{ route('profile') }}">Profile</a>
            </li>
        @endauth
    </ul>
</nav>

{{-- Script to toggle menu --}}
<script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
        document.getElementById('menu').classList.toggle('hidden');
    });
</script>
