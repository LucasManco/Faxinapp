<x-account-page>
    <x-slot name="title">
        {{ isset($JobType) ? 'Editar Endereço' : 'Cadastrar Novo Local de Atendimento' }}
    </x-slot>
    <x-slot name="content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:text-white bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 dark:text-white  bg-white dark:bg-gray-800 border-b border-gray-200">
                    <form class="w-full" method="post"
                        action="{{ isset($JobType) ? route('work_place.update', $JobType->id) : route('work_place.store') }}">
                        @csrf
                        @isset($JobType)
                            @method('PUT')
                        @else
                            @method('POST')
                        @endisset

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-1/3 md:w-1/2 px-4 mb-6 md:mb-0">
                                {{-- <label
                                    class="block uppercase tracking-wide text-cyan-400 dark:text-white text-xs font-bold mb-2"
                                    for="state">Estado</label> --}}
                                <label for="state"
                                    class="block mb-2 text-sm font-medium text-cyan-400 dark:text-white">Select an
                                    Estado</label>
                                <select id="state" name="state"
                                    class="appearance-none block w-full bg-gray-200 dark:bg-gray-800 text-cyan-400 dark:text-white border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:focus:bg-gray-900">
                                    <option disabled selected></option>
                                    @foreach ($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->nome }}</option>
                                    @endforeach
                                </select>

                                @error('state')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div id="loader" class="animate-spin h-5 w-5 mr-3"></div>


                        <style>
                            #loader {
                                display: none;
                                border: 8px solid #f3f3f3;
                                /* Light grey */
                                border-top: 8px solid #3498db;
                                /* Blue */
                                border-radius: 50%;
                                width: 40px;
                                height: 40px;
                                animation: spin 2s linear infinite;
                            }
                        </style>
                        <div id="city-block" class="flex flex-wrap -mx-3 mb-6" style="display:none">
                            <div class="w-1/3 md:w-1/2 px-4 mb-6 md:mb-0">
                                <label
                                    class="block uppercase tracking-wide text-cyan-400 dark:text-white text-xs font-bold mb-2"
                                    for="name">Cidade</label>
                                <select id="city" name="city"
                                    class="appearance-none block w-full bg-gray-200 dark:bg-gray-800 text-cyan-400 dark:text-white border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:focus:bg-gray-900">
                                    <option disabled selected></option>
                                </select>

                                @error('city')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <script>
                            state = document.querySelector("#state").addEventListener('change', (event) => {
                                var id_state = event.target.value;
                                document.querySelector("#loader").style.display = "block";

                                fetch(`/api/work_place/getCities/${id_state}`, {
                                        headers: {
                                            'Content-Type': 'application/json'
                                        },
                                    })
                                    .then((response) => response.json())
                                    .then(
                                        (data) => {
                                            document.querySelector("#city-block").style.display = "block";

                                            options = ""
                                            data.forEach(function(value) {
                                                options += value;
                                            })
                                            console.log(options);
                                            document.querySelector("#city").innerHTML = options;
                                            document.querySelector("#loader").style.display = "none";
                                        }
                                    );
                            });
                        </script>
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
