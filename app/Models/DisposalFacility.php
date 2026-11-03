<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DisposalFacility extends Model
{
    protected $fillable = [
        'name',
        'permit_number',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function disposalManifests(): HasMany
    {
        return $this->hasMany(DisposalManifest::class, 'disposal_facility_id');
    }
}
