<?php
    class MassIndex
    {
        protected float $score     = 0;
        protected string $category = "";

        // protected function calculate(): void 
        // {
        // }
            
        public function getScore(): float
        {
            // $this->calculate();

            return $this->score;
        }

        public function getCategory(): string
        {
            return $this->category;
        }
    }
?>