@extends('layout.app')

@include('navbar.brgy_nav')
@section('content')

<section class="bg-gray-100">
    <div class="container mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8">
            <div class="max-w-lg">
                <h2 class="text-3xl font-extrabold text-red-900 sm:text-4xl">About Us</h2>
                <p class="mt-4 text-gray-600 text-lg">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis
                    eros at lacus feugiat hendrerit sed ut tortor. Suspendisse et magna quis elit efficitur consequat.
                    Mauris eleifend velit a pretium iaculis. Donec sagittis velit et magna euismod, vel aliquet nulla
                    malesuada. Nunc pharetra massa lectus, a fermentum arcu volutpat vel.</p>
                <div class="mt-8">
                    <a href="#" class="text-red-700 hover:text-red-900 font-medium">Learn more about us
                        <span class="ml-2">&#8594;</span></a>
                </div>
            </div>
            <div class="mt-12 md:mt-0">
                <img src="{{ asset('assets/image/brgy_hall.jpg') }}" alt="About Us Image" class="object-cover rounded-lg shadow-md">
            </div>
        </div>
    </div>
</section>

 {{-- footer --}}
@include('navbar.brgy_footer')
@endsection
