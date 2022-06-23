<?php

class Cat
{
    public $name;
    public $foot = 4;
    public $color;

    function __construct($name, $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    function describe()
    {
        return "The cat named by {$this->name} have {$this->foot} foot and {$this->color} color.";
    }
}

$garfield = new Cat("Garfield", "orange");
echo $garfield->describe();
// output: The cat named by Garfield have 4 foot and orange color.
