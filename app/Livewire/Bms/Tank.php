<?php

namespace App\Livewire\Bms;

use Livewire\Component;

class Tank extends Component
{

    public $motor_status = 'Off';
    public $motor_switch = 0;

    public $ug_motor_status = 'Off';
    public $ug_motor_switch = 0;

    public $fire_motor_status = 'Off';
    public $fire_motor_switch = 0;

    public $water_level = 10;
    public $ug_level = 90;
    public $fire_level = 10;
    public $auto = 0;
    public $warning;
    public $fire_warning;
    public $ug_warning;
    public $general_warning;

    public $fire_drain = false;

    public function mount()
    {
        $this->count();


    }

    public function ohtswitch()
    {
        $this->motor_switch = !$this->motor_switch;
    }
    public function ugtswitch()
    {
        $this->ug_motor_switch = !$this->ug_motor_switch;

    }
    public function fireswitch()
    {

       $this->fire_motor_switch = !$this->fire_motor_switch;
    }
    public function switchauto()
    {
        $this->auto = !$this->auto;
    }

    public function firedrainswitch()
    {
        $this->fire_drain = !$this->fire_drain;
    }

    public function count()
    {
        if ($this->motor_switch == 1) {
            $this->motor_status = 'On';

            $this->ugtank_drain();
            $this->ohtank();



            // $this->drain();
        } else {
            $this->motor_status = 'Off';

            $this->drain();
        }


        if ($this->fire_motor_switch == 1) {
            $this->fire_motor_status = 'On';

            $this->ugtank_drain();
            $this->firfill();



            // $this->drain();
        } else {
            $this->fire_motor_status = 'Off';

            // $this->drain();
        }

        if($this->ug_motor_switch == 1) {
            $this->ug_motor_status = 'On';
            $this->ugtank_fill();
        }
        else{
            $this->ug_motor_status = 'Off';
        }

        if($this->fire_drain){
            $this->firedrain();
        }


    }

    public function drain()
    {

        for ($i = 0; $i < 5; $i++) {
            $this->water_level =  $this->water_level - $i;

            if ($this->water_level > 5 and $this->water_level < 90) {
                $this->warning = '';
            }
            if ($this->water_level <   30) {

                if ($this->auto) {

                    if($this->ug_level > 12){
                        $this->ug_motor_switch = 1;
                        $this->ug_motor_status = 'On';
                    }
                }
            }
            if ($this->water_level <   12) {
                $this->warning =  'Water low';
                if ($this->auto) {

                    if($this->ug_level > 12){
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
            }
        }
    }


    public function  ugtank_drain()
    {
        for ($i = 0; $i < 5; $i++) {

            $this->ug_level = $this->ug_level - $i;

            if($this->ug_level > 12 and $this->ug_level < 90){

                $this->ug_warning = ' ';
                if($this->auto){
                    $this->motor_switch = 1;
                    $this->ug_motor_status='On';
                }

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
                $this->general_warning = '';
            }

            if ($this->ug_level >= 90) {

                    if($this->auto){
                        if($this->water_level < 50)
                        {
                            $this->motor_switch =1;
                            $this->motor_status = "On";
                        }
                        if($this->fire_level <  80){
                            $this->fire_motor_switch = 1;
                            $this->fire_motor_status =  'On';
                        }
                        $this->ug_motor_switch = 0;
                        $this->ug_motor_status='Off';

                    }


            }
            if($this->ug_level > 98){
                $this->ug_warning = 'Over Flow';
                break;
            }



        }
    }
    public function ohtank()
    {

            for ($i = 0; $i < 5; $i++) {
                if($this->ug_level <= 10)
                {
                    $this->motor_switch =0;
                    $this->general_warning = 'Under Gruond tank has low was please fill that first';
                    break;
                }

                $this->water_level =  $this->water_level + $i;


                if ($this->water_level >   20 and $this->water_level < 90) {
                    $this->warning = '';
                }

                if ($this->water_level > 90 ) {

                    if ($this->auto) {

                        $this->motor_switch = 0;
                        $this->motor_status = 'Off';

                    }
                    // break;

                }

                if ($this->water_level > 98) {

                    $this->warning = 'Over flowing';

                    break;
                }
            }

    }

    public function firfill()
    {

            for ($i = 0; $i < 5; $i++) {
                if($this->ug_level <= 10)
                {
                    $this->fire_motor_switch =0;
                    $this->general_warning = 'Under Gruond tank has low was please fill that first';
                    break;
                }

                $this->fire_level =  $this->fire_level + $i;


                if ($this->fire_level >   20 and $this->fire_level < 90) {
                    $this->fire_warning = '';
                }

                if ($this->fire_level > 90 ) {

                    if ($this->auto) {

                        $this->fire_motor_switch = 0;
                        $this->fire_motor_status = 'Off';

                    }
                    // break;

                }

                if ($this->fire_level > 98) {

                    $this->fire_warning = 'Over flowing';

                    break;
                }
            }

    }
    public function firedrain()
    {
        for ($i = 0; $i < 5; $i++) {
            if($this->fire_level > 10 ){
                $this->fire_level =  $this->fire_level - $i;
            }
            else if($this->fire_level <= 10 ){
                if($this->auto){
                    $this->motor_switch = 1;
                    $this->motor_status= 'On';
                }
            }
            if ($this->fire_level > 5 and $this->fire_level < 90) {
                $this->fire_warning = '';
            }
            if ($this->fire_level <   30) {

                if ($this->auto) {

                    if($this->ug_level > 12){
                        $this->ug_motor_switch = 1;
                        $this->ug_motor_status = 'On';
                    }
                }
            }
            if ($this->fire_level <   12) {
                $this->fire_warning =  'Water low';
                if ($this->auto) {

                    if($this->ug_level > 12){
                        $this->fire_motor_switch = 1;
                        $this->fire_motor_status = 'On';
                    }
                    else{
                        $this->fire_motor_switch = 0;
                        $this->fire_motor_status = 'Off';
                        $this->ug_motor_switch = 1;
                        $this->ug_motor_status = 'On';
                    }
                }
                break;
            }
        }
    }



    public function render()
    {
        return view('livewire.bms.tank');
    }
}
