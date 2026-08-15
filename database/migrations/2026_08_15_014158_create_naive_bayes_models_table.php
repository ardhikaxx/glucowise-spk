<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('naive_bayes_models', function (Blueprint $table) {
            $table->id();
            $table->string('class_name'); // e.g. Risiko Tinggi
            $table->decimal('prior_probability', 8, 4);
            $table->json('likelihoods'); // JSON of attribute => [value => prob]
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('naive_bayes_models');
    }
};
