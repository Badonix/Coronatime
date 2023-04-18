<x-layout>
    <div class='h-screen flex justify-center items-center'>
        <img src="{{ asset('assets/logo.png') }}"
            class='absolute left-4 top-6 md:left-1/2 md:top-10 w-40 transform md:-translate-x-1/2' />
        <form class='flex flex-col items-center justify-center px-3 mb-10 gap-10'>
            <h2 class='text-2xl font-black'>Reset Password</h2>
            <div>
                <x-form.label>Email</x-form.label>
                <x-form.input placeholder="Enter your email" />
            </div>
            <button type='submit'
                class='w-full px-6 py-4 bg-green-500 font-bold text-white cursor-pointer rounded-lg'>RESET PASSWORD
            </button>
        </form>
    </div>
</x-layout>
