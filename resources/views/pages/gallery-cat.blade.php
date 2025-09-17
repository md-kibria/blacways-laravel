@extends('layouts.main')

@section('title', $cat->title)
@section('description', strip_tags($page->description))

@section('content')
    <div class="px-5 md:px-25 py-15 relative">
        <div
            class="h-[450px] w-[calc(100%+100px)] bg-green-100 absolute -top-20 -left-10 -z-10 flex flex-col items-center justify-center rotate-[-5deg]">
        </div>
        <h2 class="text-4xl font-bold mb-2 text-slate-600 text-center">{{ $cat->title }}</h2>
        <p class="text-slate-400 text-center w-[80%] md:w-[60%] xl:w-[50%] mx-auto mb-8">
            {{-- {{ $page->description }} --}}
        </p>

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
        <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4">
            @foreach ($images as $image)
                <div x-data="{ open: false }" class="max-w-full overflow-hidden rounded-lg cursor-pointer">
                    <div class="aspect-[2/3]">
                        <img 
                            class="h-full w-full object-cover transform transition-transform duration-500 hover:scale-110 rounded-lg"
                            src="{{ asset('/storage/' . $image->src) }}" 
                            alt=""
                            @click="open = true"
                        >
                    </div>
                    <!-- Popup Modal -->
                    <div 
                        x-show="open" 
                        x-transition 
                        class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 max-h-screen max-w-screen"
                        @click.away="open = false"
                        style="display: none;"
                    >
                        <div class="bg-white rounded-lg p-4 max-w-screen sm:max-w-2xl w-full relative">
                            <button 
                                class="absolute top-2 right-2 text-gray-700 hover:text-red-500 text-4xl cursor-pointer"
                                @click="open = false"
                            >&times;</button>
                            <img 
                                src="{{ asset('/storage/' . $image->src) }}" 
                                alt="" 
                                class="max-h-screen mx-auto h-auto rounded-lg"
                            >
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        <div class="text-white w-full py-4">
            {{ $images->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
