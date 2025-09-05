@extends('layouts.admin')

@section('title', 'Password')
@section('header', 'Update Password')

@section('content')



    <div class="w-full py-22">

        <form action="{{ route('admin.profile.password.update', $user->id) }}" class="border border-slate-700 max-w-sm mx-auto p-4 px-6 rounded-lg" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h5 class="text-xl font-medium mb-1">Update Your Password</h5>
            
            <label for="current_password" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200">Current Password </span>

                <input type="password" id="current_password"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('current_password') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter current password" value="" name="current_password" />
                    @error('current_password') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>
            <label for="new_password" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200">New Password </span>

                <input type="password" id="new_password"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('new_password') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter new password" value="" name="new_password" />
                    @error('new_password') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>
            
            <label for="new_password_confirmation" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200">Password Confirmation </span>

                <input type="password" id="new_password_confirmation"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('new_password_confirmation') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter confirmation password" value="" name="new_password_confirmation" />
                    @error('new_password_confirmation') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>
            
          

            <input type="submit" id="submit"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border border-gray-600 bg-blue-300 hover:bg-blue-400 text-slate-900 hover:text-white cursor-pointer py-2 px-3" value="Submit"/>
        </form>
    </div>
    
    <x-editor-script id="content" />

@endsection
