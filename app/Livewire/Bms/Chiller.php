<?php

namespace App\Livewire\Bms;

use App\Http\Traits\chiller as TraitsChiller;
use App\Models\chiller as ModelsChiller;
use Livewire\Component;

class Chiller extends Component
{
    // use TraitsChiller;

    public $chiller_id;
    public $loading = true;

    public $intial = -135;
    public $intial_t = -115;
    public $dp = -135;
    public $dt = -135;
    public $sp = -135;
    public $st = -135;
    public $ci = -135;
    public $co = -135;
    public $rt;

    public $c = 0, $c_load =20,  $status  ;

    public $load = [0, 20, 40, 60, 80, 100];

    public $condensor_switch=[];
    public $condensor_rpm=[];
    public $condensor_speed=[0,0,0,0];

    public function mount($id)
    {
        $this->chiller_id = $id;

    }

    public function count()
    {

        $this->load($this->chiller_id);


        $this->set();
        $this->get();


    }
    public function switch()
    {

        $data = ModelsChiller::find($this->chiller_id);

        $a = !$data->status;

        if( $a ==1  ){
            for ($i=0; $i < 4; $i++) {
                array_push($this->condensor_switch ,1);
                array_push( $this->condensor_rpm ,800);
            }
            sleep(2);
            ModelsChiller::where('id',$this->chiller_id)->update([
                'status'=> $a,
            ]);

        }
        else{
            ModelsChiller::where('id',$this->chiller_id)->update([
                'status'=> $a,
            ]);
            sleep(1);
            for ($i=0; $i < 4; $i++) {
                unset($this->condensor_switch[$i]);
                unset($this->condensor_rpm[$i]);
            }
        }


        $this->status = $a;

    }
    public function set()
    {

        $data = ModelsChiller::find($this->chiller_id);


        if ($this->status == 1) {


            if ($this->c_load == 0) {

                ModelsChiller::where('id',$this->chiller_id)->update([
                    'discharge_temp'	    => 32,
                    'discharge_pressure'	=> 120,
                    'suction_temp'	        => 32,
                    'suction_pressure'	    => 120,
                    'chw_in_temp'	        => 32,
                    'chw_out_temp'	        => 32,
                    'room_temp'             => 30,
                ]);



            } elseif ($this->c_load == 20) {

                ModelsChiller::where('id',$this->chiller_id)->update([
                    	'discharge_temp'	    => 40,
                    	'discharge_pressure'	=> 150,
                    	'suction_temp'	        => 30,
                    	'suction_pressure'	    => 100,
                    	'chw_in_temp'	        => 20,
                    	'chw_out_temp'	        => 25,
                    	'room_temp'             => 27,
                ]);
                for ($i=0; $i < 4; $i++) {
                    $this->condensor_speed[$i] = .8;
                }


            } elseif ($this->c_load == 40) {

                ModelsChiller::where('id',$this->chiller_id)->update([
                    'discharge_temp'	    => 50,
                    'discharge_pressure'	=> 150,
                    'suction_temp'	        => 28,
                    'suction_pressure'	    => 80,
                    'chw_in_temp'	        => 15,
                    'chw_out_temp'	        => 20,
                    'room_temp'             => 24,
                ]);

                for ($i=0; $i < 4; $i++) {
                    $this->condensor_speed[$i] = .6;
                }

            } elseif ($this->c_load == 60) {

                ModelsChiller::where('id',$this->chiller_id)->update([
                    'discharge_temp'	    => 60,
                    'discharge_pressure'	=> 180,
                    'suction_temp'	        => 26,
                    'suction_pressure'	    => 60,
                    'chw_in_temp'	        => 12,
                    'chw_out_temp'	        => 17,
                    'room_temp'             => 22,
                ]);

                for ($i=0; $i < 4; $i++) {
                    $this->condensor_speed[$i] = .4;
                }


            } elseif ($this->c_load == 80) {

                ModelsChiller::where('id',$this->chiller_id)->update([
                    'discharge_temp'	    => 70,
                    'discharge_pressure'	=> 230,
                    'suction_temp'	        => 24,
                    'suction_pressure'	    => 40,
                    'chw_in_temp'	        => 10,
                    'chw_out_temp'	        => 15,
                    'room_temp'             => 19,
                ]);
                for ($i=0; $i < 4; $i++) {
                    $this->condensor_speed[$i] = .2;
                }

            } elseif ($this->c_load == 100) {

                ModelsChiller::where('id',$this->chiller_id)->update([
                    'discharge_temp'	    => 80,
                    'discharge_pressure'	=> 260,
                    'suction_temp'	        => 22,
                    'suction_pressure'	    => 30,
                    'chw_in_temp'	        => 8,
                    'chw_out_temp'	        => 13,
                    'room_temp'             => 17,
                ]);

                for ($i=0; $i < 4; $i++) {
                    $this->condensor_speed[$i] = .1;
                }

            }

        }
        else{
            $this->c_load = 0;
            ModelsChiller::where('id',$this->chiller_id)->update([
                'compresor_load'        => 0,
                'discharge_temp'	    => 30,
                'discharge_pressure'	=> 80,
                'suction_temp'	        => 30,
                'suction_pressure'	    => 80,
                'chw_in_temp'	        => 30,
                'chw_out_temp'	        => 30,
                'room_temp'             => 30,
            ]);
            // $this->co = $this->intial;

        }

    }

    public function load()
    {


        if($this->status){

            for ($i=0; $i < 4; $i++) {
                array_push($this->condensor_switch ,1);
                array_push( $this->condensor_rpm ,800);
            }
            sleep(2);
            $a = rand(1,5);

            ModelsChiller::where('id',1)->update([
                'compresor_load'=>$this->load[$a],
            ]);
            $this->c_load = $this->load[$a];
        }
        else{
            for ($i=0; $i < 4; $i++) {
                unset($this->condensor_switch[$i]);
                unset($this->condensor_rpm[$i]);
            }

        }


    }

    public function get()
    {
        $data = ModelsChiller::find($this->chiller_id);

                $this->dp = $this->intial + $data->discharge_pressure ;
                $this->dt = $this->intial +$data->discharge_temp ;
                $this->st = $this->intial +$data->suction_temp ;
                $this->sp = $this->intial + $data->suction_pressure ;
                $this->ci = $this->intial +$data->chw_in_temp;
                $this->co = $this->intial +   $data->chw_out_temp;
                $this->rt = $data->room_temp;
                $this->status = $data->status;

                $this->loading = false;


    }

    public function render()
    {
        return view('livewire.bms.chiller');
    }
}
