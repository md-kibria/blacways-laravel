@extends('layouts.main')

@section('title', 'Login')

@section('content')
    <section class="min-h-screen relative py-32 flex flex-col items-center about-page">
        
        <div class="bg-white p-8 rounded-lg shadow-xl hover:shadow-2xl transition duration-300 w-full max-w-md">
            <h2 class="text-2xl text-slate-700 font-bold mb-6 text-center">Login</h2>
            <form action="{{ route('auth') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-400">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" 
                        class="py-2 px-3 mt-1 block w-full rounded-md border @error('email') border-red-300 @else border-gray-400 @enderror text-slate-700 shadow-sm focus:outline-0 focus:ring-slate-400 focus:border-slate-400 sm:text-sm" placeholder="Enter your email" required>
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-400">Password</label>
                    <input type="password" name="password" id="password" 
                        class="py-2 px-3 mt-1 block w-full rounded-md border @error('password') border-red-300 @else border-gray-400 @enderror text-slate-700 shadow-sm focus:outline-0 focus:ring-slate-400 focus:border-slate-400 sm:text-sm" placeholder="Enter your password" required>
                        @error('password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                </div>
                <div class="text-left mt-4 pb-3">
                    <p class="text-sm text-gray-400">
                        Don't have an account? 
                        <a href="{{ route('signup') }}" class="text-blue-500 hover:text-blue-600 underline">SignUp here</a>.
                    </p>
                </div>
                <button type="submit" 
                    class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 transition duration-300 ease-in-out cursor-pointer">
                    Submit
                </button>
            </form>
        </div>




    </section>
@endsection
