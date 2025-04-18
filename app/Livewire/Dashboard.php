<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Licen;
use App\Models\Company;
use Carbon\Carbon;

class Dashboard extends Component
{
 // Get Licenses Per Month
public $chartData = [];

public function mount()
{
    // Licenses per month
    $licensesPerMonth = Licen::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->groupBy('month')
        ->orderBy('month')
        ->pluck('count', 'month')
        ->toArray();

    // Companies per month
    $companiesPerMonth = Company::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->groupBy('month')
        ->orderBy('month')
        ->pluck('count', 'month')
        ->toArray();

    // Generate data for all 12 months
    $months = collect(range(1, 12))->map(function ($month) use ($licensesPerMonth, $companiesPerMonth) {
        return [
            'month' => Carbon::create()->month($month)->format('M'),
            'licenses' => $licensesPerMonth[$month] ?? 0,
            'companies' => $companiesPerMonth[$month] ?? 0,
        ];
    });

    $this->chartData = [
        'labels' => $months->pluck('month'),
        'licenses' => $months->pluck('licenses'),
        'companies' => $months->pluck('companies'),
    ];
}

    public function render()
    {
        return view('livewire.dashboard', [
            'active' => Licen::where('status', 'active')->count(),
            'inactive' => Licen::where('status', 'inactive')->count(),
            'expaired' => Licen::where('status', 'expaired')->count(),
            'companies' => Company::count(),
        ]);
    }
}
