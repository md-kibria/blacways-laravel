@extends('layouts.main')

@section('title', $user->name.' Profile')

@section('content')
    {{-- <div class="container mx-auto h-screen py-25 flex flex-col justify-start gap-3">

        <h2 class="text-4xl text-slate-700 font-semibold mb-6">Welcome back, John Doe!</h2>

        <div class="grid grid-cols-2 w-full gap-4">
            <div class="shadow-md w-full rounded-md">
                <div class="flex justify-between items-center bg-slate-100 p-4">
                    <h2 class="text-xl font-semibold text-slate-700">User Status</h2>
                    <a href=""
                        class="bg-blue-300 py-1 px-2 rounded-sm text-white hover:bg-blue-200 transition duration-200">Chat</a>
                </div>
                <div class="p-4">
                    <p class="text-lg text-gray-700">Account: <span class="text-green-600">Active</span></p>
                    <p class="text-lg text-gray-700">Due Balance: <span class="text-red-600">$68.00</span></p>
                    <!-- <p class="text-lg text-gray-700">Join: <span class="text-slate-600">2 August, 2025</span></p> -->
                </div>
            </div>
            <div class="shadow-md w-full rounded-md">
                <div class="flex justify-between items-center bg-slate-100 p-4">
                    <h2 class="text-xl font-semibold text-slate-700">User Info</h2>
                    <a href=""
                        class="bg-blue-300 py-1 px-2 rounded-sm text-white hover:bg-blue-200 transition duration-200">Update</a>
                </div>
                <div class="p-4">
                    <p class="text-lg text-gray-700">Name: <span class="text-slate-600">John Doe</span></p>
                    <p class="text-lg text-gray-700">Email: <span class="text-slate-600">john@test.com</span></p>
                    <p class="text-lg text-gray-700">Join: <span class="text-slate-600">2 August, 2025</span></p>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="container mx-auto min-h-screen py-15 px-2 flex flex-col justify-center items-center">



        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="flex justify-end px-4 pt-4">
                <a
                    class="inline-block text-red-500 hover:bg-red-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg text-2xl p-1 cursor-pointer"
                    title="Logout" href="{{ route('logout') }}">
                    <ion-icon name="log-out-outline"></ion-icon>
            </a>
                
            </div>
            <div class="flex flex-col items-center pb-10">
                <div class="w-24 h-24 mb-3 rounded-full shadow-lg relative">
                    <img class="w-full h-full mb-3 rounded-full"
                        src="{{ $user->image ? asset('/storage/'.$user->image) : '/img/profile.png' }}" alt="{{ $user->name }}" />

                    @if ($user->status === 'active')
                        <p
                            class="text-green-500 text-2xl absolute -right-0 bottom-2 bg-white rounded-full h-6 w-6 flex items-center justify-center">
                            <ion-icon name="checkmark-circle"></ion-icon>
                        </p>
                    @elseif($user->status === 'pending')
                        <p
                            class="text-yellow-500 text-2xl absolute -right-0 bottom-2 bg-white rounded-full h-6 w-6 flex items-center justify-center">
                            <ion-icon name="time"></ion-icon>
                        </p>
                    @else
                        <p
                            class="text-red-500 text-2xl absolute -right-0 bottom-2 bg-white rounded-full h-6 w-6 flex items-center justify-center">
                            <ion-icon name="close-circle"></ion-icon></p>
                    @endif
                </div>
                <h5 class="mb-1 text-xl font-medium text-gray-900">{{ $user->name }}</h5>
                <span class="text-sm text-gray-500">{{ $user->email }}</span>
                <span class="text-sm text-red-400">Due: ${{ $user->balance ?? 0 }}</span>
                <div class="flex mt-4 md:mt-6">
                    <a href="{{ route('forum') }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300"
                        title="Forum">Forum</a>
                    <a href="{{ route('profile.edit') }}"
                        class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100"
                        title="Update Profile">Update</a>
                </div>
            </div>
        </div>


    </div>
@endsection
