<div wire:poll.visible='count'>

    {{-- <div class="containter">
        <div class="readings">

            <ul class="charts-lists">
                <li class="chart-item">
                    <label for="">
                        Compressor Load: {{ $c_load }} %
                    </label>

                    <label class="relative inline-flex items-center cursor-pointer">

                        <input type="checkbox" value="" class="sr-only peer" wire:model='status'>

                        <div
                            class="w-11 h-6 bg-red-600 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-red-600 peer-checked:bg-green-600">
                        </div>
                        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">ON</span>
                    </label>





                </li>
            </ul>

        </div>

    </div>
    <hr>
    <div class="container">
        <div class="guage-container">

            <div class="guage_holder">
                <h2> Dischare Pressur</h2>
                <div class="guage">
                    <div class="base" style="transform: rotate({{ $dp . 'deg' }});"></div>
                    <img src="{{ asset('web/assets/img/gauge-hi.png') }}" alt="" srcset="">

                </div>
            </div>
            <div class="guage_holder">
                <h2> Discharge Temprature</h2>
                <div class="guage">
                    <div class="base" style="transform: rotate({{ $dt . 'deg' }});"></div>
                    <img src="{{ asset('web/assets/img/gauge-hi.png') }}" alt="" srcset="">

                </div>
            </div>
            <div class="guage_holder">
                <h2> Suction Pressure</h2>
                <div class="guage">
                    <div class="base" style="transform: rotate({{ $sp . 'deg' }});"></div>
                    <img src="{{ asset('web/assets/img/gauge-hi.png') }}" alt="" srcset="">

                </div>
            </div>
            <div class="guage_holder">
                <h2> Suction Temperature</h2>
                <div class="guage">
                    <div class="base" style="transform: rotate({{ $st . 'deg' }});"></div>
                    <img src="{{ asset('web/assets/img/gauge-hi.png') }}" alt="" srcset="">

                </div>
            </div>

        </div>


    </div> --}}
    <div class="container">
        <div class="switch">
            <h1>Motors </h1>
            <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" value="{{$motor_switch}}" class="sr-only peer" wire:model='motor_switch'>
                <div
                    class="w-11 h-6 bg-red-600 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-red-600 peer-checked:bg-green-600">
                </div>
                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{$motor_switch == 1?'ON': 'OFF'}}</span>
            </label>

            <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" value="{{$ug_motor_switch}}" class="sr-only peer" wire:model='ug_motor_switch'>
                <div
                    class="w-11 h-6 bg-red-600 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-red-600 peer-checked:bg-green-600">
                </div>
                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{$ug_motor_switch == 1?'ON': 'OFF'}}</span>
            </label>

            <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" value="" class="sr-only peer" wire:model='auto'>
                <div
                    class="w-11 h-6 bg-red-600 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-red-600 peer-checked:bg-green-600">
                </div>
                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Auto</span>
            </label>



        </div>

        <div class="water_tanks">

            <div class="tank_container">
                @livewire('ugTank',[ 'warning'=>$warning, 'water_level'=> $water_level, 'title'=>'O.H.T'])
                @livewire('motor',[ 'motor_switch'=> $motor_switch, 'motor_status'=>$motor_status])
                @livewire('ugTank',[ 'warning'=>$ug_warning, 'water_level'=> $ug_level, 'title'=>'U.G.T'])
                @livewire('motor',[ 'motor_switch'=> $ug_motor_switch, 'motor_status'=>$ug_motor_status])


            </div>

        </div>


    </div>


</div>
