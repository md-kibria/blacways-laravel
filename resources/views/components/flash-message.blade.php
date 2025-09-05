@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="fixed bottom-5 right-5 bg-green-400 text-white text-sm py-2 px-4 rounded shadow-lg" style="z-index: 1055;">
        <p class="flex items-center gap-2">
            <ion-icon class="my-auto block" name="checkmark-circle-outline"></ion-icon>
            {{ session('message') }}
        </p>
    </div>
@endif
@if (session()->has('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="fixed bottom-5 right-5 bg-green-400 text-white text-sm py-2 px-4 rounded shadow-lg"
        style="z-index: 1055;">
        <p class="flex items-center gap-2">
            <ion-icon class="my-auto block" name="checkmark-circle-outline"></ion-icon>
            {{ session('success') }}
        </p>
    </div>
@endif
@if (session()->has('error'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="fixed bottom-5 right-5 bg-red-400 text-white text-sm py-2 px-4 rounded shadow-lg" style="z-index: 1055;">
        <p class="flex items-center gap-2">
            <ion-icon class="my-auto block" name="warning-outline"></ion-icon>
            {{ session('error') }}
        </p>
    </div>
@endif

@if (session('scrollTo'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var element = document.querySelector('{{ session('scrollTo') }}');
            if (element) {
                element.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    </script>
@endif
