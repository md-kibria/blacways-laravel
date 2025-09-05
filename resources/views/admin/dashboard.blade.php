@extends('layouts.admin')

@section('title', 'Dashboard')
@section('header', 'Dashboard')

@section('content')

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3 my-8 w-full">
        {{-- Dashboard card --}}
        <div class="bg-purple-200 p-3 rounded-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-400">Total News</p>
                    <p class="text-4xl text-purple-500 flex">{{ $newsCount > 9 ? $newsCount : '0' . $newsCount }}</p>
                </div>
                <div>
                    <div class="bg-purple-500 h-12 w-12 rounded-full flex items-center justify-center">
                        <p class="text-2xl text-center mt-0.5 mr-0.5"><ion-icon class="my-auto block"
                                name="newspaper-outline"></ion-icon></p>
                    </div>
                </div>
            </div>
            <hr class="mt-4 mb-2 border-purple-400" />
        </div>
        {{-- Dashboard card // --}}

        {{-- Dashboard card --}}
        <div class="bg-blue-200 p-3 rounded-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-400">Total Events</p>
                    <p class="text-4xl text-blue-500">{{ $eventCount > 9 ? $eventCount : '0' . $eventCount }}</p>
                </div>
                <div>
                    <div class="bg-blue-500 h-12 w-12 rounded-full flex items-center justify-center">
                        <p class="text-2xl text-center mt-0.5 mr-0.5"><ion-icon class="my-auto block"
                                name="calendar-outline"></ion-icon></p>
                    </div>
                </div>
            </div>
            <hr class="mt-4 mb-2 border-blue-400" />
        </div>
        {{-- Dashboard card // --}}

        {{-- Dashboard card --}}
        <div class="bg-green-200 p-3 rounded-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-400">Total Members</p>
                    <p class="text-4xl text-green-500">{{ $userCount > 9 ? $userCount : '0' . $userCount }}</p>
                </div>
                <div>
                    <div class="bg-green-500 h-12 w-12 rounded-full flex items-center justify-center">
                        <p class="text-2xl text-center mt-0.5 mr-0.5"><ion-icon class="my-auto block"
                                name="people"></ion-icon></p>
                    </div>
                </div>
            </div>
            <hr class="mt-4 mb-2 border-green-400" />
        </div>
        {{-- Dashboard card // --}}

    </div>


    <div class="flex gap-2 flex-col md:flex-row">
        {{-- news --}}
        <div class="overflow-x-auto w-full py-2">
            <p class="text-lg">Recent Signups</p>
            <table class="border-collapse border border-slate-500 my-2 w-full text-slate-300">
                <thead>
                    <tr>
                        {{-- <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Id</th> --}}
                        <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Name</th>
                        <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Date</th>
                        <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($users) == 0)
                        <tr>
                            <td colspan="3" class="border border-slate-700 p-3 text-center">No items found.</td>
                        </tr>
                    @endif
                    @foreach ($users as $item)
                        <tr>
                            {{-- <td class="border border-slate-700 bg-slate-600 p-3">{{ $item->id }}</td> --}}
                            <td class="border border-slate-700 p-3">{{ $item->name }}</td>
                            <td class="border border-slate-700 p-3 w-22">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d M') }}
                            </td>
                            <td class="border border-slate-700 p-3">
                                @if ($item->status == 'published')
                                    <p
                                        class="bg-green-200 text-green-600 text-center rounded-md capitalize w-fit px-2 mx-auto">
                                        {{ $item->status }}
                                    </p>
                                @else
                                    <p class="bg-red-200 text-red-600 text-center rounded-md capitalize w-fit px-2 mx-auto">
                                        {{ $item->status }}</p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- events --}}
        <div class="overflow-x-auto w-full py-2">
            <p class="text-lg">Latest Events</p>
            <table class="border-collapse border border-slate-500 my-2 w-full text-slate-300">
                <thead>
                    <tr>
                        {{-- <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Id</th> --}}
                        <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Title</th>
                        <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Left</th>
                        <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($events) == 0)
                        <tr>
                            <td colspan="3" class="border border-slate-700 p-3 text-center">No items found.</td>
                        </tr>
                    @endif
                    @foreach ($events as $item)
                        <tr>
                        @php
                            $wait = 0;

                            if ($item->start_time) {
                                $eventStart = \Carbon\Carbon::parse($item->start_time)->startOfDay();
                                $today = now()->startOfDay();
                                $wait = $today->diffInDays($eventStart, false); // will give whole days
                                $wait = $wait > 0 ? $wait : 0;
                            }
                        @endphp
                            {{-- <td class="border border-slate-700 bg-slate-600 p-3">{{ $item->id }}</td> --}}
                            <td class="border border-slate-700 p-3">{{ $item->title }}</td>
                            <td class="border border-slate-700 p-3 w-22">
                                {{ str_pad($wait, 2, '0', STR_PAD_LEFT) }} Day{{ $wait > 1 ? 's' : '' }}
                            </td>
                            <td class="border border-slate-700 p-3">
                                @if ($item?->status == 'upcoming')
                                    <p
                                        class="bg-green-200 text-green-600 text-center rounded-md capitalize w-fit px-2 mx-auto">
                                        {{ $item?->status }}
                                    </p>
                                @elseif ($item?->status == 'ongoing')
                                    <p
                                        class="bg-blue-200 text-blue-600 text-center rounded-md capitalize w-fit px-2 mx-auto">
                                        {{ $item?->status }}
                                    </p>
                                @else
                                    <p class="bg-red-200 text-red-600 text-center rounded-md capitalize w-fit px-2 mx-auto">
                                        {{ $item?->status }}</p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
