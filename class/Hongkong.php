<?php

require_once "Person.php";

class Hongkong extends Person
{
    // melakukan overridding method categoryBMI()
    public function categoryBMI($bmiScore)
    {
        $categories = ["Underweight (Unhealthy)", "Normal (Healthy)", "Overweight I (At risk)", "Overweight II (Moderately obese)", "Overweight III (Severely obese)"];

        if ($bmiScore < 18.5) {
            $category = $categories[0];
        } elseif ($bmiScore >= 18.5 && $bmiScore < 23.0) {
            $category = $categories[1];
        } elseif ($bmiScore >= 23.0 && $bmiScore < 25.0) {
            $category = $categories[2];
        } elseif ($bmiScore >= 25.0 && $bmiScore < 30.0) {
            $category = $categories[3];
        } else {
            $category = $categories[4];
        }

        return $category;
    }
}
