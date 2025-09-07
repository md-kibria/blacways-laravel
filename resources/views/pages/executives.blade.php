@extends('layouts.main')

@section('title', $page->name)
@section('description', strip_tags($page->description))

@section('content')
    <div class="px-5 md:px-25 py-15">
        <h2 class="text-4xl font-bold mb-2 text-slate-600 text-center">{{ $page->name }}</h2>
        <p class="text-slate-400 text-center w-[80%] md:w-[60%] xl:w-[50%] mx-auto mb-8">{{ $page->description }}</p>

        @if (count($executives) === 0)
            <div class="flex items-center justify-center w-full min-h-[40vh]">
                <span class="text-slate-500">No items found!</span>
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-10">

            @foreach ($executives as $item)
                <article
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
                </article>
            @endforeach

        </div>

        <div class="text-white w-full py-4">
            {{ $executives->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
