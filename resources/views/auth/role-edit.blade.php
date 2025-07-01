@extends('layout.app')
@include('navbar.nav')

@section('content')
    <div class="w-full px-10">
        <form action="{{ route('auth.update', encrypt($role->id)) }}" method="POST">
            @csrf
            @method('put')

            {{-- view errors --}}
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
            {{-- end errors --}}

            <div class="grid my-5">
                <label for="" class="text-red-700 text-sm uppercase font-medium">Name role</label>
                <input type="text" name="name" class="w-lg py-1.5 px-2 border-1 border-red-300 rounded" value="{{ $role->name }}">
                @error('name')
                    <span class="text-red-500 text-xs">* {{ $message }}</span>
                @enderror
            </div>
            <div class="grid my-5">
                <label for="" class="text-red-700 text-sm uppercase font-medium">Description</label>
                <textarea name="description" id="" cols="30" rows="3"
                    class="w-lg py-1.5 px-2 border-1 border-red-300 rounded">{{ $role->description }}</textarea>
                @error('description')
                    <span class="text-red-500 text-xs">* {{ $message }}</span>
                @enderror
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

            <div class="my-10 flex justify-end">
                <x-button type="edit">Update</x-button>
            </div>


        </form>
    </div>
@endsection
