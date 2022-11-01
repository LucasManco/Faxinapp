<x-app-layout>
    
    <x-slot name="headerCss">
        bg-cyan-400 rounded-b-full
    </x-slot>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> --}}
        <div class="dark:text-white overflow-hidden sm:rounded-lg">
            <div class=" dark:text-white">
                <div class="flex flex-wrap justify-between">
                    <div class="w-full bg-cyan-400 dark:bg-gray-800 rounded  overflow-hidden">
                            <?php
                                    $user = $employee->getUser();
                                    ?>
                            <span class="py-4 px-6">{{ $user->name }}</span>
                            <span class="py-4 px-6">{{ $user->email }}</span>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <?php 
                $job_types = $employee->getUser()->jobType()->get();
                
            ?>
            @foreach($job_types as $job_type)
                <div class="w-full bg-white dark:bg-gray-800 p-6 m-3 rounded  overflow-hidden">
                    <a class=" flex flex-row text-gray-500 dark:text-gray-400 overflow-hidden" 
                        href="{{ route('job_type.show', ['job_type' => $job_type->id]) }}">
                        <div class="w-4/5 m-4 flex flex-col" >
                            <span class="text-cyan-400 font-black">{{ $job_type->name }}</span>
                            <span class="text-cyan-400 whitespace-nowrap overflow-hidden">{{ $job_type->description }}</span>
                            <span class="text-cyan-400 ">R${{ number_format((float) $job_type->price, 2, ',', ''); }}</span>
                        </div>
                        <div class="w-1/5 m-4 bg-cyan-400 rounded py-4 px-6">
                            <span class="text-white">Agendar</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
