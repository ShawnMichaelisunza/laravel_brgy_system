@if ($type == 'submit')
    <button type="{{ $type }}"
        {{ $attributes->merge(['class' => 'bg-blue-700 hover:bg-blue-800 text-white font-semibold py-2 text-sm px-6 uppercase rounded']) }}>
        {{ $slot }}
    </button>

@elseif ($type == 'edit')
    <button type="{{ $type }}"
        {{ $attributes->merge(['class' => 'bg-green-700 hover:bg-green-800 text-white font-semibold py-1.5 text-sm px-4 uppercase rounded']) }}>
        {{ $slot }}
    </button>

@elseif ($type == 'delete')
    <button type="{{ $type }}"
        {{ $attributes->merge(['class' => 'bg-red-700 hover:bg-red-800 text-white font-semibold py-1.5 text-sm px-4 uppercase rounded']) }}>
        {{ $slot }}
    </button>
@endif
