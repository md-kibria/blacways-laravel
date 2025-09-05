@extends('layouts.admin')

@section('title', 'Add New Admin')
@section('header', 'Add New Admin')

@section('content')



    <div class="w-full py-22">

        <form action="{{ route('admin.admins.add.confirm') }}" class="border border-slate-700 max-w-lg mx-auto p-4 px-6 rounded-lg" method="GET" enctype="multipart/form-data">
            @csrf
            <h5 class="text-xl font-medium mb-1">Search Admin</h5>
            <label for="email" class="block font-light my-2 text-slate-100">
                <span class="text-sm font-medium text-gray-200"> Email </span>

                <input type="email" id="email"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border @error('email') border-red-300 @else border-gray-600 @enderror bg-gray-900 text-white py-2 px-3"
                    placeholder="Enter email address" value="{{ old('email') }}" name="email" />
                    @error('email') <span class="text-light text-red-300">{{$message}}</span> @enderror
            </label>

            <input type="submit" id="submit"
                    class="mt-0.5 w-full rounded shadow-sm sm:text-sm border border-gray-600 bg-blue-300 hover:bg-blue-400 text-slate-900 hover:text-white cursor-pointer py-2 px-3" value="Submit"/>
        </form>
    </div>
    
    <x-editor-script id="content" />

@endsection
