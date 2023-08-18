<?php

namespace App\Livewire;

use Livewire\Attributes\Reactive;
use Livewire\Component;

class Motor extends Component
{
    #[Reactive]
    public $motor_switch ,$motor_status;

    public function mount($motor_switch, $motor_status)
    {
        $this->motor_switch = $motor_switch;
        $this->motor_status = $motor_status;
    }

    public function render()
    {

        return view('livewire.motor');
    }
}
