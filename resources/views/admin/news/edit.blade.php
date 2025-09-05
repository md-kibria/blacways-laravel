@extends('layouts.admin')

@section('title', 'Edit News')
@section('header', 'Edit News')

@section('content')



    <div class="w-full py-22">

        <form action="{{ route('admin.news.update', $news->id) }}" class="border border-slate-700 w-2/3 mx-auto p-4 px-6 rounded-lg" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="title" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200"> Title </span>

                <input type="title" id="title"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('title') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter title" value="{{ old('title') ?? $news->title }}" name="title" />
                    @error('title') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>
            <label for="thumbnail" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200">Thumbnail </span>

                <input type="file" id="thumbnail"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('thumbnail') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter thumbnail" name="thumbnail" />
                    @error('thumbnail') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>
            <label for="status" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200">Status </span>

                <select name="status" id="" class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('status') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3">
                    <option value="published" @selected($news->status === 'published')>Published</option>
                    <option value="draft" @selected($news->status === 'draft')>Draft</option>
                </select>
                    @error('status') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>
            <label for="content" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200">Content </span>

                <textarea name="content" id="content" cols="30" rows="10" class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('content') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3" placeholder="Enter content">{{ old('content') ?? $news->content }}</textarea>
                    @error('content') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>

            <input type="submit" id="submit"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border border-gray-600 bg-blue-300 hover:bg-blue-400 text-slate-900 hover:text-white cursor-pointer py-2 px-3" value="Update"/>
        </form>
    </div>
    
    <x-editor-script id="content" />

@endsection
