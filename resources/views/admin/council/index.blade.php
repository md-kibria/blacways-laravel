@extends('layouts.admin')

@section('title', 'Council of Elders')
@section('header', 'Council of Elders')

@section('content')



    <div class="overflow-x-auto w-full pt-6 pb-4">
        <div class="flex">
            <p class="text-lg">All Elders</p>
            <a class="inline-block rounded-sm border border-blue-300 bg-blue-300 px-6 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-blue-300 focus:ring-3 focus:outline-hidden ml-auto"
                href="{{ route('admin.council.create') }}">
                Add
            </a>
        </div>
        <table class="border-collapse border border-slate-500 my-2 w-full text-slate-300">
            <thead>
                <tr>
                    <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Id</th>
                    <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Image</th>
                    <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Name</th>
                    <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Position</th>
                    <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Date</th>
                    <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($councils) == 0)
                    <tr>
                        <td colspan="6" class="border border-slate-700 p-3 text-center">No items found.</td>
                    </tr>
                @endif
                @foreach ($councils as $item)
                    <tr class="even:bg-slate-600">
                        <td class="border border-slate-700 p-3">{{ $item->id }}</td>
                        <td class="border border-slate-700 p-3">
                            <img class="h-10 rounded-md mx-auto" src="{{ asset('/storage/' . $item->image) }}" alt="">
                        </td>
                        <td class="border border-slate-700 p-3">{{ $item->name }}</td>
                        <td class="border border-slate-700 p-3">{{ $item->position }}</td>
                        <td class="border border-slate-700 p-3">
                            {{ \Carbon\Carbon::parse($item->created_at)->toFormattedDateString() }}</td>
                        <td class="border border-slate-700 p-3 ">
                            <div class="flex items-center justify-center">
                                <span
                                    class="inline-flex divide-x divide-gray-300 overflow-hidden rounded border border-gray-300 bg-white shadow-sm">
                                    <a href="{{ route('admin.council.edit', $item->id) }}"
                                        class="bg-yellow-500 hover:bg-yellow-400 cursor-pointer px-3 py-1.5 text-sm font-medium text-gray-100 transition-colors hover:text-gray-900 focus:relative">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.council.destroy', $item->id) }}"
                                        onsubmit="return confirm('Are you sure you want to delete?')" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="bg-red-400 hover:bg-red-300 cursor-pointer px-3 py-1.5 text-sm font-medium text-gray-100 transition-colors hover:text-gray-900 focus:relative">
                                            Delete
                                        </button>
                                    </form>
                                </span>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-white">
            {{ $councils->links('pagination::tailwind') }}
        </div>

    </div>


@endsection
