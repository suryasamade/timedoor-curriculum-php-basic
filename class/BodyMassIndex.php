<?php
    // C2T5 PRACTICE 3
    require_once "MassIndex.php";

    class BodyMassIndex extends MassIndex
    {
        private float $height = 0;
        private float $weight = 0;

        public function __construct(float $height, float $weight)
        {
            $this->height = $this->setHeight($height);
            $this->weight = $this->setWeight($weight);
        }

        private function setHeight(float $height): float
        {
            if ($height < 0) return 0;

            return $height;
        }

        private function setWeight(float $weight): float
        {
            if ($weight < 0) return 0;

            return $weight;
        }

        // TEMPATKAN METHOD calculate() DI MAASING" CLASS
        // DAN HAPUS PENGUNAAN CONSTRUCTOR
        protected function calculate(string $xx): void
        {
            if ($this->height) {
                $heightInMeter = $this->height / 100;
                $result        = $this->weight / ($heightInMeter ** 2);

                $this->score = round($result, 2);
            }

            $this->category = $this->determineCategory();
        }

        private function determineCategory(): string
        {
            if ($this->score >= 40) return "Obese (Class III)";

            if ($this->score >= 35) return "Obese (Class II)";

            if ($this->score >= 30) return "Obese (Class I)";

            if ($this->score >= 25) return "Overweight (Pre-obese)";

            if ($this->score >= 18.5) return "Normal";

            if ($this->score >= 17.0) return "Underweight (Mild thinness)";

            if ($this->score >= 16.0) return "Underweight (Moderate thinness)";

            return "Underweight (Severe thinness)";
        }
    }
