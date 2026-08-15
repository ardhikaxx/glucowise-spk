<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\TrainingData;
use App\Models\TrainingAttribute;

class TrainingDataSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Populate Training Attributes
        $attributes = [
            ['name' => 'age_group', 'label' => 'Usia', 'values' => ['<30', '30-45', '46-60', '>60']],
            ['name' => 'gender', 'label' => 'Jenis Kelamin', 'values' => ['Laki-laki', 'Perempuan']],
            ['name' => 'bmi_category', 'label' => 'BMI', 'values' => ['Kurus', 'Normal', 'Overweight', 'Obesitas']],
            ['name' => 'family_history', 'label' => 'Riwayat Keluarga', 'values' => ['Ya', 'Tidak']],
            ['name' => 'physical_activity', 'label' => 'Aktivitas Fisik', 'values' => ['Rendah', 'Sedang', 'Tinggi']],
            ['name' => 'smoking_habit', 'label' => 'Merokok', 'values' => ['Ya', 'Tidak']],
            ['name' => 'blood_pressure', 'label' => 'Tekanan Darah', 'values' => ['Normal', 'Prahipertensi', 'Hipertensi']],
            ['name' => 'waist_circumference', 'label' => 'Lingkar Perut', 'values' => ['Normal', 'Beresiko']],
            ['name' => 'sweet_food_consumption', 'label' => 'Makanan Manis', 'values' => ['Jarang', 'Sering', 'Sangat Sering']],
            ['name' => 'sweet_drink_consumption', 'label' => 'Minuman Manis', 'values' => ['Jarang', 'Sering', 'Sangat Sering']],
            ['name' => 'vegetable_fruit_consumption', 'label' => 'Sayur & Buah', 'values' => ['Kurang', 'Cukup']],
            ['name' => 'hypertension_history', 'label' => 'Riwayat Hipertensi', 'values' => ['Ya', 'Tidak']],
            ['name' => 'cholesterol_level', 'label' => 'Kolesterol', 'values' => ['Normal', 'Tinggi']],
            ['name' => 'sleep_quality', 'label' => 'Kualitas Tidur', 'values' => ['Buruk', 'Baik']],
            ['name' => 'stress_level', 'label' => 'Tingkat Stres', 'values' => ['Rendah', 'Sedang', 'Tinggi']],
            ['name' => 'frequent_thirst', 'label' => 'Sering Haus', 'values' => ['Ya', 'Tidak']],
            ['name' => 'frequent_urination', 'label' => 'Sering Buang Air Kecil', 'values' => ['Ya', 'Tidak']],
            ['name' => 'frequent_hunger', 'label' => 'Cepat Lapar', 'values' => ['Ya', 'Tidak']],
            ['name' => 'unexplained_weight_loss', 'label' => 'Berat Badan Turun', 'values' => ['Ya', 'Tidak']],
            ['name' => 'tingling_sensation', 'label' => 'Kesemutan', 'values' => ['Ya', 'Tidak']],
            ['name' => 'blurred_vision', 'label' => 'Penglihatan Kabur', 'values' => ['Ya', 'Tidak']],
            ['name' => 'delayed_wound_healing', 'label' => 'Luka Sulit Sembuh', 'values' => ['Ya', 'Tidak']],
        ];

        foreach ($attributes as $attr) {
            TrainingAttribute::create([
                'name' => $attr['name'],
                'label' => $attr['label'],
                'possible_values' => json_encode($attr['values']),
            ]);
        }

        // 2. Generate 1000 Realistic Data
        $data = [];
        $total = 1000;
        
        for ($i = 0; $i < $total; $i++) {
            // Balance roughly 50-50
            $isHighRisk = ($i % 2 == 0); 

            $data[] = [
                'age_group' => $isHighRisk ? $this->weightedRandom(['<30'=>5, '30-45'=>25, '46-60'=>45, '>60'=>25]) : $this->weightedRandom(['<30'=>40, '30-45'=>40, '46-60'=>15, '>60'=>5]),
                'gender' => $this->weightedRandom(['Laki-laki'=>50, 'Perempuan'=>50]),
                'bmi_category' => $isHighRisk ? $this->weightedRandom(['Kurus'=>5, 'Normal'=>15, 'Overweight'=>40, 'Obesitas'=>40]) : $this->weightedRandom(['Kurus'=>15, 'Normal'=>60, 'Overweight'=>20, 'Obesitas'=>5]),
                'family_history' => $isHighRisk ? $this->weightedRandom(['Ya'=>70, 'Tidak'=>30]) : $this->weightedRandom(['Ya'=>20, 'Tidak'=>80]),
                'physical_activity' => $isHighRisk ? $this->weightedRandom(['Rendah'=>60, 'Sedang'=>30, 'Tinggi'=>10]) : $this->weightedRandom(['Rendah'=>10, 'Sedang'=>50, 'Tinggi'=>40]),
                'smoking_habit' => $isHighRisk ? $this->weightedRandom(['Ya'=>40, 'Tidak'=>60]) : $this->weightedRandom(['Ya'=>20, 'Tidak'=>80]),
                'blood_pressure' => $isHighRisk ? $this->weightedRandom(['Normal'=>20, 'Prahipertensi'=>40, 'Hipertensi'=>40]) : $this->weightedRandom(['Normal'=>70, 'Prahipertensi'=>25, 'Hipertensi'=>5]),
                'waist_circumference' => $isHighRisk ? $this->weightedRandom(['Normal'=>30, 'Beresiko'=>70]) : $this->weightedRandom(['Normal'=>85, 'Beresiko'=>15]),
                'sweet_food_consumption' => $isHighRisk ? $this->weightedRandom(['Jarang'=>10, 'Sering'=>50, 'Sangat Sering'=>40]) : $this->weightedRandom(['Jarang'=>60, 'Sering'=>35, 'Sangat Sering'=>5]),
                'sweet_drink_consumption' => $isHighRisk ? $this->weightedRandom(['Jarang'=>10, 'Sering'=>50, 'Sangat Sering'=>40]) : $this->weightedRandom(['Jarang'=>60, 'Sering'=>35, 'Sangat Sering'=>5]),
                'vegetable_fruit_consumption' => $isHighRisk ? $this->weightedRandom(['Kurang'=>70, 'Cukup'=>30]) : $this->weightedRandom(['Kurang'=>20, 'Cukup'=>80]),
                'hypertension_history' => $isHighRisk ? $this->weightedRandom(['Ya'=>50, 'Tidak'=>50]) : $this->weightedRandom(['Ya'=>10, 'Tidak'=>90]),
                'cholesterol_level' => $isHighRisk ? $this->weightedRandom(['Normal'=>40, 'Tinggi'=>60]) : $this->weightedRandom(['Normal'=>85, 'Tinggi'=>15]),
                'sleep_quality' => $isHighRisk ? $this->weightedRandom(['Buruk'=>60, 'Baik'=>40]) : $this->weightedRandom(['Buruk'=>20, 'Baik'=>80]),
                'stress_level' => $isHighRisk ? $this->weightedRandom(['Rendah'=>20, 'Sedang'=>40, 'Tinggi'=>40]) : $this->weightedRandom(['Rendah'=>60, 'Sedang'=>30, 'Tinggi'=>10]),
                'frequent_thirst' => $isHighRisk ? $this->weightedRandom(['Ya'=>60, 'Tidak'=>40]) : $this->weightedRandom(['Ya'=>10, 'Tidak'=>90]),
                'frequent_urination' => $isHighRisk ? $this->weightedRandom(['Ya'=>55, 'Tidak'=>45]) : $this->weightedRandom(['Ya'=>10, 'Tidak'=>90]),
                'frequent_hunger' => $isHighRisk ? $this->weightedRandom(['Ya'=>50, 'Tidak'=>50]) : $this->weightedRandom(['Ya'=>15, 'Tidak'=>85]),
                'unexplained_weight_loss' => $isHighRisk ? $this->weightedRandom(['Ya'=>40, 'Tidak'=>60]) : $this->weightedRandom(['Ya'=>5, 'Tidak'=>95]),
                'tingling_sensation' => $isHighRisk ? $this->weightedRandom(['Ya'=>45, 'Tidak'=>55]) : $this->weightedRandom(['Ya'=>5, 'Tidak'=>95]),
                'blurred_vision' => $isHighRisk ? $this->weightedRandom(['Ya'=>30, 'Tidak'=>70]) : $this->weightedRandom(['Ya'=>2, 'Tidak'=>98]),
                'delayed_wound_healing' => $isHighRisk ? $this->weightedRandom(['Ya'=>35, 'Tidak'=>65]) : $this->weightedRandom(['Ya'=>2, 'Tidak'=>98]),
                'classification_result' => $isHighRisk ? 'Risiko Tinggi' : 'Risiko Rendah',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert in chunks to avoid memory issues
        $chunks = array_chunk($data, 200);
        foreach ($chunks as $chunk) {
            TrainingData::insert($chunk);
        }
    }

    private function weightedRandom($weights)
    {
        $rand = mt_rand(1, (int) array_sum($weights));
        foreach ($weights as $key => $value) {
            $rand -= $value;
            if ($rand <= 0) {
                return $key;
            }
        }
        return array_key_first($weights);
    }
}
