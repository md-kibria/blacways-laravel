@extends('layouts.admin')

@section('title', 'Update Profile')
@section('header', 'Update Profile')

@section('content')



    <div class="w-full py-22">
        <form action="{{ route('admin.profile.update', $user->id) }}" class="border border-slate-700 max-w-sm mx-auto p-4 px-6 rounded-lg" method="POST" enctype="multipart/form-data">
            <h5 class="text-xl font-medium mb-1">Update Your Profile</h5>
            @csrf
            @method('PUT')

            @if($user->image)
            <img src="{{ asset('/storage/'.$user->image) }}" alt="" class="w-32 h-32 rounded-full mx-auto mb-4">
            @endif
            
            <label for="name" class="block font-light my-2 text-slate-100" style="display: none;">
                <span class="text-sm font-medium text-gray-200"> Name </span>

                <input type="text" id="name"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('name') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter name" value="{{ old('name') ?? $user->name }}" name="name" />
                    @error('name') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>
            <label for="email" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200"> Email </span>

                <input type="text" id="email"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('email') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter email" value="{{ old('email') ?? $user->email }}" name="email" />
                    @error('email') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>
            <label for="image" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200"> image </span>

                <input type="file" id="image"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('image') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter image" value="{{ old('image') }}" name="image" />
                    @error('image') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>
            
          

            <input type="submit" id="submit"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border border-gray-600 bg-blue-300 hover:bg-blue-400 text-slate-900 hover:text-white cursor-pointer py-2 px-3" value="Submit"/>
        </form>
    </div>
    
    <x-editor-script id="content" />


@endsection
