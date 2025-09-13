<!-- Newsletter Section -->
{{-- <div class="px-2 sm:px-10 md:px-20 lg:px-30 xl:px-50 my-40">
    <div
        class="bg-blue-200 flex flex-col-reverse md:flex-row-reverse justify-between rounded-lg shadow-lg overflow-hidden">

        @if ($video_id)
            <div class="pb-10 md:pb-0 md:w-[300px] flex items-center justify-center">
                <iframe
                    src="https://player.vimeo.com/video/{{ $video_id }}?badge=0&amp;autopause=0&amp;player_id=0"
                    frameborder="0"
                    allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" class="rounded-md">
                </iframe>
            </div>
        @endif


        <div class="flex flex-col justify-center px-2 py-10 sm:p-10 grow text-center md:text-left">
            <h1 class="text-4xl text-slate-700 font-semibold">Subscribe to Ogele Newsletter</h1>
            <p class="pt-1 pb-4 text-slate-600">Join our community and never miss important news, updates, and insights.
            </p>
            <form action="https://abiaunionusa.us18.list-manage.com/subscribe/post?u=3b98bbd1deb8c53ab98789d36&id=1d3060abeb" class="flex flex-col sm:flex-row gap-1 justify-center md:justify-start"
                method="POST" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form">

                <input class="bg-white px-4 py-2 rounded-full focus:outline-hidden sm:w-[280px]" type="email"
                    placeholder="Enter your email address" required name="EMAIL" id="mce-EMAIL">
                <button type="submit" id="mc-embedded-subscribe" name="subscribe"
                    class="py-2 px-4 bg-[#FD6584] hover:bg-red-300 rounded-full cursor-pointer text-white transition duration-300">Subscribe</button>
            </form>
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div> --}}


<div class="px-2 sm:px-10 md:px-20 lg:px-30 xl:px-50 my-40">
    <div
        class="bg-blue-200 flex flex-col-reverse justify-between items-center rounded-lg shadow-lg overflow-hidden">

        @if ($video_id)
            <div class="pb-5 w-full px-3 flex items-center justify-center">
                <iframe
                    src="https://player.vimeo.com/video/{{ $video_id }}?badge=0&amp;autopause=0&amp;player_id=0"
                    frameborder="0"
                    allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" class="rounded-md mx-atuo"
                    width="700" height="281">
                </iframe>
            </div>
        @endif


        <div class="flex flex-col justify-center px-2 py-10 sm:p-10 grow text-center">
            <h1 class="text-4xl text-slate-700 font-semibold">Subscribe to Ogele Newsletter</h1>
            <p class="pt-1 pb-4 text-slate-600">Join our community and never miss important news, updates, and insights.
            </p>
            <form action="https://abiaunionusa.us18.list-manage.com/subscribe/post?u=3b98bbd1deb8c53ab98789d36&id=1d3060abeb" class="flex flex-col sm:flex-row gap-1 justify-center"
                method="POST" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form">

                <input class="bg-white px-4 py-2 rounded-full focus:outline-hidden sm:w-[280px]" type="email"
                    placeholder="Enter your email address" required name="EMAIL" id="mce-EMAIL">
                <button type="submit" id="mc-embedded-subscribe" name="subscribe"
                    class="py-2 px-4 bg-[#FD6584] hover:bg-red-300 rounded-full cursor-pointer text-white transition duration-300">Subscribe</button>
            </form>
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<script src="https://player.vimeo.com/api/player.js"></script>
