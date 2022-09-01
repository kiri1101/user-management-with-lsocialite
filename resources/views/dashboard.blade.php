@section('css')
    @vite(['resources/js/splide.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @vite(['resources/js/chart.js'])
@endsection

<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="px-3 hidden md:block py-4 h-[360px] w-full md:w-[436px] rounded-xl bg-white dark:bg-gray-800">
        <div class="overflow-hidden">
            <h1 class="mb-1 font-mono text-sm font-semibold text-gray-600 md:text-md dark:text-gray-400">Company Facts</h1>
            <h3 class="mb-5 font-mono text-xs font-semibold text-gray-400 md:text-sm dark:text-gray-200">Employees</h3>
            <div class="chart-container" style="position: relative; height:40vh; width:30vw">
                <canvas id="mylineChart" aria-label="Employees Charts" role="chart"></canvas>
            </div>                    
        </div>
    </div>
    <div class="px-3 hidden md:block py-4 h-[360px] w-full md:w-[436px] rounded-xl bg-white dark:bg-gray-800">
        <div class="overflow-hidden">
            <h1 class="mb-1 font-mono text-sm font-semibold text-gray-600 md:text-md dark:text-gray-400">Statistics</h1>
            <div class="chart-container" style="position: relative; height:46vh; width:30vw">
                <canvas id="myradarChart" aria-label="First Statistics Charts" role="chart"></canvas>
            </div>
        </div>        
    </div>
    <div class="px-3 hidden md:block py-4 h-[360px] w-full md:w-[436px] rounded-xl bg-white dark:bg-gray-800">
        <h1 class="mb-1 font-mono text-sm font-semibold text-gray-600 md:text-md dark:text-gray-400">Notifications</h1>
        <div class="flex flex-col items-center justify-center w-full h-64 m-auto overflow-hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 fill-lime-400 stroke-green-300" data-name="Layer 1" viewBox="0 0 128 128">
                <path d="M52.77,74.89a2,2,0,0,0,2.83,0l8.4-8.4,8.4,8.4a2,2,0,0,0,2.83-2.83l-8.4-8.4,8.4-8.4a2,2,0,0,0-2.83-2.83L64,60.83l-8.4-8.4a2,2,0,0,0-2.83,2.83l8.4,8.4-8.4,8.4A2,2,0,0,0,52.77,74.89Z"/>
                <path d="M127.11,36.34l-24-16A2,2,0,0,0,102,20H2a2,2,0,0,0-1.49.68A2,2,0,0,0,0,22S0,90,0,90a2,2,0,0,0,.89,1.66l24,16A2.29,2.29,0,0,0,26,108H126a2,2,0,0,0,2-2s0-68,0-68A2,2,0,0,0,127.11,36.34ZM104,25.74,119.39,36H104ZM24,102.26,8.61,92H24ZM24,88H4V25.74L24,39.07ZM8.61,24H100V36H26.61ZM100,40V88H28V40ZM28,104V92h73.39l18,12Zm96-1.74L104,88.93V40h20Z"/>
            </svg>
            <h3 class="mt-1 font-mono text-sm font-semibold text-gray-600 md:text-md dark:text-gray-400">No notifications available</h3>
        </div>
    </div>
    <div class="px-3 mb-4 hidden overflow-auto md:block py-4 h-[360px] w-full md:w-[436px] rounded-xl bg-white dark:bg-gray-800">
        <h1 class="mb-1 font-mono text-sm font-semibold text-gray-600 md:text-md dark:text-gray-400">Users List</h1>
        
        {{-- ****************If empty user's table***************** --}}

        {{-- <div class="flex flex-col items-center justify-center w-full h-64 m-auto overflow-hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 fill-lime-400 stroke-green-300" data-name="Layer 1" viewBox="0 0 128 128">
                <path d="M52.77,74.89a2,2,0,0,0,2.83,0l8.4-8.4,8.4,8.4a2,2,0,0,0,2.83-2.83l-8.4-8.4,8.4-8.4a2,2,0,0,0-2.83-2.83L64,60.83l-8.4-8.4a2,2,0,0,0-2.83,2.83l8.4,8.4-8.4,8.4A2,2,0,0,0,52.77,74.89Z"/>
                <path d="M127.11,36.34l-24-16A2,2,0,0,0,102,20H2a2,2,0,0,0-1.49.68A2,2,0,0,0,0,22S0,90,0,90a2,2,0,0,0,.89,1.66l24,16A2.29,2.29,0,0,0,26,108H126a2,2,0,0,0,2-2s0-68,0-68A2,2,0,0,0,127.11,36.34ZM104,25.74,119.39,36H104ZM24,102.26,8.61,92H24ZM24,88H4V25.74L24,39.07ZM8.61,24H100V36H26.61ZM100,40V88H28V40ZM28,104V92h73.39l18,12Zm96-1.74L104,88.93V40h20Z"/>
            </svg>
            <h3 class="mt-1 font-mono text-sm font-semibold text-gray-600 md:text-md dark:text-gray-400">No users available</h3>
        </div> --}}

        {{-- **************End************* --}}

        <table class="w-full mt-4 font-mono text-sm text-left text-gray-500 rounded-lg dark:text-gray-400" aria-describedby="User's Table">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-10 h-10 rounded-full" src="https://api.lorem.space/image/face?w=150&h=150" alt="Jese image">
                        <div class="pl-3">
                            <div class="text-base font-semibold">Neil Sims</div>
                            <div class="font-normal text-gray-500">neil.sims@flowbite.com</div>
                        </div>  
                    </th>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> Online
                        </div>
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-10 h-10 rounded-full" src="https://api.lorem.space/image/face?w=150&h=150" alt="Jese image">
                        <div class="pl-3">
                            <div class="text-base font-semibold">Bonnie Green</div>
                            <div class="font-normal text-gray-500">bonnie@flowbite.com</div>
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> Online
                        </div>
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-10 h-10 rounded-full" src="https://api.lorem.space/image/face?w=150&h=150" alt="Jese image">
                        <div class="pl-3">
                            <div class="text-base font-semibold">Jese Leos</div>
                            <div class="font-normal text-gray-500">jese@flowbite.com</div>
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> Online
                        </div>
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-10 h-10 rounded-full" src="https://api.lorem.space/image/face?w=150&h=150" alt="Jese image">
                        <div class="pl-3">
                            <div class="text-base font-semibold">Thomas Lean</div>
                            <div class="font-normal text-gray-500">thomes@flowbite.com</div>
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> Online
                        </div>
                    </td>
                </tr>
                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-10 h-10 rounded-full" src="https://api.lorem.space/image/face?w=150&h=150" alt="Jese image">
                        <div class="pl-3">
                            <div class="text-base font-semibold">Leslie Livingston</div>
                            <div class="font-normal text-gray-500">leslie@flowbite.com</div>
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div> Offline
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    {{-- Mobile Version --}}
    <div class="block w-full md:hidden">
        <div id="splide1" class="splide" role="group" aria-label="Splide Main Basic HTML Example">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="mx-2 splide__slide">
                        <div class="px-3 py-4 h-[360px] w-full rounded-xl bg-white dark:bg-gray-800">
                            <div class="overflow-hidden">
                                <h1 class="mb-1 font-mono text-sm font-semibold text-gray-600 md:text-md dark:text-gray-400">Company Facts</h1>
                                <h3 class="mb-5 font-mono text-xs font-semibold text-gray-400 md:text-sm dark:text-gray-200">Employees</h3>
                                <div class="chart-container" style="position: relative; height:40vh; width:70vw">
                                    <canvas id="mymobilelineChart" aria-label="Mobile Employees Charts" role="mobile-chart"></canvas>
                                </div>                    
                            </div>
                        </div>
                    </li>
                    <li class="mx-2 splide__slide">
                        <div class="px-3 py-4 h-[360px] w-full rounded-xl bg-white dark:bg-gray-800">
                            <div class="overflow-hidden">
                                <h1 class="mb-1 font-mono text-sm font-semibold text-gray-600 md:text-md dark:text-gray-400">Statistics</h1>
                                <div class="chart-container" style="position: relative; height:45vh; width:70vw">
                                    <canvas id="mymobileradarChart" aria-label="Mobile Statistics Charts" role="mobile-radar-chart"></canvas>
                                </div>
                            </div>  
                        </div>
                    </li>
                    <li class="mx-2 splide__slide">
                        <div class="px-3 py-4 h-[360px] w-full rounded-xl bg-white dark:bg-gray-800">
                            <h1 class="mb-1 font-mono text-sm font-semibold text-gray-600 md:text-md dark:text-gray-400">Notifications</h1>
                            <div class="flex flex-col items-center justify-center w-full h-64 m-auto overflow-hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 fill-lime-400 stroke-green-300" data-name="Layer 1" viewBox="0 0 128 128">
                                    <path d="M52.77,74.89a2,2,0,0,0,2.83,0l8.4-8.4,8.4,8.4a2,2,0,0,0,2.83-2.83l-8.4-8.4,8.4-8.4a2,2,0,0,0-2.83-2.83L64,60.83l-8.4-8.4a2,2,0,0,0-2.83,2.83l8.4,8.4-8.4,8.4A2,2,0,0,0,52.77,74.89Z"/>
                                    <path d="M127.11,36.34l-24-16A2,2,0,0,0,102,20H2a2,2,0,0,0-1.49.68A2,2,0,0,0,0,22S0,90,0,90a2,2,0,0,0,.89,1.66l24,16A2.29,2.29,0,0,0,26,108H126a2,2,0,0,0,2-2s0-68,0-68A2,2,0,0,0,127.11,36.34ZM104,25.74,119.39,36H104ZM24,102.26,8.61,92H24ZM24,88H4V25.74L24,39.07ZM8.61,24H100V36H26.61ZM100,40V88H28V40ZM28,104V92h73.39l18,12Zm96-1.74L104,88.93V40h20Z"/>
                                </svg>
                                <h3 class="mt-1 font-mono text-sm font-semibold text-gray-600 md:text-md dark:text-gray-400">No notifications available</h3>
                            </div>
                        </div>
                    </li>
                    <li class="mx-2 splide__slide">
                        <div class="px-3 py-4 h-[360px] w-full rounded-xl bg-white dark:bg-gray-800">
                            <h1 class="mb-1 font-mono text-sm font-semibold text-gray-600 md:text-md dark:text-gray-400">Users List</h1>
                            <div class="flex flex-col items-center justify-center w-full h-64 m-auto overflow-hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 fill-lime-400 stroke-green-300" data-name="Layer 1" viewBox="0 0 128 128">
                                    <path d="M52.77,74.89a2,2,0,0,0,2.83,0l8.4-8.4,8.4,8.4a2,2,0,0,0,2.83-2.83l-8.4-8.4,8.4-8.4a2,2,0,0,0-2.83-2.83L64,60.83l-8.4-8.4a2,2,0,0,0-2.83,2.83l8.4,8.4-8.4,8.4A2,2,0,0,0,52.77,74.89Z"/>
                                    <path d="M127.11,36.34l-24-16A2,2,0,0,0,102,20H2a2,2,0,0,0-1.49.68A2,2,0,0,0,0,22S0,90,0,90a2,2,0,0,0,.89,1.66l24,16A2.29,2.29,0,0,0,26,108H126a2,2,0,0,0,2-2s0-68,0-68A2,2,0,0,0,127.11,36.34ZM104,25.74,119.39,36H104ZM24,102.26,8.61,92H24ZM24,88H4V25.74L24,39.07ZM8.61,24H100V36H26.61ZM100,40V88H28V40ZM28,104V92h73.39l18,12Zm96-1.74L104,88.93V40h20Z"/>
                                </svg>
                                <h3 class="mt-1 font-mono text-sm font-semibold text-gray-600 md:text-md dark:text-gray-400">No users available</h3>
                            </div>                            
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        {{-- Income records horizontal slider --}}
        <div id="splide2" class="splide" role="group" style="margin-top: 10px; margin-bottom: 10px" aria-label="Splide Side Basic HTML Example">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="mx-2 splide__slide">
                        {{-- Base Currency --}}
                        <div class="income-menu">
                            <h1 class="text-xs text-left text-gray-700 dark:text-gray-400">Total Income</h1>
                            <div class="flex justify-center gap-3">
                                <span class="text-gray-700 md:text-gray-400">10,000</span>
                                <h2 class="text-gray-700 md:text-gray-400">USD</h2>
                            </div>
                            <h1 class="text-xs text-left text-gray-700 dark:text-gray-400">EX Rate:</h1>    
                        </div>
                    </li>
                    <li class="mx-2 splide__slide">
                        {{-- Extra1 Currency --}}
                        <div class="income-menu">
                            <h1 class="text-xs text-left text-gray-700 dark:text-gray-400">Total Income</h1>
                            <div class="flex justify-center gap-3">
                                <span class="text-gray-700 md:text-gray-400">10,000</span>
                                <h2 class="text-gray-700 md:text-gray-400">EUR</h2>
                            </div>
                            <h1 class="text-xs text-left text-gray-700 dark:text-gray-400">EX Rate:</h1>    
                        </div>
                    </li>
                    <li class="mx-2 splide__slide">
                        {{-- Extra2 Currency --}}
                        <div class="income-menu">
                            <h1 class="text-xs text-left text-gray-700 dark:text-gray-400">Total Income</h1>
                            <div class="flex justify-center gap-3">
                                <span class="text-gray-700 md:text-gray-400">10,000</span>
                                <h2 class="text-gray-700 md:text-gray-400">YEN</h2>
                            </div>
                            <h1 class="text-xs text-left text-gray-700 dark:text-gray-400">EX Rate:</h1>
                        </div>
                    </li>
                    <li class="mx-2 splide__slide">
                        {{-- Extra3 Currency --}}
                        <div class="income-menu">
                            <h1 class="text-xs text-left text-gray-700 dark:text-gray-400">Total Income</h1>
                            <div class="flex justify-center gap-3">
                                <span class="text-gray-700 md:text-gray-400">10,000</span>
                                <h2 class="text-gray-700 md:text-gray-400">GBP</h2>
                            </div>
                            <h1 class="text-xs text-left text-gray-700 dark:text-gray-400">EX Rate:</h1>
                        </div>
                    </li>
                    <li class="mx-2 splide__slide">
                        {{-- Extra4 Currency --}}
                        <div class="income-menu">
                            <h1 class="text-xs text-left text-gray-700 dark:text-gray-400">Total Income</h1>
                            <div class="flex justify-center gap-3">
                                <span class="text-gray-700 md:text-gray-400">10,000</span>
                                <h2 class="text-gray-700 md:text-gray-400">JPY</h2>
                            </div>
                            <h1 class="text-xs text-left text-gray-700 dark:text-gray-400">EX Rate:</h1>    
                        </div>
                    </li>
                    <li class="mx-2 splide__slide">
                        {{-- Extra5 Cuttency --}}
                        <div class="income-menu">
                            <h1 class="text-xs text-left text-gray-700 dark:text-gray-400">Total Income</h1>
                            <div class="flex justify-center gap-3">
                                <span class="text-gray-700 md:text-gray-400">10,000</span>
                                <h2 class="text-gray-700 md:text-gray-400">RUB</h2>
                            </div>
                            <h1 class="text-xs text-left text-gray-700 dark:text-gray-400">EX Rate:</h1>    
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>  
</x-app-layout>

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.4.2/dist/js/splide-extension-auto-scroll.min.js"></script>
@endsection
