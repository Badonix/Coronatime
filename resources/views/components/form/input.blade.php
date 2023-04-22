<input
    class='w-full px-5 mt-2 py-4 rounded-lg text-zinc-500 text-base border {{ $errors->has($attributes['name']) ? 'border-red-700' : ($attributes['value'] != null ? 'border-green-600' : 'border-neutral-200') }}'
    {{ $attributes }} />
