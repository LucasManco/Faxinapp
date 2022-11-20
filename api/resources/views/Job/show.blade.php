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
                        $employee = $job->employee()->first();
                        $user = $employee->getUser();
                        $job_type = $job->jobType()->first();
                        $job_additionals = $job->jobTypeAdditional();
                        ?>
                        <div class="flex flex-col">
                            <span class="px-6 font-bold text-lg">{{ $user->name }}</span>
                            <span class="px-6 text-base">Pedido nº {{ $job->id }} - {{date('d/m/Y H:i:s', strtotime($job->created_at))}}</span>
                            <span class="px-6 text-xs">{{ __($job->status) }}</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="w-full flex">
				<span class="w-1/5 py-2 px-6 font-bold">Horario Marcado:</span>
				<span class="py-2 px-6">{{ date('d/m/Y H:i:s', strtotime($job->start_time)) }}</span>
			</div>
			<div class="w-full flex">
				<span class="w-1/5 py-2 px-6 font-bold">Estimativa de termino:</span>
				<span class="py-2 px-6">{{ date('d/m/Y H:i:s', strtotime($job->end_time)) }}</span>
			</div>
			<div class="w-full flex">
				<span class="w-1/5 py-2 px-6 font-bold">Observações:</span>
				<span class="py-2 px-6">{{ $job->observation }}</span>
			</div>
			<div class="w-full flex">
				<span class="w-1/5 py-2 px-6 font-bold">Endereço:</span>
				<span class="py-2 px-6">{{ $job->address() }}</span>
			</div>
            <div class="w-full bg-white dark:bg-gray-800 p-6 m-3 rounded  overflow-hidden">
                <div class="w-full border-b-2">
                    <div class="w-full flex">
                        <span class="py-2 px-6 font-bold text-lg">{{ $job_type->name }}</span>
                    </div>
                    <div class="w-full flex">
                        <span class="py-2 px-6 text-sm">{{ $job_type->description }}</span>
                    </div>
                    <div class="w-1/5 flex">
                        <span class="w-1/2 py-2 px-6 font-bold">Preço</span>
                        <span class="py-2 px-6">R${{ number_format((float) $job_type->price, 2, '.', '') }}</span>
                    </div>
                    @if(!$job_additionals == [])
                    
                        <span class="py-2 px-12 text-base font-bold">Adicionais</span>
                        @foreach ($job_additionals as $job_additional)
                            <div class="py-2">
                                <div class="w-full px-12 flex">
                                    <span class="font-bold text-sm ">{{ $job_additional->name }}</span>
                                </div>
                                @if ($job_additional->description != '')
                                    <div class="w-full px-12 flex">
                                        <span class="text-xs">{{ $job_additional->description }}</span>
                                    </div>
                                @endisset
                                <div class="w-1/5 px-12 flex">
                                    <span class="w-1/2 font-bold text-xs">Preço</span>
                                    <span
                                        class="font-bold text-xs">R${{ number_format((float) $job_additional->price, 2, '.', '') }}</span>
                                </div>
                        </div>
                    @endforeach
                @endisset
            </div>


            <div class="w-1/3">
                <div class="w-full flex">
                    <span class="w-1/2 py-2 px-6 font-bold">Preço</span>
                    <span class="py-2 px-6">R${{ number_format((float) $job->price, 2, '.', '') }}</span>
                </div>
                <div class="w-full flex">
                    <span class="w-1/2 py-2 px-6 font-bold">Transporte</span>
                    <span class="py-2 px-6">R${{ number_format((float) $job->transport, 2, '.', '') }}</span>
                </div>
                <div class="w-full flex">
                    <span class="w-1/2 py-2 px-6 font-bold">Impostos</span>
                    <span class="py-2 px-6">R${{ number_format((float) $job->tax, 2, '.', '') }}</span>
                </div>
                <div class="w-full flex">
                    <span class="w-1/2 py-2 px-6 font-bold">Total</span>
                    <span class="py-2 px-6">R${{ number_format((float) $job->final_price, 2, '.', '') }}</span>
                </div>
            </div>

        </div>
    </div>
</div>
</x-app-layout>
