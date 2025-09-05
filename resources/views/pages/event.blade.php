@extends('layouts.main')

@section('title', $event->title)
@section('description', $event->description)

@section('content')
    <section class="py-23 min-h-screen relative z-30">
        {{-- headr --}}
        <div class="h-[500px] w-full bg-blue-200 flex flex-col items-center justify-center absolute -z-10 top-26 right-0 left-0"
            style="background-image: url('{{ $event->thumbnail ? asset('/storage/'.$event->thumbnail) : asset('img/event-bg.jpg')  }}'); background-repeat: no-repeat; background-size: cover;">
            <div class="absolute inset-0 bg-black opacity-50"></div>

            <div class="container flex flex-col items-center justify-center relative gap-6 mb-20">
                <h1 class="relative text-5xl font-bold uppercase text-white text-shadow-4xs text-center">{{ $event->title }}
                </h1>
                <div class="flex items-center justify-center">
                    <p class="font-semibole text-xl text-white uppercase">
                        {{ \Carbon\Carbon::parse($event->start_time)->format('d F Y') }}
                    </p>
                    <div class="w-2 h-2 bg-white rounded-full mx-2"></div>
                    <p class="font-semibole text-xl text-white uppercase">{{ $event->location }}</p>
                </div>
                @if ($event->status === 'upcoming')
                    <div
                        class="relative text-white bg-blue-400 hover:bg-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 uppercase">
                        {{ $event->status }}</div>
                @elseif($event->status === 'ongoing')
                    <div
                        class="relative text-white bg-green-400 hover:bg-green-500 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 uppercase">
                        {{ $event->status }}</div>
                @else
                    <div
                        class="relative text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 uppercase">
                        {{ $event->status }}</div>
                @endif
            </div>
        </div>
        {{-- Description --}}
        <div class="container mx-auto shadow-xl bg-blue-100 z-50 mt-96 rounded-md">
            {{-- <div class="bg-blue-100 rounded-md -top-32 h-full w-full absolute"> --}}
                {{-- <div class="h-20 bg-blue-400 rounded-t-md flex items-center justify-around"> --}}
                <div class=" bg-blue-400 rounded-t-md grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4">
                    @php
                        use Carbon\Carbon;

                        $diffInDays = 1;

                        if ($event->end_time && $event->start_time) {
                            $startTime = Carbon::parse($event->start_time);
                            $endTime = Carbon::parse($event->end_time);
                            $diffInDays = $startTime->diffInDays($endTime) + 1;
                        }

                        $wait = 0;

                        if ($event->start_time) {
                            $eventStart = Carbon::parse($event->start_time)->startOfDay();
                            $today = now()->startOfDay();
                            $wait = $today->diffInDays($eventStart, false); // will give whole days
                            $wait = $wait > 0 ? $wait : 0;
                        }
                    @endphp
                    <div
                        class="text-white flex items-center justify-center gap-4 py-8 border border-blue-300 rounded-tl-md rounded-tr-md sm:rounded-tr-none">
                        <ion-icon name="alarm-outline" class="text-4xl text-slate-100"></ion-icon>
                        <p class="text-4xl font-semibold">{{ str_pad($wait, 2, '0', STR_PAD_LEFT) }}</p>
                        <div class="flex flex-col justify-end uppercase">
                            <span class="font-semibold text-md leading-5">Day{{ $wait > 1 ? 's' : '' }}</span>
                            <span class="font-semibold text-md leading-5">To Go</span>
                        </div>
                    </div>

                    <div
                        class="text-white flex items-center justify-center gap-4 py-8 border border-blue-300 sm:rounded-tr-md lg:rounded-tr-none">
                        <ion-icon name="calendar-outline" class="text-4xl text-slate-100"></ion-icon>
                        <div class="flex flex-col justify-center uppercase">
                            <span
                                class="font-bold text-lg leading-5">{{ \Carbon\Carbon::parse($event->start_time)->format('F d, Y') }}</span>
                            <span class="font-regular text-md text-slate-100 leading-5">Duration: {{ $diffInDays }}
                                Days</span>

                        </div>
                    </div>

                    <div class="text-white flex items-center justify-center gap-4 py-8 border border-blue-300">
                        <ion-icon name="location-outline" class="text-4xl text-slate-100"></ion-icon>
                        <div class="flex flex-col justify-center uppercase">
                            <span class="font-bold text-lg leading-5">Location</span>
                            <span class="font-regular text-md text-slate-100 leading-5">{{ $event->location }}</span>
                        </div>
                    </div>

                    <div
                        class="text-white flex items-center justify-center gap-4 py-8 border border-blue-300 lg:rounded-tr-md">
                        <ion-icon name="people-outline" class="text-4xl text-slate-100"></ion-icon>
                        <div class="flex flex-col justify-center uppercase">
                            <span class="font-bold text-lg leading-5">Organizer</span>
                            <span class="font-regular text-md text-slate-100 leading-5">{{ $event->organizer }}</span>
                        </div>
                    </div>

                </div>
                <div class="px-5 bg-blue-100 py-4 no-tailwind">
                    {!! $event->description !!}
                </div>
            {{-- </div> --}}
        </div>

    </section>
@endsection
