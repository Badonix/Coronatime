<x-layout>
    <div class='h-screen flex flex-col justify-center items-center'>
        <img src="{{ asset('assets/logo.png') }}"
            class='absolute left-4 top-6 sm:left-1/2 sm:top-10 w-40 transform sm:-translate-x-1/2' />
        <form method="POST" action="{{ route('password.email') }}"
            class='w-screen h-screen sm:w-auto sm:h-auto flex flex-col items-center justify-between sm:justify-center px-5 mb-10 gap-10'>
            @csrf
            <div class='w-full sm:w-auto pt-24 sm:pt-0 flex flex-col gap-3 sm:gap-9 items-center'>
                <h2 class='text-2xl font-black'>{{ __('reset.title') }}</h2>
                <div class='w-full'>
                    <x-form.label>{{ __('reset.email') }}</x-form.label>
                    <x-form.input name='email' placeholder="{{ __('reset.placeholder') }}" />
                </div>
            </div>
            <button type='submit'
                class='w-full px-6 py-4 bg-green-500 font-bold text-white cursor-pointer rounded-lg'>{{ __('reset.reset') }}
            </button>
        </form>
    </div>
</x-layout>
