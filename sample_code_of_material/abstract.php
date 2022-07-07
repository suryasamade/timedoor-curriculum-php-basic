<?php

abstract class Abs
{
    abstract function myAbsMethod(string $name): void;
    function myRealMethod(string $name): void
    {
        echo "$name from real method.";
    }
}

class Real extends Abs
{
    function myAbsMethod(string $name): void
    {
        echo __CLASS__ . " class, $name";
    }
}

$realObj = new Real;
$realObj->myAbsMethod("Joe");
echo "<br>";
$realObj->myRealMethod("Alex");
