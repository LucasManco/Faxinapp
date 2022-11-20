<x-account-page>
    <x-slot name="title">
        {{ isset($address) ? 'Editar Endereço' : 'Cadastrar Novo Endereço' }}
    </x-slot>
    <x-slot name="content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:text-white bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 dark:text-white  bg-white dark:bg-gray-800 border-b border-gray-200">
                    <form class="w-full" method="post" action="{{  isset($address) ? route('address.update', $address->id) : route('address.store') }}">
                        @csrf
                        @isset($address)
                            @method('PUT')
                        @else
                            @method('POST')
                        @endisset

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-1/3 md:w-1/2 px-4 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-cyan-400 dark:text-white text-xs font-bold mb-2"
                                    for="postal_code">CEP</label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 dark:bg-gray-800  text-cyan-400 dark:text-white border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:focus:bg-gray-900"
                                    id="postal_code" name="postal_code" type="text" class=""
                                    value="{{ isset($address) ? $address->postal_code : '' }}">
                                @error('postal_code')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-4 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-cyan-400 dark:text-white text-xs font-bold mb-2"
                                    for="street">Rua</label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 dark:bg-gray-800 text-cyan-400 dark:text-white border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:focus:bg-gray-900"
                                    id="street" name="street" type="text" class=""
                                    value="{{ isset($address) ? $address->street : '' }}">

                                @error('street')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/3 px-4 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-cyan-400 dark:text-white text-xs font-bold mb-2"
                                    for="number">Numero</label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 dark:bg-gray-800 text-cyan-400 dark:text-white border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:focus:bg-gray-900"
                                    id="number" name="number" type="number" class=""
                                    value="{{ isset($address) ? $address->number : '' }}">
                                @error('number')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/3 px-4 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-cyan-400 dark:text-white text-xs font-bold mb-2"
                                    for="city">Cidade</label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 dark:bg-gray-800 text-cyan-400 dark:text-white border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:focus:bg-gray-900"
                                    id="city" name="city" type="text" class=""
                                    value="{{ isset($address) ? $address->city : '' }}">
                                @error('city')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/3 px-4 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-cyan-400 dark:text-white text-xs font-bold mb-2"
                                    for="state">Estado</label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 dark:bg-gray-800 text-cyan-400 dark:text-white border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:focus:bg-gray-900"
                                    id="state" name="state" type="text" class=""
                                    value="{{ isset($address) ? $address->state : '' }}">
                                @error('state')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-4 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-cyan-400 dark:text-white text-xs font-bold mb-2"
                                    for="country">País</label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 dark:bg-gray-800 text-cyan-400 dark:text-white border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:focus:bg-gray-900"
                                    id="country" name="country" type="text" class=""
                                    value="{{ isset($address) ? $address->country : '' }}">
                                @error('country')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/2 px-4 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-cyan-400 dark:text-white text-xs font-bold mb-2"
                                    for="complement">Complemento</label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 dark:bg-gray-800 text-cyan-400 dark:text-white border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:focus:bg-gray-900"
                                    id="complement" name="complement" type="text" class=""
                                    value="{{ isset($address) ? $address->complement : '' }}">
                                @error('complement')
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
