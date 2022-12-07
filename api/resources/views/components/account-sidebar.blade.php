<aside class="w-64" aria-label="Sidebar">
    <div class="overflow-y-auto py-4 px-3 rounded bg-gray-50 dark:bg-gray-800">
        <ul class="space-y-2">
            <x-account-sidebar-item>
                <x-slot name="url">{{ route('user.index'); }}</x-slot>
                <x-slot name="title">Perfil</x-slot>
                <x-slot name="icon">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 459 459" style="enable-background:new 0 0 459 459;" xml:space="preserve"
                         class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                         fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                         >
                                <path d="M229.5,0C102.53,0,0,102.845,0,229.5C0,356.301,102.719,459,229.5,459C356.851,459,459,355.815,459,229.5
                                    C459,102.547,356.079,0,229.5,0z M347.601,364.67C314.887,393.338,273.4,409,229.5,409c-43.892,0-85.372-15.657-118.083-44.314
                                    c-4.425-3.876-6.425-9.834-5.245-15.597c11.3-55.195,46.457-98.725,91.209-113.047C174.028,222.218,158,193.817,158,161
                                    c0-46.392,32.012-84,71.5-84c39.488,0,71.5,37.608,71.5,84c0,32.812-16.023,61.209-39.369,75.035
                                    c44.751,14.319,79.909,57.848,91.213,113.038C354.023,354.828,352.019,360.798,347.601,364.67z"/>
                    </svg>
                </x-slot>
            </x-account-sidebar-item>

            <x-account-sidebar-item>
                <x-slot name="url">{{ route('address.index'); }}</x-slot>
                <x-slot name="title">Endereço</x-slot>
                <x-slot name="icon">
                    <svg aria-hidden="true"
                        class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </x-slot>
            </x-account-sidebar-item>
            @if(Auth::user()->isEmployee())
                <x-account-sidebar-item>
                    <x-slot name="url">{{ route('job_type.index'); }}</x-slot>
                    <x-slot name="title">Serviços Prestados</x-slot>
                    <x-slot name="icon">
                        <svg aria-hidden="true"
                            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                            </path>
                        </svg>
                    </x-slot>
                </x-account-sidebar-item>
                <x-account-sidebar-item>
                    <x-slot name="url">{{ route('work_place.index'); }}</x-slot>
                    <x-slot name="title">Locais de Atendimento</x-slot>
                    <x-slot name="icon">
                        <?xml version="1.0" encoding="iso-8859-1"?>
<!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 502 502" style="enable-background:new 0 0 502 502;" xml:space="preserve" fill="currentColor" 
     class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"

     >
<g>
	<g>
		<g>
			<path d="M493.741,60.666L333.074,32.251c-1.135-0.202-2.348-0.201-3.482,0L170.667,60.358L11.742,32.251
				c-2.912-0.515-5.902,0.285-8.167,2.185C1.31,36.336,0,39.141,0,42.098v389.389c0,4.851,3.481,9.002,8.258,9.847l160.667,28.415
				c1.141,0.204,2.341,0.204,3.483,0l158.925-28.107l158.926,28.107c0.579,0.103,1.162,0.153,1.741,0.153
				c2.331,0,4.611-0.816,6.426-2.338c2.266-1.9,3.574-4.705,3.574-7.662V70.513C502,65.662,498.519,61.511,493.741,60.666z
				 M160.667,447.979L20,423.1V54.022L160.667,78.9v31.662C148.344,102.022,133.406,97,117.311,97C75.233,97,41,131.233,41,173.311
				c0,38.889,61.374,120.148,68.372,129.286c1.892,2.471,4.827,3.92,7.939,3.92s6.047-1.449,7.939-3.92
				c3.399-4.438,19.625-25.89,35.417-51.237V447.979z M117.31,279.755C96.454,251,61,197.147,61,173.311
				C61,142.261,86.261,117,117.311,117c31.05,0,56.311,25.261,56.311,56.311C173.622,197.127,138.166,250.992,117.31,279.755z
				 M321.333,423.1l-140.667,24.878V219c0.001-0.906-0.131-1.78-0.357-2.615c7.85-16.102,13.313-31.474,13.313-43.074
				c0-15.716-4.779-30.336-12.956-42.489V78.9l140.667-24.878V423.1z M482,447.978L341.333,423.1V54.022L482,78.9V447.978z"/>
			<path d="M117.311,138.493c-19.199,0-34.818,15.619-34.818,34.818c0,19.199,15.619,34.818,34.818,34.818
				c19.199,0,34.818-15.62,34.818-34.818S136.51,138.493,117.311,138.493z M117.311,188.129c-8.17,0-14.818-6.647-14.818-14.818
				c0-8.17,6.647-14.818,14.818-14.818c8.171,0,14.818,6.647,14.818,14.818C132.129,181.482,125.482,188.129,117.311,188.129z"/>
			<path d="M458,298c5.522,0,10-4.477,10-10V102c0-5.523-4.478-10-10-10c-5.522,0-10,4.477-10,10v186
				C448,293.523,452.478,298,458,298z"/>
			<path d="M458,368c5.522,0,10-4.477,10-10v-28c0-5.523-4.478-10-10-10c-5.522,0-10,4.477-10,10v28
				C448,363.523,452.478,368,458,368z"/>
		</g>
	</g>
</g>

