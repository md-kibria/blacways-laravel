@extends('layouts.admin')

@section('title', 'Newsletters')
@section('header', 'Newsletters')

@section('content')



    <div class="overflow-x-auto w-full pt-6 pb-4">
        <div class="flex">
            <p class="text-lg">Emails</p>
        </div>
        <table class="border-collapse border border-slate-500 my-2 w-full text-slate-300">
            <thead>
                <tr>
                    <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Id</th>
                    <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Email</th>
                    <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Date</th>
                    <th class="border border-slate-600 bg-slate-700 p-3 text-sm">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($newsletters) == 0)
                    <tr>
                        <td colspan="6" class="border border-slate-700 p-3 text-center">No items found.</td>
                    </tr>
                @endif
                @foreach ($newsletters as $item)
                    <tr class="even:bg-slate-600">
                        <td class="border border-slate-700 p-3">{{ $item->id }}</td>
                        <td class="border border-slate-700 p-3">{{ $item->email }}</td>
                        <td class="border border-slate-700 p-3">
                            {{ \Carbon\Carbon::parse($item->created_at)->toFormattedDateString() }}</td>
                        <td class="border border-slate-700 p-3 flex items-center justify-center">
                            <span
                                class="inline-flex divide-x divide-gray-300 overflow-hidden rounded border border-gray-300 bg-white shadow-sm">
                                <a href="mailto:{{$item->email}}"
                                    class="bg-blue-500 hover:bg-blue-400 cursor-pointer px-3 py-1.5 text-sm font-medium text-gray-100 transition-colors hover:text-gray-900 focus:relative">
                                    Mail
                                </a>


                                <form action="{{ route('admin.newsletters.destroy', $item->id) }}"
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
            {{ $newsletters->links('pagination::tailwind') }}
        </div>

    </div>


@endsection
