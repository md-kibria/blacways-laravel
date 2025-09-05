@extends('layouts.admin')

@section('title', 'Add Admin')
@section('header', 'Add Admin')

@section('content')





    <div class="overflow-x-auto w-full pt-20 pb-4 dark flex items-center justify-center">


        @if ($user)

            <div class="w-full max-w-sm bg-gray-800 border border-gray-700 rounded-lg shadow-sm">
                <div class="flex justify-end px-4 pt-4">

                </div>
                <div class="flex flex-col items-center pb-10">
                    <div class="w-24 h-24 mb-3 rounded-full shadow-lg relative">
                        <img class="w-full h-full mb-3 rounded-full"
                            src="{{ $user->image ? asset('/storage/' . $user->image) : '/img/profile.png' }}"
                            alt="{{ $user->name }}" />

                        @if ($user->status === 'active')
                            <p
                                class="text-green-500 text-2xl absolute -right-0 bottom-2 bg-white rounded-full h-6 w-6 flex items-center justify-center">
                                <ion-icon name="checkmark-circle"></ion-icon>
                            </p>
                        @elseif($user->status === 'pending')
                            <p
                                class="text-yellow-500 text-2xl absolute -right-0 bottom-2 bg-white rounded-full h-6 w-6 flex items-center justify-center">
                                <ion-icon name="time"></ion-icon>
                            </p>
                        @else
                            <p
                                class="text-red-500 text-2xl absolute -right-0 bottom-2 bg-white rounded-full h-6 w-6 flex items-center justify-center">
                                <ion-icon name="close-circle"></ion-icon>
                            </p>
                        @endif
                    </div>
                    <h5 class="mb-1 text-xl font-medium text-white">{{ $user->name }}</h5>
                    <span class="text-sm text-gray-400">{{ $user->email }}</span>
                    <span class="text-sm text-gray-400">({{ $user->role }})</span>
                    <div class="flex mt-4 md:mt-6">

                        <form action="{{ route('admin.admins.add.confirm.toggle', $user->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            @if ($user->role === 'admin')
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-800 cursor-pointer">
                                    Remove Admin
                                </button>
                            @else
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-800 cursor-pointer">
                                    Make Admin
                                </button>
                            @endif
                        </form>


                    </div>
                </div>
            </div>
        @else
            <div role="alert" class="border-s-4 border-red-700 bg-red-50 p-4  max-w-sm">
                <div class="flex items-center gap-2 text-red-700">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                        <path fill-rule="evenodd"
                            d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                            clip-rule="evenodd" />
                    </svg>

                    <strong class="font-medium"> User Not Found! </strong>
                </div>

                <p class="mt-2 text-sm text-red-700">
                    No account is associated with this email. Please make sure the user has signed up before adding or
                    removing them as an admin.
                </p>

                <div class="flex justify-end">
                    <a href="{{ route('admin.admins.add') }}" class="group mt-4 inline-flex items-center gap-1 text-sm font-medium text-red-400">
                        <span aria-hidden="true" class="block transition-all group-hover:-translate-x-0.5">
                            &larr;
                        </span>
                        Back
                    </a>
                </div>

            </div>

        @endif


    </div>

@endsection
