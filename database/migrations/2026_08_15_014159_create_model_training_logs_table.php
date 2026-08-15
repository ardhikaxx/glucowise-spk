<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('model_training_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete(); // admin who triggered
            $table->integer('total_data');
            $table->integer('training_data_count');
            $table->integer('testing_data_count');
            $table->decimal('accuracy', 5, 2);
            $table->decimal('precision', 5, 2);
            $table->decimal('recall', 5, 2);
            $table->decimal('f1_score', 5, 2);
            $table->json('confusion_matrix'); // TP, TN, FP, FN
            $table->string('status')->default('completed');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('model_training_logs');
    }
};
