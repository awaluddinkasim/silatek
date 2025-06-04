@props(['active' => false, 'href' => '#'])

<a class="font-medium {{ $active ? 'text-red-400' : 'text-gray-100 hover:text-gray-400' }} focus:outline-hidden text-nowrap transition duration-300 ease-in-out"
    href="{{ $href }}">{{ $slot }}</a>
