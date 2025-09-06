<!-- Footer Section -->
<footer class="bg-gray-700">
    <div class="mx-auto max-w-screen-xl space-y-8 px-4 py-16 sm:px-6 lg:space-y-16 lg:px-8">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
            <div>
                <a href="{{ route('home') }}">
                    @if ($info->logo)
                        <img src="{{ asset('/storage/' . $info->logo) }}" alt="" class="h-[50px] w-auto">
                    @else
                        <h1 class="text-2xl font-bold text-slate-100">Logo</h1>
                    @endif
                </a>

                <p class="mt-4 max-w-xs text-gray-300">
                    {{ $info->description }}
                </p>

                <ul class="mt-8 flex gap-6 h-20">
                    @foreach ($media as $link)
                        @if ($link->url)
                            <a href="{{ $link->url }}" class="text-3xl hover:text-4xl text-white" target="_blank" rel="noopener noreferrer">
                                <ion-icon name="logo-{{ $link->name }}"></ion-icon>
                            </a>
                        @endif
                    @endforeach
                </ul>
            </div>

            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:col-span-2 lg:grid-cols-4">
                <div>
                    <p class="text-xl font-medium text-gray-100">Content</p>

                    <ul class="mt-6 space-y-4 text-sm">
                        <li>
                            <a href="{{ route('news') }}" class="text-gray-400 transition hover:opacity-75 hover:pl-2 duration-200"> <span class="text-white text-2xl">»</span> News </a>
                        </li>

                        <li>
                            <a href="{{ route('events') }}" class="text-gray-400 transition hover:opacity-75 hover:pl-2 duration-200"> <span class="text-white text-2xl">»</span> Events </a>
                        </li>

                        <li>
                            <a href="{{ route('gallery') }}" class="text-gray-400 transition hover:opacity-75 hover:pl-2 duration-200"> <span class="text-white text-2xl">»</span> Gallery </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <p class="text-xl font-medium text-gray-100">Pages</p>

                    <ul class="mt-6 space-y-4 text-sm">
                        <li>
                            <a href="{{ route('home') }}" class="text-gray-400 transition hover:opacity-75 hover:pl-2 duration-200"> <span class="text-white text-2xl">»</span> Home </a>
                        </li>

                        <li>
                            <a href="{{ route('about') }}" class="text-gray-400 transition hover:opacity-75 hover:pl-2 duration-200"> <span class="text-white text-2xl">»</span> About </a>
                        </li>

                        <li>
                            <a href="{{ route('contact') }}" class="text-gray-400 transition hover:opacity-75 hover:pl-2 duration-200"> <span class="text-white text-2xl">»</span> Contact </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <p class="text-xl font-medium text-gray-100">Helpful Links</p>

                    <ul class="mt-6 space-y-4 text-sm">
                        <li>
                            <a href="{{ route('contact') }}" class="text-gray-400 transition hover:opacity-75 hover:pl-2 duration-200"> <span class="text-white text-2xl">»</span> Contact </a>
                        </li>

                        <li>
                            <a href="{{ route('forum') }}" class="text-gray-400 transition hover:opacity-75 hover:pl-2 duration-200"> <span class="text-white text-2xl">»</span> Forum </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <p class="text-xl font-medium text-gray-100">Account</p>

                    <ul class="mt-6 space-y-4 text-sm">
                        <li>
                            <a href="{{ route('profile') }}" class="text-gray-400 transition hover:opacity-75 hover:pl-2 duration-200"> <span class="text-white text-2xl">»</span> Profile </a>
                        </li>

                        <li>
                            <a href="{{ route('login') }}" class="text-gray-400 transition hover:opacity-75 hover:pl-2 duration-200"> <span class="text-white text-2xl">»</span> Login </a>
                        </li>

                        <li>
                            <a href="{{ route('signup') }}" class="text-gray-400 transition hover:opacity-75 hover:pl-2 duration-200"> <span class="text-white text-2xl">»</span> SignUp </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <p class="text-xs text-gray-200">&copy; {{ date('Y') }} All rights reserved by BlacWays</p>
    </div>
</footer>
