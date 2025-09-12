@extends('layouts.admin')

@section('title', 'Gallery')
@section('header', 'Gallery')

@section('content')



    <div class="overflow-x-auto w-full pt-6 pb-4">
        <div class="flex">
            <p class="text-lg">All Items</p>
            <div class="ml-auto">
                <a class="inline-block rounded-sm border border-slate-300 bg-slate-300 px-6 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-slate-300 focus:ring-3 focus:outline-hidden"
                    href="{{ route('admin.gallery.category.create') }}">
                    Add Category
                </a>
                <a class="inline-block rounded-sm border border-blue-300 bg-blue-300 px-6 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-blue-300 focus:ring-3 focus:outline-hidden"
                    href="{{ route('admin.gallery.create') }}">
                    Add Photo
                </a>
            </div>
        </div>


        @if (count($galleries) == 0)
            <div class="h-96 w-full flex items-center justify-center">
                <span class="p-3 text-center">No items found.</span>
            </div>
        @endif


        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 my-4">
            @foreach ($galleries as $item)
                <div class="relative group shadow-2xl">
                    <div class="h-48 max-w-full">
                        <img class="h-full w-full rounded-lg object-cover" src="{{ asset('/storage/' . $item->src) }}"
                            alt="">
                    </div>

                    <form
                        class="absolute h-auto max-w-full rounded-lg top-0 left-0 right-0 bottom-0 items-center justify-center hidden group-hover:flex"
                        action="{{ route('admin.gallery.destroy', $item->id) }}"
                        onsubmit="return confirm('Are you sure you want to delete?')" method="POST">
                        @csrf
                        @method('DELETE')

                        <div class="absolute inset-0 bg-black opacity-50"></div>
                        <button type="submit"
                            class="relative bg-red-400 hover:bg-red-300 cursor-pointer px-3 py-1.5 text-sm font-medium rounded-md text-gray-100 transition-colors hover:text-gray-900 focus:relative">
                            Delete
                        </button>
                    </form>
                </div>
            @endforeach
        </div>

        <div class="text-white">
            {{ $galleries->links('pagination::tailwind') }}
        </div>

    </div>


@endsection
