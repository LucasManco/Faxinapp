<x-account-page>
    <x-slot name="title">
        {{ isset($employee) ? 'Editar Endereço' : 'Cadastrar Novo Endereço' }}
    </x-slot>
    <x-slot name="content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:text-white bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 dark:text-white  bg-white dark:bg-gray-800 border-b border-gray-200">
                    <form class="w-full" method="post" action="{{  /*isset($employee) ? route('employee.update', $employee->id) :*/ route('employee.store') }}">
                        @csrf
                        @isset($employee)
                            @method('PUT')
                        @else
                            @method('POST')
                        @endisset


                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-1/3 md:w-1/2 px-4 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                                    for="transport_value">Qual o valor que será cobrado pelo transporte.</label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 dark:bg-gray-800 text-white dark:text-white border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:focus:bg-gray-900"
                                    id="transport_value" name="transport_value" type="text" class=""
                                    value="{{ isset($employee) ? $employee->transport_value : '' }}">

                                @error('transport_value')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex items-center px-4 py-4 justify-between">
                            <button
                                class="shadow bg-cyan-700 hover:bg-cyan-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
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
