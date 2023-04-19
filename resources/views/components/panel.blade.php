<nav class='px-6 py-4 lg:px-28 lg:py-5 flex items-center justify-between'>
    <img src="{{ asset('assets/landing-logo.png') }}" class='w-32 sm:w-40' />
    <div class='items-center gap-12 hidden sm:flex'>
        <div x-data="{ open: false }" class='relative'>
            <div @click="open=!open" class='cursor-pointer flex items-center'>
                <p class='text-base font-normal'>{{ App::getLocale() }}</p>
                <img src="{{ asset('/assets/dropdown-icon.png') }}" class='w-5 h-5' />
            </div>

            <div x-show="open" @click.outside="open = false" class='flex flex-col -right-5 absolute top-7 w-20'>
                <div class='hover:bg-gray-200  border border-gray-100 transition-colors rounded-t-xl'>
                    <a class='block w-full text-center text-base' href='/en'>En</a>
                </div>
                <hr>
                <div class='hover:bg-gray-200  border border-gray-100 transition-colors rounded-b-xl'>
                    <a class='block w-full text-center text-base' href='/ka'>Ka</a>
                </div>
            </div>
        </div>
        <div class='flex items-center gap-2'>
            <p class='text-base font-bold'>Takeshi K.</p>
            <div class="border-l border-neutral-200 h-6"></div>
            <a href='/logout'>Log Out</a>
        </div>
    </div>


    <div class='sm:hidden flex items-center gap-12 relative'>
        <div x-data="{ open: false }" class='relative'>
            <div @click="open=!open" class='cursor-pointer flex items-center'>
                <p class='text-base font-normal'>{{ App::getLocale() }}</p>
                <img src="{{ asset('/assets/dropdown-icon.png') }}" class='w-5 h-5' />
            </div>

            <div x-show="open" @click.outside="open = false" class='flex flex-col -right-5 absolute top-7 w-20'>
                <div class='hover:bg-gray-200  border border-gray-100 transition-colors rounded-t-xl'>
                    <a class='block w-full text-center text-base' href='/en'>En</a>
                </div>
                <hr>
                <div class='hover:bg-gray-200  border border-gray-100 transition-colors rounded-b-xl'>
                    <a class='block w-full text-center text-base' href='/ka'>Ka</a>
                </div>
            </div>
        </div>
        <div x-data="{ menu: false }">
            <img @click="menu=!menu" src='{{ asset('/assets/menu-icon.png') }}' class='h-4' />
            <div x-show="menu" @click.outside="menu = false"
                class='absolute flex flex-col right-0 -bottom-20 rounded-md px-4 py-3 bg-slate-100 items-center gap-3'>
                <p class='text-sm font-bold'>Takeshi K.</p>
                <a href='/logout' class='text-sm'>Log Out</a>
            </div>
        </div>
    </div>
</nav>

<div class='px-4 lg:px-28 mt-10'>
    <h2 class='font-extrabold text-2xl'>Worldwide Statistics</h2>

    <div class='flex items-center gap-16 mt-10'>
        <div class='border-b-2 py-4 border-b-black'>
            <p class='font-bold'>Worldwide</p>
        </div>
        <div>
            <p>By country</p>
        </div>
    </div>

    {{ $slot }}

</div>
