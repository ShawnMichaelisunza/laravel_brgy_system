@extends('layout.app')
@include('navbar.nav')
@include('alert.success')

@section('content')
    <div class="container mx-auto px-4 py-8">



        <div class="my-5">
            <h1 class="text-red-800 text-3xl font-medium uppercase">Authorization</h1>
            <p class="text-sm font-medium text-gray-700 mt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero
                facilis non deserunt maiores inventore eum, <br> et neque incidunt, adipisci recusandae alias ut doloribus
                quo necessitatibus voluptas harum delectus fuga voluptatibus!</p>
        </div>

        <!-- Add User (Static) -->
        @can('create role')
            <div class="flex flex-col md:flex-row justify-end items-center mb-6">
                <a href="{{ route('auth.create') }}"
                    class="bg-blue-800 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">
                    + Add New Role
                </a>
            </div>
        @endcan

        <!-- User Table -->
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-300 text-red-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-center">ID</th>
                        <th class="py-3 px-6 text-center">Name</th>
                        <th class="py-3 px-6 text-center">Created At</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm">
                    @foreach ($roles as $role)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-red-600 text-center">{{ $role->id }}</td>
                            <td class="py-3 px-6 text-center">{{ $role->name }}</td>
                            <td class="py-3 px-6 text-center">{{ $role->created_at->diffForHumans() }}</td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    @can('view role')
                                        <a href="{{ route('auth.view', encrypt($role->id)) }}"
                                            class="w-4 mr-2 transform hover:text-green-500 hover:scale-110">
                                            <i class="fa-solid fa-street-view"></i>
                                        </a>
                                    @endcan
                                    @can('edit role')
                                        <a href="{{ route('auth.edit', encrypt($role->id)) }}"
                                            class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                    @endcan
                                    @can('delete role')
                                        <form action="{{ route('auth.destroy', encrypt($role->id)) }}" method="post">
                                            @csrf @method('delete')
                                            <button class="w-4 mr-2 transform hover:text-red-500 hover:scale-110">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                    @endcan
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
