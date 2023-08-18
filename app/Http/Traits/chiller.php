<?php
namespace App\Http\Traits;

use App\Models\chiller as traitchiller;


trait chiller {

    public $chiller_id;
    public  $c_load =20,  $status  ;
    public $load = [0, 20, 40, 60, 80, 100];

    public function load($id)
    {
            $this->chiller_id = $id;
            $a = rand(1,5);

            traitchiller::where('id',1)->update([
                'compresor_load'=>$this->load[$a],
            ]);
            $this->c_load = $this->load[$a];
    }

    public function set()
    {

        $data = traitchiller::find($this->chiller_id);


        if ($data->status == 1) {


            if ($this->c_load == 0) {

                traitchiller::where('id',$this->chiller_id)->update([
                    'discharge_temp'	    => 32,
                    'discharge_pressure'	=> 120,
                    'suction_temp'	        => 32,
                    'suction_pressure'	    => 120,
                    'chw_in_temp'	        => 32,
                    'chw_out_temp'	        => 32,
                    'room_temp'             => 30,
                ]);

            } elseif ($this->c_load == 20) {

                traitchiller::where('id',$this->chiller_id)->update([
                    	'discharge_temp'	    => 110,
                    	'discharge_pressure'	=> 150,
                    	'suction_temp'	        => 30,
                    	'suction_pressure'	    => 100,
                    	'chw_in_temp'	        => 20,
                    	'chw_out_temp'	        => 25,
                    	'room_temp'             => 27,
                ]);
                // dd('here');


            } elseif ($this->c_load == 40) {

                traitchiller::where('id',$this->chiller_id)->update([
                    'discharge_temp'	    => 130,
                    'discharge_pressure'	=> 150,
                    'suction_temp'	        => 28,
                    'suction_pressure'	    => 80,
                    'chw_in_temp'	        => 15,
                    'chw_out_temp'	        => 20,
                    'room_temp'             => 24,
                ]);



            } elseif ($this->c_load == 60) {

                traitchiller::where('id',$this->chiller_id)->update([
                    'discharge_temp'	    => 180,
                    'discharge_pressure'	=> 180,
                    'suction_temp'	        => 26,
                    'suction_pressure'	    => 60,
                    'chw_in_temp'	        => 12,
                    'chw_out_temp'	        => 17,
                    'room_temp'             => 22,
                ]);




            } elseif ($this->c_load == 80) {

                traitchiller::where('id',$this->chiller_id)->update([
                    'discharge_temp'	    => 200,
                    'discharge_pressure'	=> 230,
                    'suction_temp'	        => 24,
                    'suction_pressure'	    => 40,
                    'chw_in_temp'	        => 10,
                    'chw_out_temp'	        => 15,
                    'room_temp'             => 19,
                ]);


            } elseif ($this->c_load == 100) {

                traitchiller::where('id',$this->chiller_id)->update([
                    'discharge_temp'	    => 250,
                    'discharge_pressure'	=> 260,
                    'suction_temp'	        => 22,
                    'suction_pressure'	    => 30,
                    'chw_in_temp'	        => 8,
                    'chw_out_temp'	        => 13,
                    'room_temp'             => 17,
                ]);


            }

        }
        else{
            $this->c_load = 0;
            traitchiller::where('id',$this->chiller_id)->update([
                'compresor_load'        => 0,
                'discharge_temp'	    => 30,
                'discharge_pressure'	=> 80,
                'suction_temp'	        => 30,
                'suction_pressure'	    => 80,
                'chw_in_temp'	        => 30,
                'chw_out_temp'	        => 30,
                'room_temp'             => 30,
            ]);


            // $this->c_load = 0;
            // $this->dp = $this->intial;
            // $this->dt = $this->intial;
            // $this->st = $this->intial;
            // $this->sp = $this->intial;
            // $this->ci = $this->intial;
            // $this->co = $this->intial;

        }
        // dd($this->c_load);
    }

    // public function get()
    // {

    //     $data = traitchiller::find($this->chiller_id);

    //             $this->dp = $this->intial + $data->discharge_pressure ;
    //             $this->dt = $this->intial +$data->discharge_temp ;
    //             $this->st = $this->intial +$data->suction_temp ;
    //             $this->sp = $this->intial + $data->suction_pressure ;
    //             $this->ci = $this->intial +$data->chw_in_temp;
    //             $this->co = $this->intial +   $data->chw_out_temp;
    //             $this->rt = $data->room_temp;
    //             $this->status = $data->status;

    // }

}
