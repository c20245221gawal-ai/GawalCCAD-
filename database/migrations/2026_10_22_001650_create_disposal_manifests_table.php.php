<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('disposal_manifests', function (Blueprint $table) {
            $table->id();

            $table->foreignId('generator_id')
                ->constrained('generators')
                ->restrictOnDelete();

            $table->foreignId('waste_category_id')
                ->constrained('waste_categories')
                ->restrictOnDelete();

            $table->foreignId('transporter_id')
                ->constrained('transporters')
                ->restrictOnDelete();

            $table->foreignId('disposal_facility_id')
                ->constrained('disposal_facilities')
                ->restrictOnDelete();

            $table->string('container_type', 100);
            $table->decimal('weight_kg', 12, 3);
            $table->date('pickup_date');
            $table->decimal('processing_fee', 14, 2);
            $table->string('compliance_status', 30)
                ->default('pending')
                ->index();

            $table->timestamps();

            $table->index(['pickup_date', 'compliance_status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('disposal_manifests');
    }
};