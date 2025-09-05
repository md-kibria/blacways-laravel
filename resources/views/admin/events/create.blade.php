@extends('layouts.admin')

@section('title', 'Add Event')
@section('header', 'Add Event')

@section('content')



    <div class="w-full py-22">

        <form action="{{ route('admin.events.store') }}" class="border border-slate-700 w-2/3 mx-auto p-4 px-6 rounded-lg" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <label for="title" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200"> Title </span>

                <input type="title" id="title"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('title') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter title" value="{{ old('title') }}" name="title" />
                    @error('title') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>
            <label for="thumbnail" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200">Thumbnail </span>

                <input type="file" id="thumbnail"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('thumbnail') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter thumbnail" name="thumbnail" />
                    @error('thumbnail') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>
            <label for="organizer" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200">Organizer </span>

                <input type="text" id="organizer"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('organizer') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter organizer" value="{{ old('organizer') }}" name="organizer" />
                    @error('organizer') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>
            <label for="location" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200">Location </span>

                <input type="text" id="location"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('location') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter location" value="{{ old('location') }}" name="location" />
                    @error('location') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>
            <label for="start_time" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200">Start Time </span>

                <input type="date" id="start_time"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('start_time') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter Start Time" value="{{ old('start_time') }}" name="start_time" />
                    @error('start_time') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>
            <label for="end_time" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200">End Time </span>

                <input type="date" id="end_time"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('end_time') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter End Time" value="{{ old('end_time') }}" name="end_time" />
                    @error('end_time') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>
            <label for="description" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200">Description </span>

                <textarea name="description" id="description" cols="30" rows="10" class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('description') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3" placeholder="Enter description">{{ old('description') }}</textarea>
                    @error('description') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>

            <input type="submit" id="submit"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border border-gray-600 bg-blue-300 hover:bg-blue-400 text-slate-900 hover:text-white cursor-pointer py-2 px-3" value="Submit"/>
        </form>
    </div>
    
    <x-editor-script id="description" />

@endsection
