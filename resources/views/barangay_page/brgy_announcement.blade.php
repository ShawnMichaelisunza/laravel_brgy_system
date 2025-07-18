@extends('layout.app')

@include('navbar.brgy_nav')
@section('content')
    <div class="container mx-auto">
        <h1 class="mt-10 text-4xl uppercase font-medium text-red-800">Announcement</h1>
        @foreach ($announcements as $anc)
            <div class="shadow-md shadow-red-800 my-5">
                <section class="bg-gray-100">
                    <div class="container mx-auto py-16 px-4 sm:px-6 lg:px-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8">
                            <div class="max-w-lg">
                                <h2 class="text-3xl font-extrabold text-red-900 sm:text-4xl uppercase">{{ $anc->title }}</h2>
                                <p class="mt-4 text-gray-600 text-lg">{{ $anc->description }}</p>
                            </div>
                            <div class="mt-12 md:mt-0">
                                <img src="{{ asset($anc->anc_img) }}" alt="About Us Image" style="width: 450px; height: 350px;"
                                    class="object-cover rounded-lg shadow-md">
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        @endforeach
    </div>
    {{-- footer --}}
    @include('navbar.brgy_footer')
@endsection
