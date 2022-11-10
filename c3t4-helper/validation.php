<?php
// MATERI YANG BELUM DIAJARKAN (DI LUAR RENCANA), TAPI DIGUNAKAN PADA PRACTICE INI
// - $_REQUEST
// - TRIM()
// - TYPE CASTING


    function validation(array $listInput): array {
        $request = $_REQUEST;
        $validationResults = [];

        foreach ($listInput as $input => $listRule) {
            $inputError = [];

            foreach ($listRule as $rule) {

                if ($rule === "required") {
                    if (!isset($request[$input]) || is_required($request[$input]) === false) {
                        array_push($inputError, "Fill the {$input} input");
                        break;
                    }
                }
                
                if ($rule === "numeric") {
                    if (is_numeric($request[$input]) === false) {
                        array_push($inputError, "Input {$input} is not on numeric value");
                    }
                }
                
                if ($rule === "gender") {
                    if (is_gender_valid($request[$input]) === false) {
                        array_push($inputError, "Input {$input} is not on right value");
                    }
                }
                
            }

            $validationResults = !$inputError ? $validationResults : array_merge($validationResults, [$input => $inputError]);

        }

        return $validationResults;
    }

    function is_required(mixed $value): bool {
        return (bool) trim($value);
    }

    function is_gender_valid(string $value): bool {
        return $value === "m" || $value === "f";
    }

    function error_message(array $errors, string $input): ?string {
        if (!($_REQUEST && isset($errors[$input]))) return null;
        
        return $errors[$input][0];
    }

    function is_valid(array $rules): bool
    {
        if (validation($rules)) return false;

        return true;
    }