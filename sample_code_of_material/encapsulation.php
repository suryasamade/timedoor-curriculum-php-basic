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

// $encapObj = new EncapClass;
// $encapObj->setName('adi');

// if (is_null($encapObj->getName()))
//     echo "<h1>NULL</h1>";
// else
//     echo "<h1>" . $encapObj->getName() . "</h1>";


// NEW CLASS
class Animal {
    private $name, $foot, $isMammal;

    function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = gettype($name) == "string" ? $name : null;
    }

    // public function getFoot()
    // {
    //     return $this->foot;
    // }

    // public function setFoot($foot)
    // {
    //     $this->foot = gettype($foot) == "integer" ? $foot : null;
    // }
    
    // public function getIsMammal()
    // {
    //     return $this->isMammal;
    // }
    
    // public function setIsMammal($isMammal)
    // {
    //     $this->isMammal = gettype($isMammal) == "boolean" ? $isMammal : null;
    // }
}

class Dog extends Animal {

}

class Bird extends Animal {
    public function getRace() {
        return $this->race;
    }

    public function setRace($race) {
        $this->race = gettype($race) == "string" ? $race : "unkown";
    }
}

  $woody = new Bird;
  $woody->setName("Woody Woodpecker");
  $woody->setRace("Pileated woodpecker");
  // output: "Woody Woodpecker"
  echo $woody->getName();
  // output: "Pileated woodpecker"
  echo $woody->getRace();

// instance Animal class to dog object
$dog = new Animal;
$dog->setIsMammal(1);
var_dump($dog->getIsMammal());