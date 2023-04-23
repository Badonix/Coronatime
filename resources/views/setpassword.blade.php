<x-layout>
    <div class='h-screen flex flex-col justify-center items-center'>
        <img src="{{ asset('assets/logo.png') }}"
            class='absolute left-4 top-6 sm:left-1/2 sm:top-10 w-40 transform sm:-translate-x-1/2' />
        <form method="POST" action="{{ route('password.update') }}"
            class='w-screen h-screen sm:w-auto sm:h-auto flex flex-col items-center justify-between sm:justify-center px-5 mb-10 gap-10'>
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">
            <div class='w-full sm:w-auto pt-24 sm:pt-0 flex flex-col gap-3 sm:gap-9 items-center'>
                <h2 class='text-2xl font-black'>{{ __('reset.title') }}</h2>
                <div class='w-full'>
                    <x-form.label>{{ __('reset.password') }}</x-form.label>
                    <x-form.input name='password' placeholder="{{ __('reset.password_placeholder') }}" />
                </div>
                <div class='w-full'>
                    <x-form.label>{{ __('reset.repeat') }}</x-form.label>
                    <x-form.input name='password_confirmation' placeholder="{{ __('reset.repeat') }}" />
                </div>
            </div>
            <button type='submit'
                class='w-full px-6 py-4 bg-green-500 font-bold text-white cursor-pointer rounded-lg'>{{ __('reset.save') }}
            </button>
        </form>
    </div>
</x-layout>
