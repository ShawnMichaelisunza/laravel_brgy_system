@extends('layout.app')
@include('alert.success')

@include('navbar.nav')
@section('content')
    <div class="p-5 w-full">
        <div class="w-full flex gap-5 items-end">
            <div><img src="{{ asset($user->profile) }}" alt="" class="w-33 rounded-sm"></div>
            <div class="w-full">
                <h1 class="font-semibold text-lg text-red-800">Name: <span class="text-gray-800 uppercase">{{ $user->name }}</span></h1>
                <div class="flex justify-between">
                    <h1 class="font-semibold text-md text-red-800">Email: <span class="text-gray-800">{{ $user->email }}</h1>
                        @foreach ($user->roles as $role)
                    <h1 class="font-semibold text-md text-red-800">Authorization: <span class="text-gray-800 uppercase">{{ $role->name }}</h1>
                         @endforeach
                </div>
            </div>
        </div>

        {{-- clearance --}}
        <div class="overflow-x-auto bg-white rounded-lg shadow my-10">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-300 text-red-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-center">Date</th>
                        <th class="py-3 px-6 text-center">Clearances</th>
                        <th class="py-3 px-6 text-center">Status</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                </thead>
                {{-- <tbody class="text-gray-600 text-sm">
                    @foreach ($users as $user)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-red-600 text-center">{{ $user->id }}</td>
                        <td class="py-3 px-6 text-center">{{ $user->name }}</td>
                        <td class="py-3 px-6 text-center">{{ $user->email }}</td>
                        <td class="py-3 px-6 text-center">{{ $user->created_at->diffForHumans() }}</td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex item-center justify-center">
                                <a href="{{ route('auth.view', encrypt($user->id) ) }}" class="w-4 mr-2 transform hover:text-green-500 hover:scale-110">
                                    <i class="fa-solid fa-street-view"></i>
                                </a>
                                <a href="{{ route('auth.edit', encrypt($user->id) ) }}" class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <form action="{{ route('auth.destroy', encrypt($user->id) ) }}" method="post">
                                    @csrf @method('delete')
                                <button class="w-4 mr-2 transform hover:text-red-500 hover:scale-110">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody> --}}
            </table>
        </div>

        {{-- permissions --}}
        <h1 class="my-5 text-red-700 text-2xl font-medium">Permissions</h1>
        <div class="flex justify-between">
            <div class="grid gap-2">
                @foreach (['view clearance', 'create clearance', 'edit clearance', 'delete clearance'] as $perm)
                    <div>
                        <input type="checkbox" name="{{ $perm }}[]" value="{{ $perm }}" {{ $role->hasPermissionTo($perm) ? 'checked' : '' }}>
                        <label for="" class="text-xs font-medium uppercase">{{ $perm }}</label>
                    </div>
                @endforeach
            </div>
            <div class="grid gap-2">
                @foreach (['view user', 'create user', 'edit user', 'delete user'] as $perm)
                    <div>
                        <input type="checkbox" name="{{ $perm }}[]" value="{{ $perm }}" {{ $role->hasPermissionTo($perm) ? 'checked' : '' }}>
                        <label for="" class="text-xs font-medium uppercase">{{ $perm }}</label>
                    </div>
                @endforeach
            </div>
            <div class="grid gap-2">
                @foreach (['view announcement', 'create announcement', 'edit announcement', 'delete announcement'] as $perm)
                    <div>
                        <input type="checkbox" name="{{ $perm }}[]" value="{{ $perm }}" {{ $role->hasPermissionTo($perm) ? 'checked' : '' }}>
                        <label for="" class="text-xs font-medium uppercase">{{ $perm }}</label>
                    </div>
                @endforeach
            </div>
            <div class="grid gap-2">
                @foreach (['view role', 'create role', 'edit role', 'delete role'] as $perm)
                    <div>
                        <input type="checkbox" name="{{ $perm }}[]" value="{{ $perm }}" {{ $role->hasPermissionTo($perm) ? 'checked' : '' }}>
                        <label for="" class="text-xs font-medium uppercase">{{ $perm }}</label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
