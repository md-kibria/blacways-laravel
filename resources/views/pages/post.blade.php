@extends('layouts.main')

@section('title', $forum->content)
@section('description', $forum->content)

@section('content')

    <div
        class="h-[450px] w-[calc(100%+100px)] bg-green-100 absolute -top-20 -left-10 -z-10 flex flex-col items-center justify-center rotate-[-5deg]">
    </div>

    <section class="container mx-auto min-h-screen relative py-15 flex flex-col justify-center items-center">


        <article class="rounded-xl border-2 border-gray-100 bg-white shadow-lg max-w-4xl pb-4 sm:pb-6 lg:pb-8">
            <div class="flex items-start gap-4 px-4 sm:px-6 lg:px-8 pt-4 sm:pt-6 lg:pt-8">
                <div class="flex gap-4 items-center justify-between w-full">
                    <div class="flex gap-4 grow-1">
                        <a href="#" class="block shrink-0">
                            <img alt=""
                                src="{{ $forum->user->image ? asset('/storage/' . $forum->user->image) : '/img/profile.png' }}"
                                class="size-14 rounded-lg object-cover" />
                        </a>

                        <div>
                            <h3 class="font-medium sm:text-lg">
                                {{ $forum->user->name }}
                            </h3>

                            <p class="line-clamp-2 text-sm text-gray-700">
                                On {{ $forum->created_at->format('d M, Y') }}
                            </p>


                        </div>
                    </div>

                    @if (Auth::id() === $forum->user_id || Auth::user()->role === 'admin')
                        <form action="{{ route('forum.destroy', $forum->id) }}"
                            onsubmit="return confirm('Are you sure you want to delete?')" method="POST" class="text-xs">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-block rounded-sm border border-red-600 px-8 py-2 text-sm font-medium text-red-600 hover:bg-red-600 hover:text-white focus:ring-3 focus:outline-hidden">Delete</button>
                        </form>
                    @endif
                </div>
            </div>
            <div class="px-4 sm:px-6 lg:px-8 text-2xl py-2 font-medium text-gray-800">
                {{ $forum->content }}
            </div>

            <div class="mt-2 sm:flex sm:items-center sm:gap-2 px-4 sm:px-6 lg:px-8">
                <div class="flex items-center gap-1 text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                    </svg>

                    <p class="text-xs">{{ count($forum->comments) }} comments</p>
                </div>

                <span class="hidden sm:block" aria-hidden="true">&middot;</span>
                <div class="flex items-center gap-1 text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274
                                                       4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>


                    <p class="text-xs">{{ $forum->views }} views</p>
                </div>

                <span class="hidden sm:block" aria-hidden="true">&middot;</span>

                <p class="hidden sm:block sm:text-xs sm:text-gray-500">
                    Posted by
                    <span class="font-medium hover:text-gray-700"> {{ $forum->user->name }} </span>
                </p>

                <span class="hidden sm:block" aria-hidden="true">&middot;</span>

                <p class="hidden sm:block sm:text-xs sm:text-gray-500">
                    On
                    <span class="font-medium hover:text-gray-700"> {{ $forum->created_at->format('d M, Y') }} </span>
                </p>
            </div>


            <div class="flex flex-col px-4 sm:px-6 lg:px-8">
                {{-- <p class="font-bold text-lg text-gray-800">Add your comment</p> --}}

                <hr class="pb-3 mt-10 text-slate-300">

                <form action="{{ route('forum.comment.store', $forum->id) }}" method="POST" class="flex mt-2">
                    @csrf
                    @method('POST')
                    <textarea name="comment" id="" cols="30" rows="1"
                        class="border-t border-l border-b rounded-l-full @error('comment') border-red-300 @else border-gray-400 @enderror p-2 px-4 grow outline-0"
                        placeholder="Post your comment..."></textarea>
                    <input type="submit" value="Submit"
                        class="bg-gradient-to-r from-[#71A129] to-[#588B22] border-t border-r border-b @error('comment') border-red-300 @else border-gray-400 @enderror text-white rounded-r-full px-4 cursor-pointer">
                </form>
                @error('comment')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                <hr class="pb-3 mt-5 text-slate-300">

                @foreach ($forum->comments as $comment)
                    <!-- Comment Item -->
                    <div class="flex gap-2 mb-2 w-full">
                        <div class="h-10 w-10 bg-gray-300 rounded-full">
                            <img src="{{ $comment->user->image ? asset('/storage/' . $comment->user->image) : '/img/profile.png' }}"
                                alt="" class="w-10 h-10 rounded-full">
                        </div>
                        <div x-data="{ isForm: false }" class="border rounded-md border-gray-100 p-2 grow shadow">
                            <div class="flex items-center justify-between">
                                <p class="text-lg font-semibold text-gray-600">{{ $comment->user->name }} <span
                                        class="font-light text-xs">On
                                        {{ $comment->created_at->format('d F, Y') }}</span></p>
                                @auth
                                    <div class="flex gap-1">
                                        @if (Auth::id() === $comment->user_id)
                                            <button @click="isForm = !isForm"
                                                class="bg-yellow-400 hover:bg-yellow-500 text-white cursor-pointer font-light text-xs px-1 rounded-sm">Edit</button>
                                        @endif
                                        @if (Auth::id() === $comment->user_id || Auth::user()->role === 'admin')
                                            <form action="{{ route('forum.comment.destroy', $comment->id) }}"
                                                onsubmit="return confirm('Are you sure you want to delete?')" method="POST"
                                                class="text-xs">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-400 hover:bg-red-500 text-white cursor-pointer font-light text-xs px-1 rounded-sm">Del</button>
                                            </form>
                                        @endif
                                    </div>
                                @endauth
                            </div>
                            <p x-show="!isForm" class="text-sm text-gray-500">{{ $comment->comment }}</p>
                            <form x-show="isForm" action="{{ route('forum.comment.update', $comment->id) }}" method="POST"
                                class="flex mt-2">
                                @csrf
                                @method('PUT')
                                <textarea name="comment" id="" cols="30" rows="3"
                                    class="border-t border-l border-b rounded-l-md @error('comment') border-red-300 @else border-gray-400 @enderror p-2 grow outline-0"
                                    placeholder="Write your comment here">{{ $comment->comment }}</textarea>
                                <input type="submit" value="Update"
                                    class="bg-gradient-to-r from-[#71A129] to-[#588B22] border-t border-r border-b @error('comment') border-red-300 @else border-gray-400 @enderror text-white rounded-r-md px-4 cursor-pointer">
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>


        </article>

    </section>
@endsection
