<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WasteCategory extends Model
{
    protected $fillable = [
        'code',
        'name',
        'hazard_class',
        'fee_per_kg',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'fee_per_kg' => 'decimal:2',
            'is_active' => 'boolean',
        ];
    }

    public function disposalManifests(): HasMany
    {
        return $this->hasMany(DisposalManifest::class);
    }
}