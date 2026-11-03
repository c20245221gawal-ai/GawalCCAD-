<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Generator extends Model
{
    protected $fillable = [
        'company_name',
        'permit_number',
    ];

    public function disposalManifests(): HasMany
    {
        return $this->hasMany(DisposalManifest::class);
    }
}