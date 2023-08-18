<div class="layout-px-spacing">

    <div class="row  w-100 layout-top-spacing" wire:poll.visible='count'>
        <div class="switch_holder">
            <div class="switch">
                <h1>Motors </h1>
                <div class="button_holder">
                    <div class="button_label">
                        <p>O.H.T Motor: </p>
                    </div>
                    <div class="button" wire:click='ohtswitch'>
                        @if ($motor_switch)
                        <img src="{{asset('web/assets/img/on.png')}}" alt="">
                        @else
                        <img src="{{asset('web/assets/img/off.png')}}" alt="">
                        @endif
                    </div>
                </div>

                <div class="button_holder">
                    <div class="button_label">
                        <p>U.G.T Motor: </p>
                    </div>
                    <div class="button" wire:click='ugtswitch'>

                        @if ($ug_motor_switch)
                        <img src="{{asset('web/assets/img/on.png')}}" alt="">
                        @else
                        <img src="{{asset('web/assets/img/off.png')}}" alt="">
                        @endif

                    </div>
                </div>

                <div class="button_holder">
                    <div class="button_label">
                        <p>Fire Motor: </p>
                    </div>
                    <div class="button" wire:click='fireswitch'>


                        @if ($fire_motor_switch)
                        <img src="{{asset('web/assets/img/on.png')}}" alt="">
                        @else
                        <img src="{{asset('web/assets/img/off.png')}}" alt="">
                        @endif


                    </div>
                </div>

                <div class="button_holder">
                    <div class="button_label">
                        <p>Auto Switch: </p>
                    </div>
                    <div class="button" wire:click='switchauto'>

                        @if ($auto)
                        <img src="{{asset('web/assets/img/on.png')}}" alt="">
                        @else
                        <img src="{{asset('web/assets/img/off.png')}}" alt="">
                        @endif


                    </div>
                </div>
                <div class="button_holder">
                    <div class="button_label">
                        <p>Fire Drain: </p>
                    </div>
                    <div class="button" wire:click='firedrainswitch'>

                        @if ($fire_drain)
                        <img src="{{asset('web/assets/img/on.png')}}" alt="">
                        @else
                        <img src="{{asset('web/assets/img/off.png')}}" alt="">
                        @endif


                    </div>
                </div>





            </div>
            <a href="{{route('bms.index')}}" wire:navigate class="btn btn-primary " style="height:40px">Back</a>

        </div>

        <div class="row w-100">
            <div class="col-12 text-center">
               <span class="text-danger">{{$general_warning}}</span>
            </div>
        </div>

        <div class="water_tanks">

            <div class="tank_container">
                @livewire('ugTank',[ 'warning'=>$warning, 'water_level'=> $water_level, 'title'=>'O.H.T'])
                @livewire('motor',[ 'motor_switch'=> $motor_switch, 'motor_status'=>$motor_status])
                @livewire('ugTank',[ 'warning'=>$ug_warning, 'water_level'=> $ug_level, 'title'=>'U.G.T'])
                @livewire('motor',[ 'motor_switch'=> $ug_motor_switch, 'motor_status'=>$ug_motor_status])
                @livewire('ugTank',[ 'warning'=>$fire_warning, 'water_level'=> $fire_level, 'title'=>'Fire'])
                @livewire('motor',[ 'motor_switch'=> $fire_motor_switch, 'motor_status'=>$fire_motor_status])

            </div>

        </div>

    </div>
</div>
