<x-account-page>
    <x-slot name="title">
        Endereços
    </x-slot>
    <x-slot name="content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:text-white bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 dark:text-white bg-white dark:bg-gray-800 border-b border-gray-200">
                    <h2
                        class="mb-4 text-2xl font-extrabold tracking-tight leading-none text-gray-900 md:text-3xl lg:text-4xl dark:text-white">
                        {{ $JobType->name }}
                    </h2>
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
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
                    <div>
                        <h2
                            class="mb-4 text-1xl font-extrabold tracking-tight leading-none text-gray-900 md:text-2xl lg:text-3xl dark:text-white">
                            Horários Disponiveis
                        </h2>

                        @foreach ($AvaliableDays as $key => $AvaliableDay)
                            <div>
                                <h3
                                class="w-full text-center  dark:bg-white bg-cyan-400 rounded mb-4 font-extrabold tracking-tight leading-none text-white text-1xl dark:text-cyan-400">
                                
                                    {{ $key }}
                                </h3>
                                <div class="flex flex-rol justify-evenly m-4">
                                    @foreach ($AvaliableDay as $AvaliableHour)
                                        <div class="">
                                            <form method="post"
                                                action="{{ isset($JobType) ? route('job.store') : route('job_type.store') }}">
                                                @csrf
                                                @method('POST')
                                                <input type="hidden" name="job_type_id" value="{{ $JobType->id }}">
                                                <input type="hidden" name="selected_date" value="{{ $key }}">
                                                <input type="hidden" name="selected_hour" value="{{ $AvaliableHour }}">
                                                <button
                                                    class="m-4 shadow bg-cyan-400 hover:bg-cyan-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                                    href="{{ route('job.store') }}">
                                                    {{ $AvaliableHour }}
                                                </button>
                                            </form>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>

    </x-slot>
</x-account-page>
