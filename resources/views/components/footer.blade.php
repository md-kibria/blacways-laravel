<!-- Footer Section -->
<footer class="bg-gray-100">
    <div class="mx-auto max-w-screen-xl space-y-8 px-4 py-16 sm:px-6 lg:space-y-16 lg:px-8">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
            <div>
                <a href="{{ route('home') }}">
                    @if ($info->logo)
                        <img src="{{ asset('/storage/' . $info->logo) }}" alt="" class="h-[50px] w-auto">
                    @else
                        <h1 class="text-2xl font-bold text-slate-600">Logo</h1>
                    @endif
                </a>

                <p class="mt-4 max-w-xs text-gray-500">
                    {{ $info->description }}
                </p>

                <ul class="mt-8 flex gap-6">
                    @foreach ($media as $link)
                        @if ($link->url)
                            <a href="{{ $link->url }}" class="text-3xl" target="_blank" rel="noopener noreferrer">
                                <ion-icon name="logo-{{ $link->name }}"></ion-icon>
                            </a>
                        @endif
                    @endforeach
                </ul>
            </div>

            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:col-span-2 lg:grid-cols-4">
                <div>
                    <p class="font-medium text-gray-900">Content</p>

                    <ul class="mt-6 space-y-4 text-sm">
                        <li>
                            <a href="{{ route('news') }}" class="text-gray-700 transition hover:opacity-75"> News </a>
                        </li>

                        <li>
                            <a href="{{ route('events') }}" class="text-gray-700 transition hover:opacity-75"> Events </a>
                        </li>

                        <li>
                            <a href="{{ route('gallery') }}" class="text-gray-700 transition hover:opacity-75"> Gallery </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <p class="font-medium text-gray-900">Pages</p>

                    <ul class="mt-6 space-y-4 text-sm">
                        <li>
                            <a href="{{ route('home') }}" class="text-gray-700 transition hover:opacity-75"> Home </a>
                        </li>

                        <li>
                            <a href="{{ route('about') }}" class="text-gray-700 transition hover:opacity-75"> About </a>
                        </li>

                        <li>
                            <a href="{{ route('contact') }}" class="text-gray-700 transition hover:opacity-75"> Contact </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <p class="font-medium text-gray-900">Helpful Links</p>

                    <ul class="mt-6 space-y-4 text-sm">
                        <li>
                            <a href="{{ route('contact') }}" class="text-gray-700 transition hover:opacity-75"> Contact </a>
                        </li>

                        <li>
                            <a href="{{ route('forum') }}" class="text-gray-700 transition hover:opacity-75"> Forum </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <p class="font-medium text-gray-900">Account</p>

                    <ul class="mt-6 space-y-4 text-sm">
                        <li>
                            <a href="{{ route('profile') }}" class="text-gray-700 transition hover:opacity-75"> Profile </a>
                        </li>

                        <li>
                            <a href="{{ route('login') }}" class="text-gray-700 transition hover:opacity-75"> Login </a>
                        </li>

                        <li>
                            <a href="{{ route('signup') }}" class="text-gray-700 transition hover:opacity-75"> SignUp </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <p class="text-xs text-gray-500">&copy; {{ date('Y') }} All rights reserved by BlacWays</p>
    </div>
</footer>
