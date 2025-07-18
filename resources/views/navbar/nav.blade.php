<div class="flex min-h-screen bg-red-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-gradient-to-r from-red-900 to-red-700 shadow-lg ">
        <div class="py-2 flex justify-center">
            <img src="{{ asset('assets/image/brgy-logo.png') }}" alt="" class="w-33">
        </div>
        <nav class="mt-5">
            <a href="{{ route('dashboard') }}"
                class="block py-3 px-6 text-gray-100 hover:bg-red-900 font-medium uppercase"><i
                    class="fa-solid fa-house"></i> Dashboard</a>
            <a href="{{ route('anc.index') }}"
                class="block py-3 px-6 text-gray-100 hover:bg-red-900 font-medium uppercase"><i
                    class="fa-solid fa-bullhorn"></i> Announcement</a>
           @role(['superadmin', 'admin'])
                <a href="{{ route('officer.index') }}"
                    class="block py-3 px-6 text-gray-100 hover:bg-red-900 font-medium uppercase"><i
                        class="fa-solid fa-chess-rook"></i> Officers</a>
            @endrole

            <a href="{{ route('clearance.index') }}"
                class="block py-3 px-6 text-gray-100 hover:bg-red-900 font-medium uppercase"><i
                    class="fa-solid fa-file"></i> Clearance</a>
            <a href="{{ route('user.profile', encrypt(auth()->user()->id)) }}"
                class="block py-3 px-6 text-gray-100 hover:bg-red-900 font-medium uppercase"><i
                    class="fa-solid fa-user"></i> Profile</a>

            @role(['superadmin', 'admin'])
                <a href="{{ route('user.index') }}"
                    class="block py-3 px-6 text-gray-100 hover:bg-red-900 font-medium uppercase"><i
                        class="fa-solid fa-users"></i> Users</a>

                <a href="{{ route('user.deleted') }}"
                    class="block py-3 px-6 text-gray-100 hover:bg-red-900 font-medium uppercase"><i
                        class="fa-solid fa-user-slash"></i> Deleted Users</a>
            @endrole
            @role('superadmin')
                <a href="{{ route('auth.index') }}"
                    class="block py-3 px-6 text-gray-100 hover:bg-red-900 font-medium uppercase"><i
                        class="fa-solid fa-shield-halved"></i> authorization</a>
            @endrole
            <a href="{{ route('logout') }}"
                class="block mt-10 py-3 px-6 text-gray-100 hover:bg-red-900 font-medium uppercase"><i
                    class="fa-solid fa-right-from-bracket"></i> Logout</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Top Navbar -->
        <header class="bg-gradient-to-r from-red-900 to-red-700 shadow-lg p-4 flex justify-between items-center">
            <h1 class="text-md font-bold text-gray-100 uppercase">{{ auth()->user()->name }}</h1>
            <div class="flex items-center gap-4">
                <input type="text" placeholder="Search..."
                    class="px-4 py-2 border rounded-lg border-white bg-amber-100">

                <div class="w-10 h-10 rounded-full bg-black flex items-center justify-center text-white font-bold">
                    <img src="{{ auth()->user()->profile }}" alt="" class="rounded-full">
                </div>
            </div>
        </header>

        <!-- Content -->
        <main class="p-6 space-y-6">
