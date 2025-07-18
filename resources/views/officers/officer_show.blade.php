@extends('layout.app')
@include('navbar.nav')
@section('content')

<div class="p-10">
    <div>
        <div>
            <div>
                <img src="{{ asset($officer->officer_profile) }}" alt="" class="w-33 rounded-sm">
            </div>
            <div class="mt-5">
                <h1 class="text-red-800 text-lg uppercase font-medium">Name: <span class="text-gray-800">{{ $officer->name }}</span></h1>
                <h1 class="text-red-800 text-sm uppercase font-medium">Position: <span class="text-gray-800">{{ $officer->position }}</span></h1>
            </div>
        </div>
        <div class="mt-10">
            <h1 class="text-red-800 text-sm uppercase font-medium">Description:</h1>
            <p class="text-gray-600 text-xs uppercase font-medium">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum officia similique eligendi? Voluptas accusamus, consectetur, illo sapiente cupiditate dolor ipsam accusantium voluptates voluptate magnam reprehenderit amet, veritatis assumenda cumque. Enim! Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, voluptatibus adipisci! Sed harum cum animi quod nihil quasi exercitationem accusantium at mollitia ipsum rerum repudiandae repellat, soluta, laborum, aliquam officiis?</p>
        </div>
    </div>
</div>

@endsection
