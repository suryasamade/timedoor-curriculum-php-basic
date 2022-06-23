<?php

class AnimalClass
{
    private $name;
    protected $color;
    public $foot;
    private $val = "Hq";
}

$cat = new AnimalClass();
$cat->foot = 4;
echo $cat->val;
echo "Cat foot: " . $cat->foot . "\n";
$cat->name = "Cat"; // output: Fatal error
echo "Cat name: " . $cat->name . "\n";
$cat->color = "Orange"; // output: Fatal error
echo "Cat color: " . $cat->color . "\n";
