@extends('layout.app')
@include('alert.success')
@include('alert.error')

@include('navbar.nav')
@section('content')
    <div class="my-5">
        <h1 class="text-red-800 text-3xl font-medium uppercase">Officers</h1>
        <p class="text-sm font-medium text-gray-700 mt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero facilis
            non deserunt maiores inventore eum, <br> et neque incidunt, adipisci recusandae alias ut doloribus quo
            necessitatibus voluptas harum delectus fuga voluptatibus!</p>
    </div>
    <div class="flex gap-3">
        {{-- table --}}
        <div class="w-full">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-300 text-red-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-center">Name</th>
                        <th class="py-3 px-6 text-center">Position</th>
                        <th class="py-3 px-6 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm">
                    @foreach ($officers as $officer)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-center uppercase font-medium text-xs">{{ $officer->name }}</td>
                            <td class="py-3 px-6 text-center text-red-600 uppercase font-medium text-xs">
                                {{ $officer->position }}</td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <a href="{{ route('officer.show', encrypt($officer->id)) }}"
                                        class="w-4 mr-2 transform hover:text-green-500 hover:scale-110">
                                        <i class="fa-solid fa-street-view"></i>
                                    </a>
                                    <a href="{{ route('officer.edit', encrypt($officer->id)) }}"
                                        class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-5">
                {{ $officers->appends(request()->toArray())->links() }}
            </div>
        </div>
        {{-- form --}}
        <div class="w-full">
            <h1 class="text-md font-semibold my-2 text-red-800 uppercase">Create a new Officer</h1>
            <form action="{{ route('officer.store') }}" method="post" enctype="multipart/form-data" class="grid gap-5">
                @csrf
                <div class="grid">
                    <label for="" class=" text-sm uppercase font-medium text-red-700">Name</label>
                    <input type="text" name="name" placeholder="Name" class="border border-red-300 px-2 py-1 rounded">
                    @error('name')
                        <span class="text-xs text-red-500">* {{ $message }}</span>
                    @enderror
                </div>
                <div class="grid">
                    <label for="" class=" text-sm uppercase font-medium text-red-700">Position</label>
                    <select name="position" id="" class="border border-red-300 px-2 py-1 rounded">
                        <option value="" selected>Select</option>
                        <option value="Punong Barangay">Punong Barangay</option>
                        <option value="Barangay Secretary">Barangay Secretary</option>
                        <option value="Barangay Treasurer">Barangay Treasurer</option>
                        <option value="Lupong Tagapamayapa">Lupong Tagapamayapa</option>
                        <option value="Kagawad 1">Kagawad 1</option>
                        <option value="Kagawad 2">Kagawad 2</option>
                        <option value="Kagawad 3">Kagawad 3</option>
                        <option value="Kagawad 4">Kagawad 4</option>
                        <option value="Kagawad 5">Kagawad 5</option>
                        <option value="Kagawad 6">Kagawad 6</option>
                        <option value="Kagawad 7">Kagawad 7</option>
                        <option value="SK Chairman">SK Chairman</option>
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
                        class="border border-red-500 text-sm font-semibold text-white bg-red-800 hover:bg-red-700 py-2 px-4 uppercase rounded">Create
                        Officer
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
