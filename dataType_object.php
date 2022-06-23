<?php
class Animal
{
    public $name;
    public $feet;

    public function __construct($name, $feet)
    {
        $this->name = $name;
        $this->feet = $feet;
    }

    public function description()
    {
        return "Hei " . $this->name . ", you have " . $this->feet . " feet.";
    }
}

$cat = new Animal("Meow", 4);
echo $cat->description();

$obj = (object) array('1' => 'foo');
var_dump(isset($obj->{'1'})); // outputs 'bool(true)' as of PHP 7.2.0; 'bool(false)' previously
var_dump(key($obj)); // outputs 'string(1) "1"' as of PHP 7.2.0; 'int(1)' previously
