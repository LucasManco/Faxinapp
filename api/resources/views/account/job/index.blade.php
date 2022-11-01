<x-account-page>
    <x-slot name="title">
        Endereços
    </x-slot>
    <x-slot name="content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:text-white bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 dark:text-white bg-white dark:bg-gray-800 border-b border-gray-200">


                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="border-b-2">
                            <th class="py-4 px-6">Preço</th>
                            <th class="py-4 px-6">Transporte</th>
                            <th class="py-4 px-6">Taxa</th>
                            <th class="py-4 px-6">Preço Final</th>
                            <th class="py-4 px-6">Status</th>
                            <th class="py-4 px-6">Observações</th>
                            <th class="py-4 px-6">Endereço</th>
                        </thead>
                        @foreach ($Jobs as $Job)
                        <tr>
                            <td class="py-4 px-6" >{{$Job->price}}</td>
                            <td class="py-4 px-6" >{{$Job->transport}}</td>
                            <td class="py-4 px-6" >{{$Job->tax}}</td>
                            <td class="py-4 px-6" >{{$Job->final_price}}</td>
                            <td class="py-4 px-6" >{{$Job->status}}</td>
                            <td class="py-4 px-6" >{{$Job->observation}}</td>
                            <td class="py-4 px-6" >{{$Job->address()}}</td>
                            @if ($Job->status == 'requested')
                            <td class="acoes_evt">
                                <form method="POST" action="{{route('job.accept')}}">
                                    @csrf
                                    @method("PUT")
                                    <input type="hidden" name="accept" value="true">
                                    <input type="hidden" name="job" value="{{$Job->id}}">
                                    <button type="submit" class="text-green-600 dark:text-green-400">
                                        Aceitar
                                    </button>
                                </form>

                                <form method="POST" action="{{route('job.accept')}}">
                                    @csrf
                                    @method("PUT")
                                    <input type="hidden" name="accept" value="false">
                                    <input type="hidden" name="job" value="{{$Job->id}}">
                                    <button type="submit" class="text-red-600 dark:text-red-400">
                                        Recusar
                                    </button>
                                </form>
                            </td>
                            @endif
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
