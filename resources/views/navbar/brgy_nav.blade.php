<nav class="bg-red-800 border-gray-200 py-2.5 dark:bg-gray-900">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
        <a href="#" class="flex items-center bg-red-800 rounded-4xl">
           <img src="{{ asset('assets/image/brgy-logo.png') }}" alt="" class="w-28">
        </a>
        <div class="flex items-center lg:order-2">
            <div class="hidden mt-2 mr-4 sm:inline-block">
                <span></span>
            </div>

            @if (auth()->id())


            <a href="{{ route('logout') }}"
                class="text-red-800 hover:text-red-100 bg-red-50 hover:bg-red-900 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Logout
            </a>
            @else
            <a href="{{ route('login') }}"
                class="text-red-800 hover:text-red-100 bg-red-50 hover:bg-red-900 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Sign In
            </a>
            @endif

            <button data-collapse-toggle="mobile-menu-2" type="button"
				class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
				aria-controls="mobile-menu-2" aria-expanded="true">
				<span class="sr-only">Open main menu</span>
				<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd"
						d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
						clip-rule="evenodd"></path>
				</svg>
				<svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd"
						d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
						clip-rule="evenodd"></path>
				</svg>
			</button>
        </div>
        <div class="items-center justify-between w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
            <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                <li>
                    <a href="{{ route('brgy.index') }}"
                        class="block py-2 pl-3 pr-4 text-gray-100 border-b border-gray-100 hover:bg-red-900 lg:hover:bg-transparent lg:border-0 lg:hover:text-red-300 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700"
                        aria-current="page">Home</a>
                </li>
                <li>
                    <a href="{{ route(('brgy.announcement')) }}"
                        class="block py-2 pl-3 pr-4 text-gray-100 border-b border-gray-100 hover:bg-red-900 lg:hover:bg-transparent lg:border-0 lg:hover:text-red-300 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Announcement</a>
                </li>
                <li>
                    <a href="{{ route('brgy.clearance', encrypt(auth()->id())) }}"
                        class="block py-2 pl-3 pr-4 text-gray-100 border-b border-gray-100 hover:bg-red-900 lg:hover:bg-transparent lg:border-0 lg:hover:text-red-300 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Clearance</a>
                </li>
                <li>
                    <a href="{{ route('brgy.officer') }}"
                        class="block py-2 pl-3 pr-4 text-gray-100 border-b border-gray-100 hover:bg-red-900 lg:hover:bg-transparent lg:border-0 lg:hover:text-red-300 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Officers</a>
                </li>
                <li>
                    <a href="{{ route('brgy.about') }}"
                        class="block py-2 pl-3 pr-4 text-gray-100 border-b border-gray-100 hover:bg-red-900 lg:hover:bg-transparent lg:border-0 lg:hover:text-red-300 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">About Us</a>
                </li>
                <li>
                    <a href="{{ route('brgy.contact') }}"
                        class="block py-2 pl-3 pr-4 text-gray-100 border-b border-gray-100 hover:bg-red-900 lg:hover:bg-transparent lg:border-0 lg:hover:text-red-300 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
