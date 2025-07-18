@if (session('error'))
    <div class="fixed inset-x-0 top-0 flex items-end justify-right px-4 py-6 justify-end">
        <div
            class="max-w-sm w-full shadow-lg px-4 py-3 rounded relative bg-red-700 border-l-4 border-red-800 text-white">
            <div class="p-2">
                <div class="flex items-start">
                    <div class="ml-3 w-0 flex-1 pt-0.5">
                        <p class="text-sm leading-5 font-medium">
                            {{ session('error') }}
                        </p>
                    </div>
                    <div class="ml-4 flex-shrink-0 flex">
                        <button class="inline-flex text-white transition ease-in-out duration-150"
                            onclick="return this.parentNode.parentNode.parentNode.parentNode.remove()">
                            <i class="fa-solid fa-x"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
