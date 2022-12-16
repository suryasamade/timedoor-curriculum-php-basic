<?php
    require_once "Rule.php";

    class NumberRule extends Rule
    {
        private int $min = 0;
        private int $max = 0;
        private string $message = "";

        public function __construct(int $min = 0, int $max = 0, string $message = "")
        {
            $this->min = $min;
            $this->max = $max;
            $this->message = $message;
        }

        public function isValid($value): bool
        {
            if (is_bool($value)) {
                return false;
            }

            if (is_array($value)) {
                return false;
            }

            if (((int) $value) === 0) {
                return false;
            }

            if ($value < $this->min) {
                return false;
            }

            if ($value > $this->max) {
                return false;
            }

            return true;
        }

        public function getMessage(string $attribute): string
        {
            return $this->message ?: "{$attribute} must be filled with number on range {$this->min} to {$this->max}";
        }
    }
?>