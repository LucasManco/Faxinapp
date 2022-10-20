<x-account-page>
    <x-slot name="title">
        {{ isset($JobType) ? 'Editar Endereço' : 'Cadastrar Novo Endereço' }}
    </x-slot>
    <x-slot name="content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:text-white bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 dark:text-white  bg-white dark:bg-gray-800 border-b border-gray-200">
                    <form class="w-full" method="post" action="{{  isset($JobType) ? route('job_type.update', $JobType->id) : route('job_type.store') }}">
                        @csrf
                        @isset($JobType)
                            @method('PUT')
                        @else
                            @method('POST')
                        @endisset

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-1/3 md:w-1/2 px-4 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                                    for="name">Nome</label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 dark:bg-gray-800 text-white dark:text-white border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:focus:bg-gray-900"
                                    id="name" name="name" type="text" class=""
                                    value="{{ isset($JobType) ? $JobType->name : '' }}">

                                @error('name')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-1/3 md:w-1/2 px-4 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                                    for="description">Descrição</label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 dark:bg-gray-800 text-white dark:text-white border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:focus:bg-gray-900"
                                    id="description" name="description" type="text" class=""
                                    value="{{ isset($JobType) ? $JobType->description : '' }}">

                                @error('description')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-1/3 md:w-1/2 px-4 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                                    for="price">Preço</label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 dark:bg-gray-800 text-white dark:text-white border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:focus:bg-gray-900"
                                    id="price" name="price" type="text" class=""
                                    value="{{ isset($JobType) ? $JobType->price : '' }}">

                                @error('price')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-1/3 md:w-1/2 px-4 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                                    for="time">Tempo Estimado</label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 dark:bg-gray-800 text-white dark:text-white border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:focus:bg-gray-900"
                                    id="time" name="time" type="text" class=""
                                    value="{{ isset($JobType) ? $JobType->time : '' }}">

                                @error('time')
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
