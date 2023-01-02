<x-account-page>
    <x-slot name="title">
        Perfil
    </x-slot>
    <x-slot name="content">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="dark:text-white bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex">
                @isset($employee)
                    <div class="w-1/3 p-6 dark:text-white bg-white dark:bg-gray-800 border-b border-gray-200">
                        <img src="{{ $employee->profile_image }}" alt="">
                    </div>
                @endisset

                <div class="w-2/3 p-6 dark:text-white bg-white dark:bg-gray-800 border-b border-gray-200">

                    <div class="flex py-4 px-6">
                        <span class="pr-1">Nome:</span>
                        <p>{{ $user->name }}</p>
                    </div>
                    <div class="flex py-4 px-6">
                        <span class="pr-1">E-mail: </span>
                        <p>{{ $user->email }}</p>
                    </div>
                    <div class="flex py-4 px-6">
                        <span class="pr-1">Telefone: </span>
                        <p>{{ $user->phone_number }}</p>
                    </div>
                    <div class="flex py-4 px-6">
                        <span class="pr-1">CPF: </span>
                        <p>{{ $user->cpf }}</p>
                    </div>
                    @isset($employee)
                        <div class="flex py-4 px-6">
                            <span class="pr-1">Taxa de Transporte: </span>
                            <p>R${{ number_format((float) $employee->transport_value, 2, '.', '') }}</p>
                        </div>
                        <div class="flex py-4 px-6">
                            <span class="pr-1">Categories: </span>
                            @foreach(json_decode($employee->categories) as $categorie)
                                <span class=" px-6 text-sm text-gray-500 dark:text-gray-400 overflow-hidden flex items-center border-gray-500 rounded">{{ $categorie }}</span>
                            @endforeach
                        </div>
                        <div class="flex py-4 px-6">
                            <span class="pr-1">Descrição: </span>
                            <p>{{ $employee->description }}</p>
                        </div>
                    @endisset
                </div>
            </div>
        
        <div class="flex justify-between m-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <a class="shadow bg-gray-300 hover:bg-gray-700 focus:shadow-outline focus:outline-none text-byan-700 font-bold py-2 px-4 rounded"
                    href="{{ url(route('user.edit', $user->id)) }}">
                    {{ __('Editar Perfil') }}
                </a>
            </div>
            @if(!$user->isEmployee())
                <div class="">
                    <a class="shadow bg-cyan-400 hover:bg-cyan-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                        href="{{ url(route('employee.create')) }}">
                        {{ __('Finalizar Cadastro Parceiro') }}
                    </a>
                </div>
            @endif
        </div>
    </x-slot>
</x-account-page>
