<?php
// C2T5 PRACTICE 3
require_once "Person.php";

class BodyMassIndex extends Person
{
    private $bmiScore, $bmiCategory;

    public function countBMI()
    {
        // convert $height in centimeter to meter unit
        $height         = $this->height / 100;
        $this->bmiScore = number_format($this->weight / ($height ** 2), 2);
        $this->setBMICategory($this->bmiScore);
    }

    private function setBMICategory($bmiScore)
    {
        if ($bmiScore < 16.0) {
            $this->bmiCategory = "Underweight (Severe thinness)";
        } elseif ($bmiScore >= 16.0 && $bmiScore <= 16.9) {
            $this->bmiCategory = "Underweight (Moderate thinness)";
        } elseif ($bmiScore >= 17.0 && $bmiScore <= 18.4) {
            $this->bmiCategory = "Underweight (Mild thinness)";
        } elseif ($bmiScore >= 18.5 && $bmiScore <= 24.9) {
            $this->bmiCategory = "Normal";
        } elseif ($bmiScore >= 25.0 && $bmiScore <= 29.9) {
            $this->bmiCategory = "Overweight (Pre-obese)";
        } elseif ($bmiScore >= 30.0 && $bmiScore <= 34.9) {
            $this->bmiCategory = "Obese (Class I)";
        } elseif ($bmiScore >= 35.0 && $bmiScore <= 39.9) {
            $this->bmiCategory = "Obese (Class II)";
        } else {
            $this->bmiCategory = "Obese (Class III)";
        }
    }

    public function getBMIScore()
    {
        return $this->bmiScore;
    }

    public function getBMICategory()
    {
        return $this->bmiCategory;
    }
}
