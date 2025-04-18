<?php

namespace App\Livewire\Company;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class CompanyCreate extends Component
{
    use WithFileUploads;

    // Initialize properties for Companies
    public $companyName = '';

    public $companyDescription = '';
    public $companyEmail = '';

    public $companyPhone = '';

    public $companyAddress = '';

    public $companyLogo = '';

    // Validation rules
    private function rules()
    {
        return [
            'companyName' => 'required|string|max:255',
            'companyEmail' => 'required|email|max:255',
            'companyPhone' => 'required|string|max:20',
            'companyAddress' => 'required|string|max:255',
            'companyLogo' => 'nullable|image|max:2048', // Optional image
        ];
    }

    // Validation messages
    private function messages()
    {
        return [
            'companyName.required' => 'Company name is required.',
            'companyEmail.required' => 'Company email is required.',
            'companyPhone.required' => 'Company phone number is required.',
            'companyAddress.required' => 'Company address is required.',
            'companyLogo.image' => 'The logo must be an image.',
            'companyLogo.max' => 'The logo may not be greater than 2MB.',
        ];
    }

    // Method to create a new company
    public function createCompany()
    {
        $this->validate($this->rules(), $this->messages());

        // Handle file upload
        if ($this->companyLogo) {
            $logoPath = $this->companyLogo->store('companies', 'public');
        }

        // Create the company
        Company::create([
            'name' => $this->companyName,
            'description' => $this->companyDescription,
            'email' => $this->companyEmail,
            'phone' => $this->companyPhone,
            'address' => $this->companyAddress,
            'logo' => $logoPath ?? null,
            'user_id' => auth()->id(),
        ]);

        Toaster::success('Company created successfully!');

        // Reset fields after creation
        $this->reset(['companyName', 'companyEmail', 'companyPhone', 'companyAddress', 'companyLogo', 'companyDescription']);

        // Optionally, redirect or perform other actions
        // return redirect()->route('companies.index');
    }

    public function render()
    {
        return view('livewire.company.company-create');
    }
}
