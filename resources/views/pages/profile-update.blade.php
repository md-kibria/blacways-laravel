@extends('layouts.main')

@section('title', 'Profile Update')

@section('content')

    <div class="container mx-auto min-h-screen py-30 px-2 flex flex-col justify-center items-center">


        <div class="w-full max-w-sm lg:max-w-lg p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8">
            <form class="space-y-2" action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <h5 class="text-xl font-medium">Update Your Profile</h5>
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium">Your name</label>
                    <input type="name" name="name" id="name"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="You name here" value="{{ old('name') ?? $user->name }}" />
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                </div>
                <div>
                    <label for="image" class="block mb-2 text-sm font-medium">Your image</label>
                    <input type="file" name="image" id="image"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="" />
                        @error('image')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium">Your email</label>
                    <input type="email" name="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Your email here" value="{{ old('email') ?? $user->email }}" />
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                </div>

                <div class="flex items-center pt-2">
                    <div class="flex-grow border-t border-gray-400"></div>
                    <span class="mx-4 text-gray-600">Change Password</span>
                    <div class="flex-grow border-t border-gray-400"></div>
                </div>

                <div>
                    <label for="old_password" class="block mb-2 text-sm font-medium">Old password</label>
                    <input type="password" name="old_password" id="old_password" placeholder="Your old password here"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                        @error('old_password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium">New Password</label>
                    <input type="password" name="password" id="password" placeholder="Your new password here"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                        @error('password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                </div>
                <button type="submit"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Update</button>
            </form>
        </div>



    </div>
@endsection
