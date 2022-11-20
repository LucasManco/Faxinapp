<x-app-layout>
    <x-slot name="headerCss">
        bg-cyan-400 rounded-b-full
    </x-slot>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> --}}
        <div class="dark:text-white overflow-hidden sm:rounded-lg">
            <div class=" dark:text-white">
                <div class="flex flex-wrap justify-between">
                    <div class="w-full bg-cyan-400 dark:bg-gray-800 rounded  overflow-hidden">
                        <h2 class=" text-2xl font-extrabold tracking-tight leading-none md:text-3xl lg:text-4xl">
                            {{ $JobType->name }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-7 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="dark:text-white bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 dark:text-white bg-white dark:bg-gray-800 border-b border-gray-200">

                <table class="w-full text-sm text-right text-gray-500 dark:text-gray-400">
                    <div>
                        <span class="py-4">{{ $JobType->description }}</span>
                    </div>
                    <div>
                        <span class="font-bold py-4">Preço: </span>
                        <span class="py-4">R${{ $JobType->price }}</span>
                    </div>
                    <div>
                        <span class="font-bold py-4">Tempo Estimado: </span>
                        <span class="8py-4">{{ $JobType->time }} min</span>
                    </div>
                    </tr>
                </table>
                
                <form method="post" action="{{  route('job.store') }}">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="job_type_id" value="{{ $JobType->id }}">
                    {{-- {{dd($JobAditionals);}} --}}
                    <h2
                        class="my-4 text-1xl font-extrabold tracking-tight leading-none text-gray-900 md:text-2xl lg:text-3xl dark:text-white">
                        Adicionais
                    </h2>

                    @foreach ($JobAditionals as $JobAditional)
                        <button
                            class="job-additional w-full m-4 bg-cyan-400 dark:bg-gray-800 p-6 rounded  overflow-hidden flex flex-row justify-center items-center text-left"
                            id="job_additional_{{ $JobAditional->id }}">
                            <input type="checkbox" name="additional_job_{{ $JobAditional->id }}" class="">
                            <div class="m-4 w-1/3">
                                <span class="py-4">{{ $JobAditional->name }}</span>
                                <span class="py-4">{{ $JobAditional->description }}</span>
                            </div>
                            <div class="m-4 w-1/3">
                                <span class="font-bold py-4">Preço: </span>
                                <span class="py-4">R${{ $JobAditional->price }}</span>
                            </div>
                            <div class="m-4 w-1/3">
                                <span class="font-bold py-4">Tempo Estimado: </span>
                                <span class="8py-4">{{ $JobAditional->time }} min</span>
                            </div>

                        </button>
                    @endforeach

                    <script>
                        document.querySelectorAll(".job-additional").forEach(function(item) {
                            item.onclick = function(event) {
                                event.preventDefault();
                                checkbox = event.target.querySelector('input');
                                checkbox.checked = !checkbox.checked;
                            }
                        })
                    </script>
                    <div>
                        <h2
                            class="mb-4 text-1xl font-extrabold tracking-tight leading-none text-gray-900 md:text-2xl lg:text-3xl dark:text-white">
                            Horários Disponiveis
                        </h2>
                        @empty($AvaliableDays)
                            <h3
                                class="mb-4 text-base font-extrabold tracking-tight leading-none text-gray-900  dark:text-white">
                                Este parceiro está sem horários disponiveis no momento.
                            </h3>
                        @endisset
                        <select id="selected_date" name="selected_date" class="rounded m-4">
                            <option value=""
                                class="m-4 shadow bg-cyan-400 hover:bg-cyan-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                selected disabled>
                                Selecione uma data
                            </option>
                            @foreach ($AvaliableDays as $key => $AvaliableDay)
                                <option value="{{ $key }}"
                                    class="m-4 shadow bg-cyan-400 hover:bg-cyan-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                                    {{ $key }}
                                </option>
                            @endforeach
                        </select>
                        
                        @foreach ($AvaliableDays as $key => $AvaliableDay)
                            <div>
                                <select id="selected_hour_{{ $key }}" name="selected_hour" class="selected_hour rounded m-4"
                                    style="display: none">
                                    <option value=""
                                        class="m-4 shadow bg-cyan-400 hover:bg-cyan-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                        selected disabled>
                                        Selecione uma Hora
                                    </option>
                                    @foreach ($AvaliableDay as $AvaliableHour)
                                        <option value="{{ $AvaliableHour }}"
                                            class="m-4 shadow bg-cyan-400 hover:bg-cyan-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                            href="{{ route('job.store') }}">
                                            {{ $AvaliableHour }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endforeach

                        <script>
                            document.querySelector("#selected_date").addEventListener('change', (event) => {
                                var data_selecionada = event.target.value;
                                document.querySelectorAll(".selected_hour").forEach(function(item){item.style.display="none"})
                                document.querySelector(`#selected_hour_${data_selecionada}`).style.display="block"
                            });
                        </script>
                    </div>
                    <div class="flex items-center py-4 justify-between">
                        <button
                            class="shadow bg-cyan-400 hover:bg-cyan-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                            type="submit">
                            Finalizar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-app-layout>
