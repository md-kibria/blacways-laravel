@extends('layouts.admin')

@section('title', 'Admins')
@section('header', 'Admins')

@section('content')



    <div class="overflow-x-auto w-full pt-6 pb-4">
        <div class="flex">
            <p class="text-lg">All Admins</p>
            <a class="inline-block rounded-sm border border-blue-300 bg-blue-300 px-6 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-blue-300 focus:ring-3 focus:outline-hidden ml-auto"
                href="{{ route('admin.admins.add') }}">
                Add New
            </a>
        </div>
        <table class="border-collapse border border-slate-500 my-2 w-full text-slate-300">
            <thead>
                <tr>
                    <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Id</th>
                    <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Name</th>
                    <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Email</th>
                    <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Status</th>
                    <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Date</th>
                    <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($admins) == 0)
                    <tr>
                        <td colspan="6" class="border border-slate-700 p-3 text-center">No items found.</td>
                    </tr>
                @endif
                @foreach ($admins as $item)
                    <tr class="even:bg-slate-600">
                        <td class="border border-slate-700 p-3">{{ $item->id }}</td>
                        <td class="border border-slate-700 p-3">{{ $item->name }}</td>
                        <td class="border border-slate-700 p-3">{{ $item->email }}</td>
                        <td class="border border-slate-700 p-3">
                            @if ($item->status === 'active')
                                <p class="bg-green-200 text-green-600 text-center rounded-md capitalize w-fit px-2 mx-auto">
                                    {{ $item->status }}
                                </p>
                            @elseif($item->status === 'pending')
                                <p class="bg-blue-200 text-blue-600 text-center rounded-md capitalize w-fit px-2 mx-auto">
                                    {{ $item->status }}
                                </p>
                            @else
                                <p class="bg-red-200 text-red-600 text-center rounded-md capitalize w-fit px-2 mx-auto">
                                    {{ $item->status }}</p>
                            @endif
                        </td>
                        <td class="border border-slate-700 p-3 text-center">
                            {{ \Carbon\Carbon::parse($item->created_at)->toFormattedDateString() }}</td>
                        <td class="border border-slate-700 p-3 flex items-center justify-center">
                            <span
                                class="inline-flex divide-x divide-gray-300 overflow-hidden rounded border border-gray-300 bg-white shadow-sm">

                                @if($item->status === 'active')
                                <form action="{{ route('admin.update', $item->id) }}"
                                    onsubmit="return confirm('Are you sure you want to change the status?')" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="rejected">
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-400 cursor-pointer px-3 py-1.5 text-sm font-medium text-gray-100 transition-colors hover:text-gray-900 focus:relative">
                                        Reject
                                    </button>
                                </form>
                                @else
                                 <form action="{{ route('admin.update', $item->id) }}"
                                    onsubmit="return confirm('Are you sure you want to change the status?')" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="active">
                                    <button type="submit"
                                        class="bg-green-500 hover:bg-green-400 cursor-pointer px-3 py-1.5 text-sm font-medium text-gray-100 transition-colors hover:text-gray-900 focus:relative">
                                        Active
                                    </button>
                                </form>
                                @endif




                                <form action="{{ route('admin.destroy', $item->id) }}"
                                    onsubmit="return confirm('Are you sure you want to delete?')" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="bg-red-400 hover:bg-red-300 cursor-pointer px-3 py-1.5 text-sm font-medium text-gray-100 transition-colors hover:text-gray-900 focus:relative">
                                        Delete
                                    </button>
                                </form>
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-white">
            {{ $admins->links('pagination::tailwind') }}
        </div>

    </div>


@endsection
