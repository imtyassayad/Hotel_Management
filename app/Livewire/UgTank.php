<?php

namespace App\Livewire;

use Livewire\Attributes\Reactive;
use Livewire\Component;

class UgTank extends Component
{
    #[Reactive]
    public $warning, $water_level, $title;

    public function mount($warning, $water_level, $title)
    {
            $this->warning = $warning;
            $this->water_level = $water_level;
            $this->title = $title;
    }
    public function render()
    {
        return view('livewire.ug-tank');
    }
}
