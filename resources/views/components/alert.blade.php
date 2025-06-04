@props(['color' => 'primary'])

@switch($color)
    @case('blue')
        @php
            $theme =
                'bg-blue-100 border border-blue-200 text-sm text-blue-800 rounded-lg p-4 dark:bg-blue-800/10 dark:border-blue-900 dark:text-blue-500';
        @endphp
    @break

    @case('red')
        @php
            $theme =
                'bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500';
        @endphp
    @break

    @case('green')
        @php
            $theme =
                'bg-green-100 border border-green-200 text-sm text-green-800 rounded-lg p-4 dark:bg-green-800/10 dark:border-green-900 dark:text-green-500';
        @endphp
    @break

    @case('yellow')
        @php
            $theme =
                'bg-yellow-100 border border-yellow-200 text-sm text-yellow-800 rounded-lg p-4 dark:bg-yellow-800/10 dark:border-yellow-900 dark:text-yellow-500';
        @endphp
    @break

    @default
@endswitch

<div class="mt-2 mb-3 {{ $theme }}" role="alert" tabindex="-1" aria-labelledby="hs-soft-color-danger-label">
    {{ $slot }}
</div>
