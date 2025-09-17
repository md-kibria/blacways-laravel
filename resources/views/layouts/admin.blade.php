<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Developer: Kibria (https://github.com/md-kibria) -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css.css">

    <link rel="stylesheet" href="https://icono-49d6.kxcdn.com/icono.min.css">

    <script src="/tinymce/tinymce.min.js"></script>

    <style>
        * {
            font-family: 'Outfit', sans-serif;
            outline: none;
            box-sizing: border-box;
        }

        body {
            overflow-x: hidden;
        }

        .container {
            max-width: 1270px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 20px;
            padding-right: 20px;
        }


        .hp {
            width: 40px;
            height: 40px;
        }

        .img {
            object-fit: cover;
            color: #333333bb;
        }


        .sig {
            height: 430px;
            background-image: linear-gradient(to bottom right, #8080D7, #AAD9D9);
        }

        @media screen and (min-width: 300px) {
            .container {
                padding-left: 5px;
                padding-right: 5px;
            }
        }

        @media screen and (min-width: 500px) {
            .container {
                padding-left: 7px;
                padding-right: 7px;
            }
        }

        #pagi .text-gray-700 {
            color: #64748b !important;
        }

        #pagi span .text-gray-700 {
            color: #374151 !important;
        }


        /* Loader */
        .loader {
            width: 8px;
            height: 40px;
            border-radius: 4px;
            display: block;
            margin: 20px auto;
            position: relative;
            background: currentColor;
            color: #FFF;
            box-sizing: border-box;
            animation: animloader 0.3s 0.3s linear infinite alternate;
        }

        .loader::after,
        .loader::before {
            content: '';
            width: 8px;
            height: 40px;
            border-radius: 4px;
            background: currentColor;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 20px;
            box-sizing: border-box;
            animation: animloader 0.3s 0.45s linear infinite alternate;
        }

        .loader::before {
            left: -20px;
            animation-delay: 0s;
        }

        @keyframes animloader {
            0% {
                height: 48px
            }

            100% {
                height: 4px
            }
        }

        /* Loader */


        .fre-item::before {
            content: '';
            height: 26px;
            width: 26px;
            background-color: #AAD9D9;
            display: block;
            border-radius: 50%;
            position: absolute;
            left: -16px;
            top: 5px;
        }

        .fre-item::after {
            content: '';
            height: 18px;
            width: 18px;
            background-color: #000;
            display: block;
            border-radius: 50%;
            position: absolute;
            left: -12px;
            top: 9px;
        }
    </style>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="/js/alpine.min.js"></script>
    @vite('resources/css/app.css')


    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        bgc: '#010922',
                        primary: '#8080D7',
                        sec: '#AAD9D9',
                        nav: '#12165A',
                        black: '#161A30'
                    }
                },
                screen: {
                    'xs': '400px'
                }
            }
        }
    </script>
</head>

