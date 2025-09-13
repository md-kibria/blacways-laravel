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

        @if (count($images) === 0)
            <div class="flex items-center justify-center w-full min-h-[40vh]">
                <span class="text-slate-500">No items found!</span>
            </div>
        @endif

        {{-- <!-- Method 1 -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach ($images->chunk(3) as $chunk)
            <div class="grid gap-4">
                @foreach ($chunk as $image)
                <div>
                    <img class="h-auto max-w-full rounded-lg"
                    src="{{ asset('/storage/'.$image->src) }}" alt="">
                </div>
                @endforeach
            </div>
            @endforeach
        </div> --}}

        <!-- Method 2 -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @foreach ($images as $image)
            {{-- <a href="{{ route('gallery.cat', $image->id) }}" class="h-72 max-w-full overflow-hidden">
                    <img class="h-full w-full object-cover transform transition-transform duration-500 hover:scale-110 rounded-lg cursor-pointer" src="{{ asset('/storage/' . $image->thumbnail) }}" alt="">
                </a> --}}
                <a href="{{ route('gallery.cat', $image->id) }}" class="max-w-full overflow-hidden rounded-lg cursor-pointer">
                    <div class="aspect-[2/3]">
                        <img class="h-full w-full object-cover transform transition-transform duration-500 hover:scale-110 rounded-lg"
                            src="{{ asset('/storage/' . $image->thumbnail) }}" alt="">
                    </div>
                </a>
            @endforeach
        </div>


        <div class="text-white w-full py-4">
            {{ $images->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
