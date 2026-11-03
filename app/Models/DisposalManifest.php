<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DisposalManifest extends Model
{
    protected $table = 'disposal_manifests';

    protected $fillable = [
        'generator_id',
        'waste_category_id',
        'transporter_id',
        'disposal_facility_id',
        'container_type',
        'weight_kg',
        'pickup_date',
        'processing_fee',
        'compliance_status',
    ];

    protected $casts = [
        'weight_kg' => 'decimal:3',
        'pickup_date' => 'date',
        'processing_fee' => 'decimal:2',
    ];
}
