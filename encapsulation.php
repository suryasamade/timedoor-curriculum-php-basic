<?php

class EncapClass
{
    private ?string $nameProp = null;

    function setName(string $name): void
    {
        if (strlen($name) > 2 && strlen($name) <= 20)
            $this->nameProp = $name;
    }

    function getName(): ?string
    {
        return $this->nameProp;
    }
}

$encapObj = new EncapClass;
$encapObj->setName('adi');

if (is_null($encapObj->getName()))
    echo "<h1>NULL</h1>";
else
    echo "<h1>" . $encapObj->getName() . "</h1>";
