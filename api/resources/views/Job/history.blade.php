<x-app-layout>
    <x-slot name="header">
        {{-- Historico --}}
    </x-slot>
    <x-slot name="headerCss">
        hidden
    </x-slot>

    <div class="mt-7 max-w-7xl mx-auto sm:px-6 lg:px-8">

        @foreach ($Jobs as $Job)
            <div
                class="my-4 flex justify-between items-center dark:text-white bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="py-4 px-6"><img class="rounded" src="{{ $Job->employee()->first()->profile_image }}" alt=""></div>
                <div class="py-4 px-6">
                    <div class="">{{ $Job->employee()->first()->getUser()->name }}</div>
                    <div class="">{{ __($Job->status) }}</div>
                    <div class="">{{ date('d/m/Y H:i:s', strtotime($Job->start_time)) }}</div>
                </div>
                
                <div class="py-4 px-6">{{ $Job->address() }}</div>

                <div class="py-4 px-6 acoes_evt">
                    <a class="text-green-600 dark:text-green-400" href={{ route('job.show', $Job->id) }}>

                        Detalhes

                    </a>
                </div>


            </div>
        @endforeach

    </div>
    {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 m-12">
            <a class="shadow bg-cyan-400 hover:bg-cyan-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
            href="{{ url(route('job_type.create')) }}">
                {{ __('Novo Serviço') }}
            </a>
        </div> --}}
</x-app-layout>
