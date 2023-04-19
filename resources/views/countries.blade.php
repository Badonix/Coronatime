<x-layout>
    <x-panel name='country' title="Statistics by country">

        <div class='relative mt-10'>
            <img src="{{ asset('/assets/search.png') }}" class='w-5 absolute top-1/2 transform -translate-y-1/2 left-6' />
            <input type='text'
                class='py-4 text-sm text-zinc-500 px-14 rounded-lg border-transparent focus:border-transparent focus:ring-0 sm:outline-2 sm:border-neutral-200 border'
                placeholder='Search by country' />
        </div>

        <div class='pb-10'>

            <div
                class="sm:w-full w-screen scrollbar-thumb-zinc-500 scrollbar-thin overflow-x-auto mt-2 sm:mt-10 max-h-600 shadow-md rounded-b-lg">
                <table class="table-auto w-screen sm:w-full rounded-lg">
                    <thead>
                        <tr class="text-left font-bold ">
                            <th class="px-4 rounded-tl-lg sm:px-10 py-5 sticky top-0 bg-neutral-100 z-50">
                                <div class='flex items-center gap-2'>
                                    <p class='text-sm'>Location</p>
                                    <div class='flex flex-col justify-center items-center gap-0.5'>
                                        <img src="{{ asset('/assets/up.png') }}" class='w-2 cursor-pointer ' />
                                        <img src="{{ asset('/assets/down.png') }}" class='w-2 cursor-pointer' />
                                    </div>
                                </div>
                            </th>
                            <th class="px-4 sm:px-10 py-5 sticky top-0 bg-neutral-100 z-50">
                                <div class='flex items-center gap-2'>
                                    <p class='text-sm'>New cases</p>
                                    <div class='flex flex-col justify-center items-center gap-0.5'>
                                        <img src="{{ asset('/assets/up.png') }}" class='w-2 cursor-pointer ' />
                                        <img src="{{ asset('/assets/down.png') }}" class='w-2 cursor-pointer' />
                                    </div>
                                </div>
                            </th>
                            <th class="px-4 sm:px-10 py-5 sticky top-0 bg-neutral-100 z-50">
                                <div class='flex items-center gap-2'>
                                    <p class='text-sm'>Deaths</p>
                                    <div class='flex flex-col justify-center items-center gap-0.5'>
                                        <img src="{{ asset('/assets/up.png') }}" class='w-2 cursor-pointer ' />
                                        <img src="{{ asset('/assets/down.png') }}" class='w-2 cursor-pointer' />
                                    </div>
                                </div>
                            </th>
                            <th class="px-4 rounded-tr-lg sm:px-10 py-5 sticky top-0 bg-neutral-100 z-50">
                                <div class='flex items-center gap-2'>
                                    <p>Recovered</p>
                                    <div class='flex flex-col justify-center items-center gap-0.5'>
                                        <img src="{{ asset('/assets/up.png') }}" class='w-2 cursor-pointer ' />
                                        <img src="{{ asset('/assets/down.png') }}" class='w-2 cursor-pointer' />
                                    </div>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        <x-country-row />
                        <x-country-row />
                        <x-country-row />
                        <x-country-row />
                        <x-country-row />
                        <x-country-row />
                        <x-country-row />
                        <x-country-row />
                        <x-country-row />
                        <x-country-row />
                        <x-country-row />
                        <x-country-row />
                        <x-country-row />
                        <x-country-row />
                        <x-country-row />
                        <x-country-row />
                        <x-country-row />
                        <x-country-row />
                        <x-country-row />
                        <x-country-row />
                        <x-country-row />
                        <x-country-row />
                        <x-country-row />
                        <x-country-row />
                    </tbody>
                </table>
            </div>

        </div>

    </x-panel>
</x-layout>
