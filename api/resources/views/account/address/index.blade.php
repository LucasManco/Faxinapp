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
                            <th class="py-4 px-6">Rua</th>
                            <th class="py-4 px-6">Numero</th>
                            <th class="py-4 px-6">Cidade</th>
                            <th class="py-4 px-6">Estado</th>
                            <th class="py-4 px-6">CEP</th>
                            <th class="py-4 px-6">País</th>
                            <th class="py-4 px-6">Complemento</th>
                            <th class="py-4 px-6"></th>
                        </thead>
                        @foreach ($addresses as $address)
                        <tr>
                            <td class="py-4 px-6" >{{$address->street}}</td>
                            <td class="py-4 px-6" >{{$address->number}}</td>
                            <td class="py-4 px-6" >{{$address->city}}</td>
                            <td class="py-4 px-6" >{{$address->state}}</td>
                            <td class="py-4 px-6" >{{$address->postal_code}}</td>
                            <td class="py-4 px-6" >{{$address->country}}</td>
                            <td class="py-4 px-6" >{{$address->complement}}</td>
                            <td class="acoes_evt">
                                <a class="text-gray-500 dark:text-gray-400" href="{{route('address.edit',['address'=> $address->id])}}">Editar</a>
                                <form method="POST" action="{{route('address.destroy',['address'=> $address->id])}}">
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
            <a class="shadow bg-cyan-700 hover:bg-cyan-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
            href="{{ url(route('address.create')) }}">
                {{ __('Novo Endereço') }}
            </a>
        </div>
    </x-slot>
</x-account-page>
