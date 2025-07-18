@extends('layout.app')

@include('navbar.nav')
@section('content')
    <div class="w-full p-10">
        <h1 class="text-md font-semibold my-2 text-red-800 uppercase">Edit Announcement</h1>
        <form action="{{ route('anc.update', encrypt($anc->id)) }}" method="post" enctype="multipart/form-data" class="grid gap-5">
            @csrf
            @method('put')
            <div class="grid">
                <label for="" class=" text-sm uppercase font-medium text-red-700">Title</label>
                <input type="text" name="title" placeholder="Title" class="border border-red-300 px-2 py-1 rounded" value="{{ $anc->title }}">
                @error('title')
                    <span class="text-xs text-red-500">* {{ $message }}</span>
                @enderror
            </div>
            <div class="grid">
                <label for="" class=" text-sm uppercase font-medium text-red-700">Description</label>
                <textarea name="description" class="border border-red-300 px-2 py-1 rounded" id="" cols="30"
                    rows="5" placeholder="Description">{{ $anc->description }}</textarea>
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
                    class="border border-blue-500 text-sm font-semibold text-white bg-blue-500 hover:bg-blue-700 py-2 px-4 uppercase rounded">Update
                </button>
            </div>
        </form>
    </div>
@endsection
