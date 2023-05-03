<div class='relative mt-2'>
    <input
        class='w-full px-5 py-4 rounded-lg text-zinc-500 text-base border {{ $errors->has($attributes['name']) ? 'border-red-700' : ($attributes['value'] != null ? 'border-green-600' : 'border-neutral-200') }}'
        {{ $attributes }} />
    @if ($attributes['value'] != null && !$errors->has($attributes['name']))
        <img class='absolute w-6 right-4 top-1/2 transform -translate-y-1/2' src="{{ asset('/assets/tick.png') }}" />
    @endif
</div>
