<x-layout>
    <div class='h-screen flex justify-center items-center'>
        <img src="{{ asset('assets/logo.png') }}"
            class='absolute left-4 top-6 md:left-1/2 md:top-10 w-40 transform md:-translate-x-1/2' />
        <div class='flex flex-col justify-center items-center gap-4 px-3'>
            <img src="{{ asset('/assets/checkmark.gif') }}" />
            <p class='slate-950 text-lg text-center'>We have sent you a confirmation email</p>
        </div>
    </div>
</x-layout>
