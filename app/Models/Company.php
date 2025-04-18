<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Company extends Model
{
    use SoftDeletes, HasApiTokens;

    protected $fillable = [
        'name',
        'description',
        'email',
        'phone',
        'address',
        'logo',
        'user_id',
        'licens_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function licens()
    {
        return $this->belongsTo(Licen::class);
    }

    public function logo()
    {
        return $this->logo ? storage_path('app/public/companies/' . $this->logo) : 'images/default.png';
    }
}
