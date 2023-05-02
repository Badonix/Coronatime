<x-layout>
    <section class='flex justify-center lg:justify-between  h-full'>
        <div
            class='w-full h-full overflow-y-auto scrollbar-thin scrollbar-thumb-zinc-400 lg:flex-1 px-4 py-6 lg:px-24 lg:py-10 flex flex-col justify-start lg:justify-start'>
            <img src="{{ asset('assets/logo.png') }}" class='w-36' />
            <div class='mt-10 lg:mt-16'>
                <h2 class='font-bold lg:text-2xl text-xl lg:mt-0'>{{ __('signup.title') }}</h2>
                <p class='text-base lg:text-xl text-zinc-500 mt-2 lg:mt-4'>{{ __('signup.subtitle') }}</p>
            </div>
            <form class='lg:w-96' method="POST" action="{{ route('login.store') }}">
                @csrf
                <div class='mt-6 lg:mt-7'>
                    <x-form.label>{{ __('login.username') }}</x-form.label>
                    <div class='relative'>
                        <x-form.input name='login' placeholder="{{ __('login.username_placeholder') }}" />
                        <x-form.error name='login' />
                    </div>
                </div>
                <div class='mt-6 lg:mt-7'>
                    <x-form.label>{{ __('login.password') }}</x-form.label>
                    <div class='relative'>
                        <x-form.input name='password' type='password'
                            placeholder="{{ __('login.password_placeholder') }}" />
                        <x-form.error name='password' />
                    </div>
                </div>
                <div class='lg:mt-7 mt-4 flex items-center justify-between'>
                    <div class='flex items-center gap-2'>
                        <input name='remember' id='remember' type='checkbox' class='text-green-500 rounded-sm' />
                        <label for='remember' class='text-sm font-semibold'>{{ __('login.remember') }}</label>
                    </div>
                    <a href='{{ route('password.request') }}'
                        class='font-semibold text-sm text-blue-700'>{{ __('login.forgot_password') }}</a>
                </div>
                @error('wrong')
                    <p class='text-red-600 mt-2 text-sm'>{{ $message }}</p>
                @enderror
                <button type='submit'
                    class='w-full px-6 py-4 bg-green-500 font-bold text-white cursor-pointer rounded-lg mt-6'>{{ __('login.login') }}</button>
                <p class='mt-4 text-base text-zinc-500 text-center'>{{ __('login.no_account') }}<a
                        href='{{ route('signup') }}' class='text-slate-950 font-semibold'> {{ __('login.signup') }}
                    </a> </p>
            </form>
        </div>
        <img src="{{ asset('assets/cover.jpg') }}" class='hidden lg:block object-cover' />
    </section>
</x-layout>
