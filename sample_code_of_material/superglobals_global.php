<?php

function test()
{
    $global = "this is variable inside test function";

    echo "global = " . $GLOBALS['global'];
    echo "<br>";
    echo "global = " . $global;
}

$global = "this is global variable value";
test();
