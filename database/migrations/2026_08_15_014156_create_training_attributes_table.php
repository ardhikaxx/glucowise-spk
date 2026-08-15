<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('training_attributes', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g. age_group, bmi_category, etc.
            $table->string('label'); // e.g. Usia, BMI, etc.
            $table->json('possible_values'); // JSON array of possible categorical values
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('training_attributes');
    }
};
