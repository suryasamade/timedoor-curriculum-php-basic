<?php
    function get_input(string $inputName, $default = null, string $method = "post")
    {
        if ($method === "get"){
            return $_GET[$inputName] ?? $default;
        }

        return $_POST[$inputName] ?? $default;
    }
?>