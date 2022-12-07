<x-account-page>
    <x-slot name="title">
        {{ isset($employee) ? 'Editar Endereço' : 'Cadastrar Novo Endereço' }}
    </x-slot>
    <x-slot name="content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:text-white bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 dark:text-white  bg-white dark:bg-gray-800 border-b border-gray-200">
                    <form class="w-full" method="POST" action="{{ route('employee.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @isset($employee)
                            @method('PUT')
                        @else
                            @method('POST')
                        @endisset


                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-4 mb-6 md:mb-0">
                                <label
                                    class="block uppercase tracking-wide text-cyan-400 dark:text-white text-xs font-bold mb-2"
                                    for="transport_value">Qual o valor que será cobrado pelo transporte.</label>
                                <div class="flex align-center mb-3">
                                    <span
                                        class="block uppercase tracking-wide text-cyan-400 dark:text-white text-xs font-bold mb-auto mt-auto mr-4">R$</span>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 dark:bg-gray-800 text-cyan-400 dark:text-white border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white dark:focus:bg-gray-900"
                                        id="transport_value" name="transport_value" type="text" class=""
                                        value="{{ isset($employee) ? $employee->transport_value : '' }}">

                                </div>
                                @error('transport_value')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="w-full px-4 mb-6 md:mb-0">
                                <label
                                    class="block uppercase tracking-wide text-cyan-400 dark:text-white text-xs font-bold mb-2"
                                    for="description">Insira uma breve apresentação.</label>
                                <textarea id="description" rows="4" name="description"
                                    class="appearance-none block w-full bg-gray-200 dark:bg-gray-800 text-cyan-400 dark:text-white border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:focus:bg-gray-900"
                                    placeholder=""></textarea>


                                @error('description')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="w-full px-4 mb-6 md:mb-0">
                                <label
                                    class="block uppercase tracking-wide text-cyan-400 dark:text-white text-xs font-bold mb-2"
                                    for="transport_value">Escolha quais categorias de serviços você presta.</label>
                                <div class="categorie w-full m-4 bg-cyan-400 dark:bg-gray-800 p-6 rounded  overflow-hidden flex flex-row justify-start items-center text-left"
                                    id="job_additional">
                                    <input type="checkbox" name="categorie_diarista" class="mr-6">
                                    <span>Diarista</span>
                                </div>
                                <div class="categorie w-full m-4 bg-cyan-400 dark:bg-gray-800 p-6 rounded  overflow-hidden flex flex-row justify-start items-center text-left"
                                    id="job_additional">
                                    <input type="checkbox" name="categorie_piscina" class="mr-6">
                                    <span>Limpeza de Piscina</span>
                                </div>
                                <div class="categorie w-full m-4 bg-cyan-400 dark:bg-gray-800 p-6 rounded  overflow-hidden flex flex-row justify-start items-center text-left"
                                    id="job_additional">
                                    <input type="checkbox" name="categorie_passadeira" class="mr-6">
                                    <span>Passadeira</span>
                                </div>
                                <div class="categorie w-full m-4 bg-cyan-400 dark:bg-gray-800 p-6 rounded  overflow-hidden flex flex-row justify-start items-center text-left"
                                    id="job_additional">
                                    <input type="checkbox" name="categorie_lavadeira" class="mr-6">
                                    <span>Lavadeira</span>
                                </div>
                                <div class="categorie w-full m-4 bg-cyan-400 dark:bg-gray-800 p-6 rounded  overflow-hidden flex flex-row justify-start items-center text-left"
                                    id="job_additional">
                                    <input type="checkbox" name="categorie_cozinheira" class="mr-6">
                                    <span>Cozinheira</span>
                                </div>


                                @error('transport_value')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <script>
                                document.querySelectorAll(".categorie").forEach(function(item) {
                                    item.onclick = function(event) {
                                        event.preventDefault();
                                        checkbox = event.target.querySelector('input');
                                        checkbox.checked = !checkbox.checked;
                                    }
                                })
                            </script>

                            <div class="w-full px-4 mb-6 md:mb-0">
                                <label
                                    class="block uppercase tracking-wide text-cyan-400 dark:text-white text-xs font-bold mb-2"
                                    for="transport_value">Adicionar a foto de exibição.</label>

                                <input type="file" class="form-control" name="image"
                                    accept="image/png, image/jpeg, image/jpg">
                                @error('image')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
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
