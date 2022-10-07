<?php
// MATERI YANG BELUM DIAJARKAN (DI LUAR RENCANA), TAPI DIGUNAKAN PADA PRACTICE INI
// - $_REQUEST
// - TRIM()
// - TYPE CASTING


    function validation(array $listInput) {
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
                    if (is_gender($request[$input]) === false) {
                        array_push($inputError, "Input {$input} is not on right value");
                    }
                }
                
            }

            $validationResults = !$inputError ? $validationResults : array_merge($validationResults, [$input => $inputError]);

        }

        return $validationResults;

    }

    function is_required($value) {
        return (bool) trim($value);
    }

    function is_gender($value) {
        return $value === "m" || $value === "f";
    }

    function error_message(array $errors, string $input) {
        if ($_REQUEST && isset($errors[$input])) {
            return $errors[$input][0];
        }
    }