<?php

namespace App\Livewire;

use App\Models\test_dbs;
use Livewire\Component;
use Symfony\Component\VarDumper\Exception\ThrowingCasterException;
use tidy;

class Test extends Component
{
    public $intial = -135;
    public $intial_t = -115;
    public $motor_status = 'Off';
    public $motor_switch = 0;

    public $ug_motor_status = 'Off';
    public $ug_motor_switch = 0;

    public $water_level = 10;
    public $ug_level = 90;
    public $auto = 0;
    public $warning;
    public $ug_warning;

    public $dp = -135;
    public $dt = -135;
    public $sp = -135;
    public $st = -135;





    public $c = 0, $c_load = 40, $d_temp = 32, $d_press = 0, $s_temp = 32, $s_press = 0, $chwit = 32, $chwot = 0, $dtpr = 32, $dppr = 0, $status = 0;

    public $load = [0, 20, 40, 60, 80, 100];

    public function mount()
    {
        $this->count();
    }
    public function random()
    {
        $a = rand(1, 5);
        // dd($a);

        test_dbs::where('id', 2)->update(
            [
                'no' => $a,
            ]
        );
    }

    public function count()
    {
        // dd($this->status);
        if ($this->status) {

            $data = test_dbs::first()->get('no');

            $this->c_load = $data[0]->no;

            // $this->c_load =20;
            $this->chiller();
        } else {
            $this->d_temp = 32;
            $this->d_press = 0;
            $this->s_temp = 32;
            $this->s_press = 0;
            $this->chwit = 32;
            $this->chwot = 32;
            $this->dtpr = 32;
            $this->dppr = 0;
            $this->c_load = 0;
            $this->dp = $this->intial;
            $this->dt = $this->intial_t;
            $this->st = $this->intial_t;
            $this->sp = $this->intial;
        }

        if ($this->motor_switch == 1) {
            $this->motor_status = 'On';

            $this->ugtank_drain();
            $this->ohtank();


            // $this->drain();
        } else {
            $this->motor_status = 'Off';

            $this->drain();
        }

        if($this->ug_motor_switch == 1) {
            $this->ug_motor_status = 'On';
            $this->ugtank_fill();
        }
    }
    public function drain()
    {

        for ($i = 0; $i < 5; $i++) {
            $this->water_level =  $this->water_level - $i;


            if ($this->water_level <   12) {
                $this->warning =  'Water low';
                if ($this->auto) {

                    if($this->ug_level > 12){
                        // dd('checking for levvel');
                        $this->motor_switch = 1;
                        $this->motor_status = 'On';
                    }
                    else{
                        $this->motor_switch = 0;
                        $this->motor_status = 'Off';
                        $this->ug_motor_switch = 1;
                        $this->ug_motor_status = 'On';
                    }
                }
                break;
            } elseif ($this->water_level > 5 and $this->water_level < 90) {
                $this->warning = '';
            }
        }
    }


    public function  ugtank_drain()
    {
        for ($i = 0; $i < 5; $i++) {

            $this->ug_level = $this->ug_level - $i;
            if($this->ug_level > 12 and $this->ug_level < 90){
                $this->ug_warning = ' ';
            }
           if ($this->ug_level < 12) {

                if($this->auto){
                   $this->ug_motor_switch = 1;
                   $this->ug_motor_status='On';
                }

            $this->ug_warning = 'Water Low';
            break;

            }

        }
    }
    public function  ugtank_fill()
    {
        for ($i = 0; $i < 5; $i++) {

            $this->ug_level = $this->ug_level + $i;
            if($this->ug_level > 12 and $this->ug_level < 90){
                $this->ug_warning = ' ';
            }
            if ($this->ug_level >= 90) {

              if($this->auto){
                $this->ug_motor_switch = 0;
                $this->ug_motor_status='Off';
                $this->motor_switch =1;
                $this->motor_status = "On";
                break;
              }


            }
            if($this->ug_level >= 98){
                $this->ug_warning = 'Over Flow';
                break;
            }



        }
    }
    public function ohtank()
    {

        for ($i = 0; $i < 5; $i++) {
            if($this->ug_level < 10)
            {
                $this->motor_switch =0;
                break;
            }

            $this->water_level =  $this->water_level + $i;

            if ($this->water_level > 90 ) {

                if ($this->auto) {

                    if($this->ug_level < 12)
                    {
                        $this->ug_motor_switch = 1;
                        $this->ug_motor_status= 'On';
                    }
                    $this->motor_switch = 0;
                    $this->motor_status = 'Off';

                }

            }
            elseif ($this->water_level >   20 and $this->water_level < 90) {
                $this->warning = '';
            }
            elseif ($this->water_level > 98) {

                $this->warning = 'Over flowing';

                break;
            }
        }
    }

    public function chiller()
    {
        if ($this->c_load == 0) {

            $this->d_temp = 32;
            $this->d_press = 0;
            $this->s_temp = 32;
            $this->s_press = 0;
            $this->chwit = 32;
            $this->chwot = 32;
            $this->dtpr = 0;
            $this->dppr = 0;
            $this->dp = $this->intial;
            $this->dt = $this->intial_t;
            $this->st = $this->intial_t;
            $this->sp = $this->intial;
        } elseif ($this->c_load == 20) {
            $this->dp = $this->intial;
            $this->d_temp = 40;
            $this->d_press = 100;
            $this->s_temp = 15;
            $this->s_press = 10;
            $this->chwit = 32;
            $this->chwot = 20;
            $this->dtpr = 20;
            $this->dppr = 20;
            $this->dp = $this->intial + 60;
            $this->dt = $this->intial + 60;
            $this->st = $this->intial + 70;
            $this->sp = $this->intial + 100;
        } elseif ($this->c_load == 40) {
            $this->d_temp = 60;
            $this->d_press = 150;
            $this->s_temp = 10;
            $this->s_press = 22;
            $this->chwit = 25;
            $this->chwot = 15;
            $this->dtpr = 40;
            $this->dppr = 40;
            $this->dp = $this->intial + 120;
            $this->dt = $this->intial + 120;
            $this->st = $this->intial + 50;
            $this->sp = $this->intial + 80;
        } elseif ($this->c_load == 60) {
            $this->d_temp = 70;
            $this->d_press = 180;
            $this->s_temp = 8;
            $this->s_press = 35;
            $this->chwit = 22;
            $this->chwot = 12;
            $this->dtpr = 60;
            $this->dppr = 60;
            $this->dp = $this->intial + 150;
            $this->st = $this->intial + 40;
            $this->sp = $this->intial + 65;
        } elseif ($this->c_load == 80) {
            $this->d_temp = 100;
            $this->d_press = 200;
            $this->s_temp = 6;
            $this->s_press = 52;
            $this->chwit = 20;
            $this->chwot = 10;
            $this->dtpr = 80;
            $this->dppr = 80;
            $this->dp = $this->intial + 200;
            $this->dt = $this->intial + 200;
            $this->st = $this->intial + 30;
            $this->sp = $this->intial + 50;
        } elseif ($this->c_load == 100) {
            $this->d_temp = 150;
            $this->d_press = 260;
            $this->s_temp = 4;
            $this->s_press = 62;
            $this->chwit = 18;
            $this->chwot = 7;
            $this->dtpr = 100;
            $this->dppr = 100;
            $this->dp = $this->intial + 270;
            $this->dt = $this->intial + 270;
            $this->st = $this->intial + 20;
            $this->sp = $this->intial + 40;
        }
    }

    public function render()
    {
        return view('livewire.test');
    }
}
