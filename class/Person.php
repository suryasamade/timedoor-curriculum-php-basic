<?php
class Person
{
    protected $name,
        $age,
        $gender,
        $height,
        $weight,
        $waistCircumference;

    public function __construct(
        $name,
        $age,
        $gender,
        $height,
        $weight,
        $waistCircumference
    ) {
        $this->name     = $name;
        $this->age      = $age;
        $this->gender   = $gender;

        if ($height == "null" || $weight == "null" || $waistCircumference == "null") {
            $height = 1;
            $weight = 1;
            $waistCircumference = 1;
        }
        
        $this->height   = $height;
        $this->weight   = $weight;
        $this->waistCircumference = $waistCircumference;
    }
}
