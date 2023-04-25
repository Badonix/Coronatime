<x-layout>
    <section class='flex justify-center lg:justify-between  h-full'>
        <div
            class='h-full overflow-y-auto scrollbar-thin scrollbar-thumb-zinc-400 lg:flex-1 px-4 py-6 lg:px-24 lg:py-10 flex flex-col justify-start lg:justify-start'>
            <img src="{{ asset('assets/logo.png') }}" class='w-36' />
            <div class='mt-10 lg:mt-16'>
                <h2 class='font-bold lg:text-2xl text-xl lg:mt-0'>{{ __('signup.title') }}</h2>
                <p class='text-base lg:text-xl text-zinc-500 mt-2 lg:mt-4'>{{ __('signup.subtitle') }}</p>
            </div>
            <form action="{{ route('signup.store') }}" method="POST" class='lg:w-96 pb-4'>
                @csrf
                <div class='mt-6 lg:mt-4'>
                    <x-form.label>{{ __('signup.username') }}</x-form.label>
                    <x-form.input :value="old('username')" name="username"
                        placeholder="{{ __('signup.username_placeholder') }}" />
                    <x-form.error name='username' />
                    @if (!$errors->has('username'))
                        <p class='hidden sm:block text-sm text-zinc-500 mt-2'>{{ __('signup.min_length') }}</p>
                    @endif
                </div>
                <div class='mt-6 lg:mt-4'>
                    <x-form.label>{{ __('signup.email') }}</x-form.label>
                    <x-form.input :value="old('email')" name="email" placeholder="{{ __('signup.email_placeholder') }}" />
                    <x-form.error name='email' />
                </div>
                <div class='mt-6 lg:mt-4'>
                    <x-form.label>{{ __('signup.password') }}</x-form.label>
                    <x-form.input :value="old('password')" name="password" type='password'
                        placeholder="{{ __('signup.password_placeholder') }}" />
                    <x-form.error name='password' />

                </div>
                <div class='mt-6 lg:mt-4'>
                    <x-form.label>{{ __('signup.repeat_password') }}</x-form.label>
                    <x-form.input :value="old('password_confirmation')" name="password_confirmation" type='password'
                        placeholder="{{ __('signup.repeat_password_placeholder') }}" />
                    <x-form.error name='password_confirmation' />

                </div>
                <button type='submit'
                    class='w-full px-6 py-4 bg-green-500 text-white font-bold cursor-pointer rounded-lg mt-6'>{{ __('signup.signup') }}</button>
                <p class='mt-4 text-base text-zinc-500 text-center'>{{ __('signup.already_account') }} <a
                        href='{{ route('login') }}' class='text-slate-950 font-semibold'>{{ __('signup.login') }}
                    </a> </p>
            </form>
        </div>
        <img src="{{ asset('assets/cover.jpg') }}" class='hidden lg:block object-cover h-full' />
    </section>
</x-layout>
