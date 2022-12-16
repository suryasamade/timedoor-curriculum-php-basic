<?php
    class Person
    {
        private ?int $id       = null;
        private string $name   = "";
        private int $age       = 0;
        private string $gender = "m";

        private float $height    = 0;
        private float $weight    = 0;
        private float $waistSize = 0;

        private ?float $bmiScore     = null;
        private ?string $bmiCategory = null;
        private ?float $rfmScore     = null;
        private ?string $rfmCategory = null;

        public function __construct(string $name = "", int $age = 0, string $gender = "m") {
            $this->setName($name);
            $this->setAge($age);
            $this->setGender($gender);
        }

        public function bodyFact(float $height, float $weight, float $waistSize): void
        {
            $this->setHeight($height);
            $this->setWeight($weight);
            $this->setWaistSize($waistSize);
        }

        public function massIndex(float $bmiScore, string $bmiCategory, float $rfmScore, string $rfmCategory): void
        {
            $this->setBMIScore($bmiScore);
            $this->setBMICategory($bmiCategory);
            $this->setRFMScore($rfmScore);
            $this->setRFMCategory($rfmCategory);
        }

        public function setId(int $id): void
        {
            $this->id = $id;
        }

        public function getId(): ?int
        {
            return $this->id;
        }

        private function setName(string $name): void
        {
            $this->name = $name ?: "-";
        }

        public function getName(): string
        {
            return $this->name;
        }

        private function setAge(int $age): void
        {
            $this->age = ($age < 0) ? 0 : $age;
        }

        public function getAge(): int
        {
            return $this->age;
        }

        private function setGender(string $gender): void
        {
            // $isNotGender = $gender !== "m" && $gender !== "f";
            $genders = ['m', 'f'];

            $this->gender = in_array($gender, $genders) ? $gender : "m";
        }
        
        public function getGender(): string
        {
            return $this->gender === "m" ? "Male" : "Female";
        }

        private function setHeight(int $height): void
        {
            $this->height = $height < 0 ? 0 : $height;
        }

        public function getHeight(): int
        {
            return $this->height;
        }

        private function setWeight(float $weight): void
        {
            $this->weight = $weight < 0 ? 0 : $weight;
        }

        public function getWeight(): float
        {
            return $this->weight;
        }

        private function setWaistSize(int $waistSize): void
        {
            $this->waistSize = $waistSize < 0 ? 0 : $waistSize;
        }
        
        public function getWaistSize(): int
        {
            return $this->waistSize;
        }

        private function setBMIScore(float $bmiScore): void
        {
            $this->bmiScore = ($bmiScore < 0) ? 0 : $bmiScore;
        }

        public function getBMIScore(): ?float
        {
            return $this->bmiScore;
        }

        private function setBMICategory(string $bmiCategory): void
        {
            $this->bmiCategory = ($this->bmiScore === 0) ? "None" : $bmiCategory;
        }

        public function getBMICategory(): ?string
        {
            return $this->bmiCategory;
        }

        private function setRFMScore(float $rfmScore): void
        {
            $this->rfmScore = ($rfmScore < 0) ? 0 : $rfmScore;
        }

        public function getRFMScore(): ?float
        {
            return $this->rfmScore;
        }

        private function setRFMCategory(string $rfmCategory): void
        {
            $this->rfmCategory = ($this->rfmScore === 0) ? "None" : $rfmCategory;
        }

        public function getRFMCategory(): ?string
        {
            return $this->rfmCategory;
        }
    }
?>