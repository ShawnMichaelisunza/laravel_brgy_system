@extends('layout.app')

@include('navbar.nav')
@section('content')

    <div class="container mx-auto px-4 py-8">


        <!-- Add User (Static) -->
        {{-- <div class="flex flex-col md:flex-row justify-end items-center mb-6">
            <a href="{{ route('clearance.create') }}"
                class="bg-red-800 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-300">
                + Add New Account
            </a>
        </div> --}}

        <div class="my-5">
            <h1 class="text-red-800 text-3xl font-medium uppercase">Clearance</h1>
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
                                <div class="flex gap-2 item-center justify-center">
                                    @can('view clearance')
                                    <a href="{{ route('user.profile', encrypt($user->id)) }}"
                                        class="w-4 mr-2 transform hover:text-green-500 hover:scale-110 text-lg">
                                        <i class="fa-solid fa-street-view"></i>
                                    </a>
                                    @endcan
                                    @can('create clearance')
                                    <a href="{{ route('clearance.create', encrypt($user->id)) }}"
                                        class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110 text-lg">
                                       <i class="fa-solid fa-square-plus"></i>
                                    </a>
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
