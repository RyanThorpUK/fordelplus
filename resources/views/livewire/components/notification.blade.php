<div
    x-data="{ 
        show: false,
        timer: null,
        message: @entangle('message'),
        startTimer() {
            if (this.timer) clearTimeout(this.timer);
            this.timer = setTimeout(() => {
                this.show = false;
                $wire.show = false;
                $wire.message = '';
            }, 3000);
        }
    }"
    x-show="show"
    x-init="$watch('message', value => { 
        if (value) {
            show = true;
            startTimer();
        }
    })"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-y-2"
    x-transition:enter-end="opacity-100 transform translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 transform translate-y-0"
    x-transition:leave-end="opacity-0 transform translate-y-2"
    class="fixed top-16 left-1/2 transform -translate-x-1/2 z-50"
>
    <div class="bg-white rounded-md border border-gray-200 shadow-lg px-6 py-3">
        <p class="text-green-600">{{ $message }}</p>
    </div>
</div> 