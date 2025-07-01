@extends('layout.app')
@include('navbar.nav')
@section('content')
    <div class="w-full px-10">

        <div>
            <h1 class="text-red-800 text-md uppercase font-medium my-3">Name: <span class="text-gray-900 text-sm">{{ $role->name }}</span></h1>
            <h1 class="text-red-800 text-md uppercase font-medium my-3">Description <br><span class="text-gray-900 text-sm">{{ $role->description }}</span></h1>
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


            <div class="mt-20 flex">
                <a href="{{ route('auth.index') }}" type="submit" class="text-red-700"><i class="fa-solid fa-arrow-left"></i> Back</a>
            </div>
    </div>
@endsection
