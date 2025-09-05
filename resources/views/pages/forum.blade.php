@extends('layouts.main')

@section('title', 'Forum')

@section('content')
    <div class="container mx-auto h-screen py-25 flex flex-col gap-3 px-1">

        {{-- <h2 class="text-4xl text-slate-700 font-semibold mb-6">Welcome back to Forum!</h2> --}}

        <div class="rounded-xl border-2 border-gray-100 bg-white px-4 py-2 flex items-center justify-start gap-1 sm:gap-3 mt-10 mb-5">
            <a class="hidden sm:block" href="{{ route('profile') }}">
                <img src="{{ Auth::user()->image ? asset('/storage/' . Auth::user()->image) : '/img/profile.png' }}"
                    alt="" class="h-15 w-15 rounded-full">
            </a>
            <form action="{{ route('forum.store') }}" class="flex grow-1 flex-col" method="POST">
                @csrf
                @method('POST')
                <div class="flex gap-1 sm:gap-4 w-full">
                    <textarea id="message" rows="1"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-gray-500 focus:border-gray-500 focus:outline-0"
                        placeholder="Let's post on forum..." name="content"></textarea>

                    <button
                        class="inline-block rounded-full border border-gray-600 bg-gray-600 p-3 text-white hover:bg-transparent hover:text-blue-600 focus:ring-3 focus:outline-hidden h-fit"
                        type="submit">
                        <span class="sr-only"> Post </span>

                        <svg class="size-5 shadow-sm -rotate-90" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>

                    </button>
                </div>
                @error('content')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </form>

            @if (Route::currentRouteName() == 'forum.self')
            <a class="group flex items-center justify-between gap-4 rounded-full sm:rounded-lg border border-current sm:px-3 sm:py-1 text-slate-600 transition-colors hover:bg-slate-600 focus:ring-3 focus:outline-hidden"
                href="{{ route('forum') }}">
                <span class="font-medium transition-colors group-hover:text-white hidden sm:inline"> Goto forum </span>

                <span class="shrink-0 rounded-full border border-slate-600 bg-white p-3 sm:p-2">
                    <svg class="size-5 shadow-sm rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </span>
            </a>
            @else
            <a class="group flex items-center justify-between gap-4 rounded-full sm:rounded-lg border border-current sm:px-3 sm:py-1 text-slate-600 transition-colors hover:bg-slate-600 focus:ring-3 focus:outline-hidden"
                href="{{ route('forum.self', Auth::id()) }}">
                <span class="font-medium transition-colors group-hover:text-white hidden sm:inline"> Your posts </span>

                <span class="shrink-0 rounded-full border border-slate-600 bg-white p-3 sm:p-2">
                    <svg class="size-5 shadow-sm rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </span>
            </a>
            @endif


        </div>

        <div class="mx-auto">

            @if (count($posts) === 0)
                <div class="flex items-center justify-center w-full min-h-[40vh]">
                    <span class="text-slate-500">No items found!</span>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-3 h-full">
                @foreach ($posts as $item)
                    <article
                        class="rounded-xl border-2 border-gray-100 @if (!$item->is_approved) bg-red-100 shadow-red-100 @else bg-white @endif shadow-lg hover:shadow-md">
                        <div class="flex items-start gap-4 p-4 sm:p-6 lg:p-8">
                            <a class="block shrink-0">
                                <img alt=""
                                    src="{{ $item->user->image ? asset('/storage/' . $item->user->image) : '/img/profile.png' }}"
                                    class="size-14 rounded-lg object-cover" />
                            </a>

                            <div>
                                <h3 class="font-medium sm:text-lg md:text-xl">
                                    <a href="{{ route('forum.show', $item->id) }}" class="hover:underline line-clamp-3">
                                        {{ $item->content }}
                                    </a>
                                </h3>

                                <div class="mt-2 sm:flex sm:items-center sm:gap-2">
                                    <div class="flex items-center gap-1 text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                                        </svg>

                                        <p class="text-xs">{{ count($item->comments) }}</p>
                                    </div>

                                    <span class="hidden sm:block" aria-hidden="true">&middot;</span>

                                    <div class="flex items-center gap-1 text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274
                                   4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>

                                        <p class="text-xs">{{ $item->views }}</p>
                                    </div>

                                    <span class="hidden sm:block" aria-hidden="true">&middot;</span>

                                    <p class="hidden sm:block sm:text-xs sm:text-gray-500">
                                        On
                                        <span class="font-medium hover:text-gray-700">
                                            {{ $item->created_at->format('d M, Y') }} </span>
                                    </p>

                                    <span class="hidden sm:block" aria-hidden="true">&middot;</span>

                                    <p class="hidden sm:block sm:text-xs sm:text-gray-500">
                                        By
                                        <span class="font-medium hover:text-gray-700"> {{ $item->user->name }} </span>
                                    </p>

                                </div>
                            </div>
                        </div>

                        {{-- <div class="flex justify-end">
                            <strong
                                class="-me-[2px] -mb-[2px] inline-flex items-center gap-1 rounded-ss-xl rounded-ee-xl bg-green-600 px-3 py-1.5 text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                </svg>

                                <span class="text-[10px] font-medium sm:text-xs">Solved!</span>
                            </strong>
                        </div> --}}
                    </article>
                @endforeach
            </div>

        </div>
    </div>
@endsection
