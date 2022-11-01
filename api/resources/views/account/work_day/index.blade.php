<x-account-page>
    <x-slot name="title">
        Dias Trabalhados
    </x-slot>
    <x-slot name="content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:text-white bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 dark:text-white bg-white dark:bg-gray-800 border-b border-gray-200">

                    
                    <form class="w-full" method="post" action="{{  route('work_day.store') }}">
                        @csrf
                        @method('POST')
                        <?php
                          $week_days = [
                                'Domingo',
                                'Segunda',
                                'Terça',
                                'Quarta',
                                'Quinta',
                                'Sexta',
                                'Sábado'
                            ];
                        ?>
                        @for ( $i = 0; $i < 7; $i++)
                            @isset ($work_days[$i])
                                <x-work-day-item :workday="$work_days[$i]">
                                    <x-slot name="week_day">{{$week_days[$i]}}</x-slot>
                                    <x-slot name="id">{{$i}}</x-slot>
                                </x-work-day-item>    
                            @else
                                <x-work-day-item>
                                    <x-slot name="week_day">{{$week_days[$i]}}</x-slot>
                                    <x-slot name="id">{{$i}}</x-slot>
                                </x-work-day-item>
                            @endif
                        @endfor
                        {{-- @foreach ($work_days as $key=>$work_day)
                            <x-work-day-item :workday="$work_day">
                                <x-slot name="week_day">{{$week_days[$key]}}</x-slot>
                                <x-slot name="id">{{$key}}</x-slot>
                            </x-work-day-item>
                        @endforeach --}}
                        {{-- <x-work-day-item>
                            <x-slot name="week_day">Segunda</x-slot>
                            <x-slot name="id">1</x-slot>
                        </x-work-day-item>
                        <x-work-day-item>
                            <x-slot name="week_day">Terça</x-slot>
                            <x-slot name="id">2</x-slot>
                        </x-work-day-item>
                        <x-work-day-item>
                            <x-slot name="week_day">Quarta</x-slot>
                            <x-slot name="id">3</x-slot>
                        </x-work-day-item>
                        <x-work-day-item>
                            <x-slot name="week_day">Quinta</x-slot>
                            <x-slot name="id">4</x-slot>
                        </x-work-day-item>
                        <x-work-day-item>
                            <x-slot name="week_day">Sexta</x-slot>
                            <x-slot name="id">5</x-slot>
                        </x-work-day-item>
                        <x-work-day-item>
                            <x-slot name="week_day">Sábado</x-slot>
                            <x-slot name="id">6</x-slot>
                        </x-work-day-item> --}}
                        


                        <div class="flex items-center px-4 py-4 justify-between">
                            <button
                                class="shadow bg-cyan-400 hover:bg-cyan-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                type="submit">
                                Salvar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-account-page>
