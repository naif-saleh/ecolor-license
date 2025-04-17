<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class EvaluationModuale extends Model
{
    use HasApiTokens;

    protected $fillable = [
        'name',
        'description',
        'enabled'
    ];

     

    public function licens()
    {
        return $this->belongsTo(Licen::class);
    }
}
