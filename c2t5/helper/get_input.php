<?php
    function get_input(string $inputName, $default = null)
    {
        return $_GET[$inputName] ?? $default;
    }
?>