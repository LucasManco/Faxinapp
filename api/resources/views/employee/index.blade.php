<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-center align-center">
        <span class="font-semibold text-xl m-auto" >Selecione o endereço para o qual deseja solicitar o serviço.</span>
        </div>
        <div class="font-semibold text-xl text-gray-800 leading-tight flex justify-center align-center justify-evenly" >            
            <select class="rounded" onchange="att_employees_list">
                <option value="" selected disabled></option>
                @foreach ($addresses as $address)
                    <option value="{{$address->id}}">{{$address->street . ", " . $address->number}}</option>
                @endforeach
            </select>
            <a 
            class="shadow bg-cyan-400 hover:bg-cyan-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
            href="route('address.index')">
                Criar um novo endereço
            </a>

        </div>
        <script>
            function att_employees_list(){
                console.log("TESTE");
            }
        </script>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:text-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="dark:text-white border-b border-gray-200">
                    <div class="flex flex-wrap justify-between">
                        @foreach ($employees as $employee)
                            <div class="w-96 bg-white dark:bg-gray-800  m-2 rounded  overflow-hidden">
                                <a class="text-gray-500 dark:text-gray-400 overflow-hidden flex "
                                    href="{{ route('employee.show', ['employee' => $employee->id]) }}">
                                    <?php
                                        $user = $employee->getUser();
                                    ?>
                                    <img src="{{$employee->profile_image}}" alt="">
                                    <div class="flex flex-col">
                                        <span class="py-2 px-6">{{ $user->name }}</span>
                                        <span class="py-2 px-6">{{ $user->email }}</span>
                                        <span class="py-2 px-6">{{ json_decode($employee->categories)[0] }}</span>
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
