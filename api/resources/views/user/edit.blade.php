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

                        <form class="w-full" method="POST" action="{{ route('user.update', $user->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-1/3 md:w-1/2 px-4 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="name">Nome</label>
                                    <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                        id="name" name="name" type="text" class=""
                                        value="{{isset($user)? $user->name : ""}}">
                                        @error('name')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-4 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="email">E-mail</label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                        id="email" name="email" type="text" class=""
                                        value="{{isset($user)? $user->email : ""}}">

                                        @error('email')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-1/3 px-4 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="phone_number">Telefone</label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                        id="phone_number" name="phone_number" type="text" class=""
                                        value="{{isset($user)? $user->phone_number : ""}}">
                                        @error('number')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="w-full md:w-1/3 px-4 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="cpf">CPF</label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                        id="cpf" name="cpf" type="text" class=""
                                        value="{{isset($user)? $user->cpf : ""}}">
                                        @error('cpf')
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
