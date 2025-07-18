@extends('layout.app')

@include('navbar.nav')
@section('content')

<div class="p-10">
        {{-- form --}}
        <div class="w-full">
            <h1 class="text-2xl font-semibold my-2 text-red-800 uppercase">Edit Officer</h1>
            <form action="{{ route('officer.update', encrypt($officer->id)) }}" method="post" enctype="multipart/form-data" class="grid gap-5">
                @csrf
                @method('put')
                <div class="grid">
                    <label for="" class=" text-sm uppercase font-medium text-red-700">Name</label>
                    <input type="text" name="name" placeholder="Name" class="border border-red-300 px-2 py-1 rounded" value="{{ $officer->name }}">
                    @error('name')
                        <span class="text-xs text-red-500">* {{ $message }}</span>
                    @enderror
                </div>
                <div class="grid">
                    <label for="" class=" text-sm uppercase font-medium text-red-700">Position</label>
                    <select name="position" id="" class="border border-red-300 px-2 py-1 rounded">
                        <option value="" selected>Select</option>
                        <option value="Punong Barangay" {{  $officer->position == 'Punong Barangay' ? 'selected' : '' }}>Punong Barangay</option>
                        <option value="Barangay Secretary" {{  $officer->position == 'Barangay Secretary' ? 'selected' : '' }}>Barangay Secretary</option>
                        <option value="Barangay Treasurer" {{  $officer->position == 'Barangay Treasurer' ? 'selected' : '' }}>Barangay Treasurer</option>
                        <option value="Lupong Tagapamayapa" {{  $officer->position == 'Lupong Tagapamayapa' ? 'selected' : '' }}>Lupong Tagapamayapa</option>
                        <option value="Kagawad 1" {{  $officer->position == 'Kagawad 1' ? 'selected' : '' }}>Kagawad 1</option>
                        <option value="Kagawad 2" {{  $officer->position == 'Kagawad 2' ? 'selected' : '' }}>Kagawad 2</option>
                        <option value="Kagawad 3" {{  $officer->position == 'Kagawad 3' ? 'selected' : '' }}>Kagawad 3</option>
                        <option value="Kagawad 4" {{  $officer->position == 'Kagawad 4' ? 'selected' : '' }}>Kagawad 4</option>
                        <option value="Kagawad 5" {{  $officer->position == 'Kagawad 5' ? 'selected' : '' }}>Kagawad 5</option>
                        <option value="Kagawad 6" {{  $officer->position == 'Kagawad 6' ? 'selected' : '' }}>Kagawad 6</option>
                        <option value="Kagawad 7" {{  $officer->position == 'Kagawad 7' ? 'selected' : '' }}>Kagawad 7</option>
                        <option value="SK Chairman"  {{  $officer->position == 'SK Chairman' ? 'selected' : '' }}>SK Chairman</option>
                    </select>
                    @error('position')
                        <span class="text-xs text-red-500">* {{ $message }}</span>
                    @enderror
                </div>
                <div class="grid">
                    <label for="" class=" text-sm uppercase font-medium text-red-700">Profile</label>
                    <input type="file" name="officer_profile" class="border border-red-300 px-2 py-1 rounded">
                    @error('officer_profile')
                        <span class="text-xs text-red-500">* {{ $message }}</span>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="border border-red-500 text-sm font-semibold text-white bg-red-800 hover:bg-red-700 py-2 px-4 uppercase rounded">Update Officer
                    </button>
                </div>
            </form>
        </div>
</div>

@endsection
