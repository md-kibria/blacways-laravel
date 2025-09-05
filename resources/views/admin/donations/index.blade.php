@extends('layouts.admin')

@section('title', 'Donations')
@section('header', 'Donations')

@section('content')



    <div class="overflow-x-auto w-full pt-6 pb-4">
        <table class="border-collapse border border-slate-500 my-2 w-full text-slate-300">
            <thead>
                <tr>
                    <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Transaction Id</th>
                    <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Ref Id</th>
                    <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Name</th>
                    <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Email</th>
                    <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Amound</th>
                    <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Status</th>
                    <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Refund</th>
                </tr>
            </thead>
            <tbody>
                @if (count($donations) == 0)
                    <tr>
                        <td colspan="7" class="border border-slate-700 p-3 text-center">No items found.</td>
                    </tr>
                @endif
                @foreach ($donations as $item)
                    <tr class="even:bg-slate-600">
                        <td class="border border-slate-700 p-3">{{ $item->id }}</td>
                        <td class="border border-slate-700 p-3">
                            <img class="h-10 rounded-md mx-auto" src="{{ asset('/storage/' . $item->thumbnail) }}" alt="">
                        </td>
                        <td class="border border-slate-700 p-3">{{ $item->title }}</td>
                        <td class="border border-slate-700 p-3">
                            {{ \Carbon\Carbon::parse($item->created_at)->toFormattedDateString() }}</td>
                        <td class="border border-slate-700 p-3">
                            @if ($item->status == 'published')
                                <p class="bg-green-200 text-green-600 text-center rounded-md capitalize w-fit px-2 mx-auto">
                                    {{ $item->status }}
                                </p>
                            @else
                                <p class="bg-red-200 text-red-600 text-center rounded-md capitalize w-fit px-2 mx-auto">
                                    {{ $item->status }}</p>
                            @endif
                        </td>
                        <td class="border border-slate-700 p-3 ">
                            <div class="flex items-center justify-center">
                                <span
                                    class="inline-flex divide-x divide-gray-300 overflow-hidden rounded border border-gray-300 bg-white shadow-sm">
                                    <a href="{{ route('admin.news.edit', $item->id) }}"
                                        class="bg-yellow-500 hover:bg-yellow-400 cursor-pointer px-3 py-1.5 text-sm font-medium text-gray-100 transition-colors hover:text-gray-900 focus:relative">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.news.destroy', $item->id) }}"
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
            {{ $donations->links('pagination::tailwind') }}
        </div>

    </div>


@endsection
