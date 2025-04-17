<?php

namespace App\Livewire\Licens;

use App\Models\AutoDialerModule;
use App\Models\AutoDistributorModuale;
use App\Models\EvaluationModuale;
use App\Models\Licen;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class LicensCreate extends Component
{
    //Initialize properties for moduales
    public $autoDialerModule = false;
    public $autoDistributorModule = false;
    public $evaluationModule = false;

    //Initialize properties for Dialer and Distributor
    public $max_channels = 0;
    public $max_providers = 0;
    public $dial_max_calls = 0;
    public $dist_max_calls = 0;
    public $max_agents = 0;

    //Initialize properties for Licens
    public $companyName = '';
    public $dateFrom = '';
    public $dateTo = '';
    public $status = '';
    public $description = '';
    public $licensKey = '';

    public $dialer = '';
    public $distributor = '';
    public $evaluation = '';




    public function mount() {}

    //rules for validation
    private function rules()
    {
        return [
            'companyName' => 'required|string|max:255',
            'dateFrom' => 'required|date',
            'dateTo' => 'required|date|after_or_equal:dateFrom',
            'status' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'autoDialerModule' => 'boolean',
            'autoDistributorModule' => 'boolean',
            'evaluationModule' => 'boolean',

        ];
    }

    public function generateLicene()
    {

        $this->validate($this->rules());


        if($this->autoDialerModule == false && $this->autoDistributorModule == false && $this->evaluationModule == false){
            Toaster::warning('Please select at least one module');
            return;
        }
        // Save the modules information to the database
        //Dilaer module
        if ($this->autoDialerModule == true) {
            $dialer = AutoDialerModule::create([
                'max_channels' => $this->max_channels,
                'max_providers' => $this->max_providers,
                'max_calls' => $this->dial_max_calls,
                'enabled' => true,
            ]);
        }

        //Distributor module
        if ($this->autoDistributorModule == true) {
            $distributor = AutoDistributorModuale::create([
                'agents' => $this->max_agents,
                'max_calls' => $this->dial_max_calls,
                'enabled' => true,
            ]);
        }

        //Evaluation module
        if ($this->evaluationModule == true) {
            $evaluation = EvaluationModuale::create([
                'enabled' => true,
            ]);
        }



        // Save the license information to the database
        // Assuming you have a License model and a licenses table
       $licen = Licen::create([
            'client_name' => $this->companyName,
            'start_date' => $this->dateFrom,
            'end_date' => $this->dateTo,
            'status' => $this->status,
            'user_id' => auth()->user()->id,
            'auto_dialer_id' => $this->autoDialerModule ? $dialer->id  : null,
            'auto_distributor_id' => $this->autoDistributorModule ? $distributor->id : null,
            'evaluation_id' => $this->evaluationModule ? $evaluation->id : null,
            'description' => $this->description,
        ]);

        $this->licensKey = $licen->generateLicenseKey();
        $licen->save();
        Toaster::success('Licens Generated Successfully');
        // Reset the form fields
        $this->reset([
            'companyName',
            'dateFrom',
            'dateTo',
            'status',
            'description',
            'autoDialerModule',
            'autoDistributorModule',
            'evaluationModule',
            'max_channels',
            'max_providers',
            'dial_max_calls',
            'dist_max_calls',
            'max_agents'
        ]);
    }

    public function render()
    {
        return view('livewire.licens.licens-create');
    }
}
