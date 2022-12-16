<?php
    // C2T5 PRACTICE 3
    require_once "MassIndex.php";

    class RelativeFatMass extends MassIndex
    {
        private array $categories = [
            "Extremely low level of fat",
            "Essential fat",
            "Athletes",
            "Fitness",
            "Average",
            "Obese",
        ];

        private string $gender = "m";

        private float $height    = 0;
        private float $waistSize = 0;

        private function setGender(string $gender): void
        {
            $genders = ['m', 'f'];
            
            $this->gender = in_array($gender, $genders) ? $gender : "m";
        }

        private function setHeight(float $height): void
        {
            $this->height = $height < 0 ? 0 : $height;
        }

        private function setWaistSize(float $waistSize): void
        {
            $this->waistSize = $waistSize < 0 ? 0 : $waistSize;
        }

        public function calculate(float $height, float $waistSize, string $gender): void
        {
            $this->setGender($gender);
            $this->setHeight($height);
            $this->setWaistSize($waistSize);

            if ($this->waistSize) {
                $result = $this->baseIndex() - 20 * ($this->height / $this->waistSize);

                $this->score = round($result, 2);
            }
            
            $this->category = $this->isGenderMale() ? $this->maleCategory() : $this->femaleCategory();
        }

        private function isGenderMale(): bool
        {
            return $this->gender === "m";
        }

        private function baseIndex(): int
        {
            return $this->isGenderMale() ? 64 : 76;
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
    }
?>