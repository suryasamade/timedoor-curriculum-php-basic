<?php
    class Validation
    {
        protected array $errors = [];

        public function makeRule(array $attributes, array $rules)
        {
            foreach ($rules as $attribute => $rules) {
                foreach ($rules as $rule) {
                    if (! $rule->isValid($attributes[$attribute]) ?? null) {
                        $this->errors[$attribute][] = $rule->getMessage($attribute);
                    }
                }
            }
        }

        public function isFails(): bool
        {
            return count($this->errors) > 0;
        }

        public function getErrors(): array
        {
            return $this->errors;
        }
    }
?>