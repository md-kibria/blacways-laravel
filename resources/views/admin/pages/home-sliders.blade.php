@extends('layouts.admin')

@section('title', 'Home Page Slides')
@section('header', 'Home Page Slides')

@section('content')


    {{-- Single Section --}}
    <form class="my-10 p-4 rounded-md border border-slate-700" action="{{ route('admin.home.sliders.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="flex items-center justify-between mb-3">
            <h2 class="text-3xl capitalize">Add New</h2>
        </div>

        <div class="grid grid-cols-1 gap-2">


            <div class="flex flex-col">
                <label for="title" class="font-light my-2 text-slate-100">Title</label>
                <input
                    class="p-2 px-3 rounded-md bg-transparent ring-1 @error('title') ring-red-300 @else ring-slate-600 @enderror"
                    type="text" id="title" name="title" placeholder="Your title here" value="{{ old('title') }}">

                @error('title')
                    <span class="text-light text-red-300">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="description" class="font-light my-2 text-slate-100">Description</label>
                <textarea
                    class="p-2 px-3 rounded-md bg-transparent ring-1 @error('description') ring-red-300 @else ring-slate-600 @enderror"
                    type="text" id="description" name="description" placeholder="Your description here" value="">{{ old('description') }}</textarea>

                @error('description')
                    <span class="text-light text-red-300">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="link" class="font-light my-2 text-slate-100">Link</label>
                <input
                    class="p-2 px-3 rounded-md bg-transparent ring-1 @error('link') ring-red-300 @else ring-slate-600 @enderror"
                    type="link" id="link" name="link" placeholder="Your link here" value="{{ old('link') }}">

                @error('link')
                    <span class="text-light text-red-300">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="image" class="font-light my-2 text-slate-100">Image</label>
                <input
                    class="p-2 px-3 rounded-md bg-transparent ring-1 @error('image') ring-red-300 @else ring-slate-600 @enderror"
                    type="file" id="image" name="image" placeholder="Your image here" value="">

                @error('image')
                    <span class="text-light text-red-300">{{ $message }}</span>
                @enderror
            </div>

            <button
                class="rounded-md shadow-sm sm:text-sm border border-gray-600 bg-blue-300 hover:bg-blue-400 text-slate-900 hover:text-white cursor-pointer py-2 px-3 my-3 w-full"
                type="submit">
                Submit
            </button>
        </div>
    </form>

    @foreach ($slides as $slide)
        <form class="my-10 p-4 rounded-md border border-slate-700"
            action="{{ route('admin.home.sliders.update', $slide->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex items-center justify-between mb-3">
                <h2 class="text-3xl capitalize">Slide {{ $slide->id }}</h2>
                <div class="flex">

                    <button
                        class="rounded shadow-sm sm:text-sm border border-gray-600 bg-blue-300 hover:bg-blue-400 text-slate-900 hover:text-white cursor-pointer py-2 px-3"
                        type="submit">
                        Update
                    </button>
                    <a class="rounded shadow-sm sm:text-sm border border-gray-600 bg-red-300 hover:bg-red-400 text-slate-900 hover:text-white cursor-pointer py-2 px-3"
                        href="{{ route('admin.home.sliders.destroy', $slide->id) }}">
                        Delete
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <div class="col-span-2">

                    <div class="flex flex-col">
                        <label for="title" class="font-light my-2 text-slate-100">Title</label>
                        <input
                            class="p-2 px-3 rounded-md bg-transparent ring-1 @error('title') ring-red-300 @else ring-slate-600 @enderror"
                            type="text" id="title" name="title" placeholder="Your title here"
                            value="{{ $slide->title }}">

                        @error('title')
                            <span class="text-light text-red-300">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col">
                        <label for="description" class="font-light my-2 text-slate-100">Description</label>
                        <textarea
                            class="p-2 px-3 rounded-md bg-transparent ring-1 @error('description') ring-red-300 @else ring-slate-600 @enderror"
                            type="text" id="description" name="description" placeholder="Your description here" value="">{{ $slide->description }}</textarea>

                        @error('description')
                            <span class="text-light text-red-300">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col">
                        <label for="link" class="font-light my-2 text-slate-100">Link</label>
                        <input
                            class="p-2 px-3 rounded-md bg-transparent ring-1 @error('link') ring-red-300 @else ring-slate-600 @enderror"
                            type="link" id="link" name="link" placeholder="Your link here"
                            value="{{ $slide->link }}">

                        @error('link')
                            <span class="text-light text-red-300">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col">
                        <label for="image" class="font-light my-2 text-slate-100">Image</label>
                        <input
                            class="p-2 px-3 rounded-md bg-transparent ring-1 @error('image') ring-red-300 @else ring-slate-600 @enderror"
                            type="file" id="image" name="image" placeholder="Your image here" value="">

                        @error('image')
                            <span class="text-light text-red-300">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="felx">
                    <label for="title" class="block font-light my-2 text-slate-100">Preview Image</label>
                    <div class="border border-slate-700 rounded-lg p-2 flex flex-col gap-2">
                        <img class="ring-1 max-h-24 w-auto inline rounded-lg ring-slate-600"
                            src="{{ asset('/storage/' . $slide->image) }}" />


                    </div>
                </div>

            </div>
        </form>
    @endforeach

@endsection
