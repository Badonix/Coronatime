<x-layout>
    <x-panel name='country' title="{{ __('countries.panel_title') }}">

        <div class='relative mt-10'>
            <img src="{{ asset('/assets/search.png') }}" class='w-5 absolute top-1/2 transform -translate-y-1/2 left-6' />
            <form action="#" method="GET">
                <input type='text' name='search' value="{{ request('search') }}"
                    class='py-4 text-sm text-zinc-500 px-14 rounded-lg border-transparent focus:border-transparent focus:ring-0 sm:outline-2 sm:border-neutral-200 border'
                    placeholder="{{ __('countries.search_placeholder') }}" />
            </form>
        </div>

        <div class='pb-10'>

            <div
                class="sm:w-full w-screen scrollbar-thumb-zinc-500 scrollbar-thin overflow-x-auto mt-2 sm:mt-10 max-h-600 shadow-md rounded-b-lg">
                <table class="table-auto w-screen sm:w-full rounded-lg">
                    <thead>
                        <tr class="text-left font-bold ">
                            <th class="px-4 rounded-tl-lg sm:px-10 py-5 sticky top-0 bg-neutral-100 z-50">
                                <div class='flex items-center gap-2'>
                                    <a href='{{ route('countries', ['search' => request('search'), 'sort_by' => 'country', 'sort_method' => request('sort_method') == 'asc' ? 'desc' : 'asc']) }}'
                                        class='text-sm text-center'>{{ __('countries.location') }}</a>
                                    <div class='min-w-8 flex flex-col justify-center items-center gap-0.5 w-2'>
                                        <x-arrows name='country' />
                                    </div>
                                </div>
                            </th>
                            <th class="px-4 sm:px-10 py-5 sticky top-0 bg-neutral-100 z-50">
                                <div class='flex items-center gap-2'>
                                    <a href='{{ route('countries', ['search' => request('search'), 'sort_by' => 'confirmed', 'sort_method' => request('sort_method') == 'asc' ? 'desc' : 'asc']) }}'
                                        class='text-sm text-center'>{{ __('countries.new_case') }}</a>
                                    <div class='min-w-8 flex flex-col justify-center items-center gap-0.5 w-2'>
                                        <x-arrows name='confirmed' />
                                    </div>
                                </div>
                            </th>
                            <th class="px-4 sm:px-10 py-5 sticky top-0 bg-neutral-100 z-50">
                                <div class='flex items-center gap-2'>
                                    <a href='{{ route('countries', ['search' => request('search'), 'sort_by' => 'deaths', 'sort_method' => request('sort_method') == 'asc' ? 'desc' : 'asc']) }}'
                                        class='text-sm text-center'>{{ __('countries.death') }}</a>
                                    <div class='min-w-8 flex flex-col justify-center items-center gap-0.5 w-2'>
                                        <x-arrows name='deaths' />
                                    </div>
                                </div>
                            </th>
                            <th class="px-4 rounded-tr-lg sm:px-10 py-5 sticky top-0 bg-neutral-100 z-50">
                                <div class='flex items-center gap-2'>
                                    <a href='{{ route('countries', ['search' => request('search'), 'sort_by' => 'recovered', 'sort_method' => request('sort_method') == 'asc' ? 'desc' : 'asc']) }}'
                                        class='text-sm text-center'>{{ __('countries.recovered') }}</a>
                                    <div class='min-w-8 flex flex-col justify-center items-center gap-0.5 w-2'>
                                        <x-arrows name='recovered' />
                                    </div>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        <td class="px-5 sm:px-10 py-4">{{ __('countries.worldwide') }}</td>
                        <td class="px-5 sm:px-10 py-4">{{ $worldwideConfirmed }}</td>
                        <td class="px-5 sm:px-10 py-4">{{ $worldwideDeaths }}</td>
                        <td class="px-5 sm:px-10 py-4">{{ $worldwideRecovered }}</td>
                        @foreach ($stats as $stat)
                            <x-country-row :country="$stat['country']" :confirmed="$stat['confirmed']" :death="$stat['deaths']" :recovered="$stat['recovered']" />
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </x-panel>
</x-layout>
