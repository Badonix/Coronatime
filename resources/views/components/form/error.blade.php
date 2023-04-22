@props(['name'])
@error($name)
    <div class='flex items-center gap-2 mt-1'>
        <img src="{{ asset('/assets/error.png') }}" class='w-5' />
        <p class='text-red-700'>{{ $message }}</p>
    </div>
@enderror
