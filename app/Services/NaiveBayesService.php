<?php

namespace App\Services;

use App\Models\TrainingData;
use App\Models\TrainingAttribute;
use App\Models\NaiveBayesModel;
use App\Models\ModelTrainingLog;
use Illuminate\Support\Facades\DB;

class NaiveBayesService
{
    /**
     * Train the Naive Bayes model using current training data
     */
    public function trainModel($userId = null)
    {
        $totalData = TrainingData::count();
        if ($totalData === 0) return false;

        // Count per class
        $classCounts = TrainingData::select('classification_result', DB::raw('count(*) as total'))
            ->groupBy('classification_result')
            ->pluck('total', 'classification_result')
            ->toArray();

        // 1. Calculate Priors
        $priors = [];
        $classes = array_keys($classCounts);
        foreach ($classes as $c) {
            $priors[$c] = $classCounts[$c] / $totalData;
        }

        // Fetch all attributes
        $attributes = TrainingAttribute::where('is_active', true)->get();
        
        $likelihoods = [];
        foreach ($classes as $c) {
            $likelihoods[$c] = [];
            $classTotal = $classCounts[$c];

            foreach ($attributes as $attr) {
                $attrName = $attr->name;
                $possibleValues = json_decode($attr->possible_values, true);
                
                // Calculate frequency of each value in this class
                $valueCounts = TrainingData::where('classification_result', $c)
                    ->select($attrName, DB::raw('count(*) as total'))
                    ->groupBy($attrName)
                    ->pluck('total', $attrName)
                    ->toArray();

                $likelihoods[$c][$attrName] = [];
                foreach ($possibleValues as $val) {
                    // Laplace Smoothing (+1 to numerator, +count(possibleValues) to denominator)
                    $count = isset($valueCounts[$val]) ? $valueCounts[$val] : 0;
                    $smoothedProb = ($count + 1) / ($classTotal + count($possibleValues));
                    $likelihoods[$c][$attrName][$val] = $smoothedProb;
                }
            }
        }

        // Save to Database
        NaiveBayesModel::truncate(); // Clear old model
        
        DB::transaction(function () use ($classes, $priors, $likelihoods) {
            foreach ($classes as $c) {
                NaiveBayesModel::create([
                    'class_name' => $c,
                    'prior_probability' => $priors[$c],
                    'likelihoods' => json_encode($likelihoods[$c]),
                ]);
            }
        });

        // Here we can evaluate training accuracy
        $accuracyMetrics = $this->evaluateTrainingAccuracy();

        // Log the training
        ModelTrainingLog::create([
            'user_id' => $userId,
            'total_data' => $totalData,
            'training_data_count' => $totalData,
            'testing_data_count' => $totalData, // Since we evaluated on training set for now
            'accuracy' => $accuracyMetrics['accuracy'],
            'precision' => $accuracyMetrics['precision'],
            'recall' => $accuracyMetrics['recall'],
            'f1_score' => $accuracyMetrics['f1_score'],
            'confusion_matrix' => json_encode($accuracyMetrics['confusion_matrix']),
            'status' => 'completed',
        ]);

        return true;
    }

    /**
     * Predict risk based on user answers
     * $answers = ['age_group' => '<30', 'gender' => 'Laki-laki', ...]
     */
    public function predict(array $answers)
    {
        $models = NaiveBayesModel::all();
        if ($models->isEmpty()) {
            throw new \Exception("Model belum dilatih.");
        }

        $scores = [];
        $details = [];

        foreach ($models as $model) {
            $c = $model->class_name;
            $prior = (float) $model->prior_probability;
            
            $likelihoods = json_decode($model->likelihoods, true);
            
            $score = $prior;
            $details[$c] = [
                'prior' => $prior,
                'likelihoods' => []
            ];

            foreach ($answers as $attr => $val) {
                if (isset($likelihoods[$attr]) && isset($likelihoods[$attr][$val])) {
                    $prob = $likelihoods[$attr][$val];
                    $score *= $prob;
                    $details[$c]['likelihoods'][$attr] = $prob;
                }
            }
            $scores[$c] = $score;
        }

        // Normalize scores to percentages
        $totalScore = array_sum($scores);
        $percentages = [];
        foreach ($scores as $c => $s) {
            $percentages[$c] = $totalScore > 0 ? ($s / $totalScore) * 100 : 0;
        }

        // Sort to find the highest
        arsort($percentages);
        $predictedClass = array_key_first($percentages);
        
        return [
            'predicted_class' => $predictedClass,
            'risk_percentage' => $percentages['Risiko Tinggi'] ?? 0, // Specifically for High Risk
            'probabilities' => $percentages,
            'raw_scores' => $scores,
            'details' => $details
        ];
    }

    private function evaluateTrainingAccuracy()
    {
        $data = TrainingData::all();
        
        $TP = 0; $TN = 0; $FP = 0; $FN = 0;
        
        // Positive class = 'Risiko Tinggi'
        // Negative class = 'Risiko Rendah'

        foreach ($data as $row) {
            $answers = $row->only([
                'age_group', 'gender', 'bmi_category', 'family_history', 'physical_activity',
                'smoking_habit', 'blood_pressure', 'waist_circumference', 'sweet_food_consumption',
                'sweet_drink_consumption', 'vegetable_fruit_consumption', 'hypertension_history',
                'cholesterol_level', 'sleep_quality', 'stress_level', 'frequent_thirst',
                'frequent_urination', 'frequent_hunger', 'unexplained_weight_loss',
                'tingling_sensation', 'blurred_vision', 'delayed_wound_healing'
            ]);

            $prediction = $this->predict($answers);
            $predictedClass = $prediction['predicted_class'];
            $actualClass = $row->classification_result;

            if ($predictedClass == 'Risiko Tinggi' && $actualClass == 'Risiko Tinggi') $TP++;
            if ($predictedClass == 'Risiko Rendah' && $actualClass == 'Risiko Rendah') $TN++;
            if ($predictedClass == 'Risiko Tinggi' && $actualClass == 'Risiko Rendah') $FP++;
            if ($predictedClass == 'Risiko Rendah' && $actualClass == 'Risiko Tinggi') $FN++;
        }

        $accuracy = ($TP + $TN) / max(1, ($TP + $TN + $FP + $FN));
        $precision = $TP / max(1, ($TP + $FP));
        $recall = $TP / max(1, ($TP + $FN));
        $f1 = 2 * ($precision * $recall) / max(1, ($precision + $recall));

        return [
            'accuracy' => round($accuracy * 100, 2),
            'precision' => round($precision * 100, 2),
            'recall' => round($recall * 100, 2),
            'f1_score' => round($f1 * 100, 2),
            'confusion_matrix' => ['TP' => $TP, 'TN' => $TN, 'FP' => $FP, 'FN' => $FN]
        ];
    }
}
