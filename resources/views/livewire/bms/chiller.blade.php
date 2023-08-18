

<div class="layout-px-spacing">

    <div class="row layout-top-spacing" wire:poll.visible='count'>
        @if ($loading)

        <div class="loading">
            <img src="{{ asset('web/assets/img/loading.gif') }}" alt="" srcset="">
            <h3>Loding...</h3>
        </div>

        @endif
            <div class="row w-100">
                    <div class="col-12">
                        <div class="reading_holder">
                            <div class="readings">

                                <ul class="charts-lists">
                                    <li class="chart-item">
                                        <label for="">
                                            Compressor Load: {{ $c_load }} %
                                        </label>
                                        <label for="">
                                           Room Temp: {{ $rt }} &deg;C
                                        </label>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch1" {{$status ? 'checked': ''}}  wire:change='switch'>
                                            <label class="custom-control-label text-{{$status ? 'danger': 'success'}}" for="customSwitch1">{{$status ? 'On': 'Off'}}</label>
                                          </div>



                                    </li>
                                </ul>

                            </div>
                            <a href="{{route('bms.index')}}" wire:navigate class="btn btn-primary btn-sm " style="height: 32px">Back</a>
                        </div>

                    </div>
                </div>

                <div class="row  guage_row" >
                    <div class="col-4  col-md-2 mb-4" >
                        <div class="guage_holder">
                            <h5> D. P</h5>
                            <div class="guage">
                                <div class="base" style="transform: rotate({{ $dp . 'deg' }});"></div>
                                <img src="{{ asset('web/assets/img/gauge-hi.png') }}" alt="" srcset="">
                                <p class="guage_reading">{{$dp +135}} psi</p>
                            </div>

                        </div>

                    </div>
                    <div class="col-4 col-md-2 mb-4">
                        <div class="guage_holder">
                            <h5> D. T</h5>
                            <div class="guage">
                                <div class="base" style="transform: rotate({{ $dt . 'deg' }});"></div>
                                <img src="{{ asset('web/assets/img/gauge-hi.png') }}" alt="" srcset="">
                                <p class="guage_reading">{{$dt +135}} &deg;C</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 col-md-2 mb-4">
                        <div class="guage_holder">
                            <h5> S. P</h5>
                            <div class="guage">
                                <div class="base" style="transform: rotate({{ $sp . 'deg' }});"></div>
                                <img src="{{ asset('web/assets/img/gauge-hi.png') }}" alt="" srcset="">
                                <p class="guage_reading">{{$sp +135}} psi</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 col-md-2 mb-4">
                        <div class="guage_holder">
                            <h5> S.T</h5>
                            <div class="guage">
                                <div class="base" style="transform: rotate({{ $st . 'deg' }});"></div>
                                <img src="{{ asset('web/assets/img/gauge-hi.png') }}" alt="" srcset="">
                                <p class="guage_reading">{{$st +135}} &deg;C</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 col-md-2 mb-4">
                        <div class="guage_holder">
                            <h5> C.W.I</h5>
                            <div class="guage">
                                <div class="base" style="transform: rotate({{ $ci . 'deg' }});"></div>
                                <img src="{{ asset('web/assets/img/gauge-hi.png') }}" alt="" srcset="">
                                <p class="guage_reading">{{$ci +135}} &deg;C</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 col-md-2 mb-4">
                        <div class="guage_holder">
                            <h5> C.W.O</h5>
                            <div class="guage">
                                <div class="base" style="transform: rotate({{ $co . 'deg' }});"></div>
                                <img src="{{ asset('web/assets/img/gauge-hi.png') }}" alt="" srcset="">
                                <p class="guage_reading">{{$co +135}} &deg;C</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row guage_row">
                    <div class="col-6 col-md-2 mb-4" >
                        <div class="guage_holder">
                            <h5> Cond. 1</h5>
                            <div class="fan">
                                <img style="animation:{{array_key_exists(0, $condensor_switch) ? 'startfan '.  $condensor_speed[0].'s infinite linear' :''}};" class="fan_img" src="{{ asset('web/assets/img/condensor_fan.png') }}" alt="" srcset="">

                            </div>

                        </div>

                    </div>
                    <div class="col-6 col-md-2 mb-4" >
                        <div class="guage_holder">
                            <h5> Cond. 2</h5>
                            <div class="fan">
                                <img style="animation:{{array_key_exists(1, $condensor_switch) ? 'startfan '.  $condensor_speed[1].'s infinite linear' :''}} ;" class="fan_img" src="{{ asset('web/assets/img/condensor_fan.png') }}" alt="" srcset="">

                            </div>

                        </div>

                    </div>
                    <div class="col-6 col-md-2 mb-4" >
                        <div class="guage_holder">
                            <h5> Cond. 3</h5>
                            <div class="fan">
                                <img style="animation:{{array_key_exists(2, $condensor_switch) ? 'startfan '.  $condensor_speed[2].'s infinite linear' :''}};" class="fan_img" src="{{ asset('web/assets/img/condensor_fan.png') }}" alt="" srcset="">

                            </div>

                        </div>

                    </div>
                    <div class="col-6 col-md-2 mb-4" >
                        <div class="guage_holder">
                            <h5> Cond. 4</h5>
                            <div class="fan">
                                <img style="animation:{{array_key_exists(3, $condensor_switch) ? 'startfan '.  $condensor_speed[3].'s infinite linear' :''}};" class="fan_img" src="{{ asset('web/assets/img/condensor_fan.png') }}" alt="" srcset="">

                            </div>

                        </div>

                    </div>
                    <div class="col-12 col-md-4   mb-4" >
                        <div class="cm_readings">
                            <ul>


                                        <li>Condensor 1:- {{array_key_exists(0, $condensor_rpm) ? ($condensor_speed[0] == .1 ? '1500':($condensor_speed[0] == .2 ? '1200':($condensor_speed[0] == .4 ?'1000':($condensor_speed[0] == .6 ?'950':($condensor_speed[0] == .6 ?'800':($condensor_speed[0] == .8 ?'750':'')))))) :'0'}} rpm</li>
                                        <li>Condensor 2:- {{array_key_exists(1, $condensor_rpm) ? ($condensor_speed[1] == .1 ? '1500':($condensor_speed[1] == .2 ? '1200':($condensor_speed[1] == .4 ?'1000':($condensor_speed[1] == .6 ?'950':($condensor_speed[1] == .6 ?'800':($condensor_speed[1] == .8 ?'750':'')))))) :'0'}} rpm</li>
                                        <li>Condensor 3:- {{array_key_exists(2, $condensor_rpm) ? ($condensor_speed[2] == .1 ? '1500':($condensor_speed[2] == .2 ? '1200':($condensor_speed[2] == .4 ?'1000':($condensor_speed[2] == .6 ?'950':($condensor_speed[2] == .6 ?'800':($condensor_speed[2] == .8 ?'750':'')))))) :'0'}} rpm</li>
                                        <li>Condensor 4:- {{array_key_exists(3, $condensor_rpm) ? ($condensor_speed[3] == .1 ? '1500':($condensor_speed[3] == .2 ? '1200':($condensor_speed[3] == .4 ?'1000':($condensor_speed[3] == .6 ?'950':($condensor_speed[3] == .6 ?'800':($condensor_speed[3] == .8 ?'750':'')))))) :'0'}} rpm</li>



                                <li></li>
                            </ul>

                        </div>


                    </div>
                </div>


    </div>
</div>
