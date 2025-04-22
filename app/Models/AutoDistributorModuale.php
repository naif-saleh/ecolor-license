<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class AutoDistributorModuale extends Model
{
   use HasApiTokens;

    protected $fillable = [
        'name',
        'licens_id',
        'description',
        'max_agents',
        'max_calls',
        'enabled'
    ];



    public function licens()
    {
        return $this->belongsTo(Licen::class);
    }
}
