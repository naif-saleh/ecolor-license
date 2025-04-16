<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class EvaluationModuale extends Model
{
    use HasApiTokens;

    protected $fillable = [
        'name',
        'licens_id',
        'description',
        'enabled'
    ];

    protected $casts = [
        'enabled' => 'boolean'
    ];

    public function licens()
    {
        return $this->belongsTo(Licen::class);
    }
}
