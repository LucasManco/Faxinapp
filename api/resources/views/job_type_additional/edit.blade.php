<x-account-page>
    <x-slot name="title">
        {{ isset($JobTypeAdditional) ? 'Editar Endereço' : 'Cadastrar Novo Serviço' }}
    </x-slot>
    <x-slot name="content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:text-white bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 dark:text-white  bg-white dark:bg-gray-800 border-b border-gray-200">
                    <form class="w-full" method="post"
                        action="{{ isset($JobTypeAdditional) ? route('job_type_additional.update', $JobTypeAdditional->id) : route('job_type_additional.store') }}">
                        @csrf
                        @isset($JobTypeAdditional)
                            @method('PUT')
                        @else
                            @method('POST')
                        @endisset
                        <input type="hidden" name="job_type_id" value="{{$JobType ? $JobType->id : ''}}">
                        <div class="flex flex-wrap mx-3 mb-6">
                            <div class="w-full px-4 mb-6 md:mb-0">
                                <label
                                    class="block uppercase tracking-wide text-cyan-400 dark:text-white text-xs font-bold mb-2"
                                    for="name">Nome</label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 dark:bg-gray-800 text-cyan-400 dark:text-white border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:focus:bg-gray-900"
                                    id="name" name="name" type="text" class=""
                                    value="{{ isset($JobTypeAdditional) ? $JobTypeAdditional->name : '' }}">

                                @error('name')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- {{dd($JobTypeAdditional->description)}} --}}
                        <div class="flex flex-wrap mx-3 mb-6">
                            <div class="w-full px-4 mb-6 md:mb-0">
                                <label
                                    class="block uppercase tracking-wide text-cyan-400 dark:text-white text-xs font-bold mb-2"
                                    for="description">Descrição</label>
                                <textarea id="description" rows="4" name="description"
                                    class="appearance-none block w-full bg-gray-200 dark:bg-gray-800 text-cyan-400 dark:text-white border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:focus:bg-gray-900"
                                    placeholder="" >{{ isset($JobTypeAdditional) ? $JobTypeAdditional->description : '' }}</textarea>

                                @error('description')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap mx-3 mb-6">
                            <div class="w-1/2 px-4 mb-6 md:mb-0">
                                <label
                                    class="block uppercase tracking-wide text-cyan-400 dark:text-white text-xs font-bold mb-2"
                                    for="price">Preço</label>
                                <div class="flex align-center mb-3">
                                    <span
                                    class="block uppercase tracking-wide text-cyan-400 dark:text-white text-xs font-bold mb-auto mt-auto mr-4">R$</span>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 dark:bg-gray-800 text-cyan-400 dark:text-white border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:focus:bg-gray-900"
                                        id="price" name="price" type="text" class=""
                                        value="{{ isset($JobTypeAdditional) ? $JobTypeAdditional->price : '' }}">
                                </div>
                                @error('price')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="w-1/2 px-4 mb-6 md:mb-0">
                                <label
                                    class="block uppercase tracking-wide text-cyan-400 dark:text-white text-xs font-bold mb-2"
                                    for="time">Tempo Estimado</label>
                                <div class="flex align-center mb-3">
                                    <input
                                        class="appearance-none block w-2/3 bg-gray-200 dark:bg-gray-800 text-cyan-400 dark:text-white border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white dark:focus:bg-gray-900"
                                        id="time" name="time" type="text" class=""
                                        value="{{ isset($JobTypeAdditional) ? $JobTypeAdditional->time : '' }}">
                                    <span
                                        class="block uppercase tracking-wide text-cyan-400 dark:text-white text-xs font-bold mb-auto mt-auto ml-4">Minutos</span>
                                </div>
                                @error('time')
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
