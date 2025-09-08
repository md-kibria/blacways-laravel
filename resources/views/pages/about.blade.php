@extends('layouts.main')

@section('title', 'About Us')
@section('description', strip_tags($page->content))

@section('content')
    <section class="min-h-screen relative py-15 flex flex-col items-center about-page">


        <div
            class="h-[450px] w-[calc(100%+100px)] bg-green-300 absolute -top-20 -left-10 z-10 flex flex-col items-center justify-center rotate-[-5deg]">
        </div>

        <div class="flex flex-col items-center z-20 pt-5 pb-7">
            <h1 class="text-4xl font-bold text-white text-center pb-3">About Us</h1>
            {{-- <p class="text-gray-100 text-center px-2 md:px-36 lg:px-52 text-sm">Last Updated
                {{ $page->updated_at?->format('d M, Y') }}</p> --}}
        </div>


        <div class="w-full md:w-3/4 lg:w-3/4 rounded-lg shadow-lg p-6 z-20">
            <div class="bg-white w-full rounded-lg shadow-lg p-6 text-gray-700 no-tailwind">
                <div class="">
                    {!! $page->content !!}
                </div>
            </div>


        </div>


    </section>
@endsection
