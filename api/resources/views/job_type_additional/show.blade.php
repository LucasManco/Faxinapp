<x-account-page>
    <x-slot name="title">
        Serviços Prestados
    </x-slot>

    <x-slot name="content">

    <div class="py-7 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="dark:text-white bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 dark:text-white bg-white dark:bg-gray-800 border-b border-gray-200">
                <h2 class=" text-2xl font-extrabold tracking-tight leading-none md:text-3xl lg:text-4xl">
                    {{ $JobType->name }}
                </h2>
                <table class="w-full text-sm text-right text-gray-500 dark:text-gray-400">
                    <div>
                        <span class="py-4">{{ $JobType->description }}</span>
                    </div>
                    <div>
                        <span class="font-bold py-4">Preço: </span>
                        <span class="py-4">R${{ number_format((float) $JobType->price, 2, ',', ''); }}</span>
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
                    
                    @if(!count($JobAditionals))
                        <h2 class="my-4 text-1xl font-extrabold tracking-tight leading-none text-gray-900  dark:text-white">Nenhum Adicional Cadastrado</h2>
                    @endif
                    @foreach ($JobAditionals as $JobAditional)
                        <a
                            class="job-additional w-full m-4 bg-cyan-400 dark:bg-gray-800 p-6 rounded  overflow-hidden flex flex-row justify-center items-center text-left"
                            id="job_additional_{{ $JobAditional->id }}">
                            
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

                        </a>
                    @endforeach
                    <a class="shadow bg-cyan-400 hover:bg-cyan-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                        href="{{ url(route('job_type_additional.create')) }}">
                        {{ __('Criar Serviço Adicional') }}
                    </a>
                   
                </form>
            </div>
        </div>
    </div>
    </x-slot>

</x-app-layout>
