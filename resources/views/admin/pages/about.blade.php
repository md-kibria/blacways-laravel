@extends('layouts.admin')

@section('title', 'Update ' . ucfirst($page->slug) . ' Page')
@section('header', 'Update ' . ucfirst($page->slug) . ' Page')

@section('content')

    <div class="w-full py-22">

        <form action="{{ route('admin.page.update') }}" class="border border-slate-700 w-full mx-auto p-4 px-6 rounded-lg" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <label for="content" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200">Page Content </span>

                <input type="text" id="content"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('content') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter content" value="{{ old('content') ?? $page->content }}" name="content" />
                    @error('content') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>
            <input type="hidden" name="name" value="{{ $page->slug }}"/>
            <input type="hidden" name="slug" value="{{ $page->slug }}"/>

            <input type="submit" id="submit"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border border-gray-600 bg-blue-300 hover:bg-blue-400 text-slate-900 hover:text-white cursor-pointer py-2 px-3" value="Update"/>
        </form>
    </div>
    
    <x-editor-script id="content" />

@endsection
