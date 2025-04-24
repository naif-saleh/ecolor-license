<?php

namespace App\Livewire\Licens;

use App\Models\Company;
use App\Models\Licen;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class LicensUpdate extends Component
{
    // Initialize properties for modules
    public $autoDialerModule = false;

    public $autoDistributorModule = false;

    public $evaluationModule = false;

    // Initialize properties for Dialer and Distributor
    public $max_channels = 0;

    public $max_providers = 0;

    public $dial_max_calls = 0;

    public $dist_max_calls = 0;

    public $max_agents = 0;

    // Initialize properties for License
    public $companyName = '';

    public $dateFrom = '';

    public $dateTo = '';

    public $status = '';

    public $description = '';

    public $license = '';

    public $companies = [];

    public $licensKey = '';

    public function mount($id)
    {
        $this->companies = Company::all();
        $this->license = Licen::find($id);

        $this->fill([
            'companyName' => $this->license->company_id,
            'dateFrom' => $this->license->start_date,
            'dateTo' => $this->license->end_date,
            'status' => $this->license->status == 1 ? 'active' : 'inactive',
            'description' => $this->license->description ?? '',
            'autoDialerModule' => $this->license->autoDialerModules->enabled ?? '',
            'max_channels' => $this->license->autoDialerModules->max_channels ?? 0,
            'max_providers' => $this->license->autoDialerModules->max_providers ?? 0,
            'dial_max_calls' => $this->license->autoDialerModules->max_calls ?? 0,
            'autoDistributorModule' => $this->license->autoDistributorModuales->enabled ?? 0,
            'dist_max_calls' => $this->license->autoDistributorModuales->max_calls ?? 0,
            'max_agents' => $this->license->autoDistributorModuales->max_agents ?? 0,
        ]);

    }

    // Rules for validation
    private function rules()
    {
        return [
            'companyName' => 'required|integer|exists:companies,id',
            'dateFrom' => 'required|date',
            'dateTo' => 'required|date|after_or_equal:dateFrom',
            'status' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'autoDialerModule' => 'boolean',
            'autoDistributorModule' => 'boolean',
            'evaluationModule' => 'boolean',
        ];
    }

    public function updateLicense()
    {
        $this->validate($this->rules());

        if (! $this->autoDialerModule && ! $this->autoDistributorModule && ! $this->evaluationModule) {
            Toaster::warning('Please select at least one module');

            return;
        }
         // Update module values if they exist
        if ($this->license->autoDialerModules) {
            $this->license->autoDialerModules->update([
            'max_providers' => $this->max_providers,
            'max_calls' => $this->dial_max_calls,
            'max_channels' => $this->max_channels,
            'enabled' => $this->autoDialerModule,
            ]);
        }

        if ($this->license->autoDistributorModuales) {
            $this->license->autoDistributorModuales->update([
            'max_agents' => $this->max_agents,
            'max_calls' => $this->dist_max_calls,
            'enabled' => $this->autoDistributorModule,
            ]);
        }

        if ($this->license->evaluationModuales) {
            $this->license->evaluationModuales->update([
            'enabled' => $this->evaluationModule,
            ]);
        }

        // Update the license information
        $this->license->update([
            'start_date' => $this->dateFrom,
            'end_date' => $this->dateTo,
            'status' => $this->status,
            'user_id' => auth()->user()->id,
            'company_id' => $this->companyName,
            'description' => $this->description,
        ]);

        Toaster::success('License Updated Successfully');

        return redirect()->route('licens.list');
    }

    public function render()
    {
        return view('livewire.licens.licens-update');
    }
}
