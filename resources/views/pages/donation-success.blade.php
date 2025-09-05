@extends('layouts.main')

@section('title', 'Donation Success')

@section('content')

    <div class="container mx-auto min-h-screen py-30 px-2 flex flex-col justify-center items-center">
        <div class="w-full max-w-sm lg:max-w-lg p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8 flex flex-col items-center">
            <div class="mb-4">
                <svg class="w-16 h-16 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" stroke-width="2" stroke="currentColor" fill="white"/>
                    <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4"/>
                </svg>
            </div>
            <h5 class="text-2xl font-bold text-green-600 mb-2">Thank You!</h5>
            <p class="text-gray-700 text-center mb-4">Your donation was successful. We appreciate your support!</p>
            <a href="{{ route('home') }}" class="text-blue-700 hover:underline">Go back to Home</a>
        </div>
    </div>
@endsection
