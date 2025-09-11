@extends('layouts.main')

@section('title', 'Profile Update')

@section('content')

    <div
        class="h-[450px] w-[calc(100%+100px)] bg-green-100 absolute -top-20 -left-10 -z-10 flex flex-col items-center justify-center rotate-[-5deg]">
    </div>
    <div class="container mx-auto min-h-screen py-15 px-2 flex flex-col justify-center items-center">


        <div class="w-full max-w-sm lg:max-w-lg p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8">
            <form class="space-y-2" action="{{ route('profile.update', $user->id) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <h5 class="text-xl font-medium">Update Your Profile</h5>
                <div class="flex w-full gap-2">
                    <div class="grow">
                        <label for="first_name" class="block mb-2 text-sm font-medium capitalize">Your first name</label>
                        <input type="first_name" name="first_name" id="first_name"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="You first name here" value="{{ old('first_name') ?? $user->profile->first_name }}" />
                        @error('first_name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="grow">
                        <label for="last_name" class="block mb-2 text-sm font-medium capitalize">Your last name</label>
                        <input type="last_name" name="last_name" id="last_name"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="You last name here" value="{{ old('last_name') ?? $user->profile->last_name }}" />
                        @error('last_name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="email" class="block mb-2 text-sm font-medium capitalize">Your email</label>
                    <input type="email" name="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Your email here" value="{{ old('email') ?? $user->email }}" />
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="phone" class="block mb-2 text-sm font-medium capitalize">Phone number</label>
                    <input type="phone" name="phone" id="phone"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Your phone number here" value="{{ old('phone') ?? $user->profile->phone }}" />
                    @error('phone')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="image" class="block mb-2 text-sm font-medium capitalize">Your image</label>
                    <input type="file" name="image" id="image"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="" />
                    @error('image')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex w-full gap-2">
                    <div class="grow">
                        <label for="birthday" class="block mb-2 text-sm font-medium capitalize">Birthday</label>
                        <input type="date" name="birthday" id="birthday"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="You birthday here" value="{{ old('birthday') ?? $user->profile->birthday }}" />
                        @error('birthday')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="grow">
                        <label for="gender" class="block mb-2 text-sm font-medium capitalize">Gender</label>
                        <select name="gender" id="gender"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="">Select gender</option>
                            <option value="male" {{ (old('gender') ?? $user->profile->gender) == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ (old('gender') ?? $user->profile->gender) == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                        @error('gender')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="grow">
                    <label for="address" class="block mb-2 text-sm font-medium capitalize">Address</label>
                    <input type="address" name="address" id="address"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="You address here" value="{{ old('address') ?? $user->profile->address }}" />
                    @error('address')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="grow">
                    <label for="address_2" class="block mb-2 text-sm font-medium capitalize">Address Line 2</label>
                    <input type="address_2" name="address_2" id="address_2"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="You address line 2 here" value="{{ old('address_2') ?? $user->profile->address_2 }}" />
                    @error('address_2')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex w-full gap-2">
                    <div class="grow">
                        <label for="city" class="block mb-2 text-sm font-medium capitalize">City</label>
                        <input type="city" name="city" id="city"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="You city here" value="{{ old('city') ?? $user->profile->city }}" />
                        @error('city')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="grow">
                        <label for="state" class="block mb-2 text-sm font-medium capitalize">State</label>
                        <input type="state" name="state" id="state"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="You state here" value="{{ old('state') ?? $user->profile->state }}" />
                        @error('state')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex w-full gap-2">
                    <div class="grow">
                        <label for="zip" class="block mb-2 text-sm font-medium capitalize">Zip</label>
                        <input type="zip" name="zip" id="zip"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="You zip here" value="{{ old('zip') ?? $user->profile->zip }}" />
                        @error('zip')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="grow">
                        <label for="country" class="block mb-2 text-sm font-medium capitalize">Country</label>
                        <select name="country" id="country"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            @php
                               $countries = [
                                    "USA", "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria",
                                    "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan",
                                    "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cabo Verde", "Cambodia",
                                    "Cameroon", "Canada", "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo (Republic)", "Congo (Democratic Republic)",
                                    "Costa Rica", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador",
                                    "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Eswatini", "Ethiopia", "Fiji", "Finland", "France",
                                    "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau",
                                    "Guyana", "Haiti", "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland",
                                    "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Kosovo", "Kuwait",
                                    "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg",
                                    "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico",
                                    "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru",
                                    "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Korea", "North Macedonia", "Norway", "Oman",
                                    "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar",
                                    "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "São Tomé and Príncipe", "Saudi Arabia",
                                    "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa",
                                    "South Korea", "South Sudan", "Spain", "Sri Lanka", "Sudan", "Suriname", "Sweden", "Switzerland", "Syria", "Taiwan",
                                    "Tajikistan", "Tanzania", "Thailand", "Timor-Leste", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan",
                                    "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City",
                                    "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"
                                ];

                                $selectedCountry = old('country') ?? $user->profile->country ?? 'USA';
                            @endphp
                            @foreach($countries as $country)
                                <option value="{{ $country }}" {{ $selectedCountry == $country ? 'selected' : '' }}>{{ $country }}</option>
                            @endforeach
                        </select>
                        @error('country')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                {{-- Password --}}
                <div class="flex items-center pt-2">
                    <div class="flex-grow border-t border-gray-400"></div>
                    <span class="mx-4 text-gray-600">Change Password</span>
                    <div class="flex-grow border-t border-gray-400"></div>
                </div>

                <div>
                    <label for="old_password" class="block mb-2 text-sm font-medium capitalize">Old password</label>
                    <input type="password" name="old_password" id="old_password" placeholder="Your old password here"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    @error('old_password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium capitalize">New Password</label>
                    <input type="password" name="password" id="password" placeholder="Your new password here"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit"
                    class="w-full border border-[#71A129] bg-gradient-to-r from-[#71A129] to-[#588B22] text-white hover:bg-none hover:text-[#588B22] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer transition">Update</button>
            </form>
        </div>



    </div>
@endsection
