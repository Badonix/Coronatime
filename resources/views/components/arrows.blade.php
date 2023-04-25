@props(['name'])
@if (request('sort_by') == $name)
    <img src="{{ request('sort_method') == 'asc' ? asset('/assets/up_active.png') : asset('/assets/up.png') }}"
        class='w-2 flex-shrink-0' />
    <img src="{{ request('sort_method') == 'desc' ? asset('/assets/down_active.png') : asset('/assets/down.png') }}"
        class='w-2 flex-shrink-0' />
@else
    <img src="{{ asset('/assets/up.png') }}" class='w-2 flex-shrink-0' />
    <img src="{{ asset('/assets/down.png') }}" class='w-2 flex-shrink-0' />
@endif