<body class="bg-[#010922] text-white relative">

   <nav
        class="h-20 bg-transparent backdrop-blur-md right-0 left-0 top-0 z-50 sticky shadow-md">
        <div class="container h-full flex items-center justify-between px-5 sm:px-0">
            <a href="{{ route('admin.dashboard') }}" class="text-2xl h-full flex items-center">
                {{-- <img class="h-full" src="/logo2.png" alt=""> --}}
                <span class="">
                    <div class="flex items-center gap-1">
                        <ion-icon name="construct-outline"></ion-icon>
                        ADMIN
                    </div>
                </span>
            </a>

            <ul
                class="nav-items right-full flex gap-4 items-center justify-center lg:justify-end absolute md:static right-0 z-40 flex-col md:flex-row bg-transparent backdrop-blur-md md:bg-transparent top-20 w-96 h-60 md:h-auto">
                <li>
                    <a class="font-light hover:text-slate-300 text-xl" href="{{ route('home') }}" target="_blank">
                        <ion-icon name="home-outline"></ion-icon>
                        <p class="inline md:hidden">Home</p>
                    </a>
                </li>
                <li>
                    <a class="font-light hover:text-slate-300 text-xl" href="{{ route('admin.events.index') }}">
                        <ion-icon name="calendar-outline"></ion-icon>
                        <p class="inline md:hidden">Events</p>
                    </a>
                </li>
                <li>
                    <a class="font-light hover:text-slate-300 text-xl" href="{{ route('admin.news.index') }}">
                        <ion-icon name="newspaper-outline"></ion-icon>
                        <p class="inline md:hidden">News</p>
                    </a>
                </li>
                <li>
                    <a class="font-light hover:text-slate-300 text-xl" href="{{ route('admin.members') }}">
                        <ion-icon name="people-outline"></ion-icon>
                        <p class="inline md:hidden">Members</p>
                    </a>
                </li>
                <li class="relative group">
                    <a class="h-full" href="{{ route('admin.dashboard') }}">
                        <img class="h-10 w-10 rounded-full ring-1"
                            src="{{ Auth::user()->image ? asset('/storage/' . Auth::user()->image) : '/img/profile.png' }}"
                            alt="">
                    </a>
                    <div
                        class="hidden group-hover:block absolute right-0 top-10 bg-slate-500 text-slate-100 p-1 px-5 rounded-md">
                        <a class="block my-1 hover:text-slate-400" href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <a class="block my-1 hover:text-slate-400" href="{{ route('logout') }}">Logout</a>
                    </div>
                </li>
            </ul>
            <div class="flex gap-4 md:hidden">
                <p class="text-3xl md:hidden cursor-pointer" id="nav-menu"><ion-icon name="menu-outline"></ion-icon>
                </p>
            </div>

        </div>
    </nav>



    <div id="p"></div>

    <main class="container">

        <div class="grid grid-cols-1 lg:grid-cols-4 py-5 gap-3 min-h-screen">

            <div class="bg-slate-700 py-3 px-5 rounded-md absolute lg:static z-40  user-menu hidden lg:block">

                <p class="text-2xl absolute right-2 top-2 z-50 hover:text-red-500 user-menu-close">
                    <ion-icon name="close-circle-outline"></ion-icon>
                </p>

                <h2 class="text-2xl py-2 border-b border-slate-400 mb-4 pb-3">Welcome, {{ Auth::user()->profile['first_name'] }}!</h2>

                <ul>
                    <li>
                        <a class="block my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4 @if (Route::currentRouteName() == 'admin.dashboard') bg-slate-600 text-green-300 @endif"
                            href="{{ route('admin') }}">
                            <p class="text-2xl"><ion-icon class="my-auto block" name="grid-outline"></ion-icon></p>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a class="block my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4 @if (Route::currentRouteName() == 'admin.news.index') bg-slate-600 text-green-300 @endif"
                            href="{{ route('admin.news.index') }}">
                            <p class="text-2xl my-auto block"><ion-icon class="my-auto block"
                                    name="newspaper-outline"></ion-icon></p>
                            <p>News</p>
                        </a>
                    </li>
                    <li>
                        <a class="block my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4 @if (Route::currentRouteName() == 'admin.events.index') bg-slate-600 text-green-300 @endif"
                            href="{{ route('admin.events.index') }}">
                            <p class="text-2xl my-auto block"><ion-icon class="my-auto block"
                                    name="calendar-outline"></ion-icon></p>
                            <p>Events</p>
                        </a>
                    </li>
                    <li>
                        <a class="block my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4 @if (Route::currentRouteName() == 'admin.gallery.index') bg-slate-600 text-green-300 @endif"
                            href="{{ route('admin.gallery.index') }}">
                            <p class="text-2xl my-auto block"><ion-icon class="my-auto block"
                                    name="images-outline"></ion-icon></p>
                            <p>Photo Gallery</p>
                        </a>
                    </li>

                    <li>
                        <a class="block my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4 @if (Route::currentRouteName() == 'admin.home') bg-slate-600 text-green-300 @endif"
                            href="{{ route('admin.home') }}">
                            <p class="text-2xl"><ion-icon class="my-auto block" name="planet-outline"></ion-icon>
                            </p>
                            <p>Home Page</p>
                        </a>
                    </li>
                    <li x-data="{ open: false }" @click="open = !open" class="cursor-pointer">
                        <a class="my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4 @if (Route::currentRouteName() == 'admin.pages' || Route::currentRouteName() == 'admin.pages') bg-slate-600 text-green-300 @endif">
                            <p class="text-2xl"><ion-icon class="my-auto block" name="document-text-outline"></ion-icon></p>
                            <p>Other Pages</p>
                        </a>

                        <ul x-show="open" x-transition class="pl-4">
                            <li>
                                <a class="block my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4"
                                    href="{{ route('admin.about') }}">
                                    <p class="text-2xl"><ion-icon class="my-auto block"
                                            name="at-outline"></ion-icon></p>
                                    <p>About Page</p>
                                </a>
                            </li>
                            

                            <li>
                                <a class="my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4"
                                    href="{{ route('admin.pages', 'events') }}">
                                    <p class="text-2xl"><ion-icon class="my-auto block"
                                            name="at-outline"></ion-icon></p>
                                    <p>Events Page</p>
                                </a>
                            </li>
                            <li>
                                <a class="my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4"
                                    href="{{ route('admin.pages', 'news') }}">
                                    <p class="text-2xl"><ion-icon class="my-auto block"
                                            name="at-outline"></ion-icon></p>
                                    <p>News Page</p>
                                </a>
                            </li>
                            
                            <li>
                                <a class="my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4"
                                    href="{{ route('admin.pages', 'gallery') }}">
                                    <p class="text-2xl"><ion-icon class="my-auto block"
                                            name="at-outline"></ion-icon></p>
                                    <p>Gallery Page</p>
                                </a>
                            </li>
                            
                            <li>
                                <a class="my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4"
                                    href="{{ route('admin.pages', 'contact') }}">
                                    <p class="text-2xl"><ion-icon class="my-auto block"
                                            name="at-outline"></ion-icon></p>
                                    <p>Contact Page</p>
                                </a>
                            </li>
                            
                            <li>
                                <a class="my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4"
                                    href="{{ route('admin.pages', 'mission') }}">
                                    <p class="text-2xl"><ion-icon class="my-auto block"
                                            name="at-outline"></ion-icon></p>
                                    <p>Mission Page</p>
                                </a>
                            </li>
                            
                            <li>
                                <a class="my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4"
                                    href="{{ route('admin.pages', 'executives') }}">
                                    <p class="text-2xl"><ion-icon class="my-auto block"
                                            name="at-outline"></ion-icon></p>
                                    <p>Executives Page</p>
                                </a>
                            </li>
                            <li>
                                <a class="my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4"
                                    href="{{ route('admin.pages', 'council') }}">
                                    <p class="text-2xl"><ion-icon class="my-auto block"
                                            name="at-outline"></ion-icon></p>
                                    <p>Council Page</p>
                                </a>
                            </li>
                            
                            <li>
                                <a class="my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4"
                                    href="{{ route('admin.pages', 'features_1') }}">
                                    <p class="text-2xl"><ion-icon class="my-auto block"
                                            name="at-outline"></ion-icon></p>
                                    <p>Features_1</p>
                                </a>
                            </li>
                            
                            <li>
                                <a class="my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4"
                                    href="{{ route('admin.pages', 'features_2') }}">
                                    <p class="text-2xl"><ion-icon class="my-auto block"
                                            name="at-outline"></ion-icon></p>
                                    <p>Features_2</p>
                                </a>
                            </li>
                            
                            <li>
                                <a class="my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4"
                                    href="{{ route('admin.pages', 'features_3') }}">
                                    <p class="text-2xl"><ion-icon class="my-auto block"
                                            name="at-outline"></ion-icon></p>
                                    <p>Features_3</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a class="block my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4 @if (Route::currentRouteName() == 'admin.executives.index') bg-slate-600 text-green-300 @endif"
                            href="{{ route('admin.executives.index') }}">
                            <p class="text-2xl"><ion-icon class="my-auto block" name="ribbon-outline"></ion-icon>
                            </p>
                            <p>Executives</p>
                        </a>
                    </li>
                    <li>
                        <a class="block my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4 @if (Route::currentRouteName() == 'admin.council.index') bg-slate-600 text-green-300 @endif"
                            href="{{ route('admin.council.index') }}">
                            <p class="text-2xl"><ion-icon class="my-auto block" name="ribbon-outline"></ion-icon>
                            </p>
                            <p>Council of Elders</p>
                        </a>
                    </li>
                    <li>
                        <a class="block my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4 @if (Route::currentRouteName() == 'admin.members') bg-slate-600 text-green-300 @endif"
                            href="{{ route('admin.members') }}">
                            <p class="text-2xl"><ion-icon class="my-auto block" name="people-outline"></ion-icon>
                            </p>
                            <p>Members</p>
                        </a>
                    </li>
                    <li>
                        <a class="block my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4 @if (Route::currentRouteName() == 'admin.admins') bg-slate-600 text-green-300 @endif"
                            href="{{ route('admin.admins') }}">
                            <p class="text-2xl"><ion-icon class="my-auto block" name="construct-outline"></ion-icon>
                            </p>
                            <p>Admins</p>
                        </a>
                    </li>
                    <li>
                        <a class="block my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4 @if (Route::currentRouteName() == 'admin.newsletters') bg-slate-600 text-green-300 @endif"
                            href="{{ route('admin.newsletters') }}">
                            <p class="text-2xl"><ion-icon class="my-auto block" name="ribbon-outline"></ion-icon>
                            </p>
                            <p>Newsletter</p>
                        </a>
                    </li>
                    <li>
                        <a class="block my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4 @if (Route::currentRouteName() == 'admin.donations') bg-slate-600 text-green-300 @endif"
                            href="{{ route('admin.donations') }}">
                            <p class="text-2xl"><ion-icon class="my-auto block" name="cash-outline"></ion-icon>
                            </p>
                            <p>Donations</p>
                        </a>
                    </li>
                    <li>
                        <a class="block my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4 @if (Route::currentRouteName() == 'admin.messages') bg-slate-600 text-green-300 @endif"
                            href="{{ route('admin.messages') }}">
                            <p class="text-2xl"><ion-icon class="my-auto block" name="mail-unread-outline"></ion-icon>
                            </p>
                            <p>Messages</p>
                        </a>
                    </li>
                    <li>
                        <a class="block my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4 @if (Route::currentRouteName() == 'admin.profile') bg-slate-600 text-green-300 @endif"
                            href="{{ route('admin.profile') }}">
                            <p class="text-2xl"><ion-icon class="my-auto block" name="person-outline"></ion-icon>
                            </p>
                            <p>Profile</p>
                        </a>
                    </li>
                    <li>
                        <a class="block my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4 @if (Route::currentRouteName() == 'admin.profile.password') bg-slate-600 text-green-300 @endif"
                            href="{{ route('admin.profile.password') }}">
                            <p class="text-2xl"><ion-icon class="my-auto block"
                                    name="lock-closed-outline"></ion-icon></p>
                            <p>Password</p>
                        </a>
                    </li>
                    <li>
                        <a class="block my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4 text-blue-300 @if (Route::currentRouteName() == 'admin.settings') bg-slate-600 text-green-300 @endif"
                            href="{{ route('admin.settings') }}">
                            <p class="text-2xl my-auto block"><ion-icon class="my-auto block"
                                    name="settings-outline"></ion-icon></p>
                            <p>Settings</p>
                            <div class="grow h-full">
                                <div class="bg-blue-300 h-2 w-2 rounded block ml-auto my-auto"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="block my-1 py-2 hover:bg-slate-500 rounded-md p-2 flex items-center gap-4 @if (Route::currentRouteName() == 'logout') bg-slate-600 text-green-300 @endif"
                            href="{{ route('logout') }}">
                            <p class="text-2xl"><ion-icon class="my-auto block"
                                    name="arrow-back-circle-outline"></ion-icon></p>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>

            </div>
            <div class="bg-[#161A30] py-4 px-5 rounded-md col-span-3">
                {{-- <div class="flex"> --}}
                <p class="text-3xl lg:hidden user-menu-btn"><ion-icon name="menu-outline"></ion-icon></p>
                {{-- </div> --}}
                <h1 class="text-3xl border-b border-slate-400 pb-3 mt-2">@yield('header')</h1>

                @yield('content')

            </div>
        </div>


        {{-- <x-flash-message/> --}}
    </main>



    <footer class="container mx-auto mt-24 mb-10 px-0 sm:px-24 lg:px-28">

        <p class="text-left">&copy; {{ date('Y') }} All rights reserved.</p>
    </footer>

    <x-flash-message />

    <script src="/js/main.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
