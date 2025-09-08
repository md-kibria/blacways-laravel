@extends('layouts.admin')

@section('title', 'Edit council of elders')
@section('header', 'Edit council of elders')

@section('content')



    <div class="w-full py-22">

        <form action="{{ route('admin.council.update', $council->id) }}" class="border border-slate-700 w-2/3 mx-auto p-4 px-6 rounded-lg" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="name" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200"> Name </span>

                <input type="name" id="name"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('name') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter name" value="{{ old('name') ?? $council->name }}" name="name" />
                    @error('name') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>
            <label for="image" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200">Image </span>

                <input type="file" id="image"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('image') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter image" name="image" />
                    @error('image') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>
            <label for="position" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200"> Position </span>

                <input type="position" id="position"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('position') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter position" value="{{ old('position') ?? $council->position }}" name="position" />
                    @error('position') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>
            
            <label for="about" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200"> About </span>

                <textarea type="about" id="about"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('about') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter about" name="about">{{ old('about') ?? $council->about }}</textarea>
                    @error('about') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>

            <input type="submit" id="submit"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border border-gray-600 bg-blue-300 hover:bg-blue-400 text-slate-900 hover:text-white cursor-pointer py-2 px-3" value="Submit"/>
        </form>
    </div>
    
    <x-editor-script id="content" />

@endsection
