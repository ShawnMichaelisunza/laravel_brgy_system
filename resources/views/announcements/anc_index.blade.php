@extends('layout.app')
@include('alert.success')
@include('alert.error')

@include('navbar.nav')
@section('content')
        <div class="my-5">
            <h1 class="text-red-800 text-3xl font-medium uppercase">Announcement</h1>
            <p class="text-sm font-medium text-gray-700 mt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero facilis non deserunt maiores inventore eum, <br> et neque incidunt, adipisci recusandae alias ut doloribus quo necessitatibus voluptas harum delectus fuga voluptatibus!</p>
        </div>
    <div class="flex gap-3">
        {{-- form --}}
        <div class="w-full">
            @can('create announcement')
            <h1 class="text-md font-semibold my-2 text-red-800 uppercase">Create a new Announcement</h1>
            <form action="{{ route('anc.store') }}" method="post" enctype="multipart/form-data" class="grid gap-5">
                @csrf
                <div class="grid">
                    <label for="" class=" text-sm uppercase font-medium text-red-700">Title</label>
                    <input type="text" name="title" placeholder="Title"
                        class="border border-red-300 px-2 py-1 rounded">
                    @error('title')
                        <span class="text-xs text-red-500">* {{ $message }}</span>
                    @enderror
                </div>
                <div class="grid">
                    <label for="" class=" text-sm uppercase font-medium text-red-700">Description</label>
                    <textarea name="description" class="border border-red-300 px-2 py-1 rounded" id="" cols="30"
                        rows="5" placeholder="Description"></textarea>
                    @error('description')
                        <span class="text-xs text-red-500">* {{ $message }}</span>
                    @enderror
                </div>
                <div class="grid">
                    <label for="" class=" text-sm uppercase font-medium text-red-700">Image</label>
                    <input type="file" name="anc_img" class="border border-red-300 px-2 py-1 rounded">
                </div>
                <div>
                    <button type="submit"
                        class="border border-blue-500 text-sm font-semibold text-white bg-blue-500 hover:bg-blue-700 py-2 px-4 uppercase rounded">Create
                    </button>
                </div>
            </form>
             @endcan
        </div>
        {{-- table --}}
        <div class="w-full">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-300 text-red-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-center">ID</th>
                        <th class="py-3 px-6 text-center">Title</th>
                        <th class="py-3 px-6 text-center">Created At</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm">
                    @foreach ($ancs as $anc)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-red-600 text-center">{{ $anc->id }}</td>
                        <td class="py-3 px-6">{{ $anc->title }}</td>
                        <td class="py-3 px-6">{{ $anc->created_at->diffForHumans() }}</td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex item-center justify-center">
                                @can('view announcement')
                                <a href="{{ route('anc.show', encrypt($anc->id) ) }}" class="w-4 mr-2 transform hover:text-green-500 hover:scale-110">
                                    <i class="fa-solid fa-street-view"></i>
                                </a>
                                @endcan
                                @can('edit announcement')
                                <a href="{{ route('anc.edit', encrypt($anc->id) ) }}" class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                @endcan
                                @can('delete announcement')
                                <form action="{{ route('anc.destroy', encrypt($anc->id) ) }}" method="post">
                                    @csrf @method('delete')
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
        </div>
    </div>
@endsection
