<?php

namespace App\Livewire\Licens;

use App\Models\Licen;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class SoftDaletes extends Component
{
    public $search = '';
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function restoreLicen($id)
    {
        $licen = Licen::onlyTrashed()->find($id);
        if ($licen) {
            $licen->restore();
            if(Licen::onlyTrashed()->count() == 0){
                Toaster::success('Licen is restored successfully');
                return redirect()->route('licens.list');
            }
            Toaster::success('Licen is restored successfully');
        } else {
            Toaster::warning('Licen is not found!!');
        }
    }

    public function deleteLicenForce($id)
    {
        $licen = Licen::onlyTrashed()->find($id);
        if ($licen) {
            $licen->forceDelete();
            if(Licen::onlyTrashed()->count() == 0){
                Toaster::success('Licen is force deleted successfully');
                return redirect()->route('licens.list');
            }
            Toaster::success('Licen is force deleted successfully');
        } else {
            Toaster::warning('Licen is not found!!');
        }
    }
    public function render()
    {
        $query = Licen::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('client_name', 'like', '%'.$this->search.'%')
                    ->orWhere('status', 'like', '%'.$this->search.'%');
            });

            $this->updatingSearch();
        }
        return view('livewire.licens.soft-daletes',[
            'softDeletes' => $query->onlyTrashed()->orderBy('deleted_at', 'desc')->paginate(10),
        ]);
    }
}
