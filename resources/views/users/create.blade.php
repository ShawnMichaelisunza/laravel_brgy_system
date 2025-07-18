@extends('layout.app')

@include('navbar.nav')
@section('content')
    <div>
        <h1 class="mb-5 text-2xl font-semibold text-red-700">Create a new Account</h1>
        <form action="{{ route('user.userStore') }}" class="w-full flex flex-col gap-4" method="POST"
            enctype="multipart/form-data">
            @csrf


            <div class="flex items-start flex-col justify-start">
                <label for="name" class="text-sm text-gray-700 dark:text-gray-200 mr-2">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500"
                    placeholder="Lastname, Firstname,  Middlename">
                @error('name')
                    <span class="text-xs text-red-500">* {{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-start flex-col justify-start">
                <label for="profile" class="text-sm text-gray-700 dark:text-gray-200 mr-2">Profile:</label>
                <input type="file" id="profile" name="profile" value="{{ old('profile') }}"
                    class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
                @error('profile')
                    <span class="text-xs text-red-500">* {{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-start flex-col justify-start">
                <label for="email" class="text-sm text-gray-700 dark:text-gray-200 mr-2">Address:</label>
                <input type="text" id="email" name="address"
                    class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500"
                    placeholder="Building No, Street Name">
                @error('address')
                    <span class="text-xs text-red-500">* {{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-start flex-col justify-start">
                <label for="email" class="text-sm text-gray-700 dark:text-gray-200 mr-2">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500"
                    placeholder="example@gmail.com">
                @error('email')
                    <span class="text-xs text-red-500">* {{ $message }}</span>
                @enderror
            </div>


            <div class="flex items-start flex-col justify-start">
                <label for="email" class="text-sm text-gray-700 dark:text-gray-200 mr-2">Roles:</label>
                <select name="role"
                    class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @error('role')
                    <span class="text-xs text-red-500">* {{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-start flex-col justify-start">
                <label for="password" class="text-sm text-gray-700 dark:text-gray-200 mr-2">Password:</label>
                <input type="password" id="password" name="password" value="{{ old('password') }}"
                    class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500"
                    placeholder="*********">
                @error('password')
                    <span class="text-xs text-red-500">* {{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-start flex-col justify-start">
                <label for="confirmPassword" class="text-sm text-gray-700 dark:text-gray-200 mr-2">Confirm Password:</label>
                <input type="password" id="confirmPassword" name="password_confirmation" value="{{ old('password') }}"
                    class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500"
                    placeholder="*********">
            </div>

            <div class="flex justify-end mt-10 mx-5">
                <button type="submit"
                    class="bg-red-800 hover:bg-red-600 text-white font-medium py-2 px-4 rounded-md shadow-sm">Create</button>

            </div>
        </form>
    </div>
@endsection
