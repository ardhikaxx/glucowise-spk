<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('training_data', function (Blueprint $table) {
            $table->id();
            $table->string('age_group');
            $table->string('gender');
            $table->string('bmi_category');
            $table->string('family_history');
            $table->string('physical_activity');
            $table->string('smoking_habit');
            $table->string('blood_pressure');
            $table->string('waist_circumference');
            $table->string('sweet_food_consumption');
            $table->string('sweet_drink_consumption');
            $table->string('vegetable_fruit_consumption');
            $table->string('hypertension_history');
            $table->string('cholesterol_level');
            $table->string('sleep_quality');
            $table->string('stress_level');
            $table->string('frequent_thirst');
            $table->string('frequent_urination');
            $table->string('frequent_hunger');
            $table->string('unexplained_weight_loss');
            $table->string('tingling_sensation');
            $table->string('blurred_vision');
            $table->string('delayed_wound_healing');
            
            $table->string('classification_result'); // Risiko Rendah / Risiko Tinggi
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('training_data');
    }
};
