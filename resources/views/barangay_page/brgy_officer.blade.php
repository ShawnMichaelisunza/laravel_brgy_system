@extends('layout.app')

@include('navbar.brgy_nav')
@section('content')


{{-- offcers --}}
<section class="py-12 bg-white sm:py-16 lg:py-20">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-3xl font-bold text-red-900 sm:text-4xl xl:text-5xl font-pj">Meet Our Council</h2>
        </div>

        {{-- barangay captain --}}
        <div class="flex justify-center w-full grid-cols-1 px-20 mx-auto mt-12 text-center sm:px-0 sm:grid-cols-2 md:mt-20 gap-x-8 md:grid-cols-4 gap-y-12 lg:gap-x-16 xl:gap-x-20">
            @foreach ($chairman as $chm)
            <div>
                <img class="object-cover w-32 h-32 mx-auto rounded-full lg:w-44 lg:h-44 " src="{{ asset($chm->officer_profile) }}" alt="" />
                <p class="mt-5 text-lg font-bold text-red-900 sm:text-xl sm:mt-8 font-pj uppercase">{{ $chm->name }}</p>
                <p class="mt-2 text-base font-semibold text-gray-800 font-pj">{{ $chm->position }}</p>
            </div>
            @endforeach
        </div>

        {{-- barangay secretary and barangay treasusrer --}}
        <div class="flex justify-center w-full grid-cols-1 px-20 mx-auto text-center sm:px-0 sm:grid-cols-2 md:mt-20 gap-x-8 md:grid-cols-4 gap-y-12 lg:gap-x-16 xl:gap-x-20">
            @foreach ( $secretary as $sc)
            <div>
                <img class="object-cover w-32 h-32 mx-auto rounded-full lg:w-44 lg:h-44 " src="{{ asset($sc->officer_profile) }}" alt="" />
                <p class="mt-5 text-lg font-bold text-red-900 sm:text-xl sm:mt-8 font-pj uppercase">{{ $sc->name }}</p>
                <p class="mt-2 text-base font-semibold text-gray-800 font-pj">{{ $sc->position }}</p>
            </div>
            @endforeach

            @foreach ( $treasurer as $tc)
            <div>
                <img class="object-cover w-32 h-32 mx-auto rounded-full lg:w-44 lg:h-44 " src="{{ asset($tc->officer_profile) }}" alt="" />
                <p class="mt-5 text-lg font-bold text-red-900 sm:text-xl sm:mt-8 font-pj uppercase">{{ $tc->name }}</p>
                <p class="mt-2 text-base font-semibold text-gray-800 font-pj">{{ $tc->position }}</p>
            </div>
            @endforeach
        </div>

        {{-- kagawat --}}
          <div class="flex flex-wrap justify-center max-w-6xl grid-cols-1 px-20 mx-auto text-center sm:px-0 sm:grid-cols-2 md:mt-20 gap-x-8 md:grid-cols-4 gap-y-12 lg:gap-x-16 xl:gap-x-20">
            @foreach ($kagawads as $kagawad)
            <div>
                <img class="object-cover w-32 h-32 mx-auto rounded-full lg:w-44 lg:h-44 " src="{{ asset($kagawad->officer_profile) }}" alt="" />
                <p class="mt-5 text-lg font-bold text-red-900 sm:text-xl sm:mt-8 font-pj uppercase">{{ $kagawad->name }}</p>
                <p class="mt-2 text-base font-semibold text-gray-800 font-pj">{{ $kagawad->position }}</p>
            </div>
            @endforeach
        </div>

    </div>
</section>


 {{-- footer --}}
@include('navbar.brgy_footer')
@endsection
