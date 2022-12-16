<?php
    class Rule
    {
        public function isValid($value): bool 
        {
            return false;
        }

        public function getMessage(string $attribute): string
        {
            return "";
        }
    }
?>