@extends('layouts.main')

@section('title', $page->name)
@section('description', strip_tags($page->description))

@section('content')
    <div class="px-5 md:px-25 py-15">
        <h2 class="text-4xl font-bold mb-2 text-slate-600 text-center">{{$page->name}}</h2>
        <p class="text-slate-400 text-center w-[80%] md:w-[60%] xl:w-[50%] mx-auto mb-8">{{$page->description}}</p>



        <div class="container mx-auto min-h-screen py-25">

            <!-- <h2 class="text-4xl text-slate-700 font-semibold mb-6">Events Calendar</h2> -->

            <!-- Modal -->
            <div id="eventModal" class="fixed z-10 inset-0 bg-opacity-50 items-center justify-center flex hidden">
                <div class="bg-white p-6 rounded-lg w-[500px] shadow-lg">
                    <div class="flex items-start justify-between">
                        <h2 id="modalTitle" class="text-xl font-bold text-gray-700 sm:text-2xl"></h2>
                        <button type="button" onclick="closeModal()"
                            class="-me-4 -mt-4 rounded-full p-2 text-gray-400 transition-colors hover:bg-gray-50 hover:text-gray-600 focus:outline-none cursor-pointer"
                            aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex gap-2 mt-3">
                        <p class="text-gray-500 capitalize"><strong>Status:</strong> <span id="modalStatus"></span></p>
                        <p class="text-gray-500"><strong>Start:</strong> <span id="modalStart"></span></p>
                        <p class="text-gray-500"><strong>End:</strong> <span id="modalEnd"></span></p>
                    </div>
                    <p class="text-gray-500 pt-3">
                        {{-- <strong>Description:</strong> --}}
                    </p>
                    <p id="modalDescription" class="text-gray-700 mb-4 line-clamp-4"></p>
                    <!-- <button onclick="closeModal()" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Close</button> -->
                    <a href="" id="eventUrl"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 w-full cursor-pointer inline-block text-center">More
                        Details</a>
                </div>
            </div>

            <div id='calendar'></div>


        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    events: @json($events), // Laravel → JS
                    eventClick: function(info) {
                        // Set modal values
                        document.getElementById('modalTitle').innerText = info.event.title;
                        document.getElementById('modalStatus').innerText = info.event.extendedProps.status;
                        document.getElementById('modalStart').innerText = info.event.start
                            .toLocaleDateString();
                        document.getElementById('modalEnd').innerText = info.event.end ? info.event.end
                            .toLocaleDateString() : 'One Day Event';
                        document.getElementById('modalDescription').innerText = info.event.extendedProps
                            .description.replace(/<\/?[^>]+(>|$)/g, "") || 'No description';
                        document.getElementById('eventUrl').href = `/events/${info.event.id}`;

                        // Show modal
                        document.getElementById('eventModal').classList.remove('hidden');
                    }
                });
                calendar.render();
            });


            function closeModal() {
                document.getElementById('eventModal').classList.add('hidden');
            }
        </script>

    </div>
@endsection
