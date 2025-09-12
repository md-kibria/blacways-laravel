@extends('layouts.admin')

@section('title', 'Edit Category')
@section('header', 'Edit Category')

@section('content')



    <div class="w-full py-22">

        <form action="{{ route('admin.gallery.category.update', $cat->id) }}"
            class="border border-slate-700 max-w-lg mx-auto p-4 px-6 rounded-lg" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="title" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200"> Title </span>

                <input type="title" id="title"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('title') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter title" value="{{ old('title') ?? $cat->title }}" name="title" />
                @error('title')
                    <span class="text-light text-red-300">{{ $message }}</span>
                @enderror
            </label>
            <label for="thumbnail" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200">Thumbnail </span>

                <input type="file" id="thumbnail"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('thumbnail') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter thumbnail" name="thumbnail" />
                @error('thumbnail')
                    <span class="text-light text-red-300">{{ $message }}</span>
                @enderror
            </label>

            <input type="submit" id="submit"
                class="mt-0.5 w-full rounded shadow-sm sm:text-sm border border-gray-600 bg-blue-300 hover:bg-blue-400 text-slate-900 hover:text-white cursor-pointer py-2 px-3"
                value="Submit" />
        </form>
    </div>

    <x-editor-script id="content" />

@endsection
