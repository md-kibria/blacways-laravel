@extends('layouts.admin')

@section('title', 'Update Home Page')
@section('header', 'Update Home Page')

@section('content')
    @foreach ($homepageContent as $item)
        {{-- Single Section --}}
        <form class="my-10 p-4 rounded-md border border-slate-700" action="{{ route('admin.home.update') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="flex items-center justify-between mb-3">
                <h2 class="text-3xl capitalize">{{ $item->section }}</h2>
                <div>
                    
                    <button class="rounded shadow-sm sm:text-sm border border-gray-600 bg-blue-300 hover:bg-blue-400 text-slate-900 hover:text-white cursor-pointer py-2 px-3" type="submit">
                        Update
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <div class="col-span-2">

                    @if ($item->section !== 'donation' && $item->section !== 'about')
                    <div class="flex flex-col my-1">
                        <label for="title" class="font-light my-2 text-slate-100">Title</label>
                        <input
                            class="p-2 px-3 rounded-md bg-transparent ring-1 @error('title') ring-red-300 @else ring-slate-600 @enderror"
                            type="text" id="title" name="title" placeholder="Your title here"
                            value="{{ $item->title }}">

                        @error('title')
                            <span class="text-light text-red-300">{{ $message }}</span>
                        @enderror
                    </div>
                    @endif
                    
                    <div class="flex flex-col my-1">
                        <label for="sub_title" class="font-light my-2 text-slate-100">Description</label>
                        <textarea
                            class="p-2 px-3 rounded-md bg-transparent ring-1 @error('sub_title') ring-red-300 @else ring-slate-600 @enderror"
                            type="text" id="sub_title" name="sub_title" placeholder="Your description here" value="">{{ $item->sub_title }}</textarea>

                        @error('sub_title')
                            <span class="text-light text-red-300">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    @if($item->section !== 'donation')
                    <div class="flex flex-col my-1">
                        <label for="image" class="font-light my-2 text-slate-100">Image</label>
                        <input
                            class="p-2 px-3 rounded-md bg-transparent ring-1 @error('image') ring-red-300 @else ring-slate-600 @enderror"
                            type="file" id="image" name="image" placeholder="Your image here" value="">

                        @error('image')
                            <span class="text-light text-red-300">{{ $message }}</span>
                        @enderror
                    </div>
                    @endif

                    <input name="section" type="hidden" value="{{ $item->section }}">

                </div>
                @if($item->section !== 'donation')
                <div class="felx">
                    <label for="title" class="block font-light my-2 text-slate-100">Preview Image</label>
                    <div class="border border-slate-700 rounded-lg p-2 flex flex-col gap-2">
                        @if ($item->image)
                            <img class="ring-1 max-h-24 w-auto inline rounded-lg ring-slate-600" src="{{ asset('/storage/' . $item->image) }}" />
                        @endif
                        @if ($item->image_helper)
                            <img class="ring-1 max-h-24 w-auto inline rounded-lg ring-slate-600" src="{{ asset('/storage/' . $item->image_helper) }}" />
                        @endif

                    </div>
                </div>
                @endif
            </div>
        </form>
        {{-- Single Section --}}
    @endforeach
@endsection
