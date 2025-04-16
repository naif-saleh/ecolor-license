<?php

namespace App\Livewire\Licens;

use Livewire\Component;

class LicensCreate extends Component
{
    public $autoDialerModule = false;
    public $autoDistributorModule = false;
    public $evaluationModule = false;

    public $option1;

    public $option2;

    public $option3;

    public function mount() {}

    public function render()
    {
        return view('livewire.licens.licens-create');
    }
}
