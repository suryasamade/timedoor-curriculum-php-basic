<?php

require_once "Person.php";

class Singapore extends Person
{
    // melakukan overridding method categoryBMI()
    public function categoryBMI($bmiScore)
    {
        $categories = ["Underweight", "Normal", "Mild to moderate overweight", "Very overweight to obese"];

        if ($bmiScore < 18.5) {
            $category = $categories[0];
        } elseif ($bmiScore >= 18.5 && $bmiScore < 23.0) {
            $category = $categories[1];
        } elseif ($bmiScore >= 23.0 && $bmiScore < 27.5) {
            $category = $categories[2];
        } else {
            $category = $categories[3];
        }

        return $category;
    }
}
