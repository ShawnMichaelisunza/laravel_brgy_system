@extends('layout.app')
@include('navbar.nav')
@include('alert.success')

@section('content')
    <div class="container mx-auto px-4 py-8">


        <!-- User Table -->
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-300 text-red-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-center">ID</th>
                        <th class="py-3 px-6 text-center">Name</th>
                        <th class="py-3 px-6 text-center">Email</th>
                        <th class="py-3 px-6 text-center">Created At</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm">
                    @foreach ($users as $user)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-red-600 text-center">{{ $user->id }}</td>
                        <td class="py-3 px-6 text-center">{{ $user->name }}</td>
                        <td class="py-3 px-6 text-center">{{ $user->email }}</td>
                        <td class="py-3 px-6 text-center">{{ $user->created_at->diffForHumans() }}</td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex item-center justify-center">
                                <a href="{{ route('user.restore', encrypt($user->id)) }}" class="w-4 mr-2 transform hover:text-green-500 hover:scale-110">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @endsection
