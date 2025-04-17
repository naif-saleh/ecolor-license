<?php

namespace App\Livewire\Licens;

use App\Models\Licen;
use Livewire\Component;
 
class LicensShow extends Component
{
    public $licens;

    public function mount($id)
    {
        $this->licens = Licen::find($id);
    }

    public function render()
    {
        return view('livewire.licens.licens-show');
    }

    
}
