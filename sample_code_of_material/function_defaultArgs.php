<?php

function teenagers($name, $age = 13)
{
    echo "$name is a $age years old teenager that being active.\n";
}

// teenagers("Nuke", 17);
// teenagers("Lisa", 14);
// teenagers("Samuel");

/* 
output:
Nuke is a 17 years old teenager that being active.
Lisa is a 14 years old teenager that being active.
Samuel is a 13 years old teenager that being active.
*/

function multiplyTwoNumber($a = 1, $b)
{
    $result = $a * $b;
    return $result;
}

$result1 = multiplyTwoNumber(5);
