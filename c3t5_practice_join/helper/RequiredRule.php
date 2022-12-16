<?php
    require_once "Rule.php";

    class RequiredRule extends Rule
    {
        private string $message = "";

        public function __construct(string $message = "")
        {
            $this->message = $message;
        }

        public function isValid($value): bool
        {
            if (is_null($value)) {
                return false;
            }

            if (is_array($value)) {
                return count($value) > 0;
            }

            if (is_string($value)) {
                return $value !== "";
            }

            return true;
        }

        public function getMessage(string $attribute): string
        {
            return $this->message ?: "{$attribute} must be filled in";
        }
    }
?>