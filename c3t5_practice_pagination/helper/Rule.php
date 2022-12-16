<?php
    class Rule
    {
        public function isValid(mixed $value): bool 
        {
            return false;
        }

        public function getMessage(string $attribute): string
        {
            return "";
        }
    }
?>