<x-account-page>
    <x-slot name="title">
        Serviços Prestados
    </x-slot>
    <x-slot name="content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:text-white bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 dark:text-white bg-white dark:bg-gray-800 border-b border-gray-200">


                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="border-b-2">
                            <th class="py-4 px-6">Nome</th>
                            <th class="py-4 px-6">Descrição</th>
                            <th class="py-4 px-6">Preço</th>
                            <th class="py-4 px-6">Tempo Estimado</th>
                        </thead>
                        @foreach ($JobTypes as $JobType)
                        <tr>
                            <td class="py-4 px-6" >{{$JobType->name}}</td>
                            <td class="py-4 px-6" >{{$JobType->description}}</td>
                            <td class="py-4 px-6" >{{$JobType->price}}</td>
                            <td class="py-4 px-6" >{{$JobType->time}}</td>
                            <td class="acoes_evt">
                                <a class="text-gray-500 dark:text-gray-400" href="{{route('job_type.show',['job_type'=> $JobType->id])}}">Detalhes</a>
                                <a class="text-gray-500 dark:text-gray-400" href="{{route('job_type.edit',['job_type'=> $JobType->id])}}">Editar</a>
                                <form method="POST" action="{{route('job_type.destroy',['job_type'=> $JobType->id])}}">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="text-red-600 dark:text-red-400">
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 m-12">
            <a class="shadow bg-cyan-400 hover:bg-cyan-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
            href="{{ url(route('job_type.create')) }}">
                {{ __('Novo Serviço') }}
            </a>
        </div>
    </x-slot>
</x-account-page>
