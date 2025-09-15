@extends('layouts.admin')

@section('title', 'Profile')
@section('header', 'Profile')

@section('content')
    
    <div class="overflow-x-auto w-full pt-20 pb-4 dark flex items-center justify-center">



        <div class="w-full max-w-sm bg-gray-800 border border-gray-700 rounded-lg shadow-sm">
            <div class="flex justify-end px-4 pt-4">
               
            </div>
            <div class="flex flex-col items-center pb-10">
                <div class="w-24 h-24 mb-3 rounded-full shadow-lg relative">
                    <img class="w-full h-full mb-3 rounded-full"
                        src="{{ $user->image ? asset('/storage/' . $user->image) : '/img/profile.png' }}"
                        alt="{{ $user->first_name }}" />

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
                            <ion-icon name="close-circle"></ion-icon>
                        </p>
                    @endif
                </div>
                <h5 class="mb-1 text-xl font-medium text-white">{{ $user?->profile?->first_name }} {{ $user?->profile?->last_name }}</h5>
                <span class="text-sm text-gray-400">{{ $user->email }}</span>
                <div class="flex mt-4 md:mt-6">
                    
                        <a href="{{ route('admin.profile.edit', $user->id) }}"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-800 cursor-pointer">
                            Update Profile
                </a>
                   
                    
                </div>
            </div>
        </div>


    </div>

@endsection
