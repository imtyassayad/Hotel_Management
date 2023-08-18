<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="row w-100 px-3 border-bottom-2 boder border-dark" >
            <div class="col-12">
                <h2>Chillers</h2>
            </div>
            @foreach ($chillers as $item)

                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-card-four">
                        <div class="widget-content"  wire:poll.visible='getchillerdata({{$item->id}})'>

                            <div class="w-header">
                                <div class="w-info">
                                    <h6 class="value">{{$item->chiller_no}}</h6>
                                </div>
                                <div class="task-action">
                                        <a href="{{route('bms.chiller',$item->id)}}" wire:navigate class="btn btn-primary btn-sm">view</a>
                                </div>
                            </div>

                            <div class="w-content">

                                <div class="w-info">
                                    <p class="value" style="color:{{$item->status == 1?'green':'red'}}">{{$item->status == 1?'Running':'Switched Off'}}
                                        {{-- <span>this week</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                                    </p> --}}
                                </div>

                            </div>

                            <div class="w-progress-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: {{$item->room_temp}}%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="32"></div>
                                </div>

                                <div class="">
                                    <div class="w-icon">
                                        <p>{{$item->room_temp}} &deg;C </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
        <hr>
        <div class="row w-100 px-3" >
            <div class="col-12"  wire:poll.visible='gettanks'>
                <h2>Tanks</h2>
            </div>
            @foreach ($tanks as $item)
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-card-four">
                        <div class="widget-content">

                            <div class="w-header">
                                <div class="w-info">
                                    <h6 class="value">{{$item->tank_name}}</h6>
                                </div>
                                <div class="task-action">
                                        <a href="{{route('bms.tank')}}" class="btn btn-primary btn-sm">view</a>
                                </div>
                            </div>

                            <div class="w-content">

                                <div class="w-info">
                                    <p class="value" style="color:blue">{{$item->capacity.' Lit'}}

                                </div>
                                <span style="height: 24px" class="badge badge-{{$item->motor[0]->status == 0 ? 'danger':'success'}}">{{$item->motor[0]->status == 0 ? 'Motor Off':'Motor On'}}</span>
                            </div>

                            <div class="w-progress-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: {{$item->level}}%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="32"></div>
                                </div>

                                <div class="">
                                    <div class="w-icon d-flex justify-content-between align-items-center">
                                        <p>{{$item->level}} <small>%</small></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

</div>
