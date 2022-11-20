<x-app-layout>
    <x-slot name="header">
        <div class="font-semibold text-xl text-gray-800 leading-tight flex justify-center align-center justify-evenly">
            @isset($address)
                <a href="{{ route('address.index') }}" class="flex flex-row justify-center align-center items-center ">
                    <span>{{ $address->street . ', ' . $address->number }}</span>
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="12px"
                        height="12px" viewBox="0 0 199.404 199.404" style="enable-background:new 0 0 199.404 199.404;"
                        xml:space="preserve"
                        class="m-1"
                        >
                        
                        <g>
                            <polygon
                                points="199.404,63.993 171.12,35.709 99.702,107.127 28.284,35.709 0,63.993 99.702,163.695 	" />
                        </g>
                    </svg>
                </a>
            @else
                <a class="shadow bg-cyan-400 hover:bg-cyan-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                    href="route('address.index')">
                    Criar um novo endereço
                </a>
            @endisset

        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:text-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="dark:text-white border-b border-gray-200">
                    <div class="flex flex-wrap justify-between">
                        @foreach ($employees as $employee)
                            <div class="w-96 bg-white dark:bg-gray-800  m-2 rounded  overflow-hidden">
                                <a class="text-gray-500 dark:text-gray-400 overflow-hidden flex items-center"
                                    href="{{ route('employee.show', ['employee' => $employee->id]) }}">
                                    <?php
                                    $user = $employee->getUser();
                                    ?>
                                    <img src="{{ $employee->profile_image }}" alt="">
                                    <div class="flex flex-col">
                                        <span class=" px-6 font-black">{{ $user->name }}</span>
                                        <span class=" px-6 text-sm">{{ json_decode($employee->categories)[0] }}</span>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
