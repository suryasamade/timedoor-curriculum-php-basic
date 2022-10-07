<?php
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
                $this->bmiCategory = "1";
            }

            if ($bmiScore > 39.9) {
                $this->bmiCategory = "8";
            }
            
            if ($bmiScore >= 16.0 && $bmiScore <= 16.9) {
                $this->bmiCategory = "2";
            } elseif ($bmiScore >= 17.0 && $bmiScore <= 18.4) {
                $this->bmiCategory = "3";
            } elseif ($bmiScore >= 18.5 && $bmiScore <= 24.9) {
                $this->bmiCategory = "4";
            } elseif ($bmiScore >= 25.0 && $bmiScore <= 29.9) {
                $this->bmiCategory = "5";
            } elseif ($bmiScore >= 30.0 && $bmiScore <= 34.9) {
                $this->bmiCategory = "6";
            } else {
                $this->bmiCategory = "7";
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
