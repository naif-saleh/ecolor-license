<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class Licen extends Model
{
    use HasApiTokens;

    // Data will stoed in the database
    protected $fillable = [
        'client_name',
        'start_date',
        'end_date',
        'enabled',
        'license_key',
        'status',
        'description',
        'user_id',
    ];

    // Relationships

    // The user who created the license
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // The auto dialer modules associated with the license
    public function autoDialerModules()
    {
        return $this->hasMany(AutoDialerModule::class);
    }

    // The auto distributor modules associated with the license
    public function autoDistributorModuales()
    {
        return $this->hasMany(AutoDistributorModuale::class);
    }

    // The evaluation moduales associated with the license
    public function evaluationModuales()
    {
        return $this->hasMany(EvaluationModuale::class);
    }

    // Generate a unique license key
    public function generateLicenseKey($length = 20): string
    {
        $raw = strtoupper(Str::random($length));

        // Format into XXXX-XXXX-XXXX-XXXX-XXXX
        return implode('-', str_split($raw, 5));
    }

    // Check if the license is expired
    public function isExpired(): bool
    {
        return $this->end_date < now();
    }

    
    // Check if the license is active
    public function isActive(): bool
    {
        return $this->status === 'Active';
    }


    // Check if the license is inactive
    public function isInactive(): bool
    {
        return $this->status === 'Inactive';
    }




}
