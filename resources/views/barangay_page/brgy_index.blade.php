@extends('layout.app')

@include('navbar.brgy_nav')
@section('content')
    {{-- jumbotron --}}
    <div class="relative bg-gradient-to-r from-purple-600 to-blue-600 h-screen text-white overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('assets/image/brgy_hall.jpg') }}" alt="Background Image"
                class="object-cover object-center w-full h-full" />
            <div class="absolute inset-0 bg-black opacity-50"></div>
        </div>

        <div class="relative z-10 flex flex-col justify-center items-center h-full text-center">
            <h1 class="text-5xl font-bold leading-tight mb-4 text-red-600 text-shadow-gray-200 text-shadow-md">Welcome to Our
                Barangay Kupal</h1>
            <p class="text-lg text-gray-300 mb-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. <br> eligendi
                minus ducimus, excepturi vel veniam aspernatur fuga praesentium adipisci </p>
            <a href="#"
                class="bg-red-800 text-gray-100 hover:bg-red-700 py-2 px-7.5 rounded-2xl text-lg font-semibold transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg">Sign
                In</a>
        </div>
    </div>
    {{-- end jumbotron --}}

    {{-- captian --}}
    <section class="bg-gray-100">
        <div class="container mx-auto py-16 px-4 sm:px-6 lg:px-8">
            @foreach ($chairman as $chr)
                <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8">
                    <div class="max-w-lg">
                        <h2 class="text-3xl font-extrabold text-gray-800 sm:text-3xl uppercase text-center">
                            {{ $chr->name }}</h2>
                        <h2 class="text-3xl font-extrabold text-red-800 sm:text-lg uppercase text-center">Barangay Captain
                        </h2>
                        <p class="mt-4 text-gray-600 text-lg text-center">Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit. Sed quis
                            eros at lacus feugiat hendrerit sed ut tortor. Suspendisse et magna quis elit efficitur
                            consequat.
                            Mauris eleifend velit a pretium iaculis. Donec sagittis velit et magna euismod, vel aliquet
                            nulla
                            malesuada. Nunc pharetra massa lectus, a fermentum arcu volutpat vel.</p>
                        <div class="mt-8">
                            <a href="#" class="text-red-800 hover:text-red-900 font-medium">Learn more about us
                                <span class="ml-2">&#8594;</span></a>
                        </div>
                    </div>
                    <div class="mt-12 md:mt-0 flex justify-center">
                        <img src="{{ $chr->officer_profile }}" alt="About Us Image" style="width: 300px;"
                            class="object-cover rounded-lg shadow-md">
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    {{-- end captian --}}

    {{-- council --}}
    <!-- source https://github.com/spacemadev/elevate-free-tailwind-business-template/ -->
    <section id="our-team" class="bg-gray-100 py-23">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8 text-primary text-red-800">Meet Our Council</h2>

            <div id="council" class="flex justify-center grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Team Member 2 -->
                @foreach ($secretary as $sc)
                    <div id="m-council" class="bg-white rounded-lg shadow-lg shadow-red-300 p-6 my-6 text-center w-80">
                        <img src="{{ asset($sc->officer_profile) }}" style="width: 250px; height: 250px;" alt="Team Member 2" class="w-full rounded-full mb-4">
                        <h3 class="text-xl font-semibold text-red-700 mb-1 uppercase">{{ $sc->name }}</h3>
                        <p class="text-gray-700 font-semibold">Role: {{ $sc->position }}</p>
                    </div>
                @endforeach
                <!-- Team Member 3 -->
                @foreach ($kagawads as $kg)
                    <div id="m-council" class="bg-white rounded-lg shadow-lg shadow-red-300 p-6 my-6 text-center w-80">
                        <img src="{{ asset($kg->officer_profile) }}" style="width: 250px; height: 250px;" alt="Team Member 2" class="w-full rounded-full mb-4">
                        <h3 class="text-xl font-semibold text-red-700 mb-1 uppercase">{{ $kg->name }}</h3>
                        <p class="text-gray-700 font-semibold">Role: {{ $kg->position }}</p>
                    </div>
                @endforeach

                @foreach ($sks as $sk)
                    <div id="m-council" class="bg-white rounded-lg shadow-lg shadow-red-300 p-6 my-6 text-center w-80">
                        <img src="{{ asset($sk->officer_profile) }}" style="width: 250px; height: 250px;" alt="Team Member 2" class="w-full rounded-full mb-4">
                        <h3 class="text-xl font-semibold text-red-700 mb-1 uppercase">{{ $sk->name }}</h3>
                        <p class="text-gray-700 font-semibold">Role: {{ $sk->position }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- end council --}}

    {{-- monitor --}}
    <div class="bg-gray-50 py-16 pt-23">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    The Blockchain-only hiring platform
                </h2>
                <p class="mt-3 text-xl text-gray-500 sm:mt-4">
                    Organic, genuine conversations with higher response rates than
                    LinkedIn or cold email.
                </p>
            </div>
        </div>
        <div class="mt-10 pb-1">
            <div class="relative">
                <div class="absolute inset-0 h-1/2 bg-gray-50"></div>
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="max-w-4xl mx-auto">
                        <dl class="rounded-lg bg-white shadow-lg sm:grid sm:grid-cols-3">
                            <div class="flex flex-col border-b border-gray-100 p-6 text-center sm:border-0 sm:border-r">
                                <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                                    Blockchain developers
                                </dt>
                                <dd class="order-1 text-5xl font-extrabold text-gray-700">500+</dd>
                            </div>
                            <div
                                class="flex flex-col border-t border-b border-gray-100 p-6 text-center sm:border-0 sm:border-l sm:border-r">
                                <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                                    Response rate
                                </dt>
                                <dd class="order-1 text-5xl font-extrabold text-gray-700">58%</dd>
                            </div>
                            <div class="flex flex-col border-t border-gray-100 p-6 text-center sm:border-0 sm:border-l">
                                <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                                    New devs a month
                                </dt>
                                <dd class="order-1 text-5xl font-extrabold text-gray-700">30+</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end monitor --}}

    {{-- contact --}}
    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-24 mx-auto flex sm:flex-nowrap flex-wrap">
            <div
                class="lg:w-2/3 md:w-1/2 bg-gray-300 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
                <iframe width="100%" height="100%" class="absolute inset-0" frameborder="0" title="map"
                    marginheight="0" marginwidth="0" scrolling="no"
                    src="https://maps.google.com/maps?width=100%&height=600&hl=en&q=%C4%B0zmir+(My%20Business%20Name)&ie=UTF8&t=&z=14&iwloc=B&output=embed"
                    style="filter: grayscale(1) contrast(1.2) opacity(0.4);"></iframe>
                <div class="bg-white relative flex flex-wrap py-6 rounded shadow-md">
                    <div class="lg:w-1/2 px-6">
                        <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">ADDRESS</h2>
                        <p class="mt-1">Photo booth tattooed prism, portland taiyaki hoodie neutra typewriter</p>
                    </div>
                    <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
                        <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">EMAIL</h2>
                        <a class="text-red-500 leading-relaxed">example@email.com</a>
                        <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4">PHONE</h2>
                        <p class="leading-relaxed">123-456-7890</p>
                    </div>
                </div>
            </div>
            <div class="lg:w-1/3 md:w-1/2 bg-white flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0">
                <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Feedback</h2>
                <p class="leading-relaxed mb-5 text-gray-600">Post-ironic portland shabby chic echo park, banjo fashion axe
                </p>
                <div class="relative mb-4">
                    <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                    <input type="text" id="name" name="name"
                        class="w-full bg-white rounded border border-gray-300 focus:border-red-500 focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <div class="relative mb-4">
                    <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full bg-white rounded border border-gray-300 focus:border-red-500 focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <div class="relative mb-4">
                    <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
                    <textarea id="message" name="message"
                        class="w-full bg-white rounded border border-gray-300 focus:border-red-500 focus:ring-2 focus:ring-red-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                </div>
                <button
                    class="text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded text-lg">Button</button>
                <p class="text-xs text-gray-500 mt-3">Chicharrones blog helvetica normcore iceland tousled brook viral
                    artisan.</p>
            </div>
        </div>
    </section>
    {{-- end contact --}}

    {{-- footer --}}
    @include('navbar.brgy_footer')
@endsection
