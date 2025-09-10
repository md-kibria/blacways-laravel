@extends('layouts.main')

@section('title', $news->title)
@section('description', $news->content)

@section('content')
    <div
        class="h-[450px] w-[calc(100%+100px)] bg-green-100 absolute -top-20 -left-10 -z-10 flex flex-col items-center justify-center rotate-[-5deg]">
    </div>
    <section class="container mx-auto min-h-screen relative py-15 flex flex-col justify-center items-center">

        {{-- <div class="absolute inset-0"
            style="background: conic-gradient(from 224.42deg at 50% 50%, #150C2F -45.35deg, rgba(81, 55, 108, 0.954484) 22.93deg, #F1C180 150.84deg, #1F1F1F 159.84deg, #EEB36C 209.65deg, #084587 271.22deg, #150C2F 314.65deg, rgba(81, 55, 108, 0.954484) 382.93deg); filter: blur(70px); z-index: -1;">
        </div> --}}

        <div class="mt-10 max-w-4xl mx-auto bg-white rounded shadow-md overflow-hidden">
            {{-- <div class="w-full h-44 bg-amber-400">asdf --}}
            <img src="{{ asset('/storage/' . $news->thumbnail) }}" alt="{{ $news->title }}" class="w-full h-96 object-cover">
            {{-- </div> --}}
            <div class="p-6">
                <h2 class="text-3xl font-semibold text-gray-800 mb-4">{{ $news->title }}</h2>
                <div class="text-gray-500 text-sm flex gap-3 mb-6 notranslate">
                    <p class="flex gap-1"><ion-icon name="create-outline" class="block my-auto"></ion-icon> <span
                            class="font-medium">{{ $news->author->name }}</span></p>
                    <p class="flex gap-1"><ion-icon name="chatbubble-ellipses-outline"
                            class="block my-auto"></ion-icon><span class="font-medium">{{ count($news->comments) }}</span>
                    </p>
                    <p class="flex gap-1"><ion-icon name="calendar-outline" class="block my-auto"></ion-icon> <span
                            class="font-medium">{{ $news->created_at->format('d F, Y') }}</span></p>
                </div>
                <div class="text-gray-700 leading-relaxed no-tailwind">
                    {!! $news->content !!}
                </div>


                <div class="border-t border-gray-400 my-5 py-3">
                    @foreach ($news->comments as $comment)
                        {{-- Comment Item --}}
                        <div class="flex gap-2 mb-2 w-full">
                            <div class="h-10 w-10 bg-gray-300 rounded-full">
                                <img src="{{ $comment->user->image ? asset('/storage/' . $comment->user->image) : '/img/profile.png' }}"
                                    alt="" class="w-10 h-10 rounded-full">
                            </div>
                            <div x-data="{ isForm: false }" class="border rounded-md border-gray-400 p-2 grow">
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
                                                <form action="{{ route('news.comment.destroy', $comment->id) }}"
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
                                <form x-show="isForm" action="{{ route('news.comment.update', $comment->id) }}"
                                    method="POST" class="flex mt-2">
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

                    {{-- Add Comment --}}
                    <p class="font-bold text-lg text-gray-800">Add your comment</p>
                    @auth
                        <form action="{{ route('news.comment.store', $news->id) }}" method="POST" class="flex mt-2">
                            @csrf
                            @method('POST')
                            <textarea name="comment" id="" cols="30" rows="1"
                                class="border-t border-l border-b rounded-l-md @error('comment') border-red-300 @else border-gray-400 @enderror p-2 grow outline-0"
                                placeholder="Write your comment here"></textarea>
                            <input type="submit" value="Submit"
                                class="bg-gradient-to-r from-[#71A129] to-[#588B22] border-t border-r border-b @error('comment') border-red-300 @else border-gray-400 @enderror text-white rounded-r-md px-4 cursor-pointer">
                        </form>
                        @error('comment')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    @endauth

                    @guest
                        <p class="text-gray-600 py-2">Please <a href="{{ route('login') }}"
                                class="text-orange-500 underline hover:text-orange-600">login here</a> to comment</p>
                    @endguest
                </div>


            </div>
        </div>

    </section>
@endsection
