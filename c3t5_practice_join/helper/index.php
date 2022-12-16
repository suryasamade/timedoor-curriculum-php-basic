<?php

require_once "RequiredRule.php";
require_once "NumberRule.php";
require_once "Validation.php";

$attributes = [
    'title' => "null",
    'body' => "33",
];

$validation = new Validation();
$validation->makeRule(
    $attributes,
    [
        'title' => [
            new RequiredRule("Please add value to title attribute."),
        ],
        'body' => [
            new RequiredRule("Please add value to body attribute."),
            new NumberRule(14, 30, "The number is out of range."),
        ],
    ]
);

var_dump($validation->isFails());
echo "<br>";
var_dump($validation->getErrors());