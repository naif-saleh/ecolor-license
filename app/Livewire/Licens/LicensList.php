<?php

namespace App\Livewire\Licens;

use App\Models\Licen;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class LicensList extends Component
{
    use WithPagination;

    // Initialize properties for Licens
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteLicen($id)
    {
        $licen = Licen::find($id);
        if ($licen) {
            $licen->delete();
            Toaster::success('Licen is soft deleted successfully');
        } else {
            Toaster::warning('Licen is not found!!');
        }
    }

    public function downloadPdf($id)
    {
        // Find the license record by ID
        $licens = Licen::find($id);

        if (!$licens) {
            return abort(404);
        }

        // Check and prepare module information
        $modules = [];
        if (isset($licens->autoDialerModules) && isset($licens->autoDialerModules->name)) {
            $modules[] = $licens->autoDialerModules->name;
        }

        // Check if these properties exist with the spelling in your DB
        if (isset($licens->autoDistributorModuales) && isset($licens->autoDistributorModuales->name)) {
            $modules[] = $licens->autoDistributorModuales->name;
        }

        if (isset($licens->evaluationModuales) && isset($licens->evaluationModuales->name)) {
            $modules[] = $licens->evaluationModuales->name;
        }

        // Create the info items array with proper null checking
        $infoItems = [
            'Client Name' => $licens->client_name ?? 'N/A',
            'Status' => $licens->status ?? 'N/A',
            'Key' => $licens->license_key ?? 'N/A',
            'Duration Time' => ($licens->start_date ?? 'N/A') . ' - ' . ($licens->end_date ?? 'N/A'),
            'Generated By' => $licens->user ? ($licens->user->name ?? 'N/A') : 'N/A',
            'Modules' => !empty($modules) ? implode(' - ', $modules) : 'N/A',
            'Description' => $licens->description ?? 'No description',
        ];

        // Generate the PDF with proper UTF-8 configuration
        $pdf = Pdf::loadView('livewire.licens.licens-pdf', [
            'licens' => $licens,
            'infoItems' => $infoItems
        ])
        ->setOptions([
            'isHtml5ParserEnabled' => true,
            'isUtf8Enabled' => true,
            'defaultFont' => 'DejaVu Sans',
            'charset' => 'UTF-8',
        ]);

        return response()->streamDownload(
            function () use ($pdf) {
                echo $pdf->output();
            },
            'license_info_' . $licens->id . '.pdf'
        );
    }

    // Helper method to safely get formatted modules
    private function getFormattedModules($licens)
    {
        $modules = [];

        if (isset($licens->autoDialerModules) && isset($licens->autoDialerModules->name)) {
            $modules[] = $licens->autoDialerModules->name;
        }

        if (isset($licens->autoDistributorModules) && isset($licens->autoDistributorModules->name)) {
            $modules[] = $licens->autoDistributorModules->name;
        }

        if (isset($licens->evaluationModules) && isset($licens->evaluationModules->name)) {
            $modules[] = $licens->evaluationModules->name;
        }

        return empty($modules) ? 'N/A' : implode(' - ', $modules);
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

        return view('livewire.licens.licens-list', [
            'licensList' => $query->latest('created_at')->paginate(10),
        ]);
    }
}
