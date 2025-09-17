@extends('layouts.main')

@section('title', $page->name)
@section('description', strip_tags($page->description))

@section('content')
    <div class="px-5 md:px-25 py-15 relative">
        <div
            class="h-[450px] w-[calc(100%+100px)] bg-green-100 absolute -top-20 -left-10 -z-10 flex flex-col items-center justify-center rotate-[-5deg]">
        </div>
        
        <h2 class="text-4xl font-bold mb-2 text-slate-600 text-center">{{ $page->name }}</h2>
        <p class="text-slate-400 text-center w-[80%] md:w-[60%] xl:w-[50%] mx-auto mb-8">{{ $page->description }}</p>

        @if (count($news) === 0)
            <div class="flex items-center justify-center w-full min-h-[40vh]">
                <span class="text-slate-500">No items found!</span>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-10">

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

        <div class="text-white w-full py-4">
            {{ $news->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
