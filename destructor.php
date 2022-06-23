<?php

class Fruit
{
    public $name;
    public $color;

    function __construct($name, $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    function hello()
    {
        echo "Hello";
    }

    function world()
    {
        echo "World!<br>";
    }

    function __destruct()
    {
        echo "The name of fruit is {$this->name} and it color is {$this->color}.";
    }
}

$apple = new Fruit("Apple", "red");
$apple->hello();
$apple->world();
/* output:
HelloWorld!
The name of fruit is Apple and it color is red. */