@extends('layouts.main')

@section('title', $page->name)
@section('description', $page->description)

@section('content')
<section class="min-h-screen relative py-15 flex flex-col items-center about-page">

    <div class="h-[450px] w-[calc(100%+100px)] bg-green-100 absolute -top-20 -left-10 z-10 flex flex-col items-center justify-center rotate-[-5deg]">
    </div>
    
    <div class="flex flex-col items-center z-20 pt-5 pb-7">
        <h1 class="text-4xl font-bold text-slate-600 text-center pb-3">{{ $page->name ?? 'Contact Us'}}</h1>
        <p class="text-gray-500 text-center px-2 md:px-36 lg:px-52 text-md text-capitalized">{{$page->description ?? 'Reach Out To Us Anytime'}}</p>
    </div>
   
    
    <div class="w-full md:w-3/4 lg:w-3/4 rounded-lg shadow-lg p-6 z-20">
        <div class="bg-white w-full rounded-lg shadow-lg p-6 text-gray-600">
            <div class="card-body py-5">
                <p class="w-1/2 text-center mx-auto"></p>
        
                <div class="flex flex-wrap">
                    <form action="{{ route('message.store') }}" method="POST" class="w-full lg:w-1/2 px-5 lg:border-r border-gray-300">
                        @csrf
                        <div class="space-y-4">
                            <b class="text-gray-400 text-sm font-semibold">Available 24/7</b>
                            <h2 class="text-2xl text-gray-600 font-semibold">Get In Touch</h2>
                            <div>
                                <input type="text" name="name" id="firstNameinput" placeholder="Enter your name" class="w-full border @error('name') border-red-300 @else border-gray-300 @enderror rounded px-2 py-1.5">
                                @error('name')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <input type="text" name="email" id="email" placeholder="Enter your email address" class="w-full border @error('email') border-red-300 @else border-gray-300 @enderror rounded px-2 py-1.5">
                                @error('email')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <textarea name="message" id="message" placeholder="Enter your message" cols="30" rows="6" class="w-full border @error('message') border-red-300 @else border-gray-300 @enderror rounded px-2 py-1.5"></textarea>
                                @error('message')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <button type="submit" class="w-full border border-[#71A129] bg-gradient-to-r from-[#71A129] to-[#588B22] px-8 text-white hover:bg-none hover:text-[#588B22] py-2 rounded cursor-pointer transition">Submit</button>
                            </div>
                        </div>
                    </form>
        
                    <div class="w-full lg:w-1/2 px-5 pt-10 lg:pt-0 flex flex-col justify-center space-y-3">
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center justify-center border border-gray-500 rounded-full h-9 w-9">
                                <ion-icon name="location-outline" class="text-2xl text-gray-500"></ion-icon>
                            </div>
                            <div class="flex-grow text-gray-600">
                                <h3 class="text-xl font-semibold mb-0.5">Location</h3>
                                <p class="border-b border-gray-300 text-sm pb-0.5">{{ $info->address ? $info->address : ''  }}</p>
                            </div>
                        </div>
        
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center justify-center border border-gray-500 rounded-full h-9 w-9">
                                <ion-icon name="call-outline" class="text-2xl text-gray-500"></ion-icon>
                            </div>
                            <div class="flex-grow text-gray-600">
                                <h3 class="text-xl font-semibold mb-0.5">Phone Number</h3>
                                <a href="tel:{{ $info->phone ? $info->phone : ''  }}" class="block border-b border-gray-300 text-sm pb-0.5 text-gray-600">{{ $info->phone ? $info->phone : ''  }}</a>
                            </div>
                        </div>
        
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center justify-center border border-gray-500 rounded-full h-9 w-9">
                                <ion-icon name="mail-outline" class="text-2xl text-gray-500"></ion-icon>
                            </div>
                            <div class="flex-grow text-gray-600">
                                <h3 class="text-xl font-semibold mb-0.5">Email Address</h3>
                                <a href="mailto:{{ $info->email ? $info->email : ''  }}" class="block border-b border-gray-300 text-sm pb-0.5 text-gray-600">{{ $info->email ? $info->email : ''  }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
  
    {{-- contact form --}}
   

</section>
@endsection