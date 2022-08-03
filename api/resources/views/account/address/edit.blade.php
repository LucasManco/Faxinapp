<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form class="w-full" method="POST" action="{{ route('address.store') }}">
                        @csrf
                        @method('POST')

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-1/3 md:w-1/2 px-4 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="postal_code">CEP</label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="postal_code" name="postal_code" type="text" class=""
                                    value="{{old('postal_code')}}">
                                    @error('postal_code')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-4 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="street">Rua</label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="street" name="street" type="text" class="">
                                    @error('street')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/3 px-4 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="number">Numero</label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="number" name="number" type="number" class="">
                                    @error('number')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="w-full md:w-1/3 px-4 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="city">Cidade</label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="city" name="city" type="text" class="">
                                    @error('city')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="w-full md:w-1/3 px-4 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="state">Estado</label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="state" name="state" type="text" class="">
                                    @error('state')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-4 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="country">País</label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="country" name="country" type="text" class="">
                                    @error('country')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="w-full md:w-1/2 px-4 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="complement">Complemento</label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="complement" name="complement" type="text" class="">
                                    @error('complement')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                        <div class="flex items-center px-4 py-4 justify-between">
                            <button
                                class="shadow bg-cyan-700 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                type="submit">
                                Salvar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
