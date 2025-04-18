<?php

namespace App\Livewire\Company;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class CompanySoftdeletes extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function restoreCompany($id)
    {
        $company = Company::onlyTrashed()->find($id);
        if ($company) {
            $company->restore();
            if (Company::onlyTrashed()->count() == 0) {
                Toaster::success('Company restored successfully');

                return redirect()->route('company.list');
            }
            Toaster::success('Company is restored successfully');
        } else {
            Toaster::warning('Company is not found!!');
        }
    }

    public function deleteCompanyForce($id)
    {
        $company = Company::onlyTrashed()->find($id);
        if ($company) {
            $company->forceDelete();
            if (Company::onlyTrashed()->count() == 0) {
                Toaster::success('Company is force deleted successfully');
                return redirect()->route('company.list');
            }
            Toaster::success('Company is force deleted successfully');
        } else {
            Toaster::warning('Company is not found!!');
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

        return view('livewire.company.company-softdeletes', [
            'softDeletes' => $query->onlyTrashed()->orderBy('deleted_at', 'desc')->paginate(10),
        ]);
    }
}
