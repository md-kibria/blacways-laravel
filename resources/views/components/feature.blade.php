@props(['id' => null, 'image' => null, 'bg' => null, 'title' => null, 'sub_title' => null])

{{-- <span class="group relative block h-64 sm:h-72">
    <span class="absolute inset-0 border-2 border-dashed border-[#588B22] rounded-sm"></span>

    <div
        class="relative flex h-full transform items-end border-2 border-[#588B22] rounded-sm bg-white transition-transform group-hover:-translate-x-2 group-hover:-translate-y-2">
        <div class="p-4 !pt-0 transition-opacity group-hover:absolute group-hover:opacity-0 sm:p-6 lg:p-8">
            <img width="50" height="50" src="{{ asset($image ? '/storage/' . $image : '/img/default.png') }}"
                alt="" />

            <h2 class="mt-4 text-xl font-medium sm:text-2xl text-slate-700">{{ $title }}</h2>

            <p class="mt-4 text-sm sm:text-base text-slate-500">
                {{ $sub_title }}
            </p>
        </div>

        <div
            class="absolute p-4 opacity-0 transition-opacity group-hover:relative group-hover:opacity-100 sm:p-6 lg:p-8">
            <h3 class="mt-4 text-xl font-medium sm:text-2xl text-slate-700">{{ $title }}</h3>

            <p class="mt-4 text-sm sm:text-base text-slate-500">
                {{ $sub_title }}
            </p>

            <a href="{{route('features', $id)}}" class="mt-8 font-bold text-[#71A129]">Read more</a>
        </div>
    </div>
</span> --}}


<span class="group relative block h-64 sm:h-72">
    <span class="absolute inset-0 rounded-sm"></span>
    <div class="w-full h-full -z-10 overflow-hidden">
        <img src="{{ asset($bg ? '/storage/' . $bg : '/img/f-bg.png') }}" alt="" class="h-full w-full">
    </div>

    <div
        class="absolute flex h-full transform items-end rounded-sm  transition-transform group-hover:-translate-x-2 group-hover:-translate-y-2 bg-transparent top-0">
        <div
            class="p-4 !pt-0 transition-opacity group-hover:absolute group-hover:opacity-0 sm:p-6 lg:p-8 flex flex-col items-center">
            <img width="80" height="80" src="{{ asset($image ? '/storage/' . $image : '/img/default.png') }}"
                alt="" />

            <h2 class="mt-4 text-xl font-medium sm:text-3xl text-black text-center">{{ $title }}</h2>

            <p class="mt-4 text-sm sm:text-base text-slate-900 text-center">
                {{ $sub_title }}
            </p>
        </div>

        <div
            class="absolute p-4 opacity-0 transition-opacity group-hover:relative group-hover:opacity-100 sm:p-6 lg:p-8 flex items-center flex-col">
            <h3 class="mt-4 text-xl font-medium sm:text-3xl text-black text-center">{{ $title }}</h3>

            <p class="mt-4 text-sm sm:text-base text-slate-900 text-center">
                {{ $sub_title }}
            </p>

            <a href="{{ route('features', $id) }}" class="mt-2 font-bold text-[#71A129] text-center">Read more</a>
        </div>
    </div>
</span>
