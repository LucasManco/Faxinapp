<x-account-page>
    <x-slot name="title">
        <h2 class="font-semibold text-xl text-gray-800  dark:text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <x-slot name="content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:text-white bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 dark:text-white bg-white dark:bg-gray-800 border-b border-gray-200">

                    <form class="w-full" method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="flex flex-wrap mx-3 mb-6">
                            <div class="w-1/3 md:w-1/2 px-4 mb-6 md:mb-0">
                                <label
                                    class="block uppercase tracking-wide text-cyan-400 dark:text-white text-xs font-bold mb-2"
                                    for="name">Nome</label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 dark:bg-gray-800 text-cyan-400 dark:text-white border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white dark:focus:bg-gray-900"
                                    id="name" name="name" type="text" class=""
                                    value="{{ isset($user) ? $user->name : '' }}">
                                @error('name')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap mx-3 mb-6">
                            <div class="w-full px-4 mb-6 md:mb-0">
                                <label
                                    class="block uppercase tracking-wide text-cyan-400 dark:text-white text-xs font-bold mb-2"
                                    for="email">E-mail</label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 dark:bg-gray-800 text-cyan-400 dark:text-white border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white dark:focus:bg-gray-900"
                                    id="email" name="email" type="text" class=""
                                    value="{{ isset($user) ? $user->email : '' }}">

                                @error('email')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap mx-3 mb-6">
                            <div class="w-full md:w-1/3 px-4 mb-6 md:mb-0">
                                <label
                                    class="block uppercase tracking-wide text-cyan-400 dark:text-white text-xs font-bold mb-2"
                                    for="phone_number">Telefone</label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 dark:bg-gray-800 text-cyan-400 dark:text-white border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white dark:focus:bg-gray-900"
                                    id="phone_number" name="phone_number" type="text" class=""
                                    value="{{ isset($user) ? $user->phone_number : '' }}">
                                @error('number')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/3 px-4 mb-6 md:mb-0">
                                <label
                                    class="block uppercase tracking-wide text-cyan-400 dark:text-white text-xs font-bold mb-2"
                                    for="cpf">CPF</label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 dark:bg-gray-800 text-cyan-400 dark:text-white border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white dark:focus:bg-gray-900"
                                    id="cpf" name="cpf" type="text" class=""
                                    value="{{ isset($user) ? $user->cpf : '' }}">
                                @error('cpf')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @if (isset($employee))
                            <div class="flex flex-wrap mx-3 mb-6">
                                <div class="flex flex-wrap mb-6">
                                    <div class="w-full px-4 mb-6 md:mb-0">
                                        <label
                                            class="block uppercase tracking-wide text-cyan-400 dark:text-white text-xs font-bold mb-2"
                                            for="transport_value">Qual o valor que será cobrado pelo transporte.</label>
                                        <div class="flex align-center mb-3">
                                            <span
                                                class="block uppercase tracking-wide text-cyan-400 dark:text-white text-xs font-bold mb-auto mt-auto mr-4">R$</span>
                                            <input
                                                class="appearance-none block w-full bg-gray-200 dark:bg-gray-800 text-cyan-400 dark:text-white border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white dark:focus:bg-gray-900"
                                                id="transport_value" name="transport_value" type="text"
                                                class=""
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
                                            placeholder="">{{ $employee->description }}</textarea>


                                        @error('description')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="w-full px-4 mb-6 md:mb-0">
                                        <label
                                            class="block uppercase tracking-wide text-cyan-400 dark:text-white text-xs font-bold mb-2"
                                            for="transport_value">Escolha quais categorias de serviços você
                                            presta.</label>
                                        <div class="categorie w-full m-4 bg-cyan-400 dark:bg-gray-800 p-6 rounded  overflow-hidden flex flex-row justify-start items-center text-left"
                                            id="job_additional">
                                            <input type="checkbox" name="categorie_diarista" class="mr-6" {{$employee->categorie_list['Diarista']? 'checked' : ''}}>
                                            <span>Diarista</span>
                                        </div>
                                        <div class="categorie w-full m-4 bg-cyan-400 dark:bg-gray-800 p-6 rounded  overflow-hidden flex flex-row justify-start items-center text-left"
                                            id="job_additional">
                                            <input type="checkbox" name="categorie_piscina" class="mr-6" {{$employee->categorie_list['Limpeza de Piscina']? 'checked' : ''}}>
                                            <span>Limpeza de Piscina</span>
                                        </div>
                                        <div class="categorie w-full m-4 bg-cyan-400 dark:bg-gray-800 p-6 rounded  overflow-hidden flex flex-row justify-start items-center text-left"
                                            id="job_additional">
                                            <input type="checkbox" name="categorie_passadeira" class="mr-6" {{$employee->categorie_list['Passadeira']? 'checked' : ''}}>
                                            <span>Passadeira</span>
                                        </div>
                                        <div class="categorie w-full m-4 bg-cyan-400 dark:bg-gray-800 p-6 rounded  overflow-hidden flex flex-row justify-start items-center text-left"
                                            id="job_additional">
                                            <input type="checkbox" name="categorie_lavadeira" class="mr-6" {{$employee->categorie_list['Lavadeira']? 'checked' : ''}}>
                                            <span>Lavadeira</span>
                                        </div>
                                        <div class="categorie w-full m-4 bg-cyan-400 dark:bg-gray-800 p-6 rounded  overflow-hidden flex flex-row justify-start items-center text-left"
                                            id="job_additional">
                                            <input type="checkbox" name="categorie_cozinheira" class="mr-6" {{$employee->categorie_list['Cozinheira']? 'checked' : ''}}>
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
                                            <img src="{{ $employee->profile_image }}" alt="">
                                        <input type="file" class="form-control" name="image"
                                            accept="image/png, image/jpeg, image/jpg">
                                        @error('image')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        @endif
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
