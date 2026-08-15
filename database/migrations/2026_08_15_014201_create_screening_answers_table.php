<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('screening_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('screening_id')->constrained()->cascadeOnDelete();
            $table->string('attribute'); // e.g. age_group
            $table->string('answer_value');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('screening_answers');
    }
};
