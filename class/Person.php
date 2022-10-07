<?php
    class Person
    {
        private string $name   = "";
        private int $age       = 0;
        private string $gender = "m";

        private float $height    = 0;
        private float $weight    = 0;
        private float $waistSize = 0;

        public function __construct(string $name, int $age, string $gender) {
            if (!$name) $name = "-";

            $this->name   = $name;
            $this->age    = $age;
            $this->gender = $gender;
        }

        public function bodyFact(float $height, float $weight, float $waistSize): void
        {
            $this->height    = $height;
            $this->weight    = $weight;
            $this->waistSize = $waistSize;
        }

        public function getName(): string
        {
            return $this->name;
        }

        public function getAge(): int
        {
            return $this->age;
        }

        public function getGender(): string
        {
            return $this->gender;
        }

        public function getHeight(): string
        {
            return $this->height;
        }

        public function getWeight(): string
        {
            return $this->weight;
        }
        
        public function getWaistSize(): string
        {
            return $this->waistSize;
        }
    }
