<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:text-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" dark:text-white p-6  border-b border-gray-200">
                    <div class="flex flex-wrap justify-between">
                        @foreach ($employees as $employee)
                            <div class="w-72 bg-white dark:bg-gray-800 p-6 m-3 rounded  overflow-hidden">
                                <a class="text-gray-500 dark:text-gray-400 overflow-hidden"
                                    href="{{ route('employee.show', ['employee' => $employee->id]) }}">
                                    <?php
                                        $user = $employee->getUser();
                                    ?>
                                    <span class="py-4 px-6">{{ $user->name }}</span>
                                    <span class="py-4 px-6">{{ $user->email }}</span>
                                    <span class="py-4 px-6">{{ $employee->price }}</span>
                                    <span class="py-4 px-6">{{ $employee->time }}</span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
