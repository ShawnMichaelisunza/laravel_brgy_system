@extends('layout.app')

@include('navbar.nav')
@section('content')

<div class="p-10">
    <div class="shadow-xl">
        <img src="{{ asset($anc->anc_img) }}" alt="" class="w-full h-80">
    </div>
    <div class="my-3 border-b-1 border-b-red-300">
        <h1 class="text-lg font-medium text-red-700 uppercase mb-1">Title</h1>
        <h1 class="text-md font-medium text-gray-700 uppercase">{{ $anc->title }}</h1>
    </div>
    <div>
        <p class="text-md font-medium text-red-700 uppercase mb-1">Description</p>
        <p class="text-sm font-medium text-gray-700 uppercase">{{ $anc->description }}</p>
    </div>
    <div class="flex justify-end mt-10">
        <a href="{{ route('anc.index') }}" class="bg-red-800 hover:bg-red-600 text-white font-medium py-2 px-4 rounded-md shadow-sm"><i class="fa-solid fa-arrow-left"></i> Back</a>
    </div>
</div>


@endsection
