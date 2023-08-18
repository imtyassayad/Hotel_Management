<?php

namespace App\Livewire\Bms;

use App\Http\Traits\chiller as TraitsChiller;
use App\Models\chiller;
use App\Models\motor;
use App\Models\tank;
use Livewire\Component;

class Index extends Component
{
    use TraitsChiller;
    public $chillers;
    public $chiller_id;
    public $tanks;


    public function mount()
    {
        $this->getchilers();
        $this->gettanks();
        // $this->gettankdata();


    }

    public function getdata()
    {
        $this->getchilers();
        $this->gettanks();


    }
    public function render()
    {

        return view('livewire.bms.index');
    }

    public function getchilers()
    {

        // $this->load();
        // $this->set();

        $this->chillers = chiller::all();



    }

    public function getchillerdata($id)
    {

        $this->chiller_id = $id;

        $this->load($this->chiller_id);
        $this->set();

        $this->chillers = chiller::all();

    }
    public function gettanks()
    {

        $this->tanks =  tank::with('motor')->get();

        $this->gettankdata();
          $this->gettankdata();
    }

    public function gettankdata()
    {

        foreach($this->tanks as $tank)
        {
            $switch = rand(0,1);


            $level = rand(0,90);
            tank::where('id', $tank->id)->update([
                'level' => $level,
            ]);
            motor::where('tank_id',$tank->id)->update([
                'status' => $switch,
            ]);

        }
    }

}
