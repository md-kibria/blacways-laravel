@extends('layouts.main')

@section('title', $page->name)
@section('description', strip_tags($page->description))

@section('content')
    <div class="px-5 md:px-25 py-15">
        <div
            class="h-[450px] w-[calc(100%+100px)] bg-green-100 absolute -top-20 -left-10 -z-10 flex flex-col items-center justify-center rotate-[-5deg]">
        </div>
        <h2 class="text-4xl font-bold mb-2 text-slate-600 text-center">{{ $page->name }}</h2>
        <p class="text-slate-400 text-center w-[80%] md:w-[60%] xl:w-[50%] mx-auto mb-8">{{ $page->description }}</p>



        <div class="container mx-auto min-h-screen py-10">

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
                                    <h3 class="font-bold text-gray-900 uppercase text-xl">
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


        <div class="text-white w-full py-4">
            {{ $events->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
