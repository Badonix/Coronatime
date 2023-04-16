<x-layout>
    <section class='flex justify-center lg:justify-between  h-full'>
        <div class='lg:flex-1 px-4 py-6 lg:px-24 lg:py-10 flex flex-col justify-start lg:justify-start'>
            <img src="{{ asset('assets/logo.png') }}" class='w-36' />
            <form class='mt-10 lg:mt-16 lg:w-96'>
                <h2 class='font-bold lg:text-2xl text-xl lg:mt-0'>Welcome to Coronatime</h2>
                <p class='text-base lg:text-xl text-zinc-500 mt-2 lg:mt-4'>Please enter required info to sign up</p>
                <div class='mt-6 lg:mt-4'>
                    <x-form.label>Username</x-form.label>
                    <x-form.input placeholder="Enter unique username" />
                </div>
                <div class='mt-6 lg:mt-4'>
                    <x-form.label>Email</x-form.label>
                    <x-form.input placeholder="Enter your email" />
                </div>
                <div class='mt-6 lg:mt-4'>
                    <x-form.label>Password</x-form.label>
                    <x-form.input type='password' placeholder="Fill in password" />
                </div>
                <div class='mt-6 lg:mt-4'>
                    <x-form.label>Repeat Password</x-form.label>
                    <x-form.input type='password' placeholder="Repeat password" />
                </div>
                <button type='submit'
                    class='w-full px-6 py-4 bg-green-500 text-white cursor-pointer rounded-lg mt-6'>SIGN UP</button>
                <p class='mt-4 text-base text-zinc-500 text-center'>Already have an account? <a href='/login'
                        class='text-slate-950 font-semibold'>Log in
                    </a> </p>
            </form>
        </div>
        <img src="{{ asset('assets/cover.jpg') }}" class='hidden lg:block object-cover h-full' />
    </section>
</x-layout>
