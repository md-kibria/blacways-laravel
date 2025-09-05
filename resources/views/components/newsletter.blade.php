<!-- Newsletter Section -->
<div class="px-2 sm:px-10 md:px-20 lg:px-30 xl:px-50 my-40">
    <div class="bg-blue-200 flex flex-row-reverse justify-between rounded-lg shadow-lg overflow-hidden">
        <img class="w-[250px] hidden md:block" src="https://kodla.io/wp-content/uploads/2024/09/kur_kim-e-pos_tas.png"
            alt="">
        <div class="flex flex-col justify-center px-2 py-10 sm:p-10 grow text-center md:text-left">
            <h1 class="text-4xl text-slate-700 font-semibold">Subscribe To Our Newsletter</h1>
            <p class="pt-1 pb-4 text-slate-600">Join our community and never miss important news, updates, and insights.</p>
            <form action="{{ route('newsletters.store') }}" class="flex gap-1 justify-center md:justify-start"
                method="POST">
                @method('POST')
                @csrf

                <input class="bg-white px-4 py-2 rounded-full focus:outline-hidden sm:w-[280px]" type="email"
                    placeholder="Enter your email address" required name="email">
                <button type="submit"
                    class="py-2 px-4 bg-[#FD6584] hover:bg-red-300 rounded-full cursor-pointer text-white transition duration-300">Subscribe</button>
            </form>
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
