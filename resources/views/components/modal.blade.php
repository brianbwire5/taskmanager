<div>
    <div x-data = "{show: @entangle($attributes->wire('model')).defer}"
         x-on:keydown.escape.window = "show = false">
        <div x-show="show" class="fixed inset-0 flex justify-center h-screen items-center bg-gray-200 antialiased">
            <div class="flex flex-col w-11/12 sm:w-5/6 lg:w-1/2 max-w-2xl mx-auto rounded-lg border border-gray-300 opacity-85 shadow-xl">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
