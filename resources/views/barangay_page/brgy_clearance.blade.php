@extends('layout.app')

@include('navbar.brgy_nav')
@section('content')
    <div class="p-10">
        {{-- user details --}}
        <div class="w-full flex gap-5 items-end pb-8 mb-3 border-b">
            <div><img src="{{ asset($user->profile) }}" alt="" class="w-33 rounded-sm"></div>
            <div class="w-full">
                <h1 class="font-semibold text-lg text-red-800">Name: <span
                        class="text-gray-800 uppercase">{{ $user->name }}</span></h1>
                <div class="flex justify-between">
                    <h1 class="font-semibold text-md text-red-800">Email: <span class="text-gray-800">{{ $user->email }}</h1>
                    @foreach ($user->roles as $role)
                        <h1 class="font-semibold text-md text-red-800">Authorization: <span
                                class="text-gray-800 uppercase">{{ $role->name }}</h1>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- clearance --}}
        <div class="flex gap-5">
            {{-- form --}}
            <div class="w-full">
                <h1 class="text-md font-semibold my-2 text-red-800 uppercase">Create a New Brgy Clearance</h1>
                <form action="{{ route('clearance.store') }}" method="post" enctype="multipart/form-data"
                    class="grid gap-5">
                    @csrf

                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <div class="grid">
                        <label for="" class=" text-sm uppercase font-medium text-red-700">Picture ( 2x2 only
                            )</label>
                        <input type="file" name="picture" class="border border-red-300 px-2 py-1 rounded">
                        @error('picture')
                            <span class="text-xs text-red-500">* {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="grid">
                        <label for="" class=" text-sm uppercase font-medium text-red-700">Purpose</label>
                        <select name="purpose" id="" class="border border-red-300 px-2 py-1 rounded">
                            <option value="Local Employment">Local Employment</option>
                            <option value="Overseas Employment">Overseas Employment</option>
                            <option value="Loan">Loan</option>
                            <option value="TRU Registrations">TRU Registrations</option>
                            <option value="Wiring Perment">Wiring Perment</option>
                        </select>
                        @error('purpose')
                            <span class="text-xs text-red-500">* {{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <button type="submit"
                            class="border border-blue-500 text-sm font-semibold text-white bg-blue-500 hover:bg-blue-700 py-2 px-4 uppercase rounded">Create
                        </button>
                    </div>
                </form>
            </div>

            {{-- table --}}
            <div class="w-full">
                <div class="flex justify-end gap-1.5 mb-3">
                    <a href=""
                        class="border border-yellow-700 py-1 px-4 rounded text-xs bg-yellow-700 text-white font-medium hover:bg-yellow-800">ALL</a>
                    <a href=""
                        class="border border-blue-700 py-1 px-4 rounded text-xs bg-blue-700 text-white font-medium hover:bg-blue-800">PENDING</a>
                    <a href=""
                        class="border border-green-700 py-1 px-4 rounded text-xs bg-green-700 text-white font-medium hover:bg-green-800">APPROVED</a>
                    <a href=""
                        class="border border-red-700 py-1 px-4 rounded text-xs bg-red-700 text-white font-medium hover:bg-red-800">CANCELED</a>
                </div>
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-gray-300 text-red-600 uppercase text-xs leading-normal">
                            <th class="py-3 px-6 text-center">Created At</th>
                            <th class="py-3 px-6 text-center">Purpose</th>
                            <th class="py-3 px-6 text-center">Status</th>
                            <th class="py-3 px-6 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-xs">
                        @foreach ($clearances as $clearance)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6">{{ $clearance->created_at->diffForHumans() }}</td>
                                <td class="py-3 px-6">{{ $clearance->purpose }}</td>
                                <td class="py-3 px-6">

                                    @if ($clearance->status == 'APPROVED')
                                        <span class="text-green-500 font-medium">{{ $clearance->status }}</span>
                                    @elseif ($clearance->status == 'DISAPPROVED')
                                        <span class="text-red-500 font-medium">{{ $clearance->status }}</span>
                                    @else
                                        <span class="text-blue-500 font-medium">{{ $clearance->status }}</span>
                                    @endif
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <a href="{{ route('clearance.show', encrypt($clearance->id)) }}" target="__blank"
                                            class="w-4 mr-2 transform hover:text-green-500 hover:scale-110">
                                            <i class="fa-solid fa-street-view"></i>
                                        </a>
                                        {{-- approve --}}
                                        @if ($clearance->status == 'APPROVED')
                                            {{-- no display approve btn --}}
                                        @else
                                            {{-- approve btn --}}
                                            @can('edit clearance')
                                                <form action="{{ route('clearance.approve', encrypt($clearance->id)) }}"
                                                    method="post">
                                                    @csrf
                                                    <button class="w-4 mr-2 transform hover:text-green-500 hover:scale-110">
                                                        <i class="fa-solid fa-circle-check"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                            @can('delete clearance')
                                                {{-- disapprove btn --}}
                                                <form action="{{ route('clearance.cancel', encrypt($clearance->id)) }}"
                                                    method="post">
                                                    @csrf @method('delete')
                                                    <button class="w-4 mr-2 transform hover:text-red-500 hover:scale-110">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-5">
                    {{ $clearances->appends(request()->toArray())->links() }}
                </div>
            </div>
        </div>
    </div>

    @include('navbar.brgy_footer')
@endsection
