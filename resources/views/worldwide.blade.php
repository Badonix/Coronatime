<x-layout>
    <x-panel name='worldwide' title="{{ __('worldwide.panel_title') }}">
        <div class='mt-6 lg:md-10 grid grid-cols-2 lg:grid-cols-3 gap-x-5 gap-y-5'>
            <div class='flex justify-center items-center col-span-2 lg:col-span-1 w-full'>
                <div
                    class='w-full lg:w-96 h-64 aspect-w-3 aspect-h-4 bg-blue-700 bg-opacity-10 flex flex-col py-8 lg:py-10 px-8 items-center rounded-2xl justify-center lg:px-20 gap-4 min-w-24'>
                    <img class='w-24 flex-shrink-0' src="{{ asset('/assets/newcase-graph.png') }}" />
                    <div class='flex flex-1 flex-col items-center gap-2'>
                        <p class='text-center font-medium text-sm lg:text-xl'>{{ __('worldwide.new_cases') }}
                        </p>
                        <p class='text-blue-700 text-2xl lg:text-4xl font-black'>715,523</p>
                    </div>
                </div>
            </div>

            <div class='flex justify-center items-center'>

                <div
                    class='h-64 w-full lg:w-96 aspect-w-3 aspect-h-4 bg-green-500 bg-opacity-10 flex flex-col py-8 lg:py-10 px-8 items-center rounded-2xl justify-center lg:px-20 gap-4 min-w-24'>
                    <img class='w-24 flex-shrink-0' src="{{ asset('/assets/recovered-graph.png') }}" />
                    <div class='flex flex-col items-center gap-2'>
                        <p class='font-medium text-sm lg:text-xl'>{{ __('worldwide.recovered') }}</p>
                        <p class='text-green-500 text-2xl lg:text-4xl font-black'>72,005</p>
                    </div>
                </div>
            </div>
            <div class='flex justify-center items-center'>

                <div
                    class='h-64 w-full lg:w-96 aspect-w-3 aspect-h-4 bg-yellow-400 bg-opacity-10 flex flex-col py-8 px-8 lg:py-10 items-center rounded-2xl justify-center lg:px-20 gap-4 min-w-24'>
                    <img class='w-24 flex-shrink-0' src="{{ asset('/assets/death-graph.png') }}" />
                    <div class='flex flex-col items-center gap-2'>
                        <p class='font-medium text-sm lg:text-xl'>{{ __('worldwide.death') }}</p>
                        <p class='text-yellow-400 text-2xl lg:text-4xl font-black'>8,332</p>
                    </div>
                </div>
            </div>
        </div>
    </x-panel>
</x-layout>
