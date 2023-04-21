<x-layout>
    <section class='flex justify-center lg:justify-between  h-full'>
        <div class='lg:flex-1 px-4 py-6 lg:px-24 lg:py-10 flex flex-col justify-start lg:justify-start'>
            <img src="{{ asset('assets/logo.png') }}" class='w-36' />
            <div class='mt-10 lg:mt-16'>
                <h2 class='font-bold lg:text-2xl text-xl lg:mt-0'>{{ __('signup.title') }}</h2>
                <p class='text-base lg:text-xl text-zinc-500 mt-2 lg:mt-4'>{{ __('signup.subtitle') }}</p>
            </div>
            <form class='lg:w-96 pb-4'>
                <div class='mt-6 lg:mt-4'>
                    <x-form.label>{{ __('signup.username') }}</x-form.label>
                    <x-form.input placeholder="{{ __('signup.username_placeholder') }}" />
                    <p class='hidden sm:block text-sm text-zinc-500 mt-2'>{{ __('signup.min_length') }}</p>
                </div>
                <div class='mt-6 lg:mt-4'>
                    <x-form.label>{{ __('signup.email') }}</x-form.label>
                    <x-form.input placeholder="{{ __('signup.email_placeholder') }}" />
                </div>
                <div class='mt-6 lg:mt-4'>
                    <x-form.label>{{ __('signup.password') }}</x-form.label>
                    <x-form.input type='password' placeholder="{{ __('signup.password_placeholder') }}" />
                </div>
                <div class='mt-6 lg:mt-4'>
                    <x-form.label>{{ __('signup.repeat_password') }}</x-form.label>
                    <x-form.input type='password' placeholder="{{ __('signup.repeat_password_placeholder') }}" />
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
