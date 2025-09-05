@extends('layouts.main')

@section('title', 'Profile Update')

@section('content')

    <div class="givebutter-donation">
        <script src="https://givebutter.com/embed.js" data-campaign="478786"></script>
    </div>

    {{-- Givebutter Embed --}}
    <div class="givebutter-embed">
        <script src="https://givebutter.com/embed.js" 
                data-campaign="478786"
                data-type="donation-form">
        </script>
    </div>

    <div class="container mx-auto min-h-screen py-30 px-2 flex flex-col justify-center items-center">


        <div class="w-full max-w-sm lg:max-w-lg p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8">
            <form class="space-y-2" action="" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <h5 class="text-xl font-medium">Donate Us</h5>
                <div>
                    <label for="amount" class="block mb-2 text-sm font-medium">Your amount</label>
                    <input type="amount" name="amount" id="amount"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="You amount here" value="{{ old('amount') }}" />
                    @error('amount')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Payment</button>
            </form>
        </div>



    </div>
@endsection
