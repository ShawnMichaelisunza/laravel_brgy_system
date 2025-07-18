@extends('layout.app')
@include('alert.success')

@section('content')
    <div id="p-login" class="flex justify-center">
        <div id="c-login" class="w-full mt-25">
            <div class="max-w-lg mx-auto bg-white dark:bg-gray-800 rounded-lg px-8 py-10 flex flex-col items-center">
                <h1 class="text-xl font-bold text-center text-red-800 dark:text-gray-200 mb-3">Welcome to Barangay Kupal</h1>
                <h1 class="text-3xl font-bold text-center text-red-800 dark:text-gray-200">Sign In</h1>
                <form action="{{ route('user.store') }}" class="w-full flex flex-col gap-4" method="POST">
                    @csrf

                    <div class="flex items-start flex-col justify-start">
                        <label for="email" class="text-sm text-gray-700 dark:text-gray-200 mr-2">Email:</label>
                        <input type="email" id="email" name="email"
                            class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500"
                            placeholder="example@gmail.com">
                        @error('email')
                            <span class="text-xs text-red-500">* {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex items-start flex-col justify-start">
                        <label for="password" class="text-sm text-gray-700 dark:text-gray-200 mr-2">Password:</label>
                        <input type="password" id="password" name="password"
                            class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500"
                            placeholder="*********">
                        @error('password')
                            <span class="text-xs text-red-500">* {{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit"
                        class="bg-red-800 hover:bg-red-600 text-white font-medium py-2 px-4 rounded-md shadow-sm">Sign
                        In</button>
                </form>

                <div class="mt-4 text-center">
                    <span class="text-sm text-gray-500 dark:text-gray-300">Don't have an account? </span>
                    <a href="{{ route('register') }}" class="text-red-500 hover:text-red-800">Sign Up</a>
                </div>
                </form>
            </div>
        </div>
        {{-- ------ --}}
        <div id="img-login" class="w-full">
            <img src="{{ asset('assets/image/login-register bg.jpg') }}" alt="">
        </div>
    </div>
@endsection
