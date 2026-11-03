<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transporter extends Model
{
    protected $fillable = [
        'name',
        'license_number',
        'hazard_class',
        'license_expires_at',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'license_expires_at' => 'date',
            'is_active' => 'boolean',
        ];
    }

    public function disposalManifests(): HasMany
    {
        return $this->hasMany(DisposalManifest::class);
    }
}