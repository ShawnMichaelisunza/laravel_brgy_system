@extends('layout.app')
@include('navbar.nav')
@include('alert.success')

@section('content')
    <div class="container mx-auto px-4 py-8">

        {{-- view errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Add User (Static) -->
        @can('create user')
        <div class="flex flex-col md:flex-row justify-end items-center mb-6">
            <a href="{{ route('user.userCreate') }}"
                class="bg-blue-800 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">
                + Add New Account
            </a>
        </div>
        @endcan


        <div class="my-5">
            <h1 class="text-red-800 text-3xl font-medium uppercase">Users</h1>
            <p class="text-sm font-medium text-gray-700 mt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero facilis non deserunt maiores inventore eum, <br> et neque incidunt, adipisci recusandae alias ut doloribus quo necessitatibus voluptas harum delectus fuga voluptatibus!</p>
        </div>

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
                                    @can('view user')
                                    <a href="{{ route('user.profile', encrypt($user->id)) }}"
                                        class="w-4 mr-2 transform hover:text-green-500 hover:scale-110">
                                        <i class="fa-solid fa-street-view"></i>
                                    </a>
                                    @endcan
                                    @can('edit user')
                                    <a href="{{ route('user.edit', encrypt($user->id)) }}"
                                        class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    @endcan
                                    @can('delete user')
                                    <form action="{{ route('user.destroy', encrypt($user->id)) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="w-4 mr-2 transform hover:text-red-500 hover:scale-110">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-5">
                {{ $users->appends(request()->toArray())->links() }}
            </div>
        </div>
    @endsection
