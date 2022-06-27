<?php

require_once "Person.php";

class Japan extends Person
{
    // melakukan overridding method categoryBMI()
    public function categoryBMI($bmiScore)
    {
        $categories = ["Underweight (Thin)", "Normal", "Obesity (Class 1)", "Obesity (Class 2)", "Obesity (Class 3)", "Obesity (Class 4)"];

        if ($bmiScore < 18.5) {
            $category = $categories[0];
        } elseif ($bmiScore >= 18.5 && $bmiScore < 25.0) {
            $category = $categories[1];
        } elseif ($bmiScore >= 25.0 && $bmiScore < 30.0) {
            $category = $categories[2];
        } elseif ($bmiScore >= 30.0 && $bmiScore < 35.0) {
            $category = $categories[3];
        } elseif ($bmiScore >= 35.0 && $bmiScore < 40.0) {
            $category = $categories[4];
        } else {
            $category = $categories[5];
        }

        return $category;
    }
}
