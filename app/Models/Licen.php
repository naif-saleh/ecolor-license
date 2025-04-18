<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class Licen extends Model
{
    use HasApiTokens, SoftDeletes;

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
        'auto_dialer_id',
        'auto_distributor_id',
        'evaluation_id',
        'company_id',
    ];

    protected $dates = ['deleted_at'];

    // Relationships

    // The user who created the license
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // The company associated with the license
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // The auto dialer modules associated with the license
    public function autoDialerModules()
    {
        return $this->belongsTo(AutoDialerModule::class, 'auto_dialer_id');
    }

    // The auto distributor modules associated with the license
    public function autoDistributorModuales()
    {
        return $this->belongsTo(AutoDistributorModuale::class, 'auto_distributor_id');
    }

    // The evaluation moduales associated with the license
    public function evaluationModuales()
    {
        return $this->belongsTo(EvaluationModuale::class, 'evaluation_id');
    }

    // Generate a unique license key
    public function generateLicenseKey($length = 20): string
    {
        $raw = strtoupper(Str::random($length));

        // Format into XXXX-XXXX-XXXX-XXXX-XXXX
        $key = implode('-', str_split($raw, 5));
        $this->license_key = $key;
        $this->save();

        return $key;
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

    // Check if the license is currently in use
    public function isInUsed(): bool
    {
        return $this->enabled && ! $this->isExpired() && $this->status === 'active';
    }
}
