@if($visibility)
<div x-data="{ open: true }" x-show="open" class="fixed inset-0 bg-transparent flex items-center justify-center z-50">
    <div class="bg-green-400 rounded-lg shadow-lg p-6 relative max-w-lg w-full">
        <button @click="open = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-2xl cursor-pointer">
            <ion-icon name="close-outline"></ion-icon>
        </button>
        {{-- <h2 class="text-xl font-bold mb-2">Special Offer!</h2>
        <p class="mb-4">Don't miss out on our latest updates and exclusive deals.</p>
        <a href="#"
            class="bg-gradient-to-r from-[#71A129] to-[#588B22] text-white px-4 py-2 rounded font-semibold">Learn
            More</a> --}}
        <div class="no-tailwind">
            {!! $ad !!}
        </div>
    </div>
</div>
@endif