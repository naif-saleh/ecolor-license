<?php

namespace App\Livewire\Company;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class CompanyList extends Component
{
    use WithPagination;

    public $search = '';

    // Update the search property
    public function updatingSearch()
    {
        $this->resetPage();
    }

    // Method to delete a company
    public function deleteCompany($id)
    {
        $company = Company::find($id);
        if ($company) {
            $company->delete();
            Toaster::success('Company is soft deleted successfully');
        } else {
            Toaster::warning('Company not found!');
        } 
    }

    public function render()
    {
        $query = Company::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%'.$this->search.'%')
                    ->orWhere('address', 'like', '%'.$this->search.'%');
            });

            $this->updatingSearch();
        }

        return view('livewire.company.company-list',[
            'companyList' => $query->latest('created_at')->paginate(10)
        ]);
    }
}
