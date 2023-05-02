@props(['name'])
@error($name)
    <div class='flex items-center gap-2 absolute -bottom-6'>
        <img src="{{ asset('/assets/error.png') }}" class='w-5' />
        <p class='whitespace-nowrap text-red-700'>{{ $message }}</p>
    </div>
@enderror
