<?php
    // C2T5 PRACTICE 3
    class BodyMassIndex
    {
        private float $score     = 0;
        private string $category = "";

        private float $height = 0;
        private float $weight = 0;

        public function __construct(float $height, float $weight)
        {
            $this->height    = $height;
            $this->weight = $weight;
        }

        public function calculate(): void
        {
            if ($this->height) {
                $heightInMeter  = $this->height / 100;
                $calculate      = $this->weight / ($heightInMeter ** 2);
                $roundBMIResult = round($calculate, 2);

                $this->score = $roundBMIResult;
            }

            $this->category = $this->category();
        }

        private function category(): string
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

        public function getScore(): float
        {
            return $this->score;
        }

        public function getCategory(): string
        {
            return $this->category;
        }
    }
