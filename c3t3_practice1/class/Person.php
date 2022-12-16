<?php
    class Person
    {
        private string $name   = "";
        private int $age       = 0;
        private string $gender = "m";

        private float $height    = 0;
        private float $weight    = 0;
        private float $waistSize = 0;

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
    }
?>