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

        @if (count($councils) === 0)
            <div class="flex items-center justify-center w-full min-h-[40vh]">
                <span class="text-slate-500">No items found!</span>
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-10">

            @foreach ($councils as $item)
                {{-- <article
                    class="overflow-hidden rounded-lg border border-gray-100 bg-white shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="h-56 w-full overflow-hidden flex items-center justify-center bg-gray-200 overflow-hidden">
                        <img src="{{ asset('/storage/' . $item->image) }}" alt=""
                            class="h-56 w-full object-cover transform transition-transform duration-500 hover:scale-110" />
                    </div>

                    <div class="p-4 sm:p-6 text-center">
                        <h3 class="text-xl font-semibold text-gray-900">
                            {{ $item->name }}
                        </h3>

                        <p class="mt-2 text-md/relaxed text-gray-500">
                            {{ $item->position }}
                        </p>
                    </div>
                </article> --}}

                <a href="#" class="group relative block bg-black">
                    <img alt=""
                        src="{{ asset('/storage/' . $item->image) }}"
                        class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50" />

                    <div class="relative p-4 sm:p-6 lg:p-8">
                        <p class="text-sm font-medium tracking-widest text-green-500 uppercase">{{ $item->position }}</p>

                        <p class="text-xl font-bold text-white sm:text-2xl">{{ $item->name }}</p>

                        <div class="mt-32 sm:mt-48 lg:mt-64">
                            <div
                                class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100">
                                <p class="text-sm text-white">
                                    {{ $item->about }}
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>

        <div class="text-white w-full py-4">
            {{ $councils->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
