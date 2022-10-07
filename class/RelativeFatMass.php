<?php
    // C2T5 PRACTICE 3
    class RelativeFatMass
    {
        private array $categories = [
            "Extremely low level of fat",
            "Essential fat",
            "Athletes",
            "Fitness",
            "Average",
            "Obese",
        ];
        private float $score     = 0;
        private string $category = "";

        private string $gender = "m";

        private float $height    = 0;
        private float $waistSize = 0;

        public function __construct(float $height, float $waistSize, string $gender)
        {
            $this->height    = $height;
            $this->waistSize = $waistSize;
            $this->gender    = $gender;
        }

        public function calculate(): void
        {
            if ($this->waistSize) {
                $operandByGender = $this->gender === "m" ? 64 : 74;
                $calculate       = $operandByGender - (20 * $this->height / $this->waistSize);
                $roundRFMResult  = round($calculate, 2);

                $this->score = $roundRFMResult;
            }
            
            $this->category = $this->category();
        }

        private function maleCategory(): string 
        {
            if ($this->score < 2) return $this->categories[0];

            if ($this->score < 6) return $this->categories[1];

            if ($this->score < 14) return $this->categories[2];

            if ($this->score < 18) return $this->categories[3];

            if ($this->score < 24) return $this->categories[4];
            
            return $this->categories[5];
        }

        private function femaleCategory(): string 
        {
            if ($this->score < 10) return $this->categories[0];

            if ($this->score < 14) return $this->categories[1];

            if ($this->score < 21) return $this->categories[2];

            if ($this->score < 25) return $this->categories[3];

            if ($this->score < 32) return $this->categories[4];
            
            return $this->categories[5];
        }
        
        private function category(): string
        {
            if ($this->gender === 'm') return $this->maleCategory();

            return $this->femaleCategory();
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
