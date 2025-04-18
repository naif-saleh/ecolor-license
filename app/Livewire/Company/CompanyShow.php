<?php

namespace App\Livewire\Company;

use App\Models\Company;
use Livewire\Component;

class CompanyShow extends Component
{

    public $company = '';

    public function mount($id)
    {
        $this->company = Company::find($id);
    }
    public function render()
    {
        return view('livewire.company.company-show');
    }
}
