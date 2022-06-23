<?php

interface InterfaceA
{
    function funA1(): string;
    function funA2(int $num): int;
}

interface InterfaceA1
{
    function funA11();
}

interface InterfaceB extends InterfaceA, InterfaceA1
{
    function funB1(bool $param): float;
}

interface InterfaceB1
{
    function funB11();
}

class InterfaceChild implements InterfaceB, InterfaceB1
{
    function funA1(): string
    {
        return "funA1";
    }

    function funA2(int $num): int
    {
        return $num * 2;
    }

    function funB1(bool $param): float
    {
        if ($param) {
            return 3.33;
        }

        return 3.14;
    }

    function funA11()
    {
    }

    function funB11()
    {
    }
}

$interfaceObj = new InterfaceChild;
echo $interfaceObj->funA1() . "<br>";
echo $interfaceObj->funA2(3) . "<br>";
echo $interfaceObj->funB1(true);
