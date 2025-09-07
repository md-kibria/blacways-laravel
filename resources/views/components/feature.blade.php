@props(['id' => null, 'image' => null, 'title' => null, 'sub_title' => null])

<span class="group relative block h-64 sm:h-80 lg:h-96">
    <span class="absolute inset-0 border-2 border-dashed border-green-500"></span>

    <div
        class="relative flex h-full transform items-end border-2 border-green-500 bg-white transition-transform group-hover:-translate-x-2 group-hover:-translate-y-2">
        <div class="p-4 !pt-0 transition-opacity group-hover:absolute group-hover:opacity-0 sm:p-6 lg:p-8">
            <img width="50" height="50" src="{{ asset($image ? '/storage/' . $image : '/img/default.png') }}"
                alt="" />

            <h2 class="mt-4 text-xl font-medium sm:text-2xl text-green-500">{{ $title }}</h2>
        </div>

        <div
            class="absolute p-4 opacity-0 transition-opacity group-hover:relative group-hover:opacity-100 sm:p-6 lg:p-8">
            <h3 class="mt-4 text-xl font-medium sm:text-2xl text-green-500">{{ $title }}</h3>

            <p class="mt-4 text-sm sm:text-base text-green-400">
                {{ $sub_title }}
            </p>

            <a href="{{route('features', $id)}}" class="mt-8 font-bold text-green-400">Read more</a>
        </div>
    </div>
</span>