</svg>

                    </x-slot>
                </x-account-sidebar-item>
                <x-account-sidebar-item>
                    <x-slot name="url">{{ route('work_day.index'); }}</x-slot>
                    <x-slot name="title">Dias Trabalhados</x-slot>
                    <x-slot name="icon">
                        <svg aria-hidden="true"
                        viewBox="0 0 610.398 610.398"
                        class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <g>
                                    <path d="M159.567,0h-15.329c-1.956,0-3.811,0.411-5.608,0.995c-8.979,2.912-15.616,12.498-15.616,23.997v10.552v27.009v14.052
                                        c0,2.611,0.435,5.078,1.066,7.44c2.702,10.146,10.653,17.552,20.158,17.552h15.329c11.724,0,21.224-11.188,21.224-24.992V62.553
                                        V35.544V24.992C180.791,11.188,171.291,0,159.567,0z"/>
                                    <path d="M461.288,0h-15.329c-11.724,0-21.224,11.188-21.224,24.992v10.552v27.009v14.052c0,13.804,9.5,24.992,21.224,24.992
                                        h15.329c11.724,0,21.224-11.188,21.224-24.992V62.553V35.544V24.992C482.507,11.188,473.007,0,461.288,0z"/>
                                    <path d="M539.586,62.553h-37.954v14.052c0,24.327-18.102,44.117-40.349,44.117h-15.329c-22.247,0-40.349-19.79-40.349-44.117
                                        V62.553H199.916v14.052c0,24.327-18.102,44.117-40.349,44.117h-15.329c-22.248,0-40.349-19.79-40.349-44.117V62.553H70.818
                                        c-21.066,0-38.15,16.017-38.15,35.764v476.318c0,19.784,17.083,35.764,38.15,35.764h468.763c21.085,0,38.149-15.984,38.149-35.764
                                        V98.322C577.735,78.575,560.671,62.553,539.586,62.553z M527.757,557.9l-446.502-0.172V173.717h446.502V557.9z"/>
                                    <path d="M353.017,266.258h117.428c10.193,0,18.437-10.179,18.437-22.759s-8.248-22.759-18.437-22.759H353.017
                                        c-10.193,0-18.437,10.179-18.437,22.759C334.58,256.074,342.823,266.258,353.017,266.258z"/>
                                    <path d="M353.017,348.467h117.428c10.193,0,18.437-10.179,18.437-22.759c0-12.579-8.248-22.758-18.437-22.758H353.017
                                        c-10.193,0-18.437,10.179-18.437,22.758C334.58,338.288,342.823,348.467,353.017,348.467z"/>
                                    <path d="M353.017,430.676h117.428c10.193,0,18.437-10.18,18.437-22.759s-8.248-22.759-18.437-22.759H353.017
                                        c-10.193,0-18.437,10.18-18.437,22.759S342.823,430.676,353.017,430.676z"/>
                                    <path d="M353.017,512.89h117.428c10.193,0,18.437-10.18,18.437-22.759c0-12.58-8.248-22.759-18.437-22.759H353.017
                                        c-10.193,0-18.437,10.179-18.437,22.759C334.58,502.71,342.823,512.89,353.017,512.89z"/>
                                    <path d="M145.032,266.258H262.46c10.193,0,18.436-10.179,18.436-22.759s-8.248-22.759-18.436-22.759H145.032
                                        c-10.194,0-18.437,10.179-18.437,22.759C126.596,256.074,134.838,266.258,145.032,266.258z"/>
                                    <path d="M145.032,348.467H262.46c10.193,0,18.436-10.179,18.436-22.759c0-12.579-8.248-22.758-18.436-22.758H145.032
                                        c-10.194,0-18.437,10.179-18.437,22.758C126.596,338.288,134.838,348.467,145.032,348.467z"/>
                                    <path d="M145.032,430.676H262.46c10.193,0,18.436-10.18,18.436-22.759s-8.248-22.759-18.436-22.759H145.032
                                        c-10.194,0-18.437,10.18-18.437,22.759S134.838,430.676,145.032,430.676z"/>
                                    <path d="M145.032,512.89H262.46c10.193,0,18.436-10.18,18.436-22.759c0-12.58-8.248-22.759-18.436-22.759H145.032
                                        c-10.194,0-18.437,10.179-18.437,22.759C126.596,502.71,134.838,512.89,145.032,512.89z"/>
                                </g>
                            </g>
                    </svg>
                    </x-slot>
                </x-account-sidebar-item>
                <x-account-sidebar-item>
                    <x-slot name="url">{{ route('job.index'); }}</x-slot>
                    <x-slot name="title">Agendamentos</x-slot>
                    <x-slot name="icon">
                        <?xml version="1.0" encoding="iso-8859-1"?>
                        <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                        x="0px" y="0px"
                            viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;" xml:space="preserve"  fill="currentColor"
                            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            >
                        <g>
                            <path d="M30,0.061c-16.542,0-30,13.458-30,30s13.458,29.879,30,29.879s30-13.337,30-29.879S46.542,0.061,30,0.061z M32,30.939
	c0,1.104-0.896,2-2,2H14c-1.104,0-2-0.896-2-2s0.896-2,2-2h14v-22c0-1.104,0.896-2,2-2s2,0.896,2,2V30.939z"/>
                        </g>

                        </svg>

                    </x-slot>
                </x-account-sidebar-item>

                
            @endif
        </ul>
    </div>
</aside>
