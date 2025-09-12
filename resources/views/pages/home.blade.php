@extends('layouts.main')

@section('title', 'Home')
@section('description', 'Home page description')

@section('content')
    <!-- Slider section -->
    <div class="swiper mySwiper min-h-[calc(100vh-5rem)]">
        <div class="swiper-wrapper">
            @foreach ($slides as $slide)
                <div class="swiper-slide"
                    style="background-image: url('{{ asset('storage/' . $slide->image) }}'); background-size: cover; background-position: center; height: calc(100vh - 5rem); position: relative;">
                    {{-- <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-center text-white bg-black/40 p-5 rounded-lg w-11/12 sm:w-3/4 md:w-2/3 lg:w-1/2 slide-content"> --}}
                    <div class="text-white sm:text-left container mx-auto h-full flex items-center">
                        <div class="slide-content w-full sm:w-[65%]">

                            <h2 class="text-6xl sm:text-7xl font-bold mb-4">{{ $slide->title }}</h2>
                            <p style="font-size: 1.2rem; margin-bottom: 15px;">{{ $slide->description }}</p>

                            <a href="{{ $slide->link ?? '#' }}"
                                class="my-3 inline-block rounded-sm bg-gradient-to-r from-[#71A129] to-[#588B22] px-8 py-3 text-sm font-medium text-white transition hover:scale-110 hover:rotate-2 focus:ring-3 focus:outline-hidden">
                                {{ $slide->button_text ?? 'Learn More' }}
                            </a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination & Navigation -->
        <div class="swiper-pagination"></div>
    </div>

    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            autoplay: {
                delay: 4000
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
        });
    </script>
    <!-- Hero section -->
    {{-- <div
        class="container mx-auto text-center flex flex-col-reverse lg:flex-row items-center justify-between min-h-screen py-5 lg:py-0 px-5">
        <!-- Main text group -->
        <div
            class="flex flex-col items-start justify-center h-full relative pt-10 md:pb-10 text-center lg:text-left max-w-[650px]">
            <!-- Hero Header -->
            <h1 class="text-6xl lg:text-7xl font-bold mb-4 text-slate-600">{{ $header->title }}</h1>
            <p class="mb-7 text-xl text-gray-500">{{ $header->sub_title }}</p>

            <!-- SignUp Button -->
            <a class="group relative inline-block focus:outline-hidden mx-auto lg:mx-0" href="/about">
                <span
                    class="absolute inset-0 translate-x-1.5 translate-y-1.5 bg-green-200 transition-transform group-hover:translate-x-0 group-hover:translate-y-0"></span>

                <span
                    class="relative inline-block border-2 border-gray-600 border-current px-8 py-3 text-sm font-bold tracking-widest text-gray-800 uppercase">
                    Learn More
                </span>
            </a>
        </div>

        <img class="h-[400px] lg:w-[400px] lg:h-[500px] xl:w-[600px] object-cover rounded-[20px] sm:rounded-[10px] sm:rounded-tr-[100px] sm:rounded-bl-[100px]"
            src="{{ asset('/storage/' . $header->image) }}" alt="">

        <!-- <img class="w-[120px] absolute top-40 left-55" src="./img/Cloud-element.svg" alt="">
                                                                                        <img class="w-[100px] absolute top-60 right-55" src="./img/Cloud-element.svg" alt="">
                                                                                        <img class="w-[80px] absolute top-110 left-105" src="./img/Cloud-element.svg" alt="">
                                                                                        <img class="w-[60px] absolute top-130 right-105" src="./img/Cloud-element.svg" alt=""> -->

        <!-- <img class="mt-8 w-[120%] absolute bottom-0 left-0" src="./waves/wave (2).svg" alt=""> -->
    </div> --}}


    <!-- Feature section -->
    {{-- <div class="flex flex-col md:flex-row px-10 lg:px-20 xl:px-30 gap-5 py-30"> --}}
    <div class="grid grid-cols-1 md:grid-cols-3 px-10 lg:px-20 xl:px-60 gap-5 py-30">

        <x-feature id="features_1" :image="$features_1->image" :title="$features_1->title" :sub_title="$features_1->sub_title" />
        <x-feature id="features_2" :image="$features_2->image" :title="$features_2->title" :sub_title="$features_2->sub_title" />
        <x-feature id="features_3" :image="$features_3->image" :title="$features_3->title" :sub_title="$features_3->sub_title" />

        {{-- <div class="flex flex-col shadow-lg hover:shadow-xl cursor-pointer p-4 rounded-md bg-blue-50">
            <img width="50" height="50"
                src="{{ asset($features_1->image ? '/storage/' . $features_1->image : '/img/default.png') }}"
                alt="" />
            <h2 class="text-xl font-semibold text-gray-700">{{ $features_1->title }}</h2>
            <p class="text-gray-500">{{ $features_1->sub_title }}</p>
        </div>
        <div class="flex flex-col shadow-lg hover:shadow-xl cursor-pointer p-4 rounded-md bg-blue-50">
            <img width="50" height="50"
                src="{{ asset($features_2->image ? '/storage/' . $features_2->image : '/img/default.png') }}"
                alt="" />
            <h2 class="text-xl font-semibold text-gray-700">{{ $features_2->title }}</h2>
            <p class="text-gray-500">{{ $features_2->sub_title }}</p>
        </div>
        <div class="flex flex-col shadow-lg hover:shadow-xl cursor-pointer p-4 rounded-md bg-blue-50">
            <img width="50" height="50"
                src="{{ asset($features_3->image ? '/storage/' . $features_3->image : '/img/default.png') }}"
                alt="" />
            <h2 class="text-xl font-semibold text-gray-700">{{ $features_3->title }}</h2>
            <p class="text-gray-500">{{ $features_3->sub_title }}</p>
        </div> --}}

    </div>

    <!-- About Section -->
    <div class="flex flex-col md:flex-row items-center justify-center gap-10 px-10 py-20 bg-green-100">
        <img class="md:w-[300px] md:h-[400px] object-cover rounded-[20px] sm:rounded-[10px] sm:rounded-tl-[50px] sm:rounded-br-[50px]"
            src="{{ asset($about->image ? '/storage/' . $about->image : '/img/default.png') }}" alt="">
        <div class="text-center md:text-left">
            <h2 class="text-4xl font-bold mb-4 text-slate-600">About Us</h2>
            <p class="text-lg text-gray-500 mb-6 max-w-2xl">
                {{ $about->sub_title }}
            </p>

            <a class="inline-flex items-center gap-2 rounded-sm border border-[#71A129] bg-gradient-to-r from-[#71A129] to-[#588B22] px-8 py-3 text-white hover:bg-none hover:text-[#588B22] focus:ring-3 focus:outline-hidden transition duration-300"
                href="/about">
                <span class="text-sm font-medium"> Learn More </span>

                <svg class="size-5 shadow-sm rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>

    <!-- Mission Section -->
    <div class="flex flex-col md:flex-row-reverse items-center justify-center gap-10 px-10 py-20">
        <img class="md:w-[300px] md:h-[400px] object-cover rounded-[20px] sm:rounded-[10px] sm:rounded-tr-[50px] sm:rounded-bl-[50px]"
            src="{{ asset($mission?->image ? '/storage/' . $mission?->image : '/img/default.png') }}" alt="">
        <div class="text-center md:text-left">
            <h2 class="text-4xl font-bold mb-4 text-slate-600">{{ $mission?->title }}</h2>
            <p class="text-lg text-gray-500 mb-6 max-w-2xl">
                {{ $mission?->sub_title }}
            </p>

            <a class="inline-flex items-center gap-2 rounded-sm border border-[#71A129] bg-gradient-to-r from-[#71A129] to-[#588B22] px-8 py-3 text-white hover:bg-none hover:text-[#588B22] focus:ring-3 focus:outline-hidden transition duration-300"
                href="{{ route('about') }}">
                <span class="text-sm font-medium"> Learn More </span>

                <svg class="size-5 shadow-sm rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>

    <!-- Local Governments of Abia State -->
    <div class="bg-[#62BA70]">
        <div class="container mx-auto text-white py-14 flex flex-col md:flex-row items-center justify-center">

            <img src="{{ asset($localGovt?->image ? '/storage/' . $localGovt?->image : '/img/default.png') }}"
                class="h-[400px]" alt="">

            <div class="text-center md:text-left w-[80%] md:w-[60%] xl:w-[50%] ">
                <h2 class="text-4xl font-bold mb-2 w-fit">{{ $localGovt?->title }}</h2>
                <p class="mb-8">{{ $localGovt?->sub_title }}
                </p>
            </div>
        </div>
    </div>

    <!-- Events Section -->
    @if (count($events) !== 0)
        <div class="px-5 md:px-15 xl:px-25 py-20 bg-green-100">
            <h2 class="text-4xl font-bold mb-2 text-slate-600 text-center">Latest Events</h2>
            <p class="text-slate-400 text-center w-[80%] md:w-[60%] xl:w-[50%] mx-auto mb-8">{{ $events_desc }}</p>
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-2 gap-3">

                @foreach ($events as $item)
                    <article class="flex bg-white transition hover:shadow-xl">
                        <div class="rotate-180 p-2 [writing-mode:_vertical-lr]">
                            <time datetime="2022-10-10"
                                class="flex items-center justify-between gap-4 text-xs font-bold text-gray-900 uppercase">
                                <span>{{ \Carbon\Carbon::parse($item->start_time)->format('Y') }}</span>
                                <span class="w-px flex-1 bg-gray-900/10"></span>
                                <span>{{ \Carbon\Carbon::parse($item->start_time)->format('M d') }}</span>
                            </time>
                        </div>

                        <div class="hidden sm:block sm:basis-56 overflow-hidden">
                            <img src="{{ $item->thumbnail ? asset('/storage/' . $item->thumbnail) : '/img/default.png' }}"
                                alt=""
                                class="aspect-square h-full w-full object-cover transform transition-transform duration-500 hover:scale-110" />
                        </div>


                        <div class="flex flex-1 flex-col justify-between">
                            <div class="border-s border-gray-900/10 p-4 sm:border-l-transparent sm:p-6">
                                <a href="/events/{{ $item->id }}">
                                    <h3 class="font-bold text-gray-900 uppercase">
                                        {{ $item->title }}
                                    </h3>
                                </a>

                                <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-700">
                                    {{ \Illuminate\Support\Str::words(strip_tags($item->description), 40) }}
                                </p>
                            </div>

                            <div class="sm:flex sm:items-end sm:justify-end">
                                <a href="/events/{{ $item->id }}"
                                    class="block bg-gradient-to-r from-[#71A129] to-[#588B22] px-5 py-3 text-center text-xs font-bold text-gray-900 uppercase transition hover:bg-green-400">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach

            </div>
        </div>
    @endif

    <!-- Latest News Section -->
    @if (count($news) !== 0)
        <div class="px-5 md:px-15 xl:px-25 py-20">
            <h2 class="text-4xl font-bold mb-2 text-slate-600 text-center">Latest News</h2>
            <p class="text-slate-400 text-center w-[80%] md:w-[60%] xl:w-[50%] mx-auto mb-8">{{ $news_desc }}</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">

                @foreach ($news as $item)
                    <article
                        class="overflow-hidden rounded-lg border border-gray-100 bg-white shadow-md hover:shadow-lg transition-shadow duration-300">
                        <div class="h-56 w-full overflow-hidden">
                            <img src="{{ asset('/storage/' . $item->thumbnail) }}" alt=""
                                class="h-56 w-full object-cover transform transition-transform duration-500 hover:scale-110" />
                        </div>

                        <div class="p-4 sm:p-6">
                            <time datetime="{{ $item->created_at }}" class="block text-xs text-gray-500">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('jS M Y') }}
                            </time>
                            <a href="/news/{{ $item->id }}">
                                <h3 class="text-lg font-medium text-gray-900">
                                    {{ $item->title }}
                                </h3>
                            </a>

                            <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
                                {{ \Illuminate\Support\Str::words(strip_tags($item->content), 40) }}
                            </p>

                            <a href="/news/{{ $item->id }}"
                                class="group mt-4 inline-flex items-center gap-1 text-sm font-medium text-blue-600">
                                Find out more

                                <span aria-hidden="true" class="block transition-all group-hover:ms-0.5 rtl:rotate-180">
                                    &rarr;
                                </span>
                            </a>
                        </div>
                    </article>
                @endforeach

            </div>
        </div>
    @endif

    <!-- Donation Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 items-center justify-center px-5 sm:px-25 py-5">
        <div class="flex items-center justify-center">
            <img class="h-[300px] md:h-[500px] grayscale  transition duration-300" id="donate-light" src="/img/light.png"
                alt="">
        </div>
        <div class="flex flex-col">
            <h2
                class="font-semibold text-3xl md:text-5xl text-[#71A129] uppercase leading-9 text-center md:text-left md:leading-14">
                {{-- To continue our work, we need your <span class="bg-[#588B22] text-white rounded-md px-1">donation</span>. Would you
                want to <span class="bg-[#588B22] text-white rounded-md px-1">participate with us</span>? --}}
                {{ $donation->sub_title }}
            </h2>
            <a class="my-5 w-fit group inline-block rounded-full bg-gradient-to-r from-[#71A129] to-[#588B22] p-[2px] text-[#588B22] hover:text-white focus:ring-3 focus:outline-hidden transition duration-300 mx-auto md:mx-0"
                id="donate-btn" href="{{ route('donation') }}">
                <span class="block rounded-full bg-white px-8 py-3 text-sm font-medium group-hover:bg-transparent">
                    Donate Now
                </span>
            </a>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="w-full flex items-center justify-center rounded-lg p-6 z-20 bg-green-100">
        <div class="bg-white md:w-3/4 lg:w-3/4 mx-auto rounded-lg shadow-lg p-6 text-gray-600">
            <div class="card-body py-5">
                <p class="w-1/2 text-center mx-auto"></p>

                <div class="flex flex-wrap">
                    <form action="{{ route('message.store') }}" method="POST"
                        class="w-full lg:w-1/2 px-5 lg:border-r border-gray-300">
                        @csrf
                        <div class="space-y-4">
                            <b class="text-gray-400 text-sm font-semibold">Available 24/7</b>
                            <h2 class="text-2xl text-gray-600 font-semibold">Get In Touch</h2>
                            <div>
                                <input type="text" name="name" id="firstNameinput" placeholder="Enter your name"
                                    class="w-full border @error('name') border-red-300 @else border-gray-300 @enderror rounded px-2 py-1.5">
                                @error('name')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <input type="text" name="email" id="email"
                                    placeholder="Enter your email address"
                                    class="w-full border @error('email') border-red-300 @else border-gray-300 @enderror rounded px-2 py-1.5">
                                @error('email')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <textarea name="message" id="message" placeholder="Enter your message" cols="30" rows="6"
                                    class="w-full border @error('message') border-red-300 @else border-gray-300 @enderror rounded px-2 py-1.5"></textarea>
                                @error('message')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- reCAPTCHA --}}
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}

                            @if ($errors->has('g-recaptcha-response'))
                                <span class="text-red-500 text-sm">{{ $errors->first('g-recaptcha-response') }}</span>
                            @endif

                            <div>
                                <button type="submit"
                                    class="w-full border border-[#71A129] bg-gradient-to-r from-[#71A129] to-[#588B22] px-8 text-white hover:bg-none hover:text-[#588B22] py-2 rounded cursor-pointer transition">Submit</button>
                            </div>
                        </div>
                    </form>

                    <div class="w-full lg:w-1/2 px-5 pt-10 lg:pt-0 flex flex-col justify-center space-y-3">
                        <div class="flex items-start space-x-4">
                            <div class="flex items-center justify-center border border-gray-500 rounded-full h-9 w-9 mt-2">
                                <ion-icon name="location-outline" class="text-2xl text-gray-500"></ion-icon>
                            </div>
                            <div class="flex-grow text-gray-600">
                                <h3 class="text-2xl font-semibold mb-0.5">Location</h3>
                                <div class="border-b border-gray-300 text-lg pb-0.5">
                                    <p class="leading-6">{{ $info->street_address ? $info->street_address : '' }}</p>
                                    <p class="leading-6">{{ $info->suite ? $info->suite : '' }}</p>
                                    <p class="leading-6">{{ $info->city ? $info->city : '' }}
                                        {{ $info->state ? ', ' . $info->state : '' }}
                                        {{ $info->zip ? ', ' . $info->zip : '' }}</p>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="flex items-center space-x-4">
                            <div class="flex items-center justify-center border border-gray-500 rounded-full h-9 w-9">
                                <ion-icon name="call-outline" class="text-2xl text-gray-500"></ion-icon>
                            </div>
                            <div class="flex-grow text-gray-600">
                                <h3 class="text-xl font-semibold mb-0.5">Phone Number</h3>
                                <a href="tel:{{ $info->phone ? $info->phone : '' }}"
                                    class="block border-b border-gray-300 text-sm pb-0.5 text-gray-600">{{ $info->phone ? $info->phone : '' }}</a>
                            </div>
                        </div> --}}

                        {{-- <div class="flex items-center space-x-4">
                            <div class="flex items-center justify-center border border-gray-500 rounded-full h-9 w-9">
                                <ion-icon name="mail-outline" class="text-2xl text-gray-500"></ion-icon>
                            </div>
                            <div class="flex-grow text-gray-600">
                                <h3 class="text-xl font-semibold mb-0.5">Email Address</h3>
                                <a href="mailto:{{ $info->email ? $info->email : '' }}"
                                    class="block border-b border-gray-300 text-sm pb-0.5 text-gray-600">{{ $info->email ? $info->email : '' }}</a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        const donateBtn = document.querySelector('#donate-btn')
        const donateLight = document.querySelector('#donate-light')

        // Donate section light control
        donateBtn.addEventListener('mouseover', () => {
            donateLight.classList.toggle('img-hover')
        })
        donateBtn.addEventListener('mouseout', () => {
            donateLight.classList.toggle('img-hover')
        })
    </script>
@endsection
