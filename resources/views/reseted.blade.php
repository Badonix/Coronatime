<x-layout>
    <div class='h-screen flex flex-col justify-center items-center'>
        <img src="{{ asset('assets/logo.png') }}"
            class='absolute left-4 top-6 sm:left-1/2 sm:top-10 w-40 transform sm:-translate-x-1/2' />

        <div
            class='w-screen h-screen sm:w-auto sm:h-auto flex flex-col items-center justify-between sm:justify-center px-5 mb-10 gap-10'>
            <div></div>
            <div class='flex flex-col justify-center items-center gap-2'>
                <img src="{{ asset('assets/checkmark.gif') }}" />
                <p class='text-center'>{{ __('reset.success_message') }}</p>
            </div>
            <a href="{{ route('login') }}"
                class='text-center w-full px-6 py-4 bg-green-500 font-bold text-white cursor-pointer rounded-lg'>
                {{ __('reset.sign_in') }} </a>
        </div>
    </div>
</x-layout>
