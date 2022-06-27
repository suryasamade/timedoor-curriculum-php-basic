<?php
class Person
{
    var $name;
    var $age;
    var $gender;
    var $height;
    var $weight;
    var $waistCircumference;
    var $standardMeasurement = "WHO";

    public function __construct($name, $age, $height, $weight, $waistCircumference, $gender = "M")
    {
        $this->name                 = $name;
        $this->age                  = $age;
        $this->gender               = $gender;
        $this->height               = $height;
        $this->weight               = $weight;
        $this->waistCircumference   = $waistCircumference;

        $className = get_class($this);
        if ($className != "Person") {
            $this->standardMeasurement = $className;
        }
    }

    public function welcomeGreeting()
    {
        // menggunakan kurung-kurawal agar lebih mudah dibaca
        return "Hi, {$this->name}! Let's check your body health results.";
    }

    public function countBMI()
    {
        // convert $height in centimeter to meter unit
        $height = $this->height / 100;
        $bmi    = number_format($this->weight / ($height ** 2), 2);

        return $bmi;
    }

    public function categoryBMI($bmiScore)
    {
        $categories = ["Underweight (Severe thinness)", "Underweight (Moderate thinness)", "Underweight (Mild thinness)", "Normal", "Overweight (Pre-obese)", "Obese (Class I)", "Obese (Class II)", "Obese (Class III)"];

        if ($bmiScore < 16.0) {
            $category = $categories[0];
        } elseif ($bmiScore >= 16.0 && $bmiScore <= 16.9) {
            $category = $categories[1];
        } elseif ($bmiScore >= 17.0 && $bmiScore <= 18.4) {
            $category = $categories[2];
        } elseif ($bmiScore >= 18.5 && $bmiScore <= 24.9) {
            $category = $categories[3];
        } elseif ($bmiScore >= 25.0 && $bmiScore <= 29.9) {
            $category = $categories[4];
        } elseif ($bmiScore >= 30.0 && $bmiScore <= 34.9) {
            $category = $categories[5];
        } elseif ($bmiScore >= 35.0 && $bmiScore <= 39.9) {
            $category = $categories[6];
        } else {
            $category = $categories[7];
        }

        return $category;
    }

    public function countRFM()
    {
        $genderOperandValue  = $this->gender == "M" ? 64 : 74;
        $rfm            = number_format($genderOperandValue - (20 * $this->height / $this->waistCircumference), 2);

        return $rfm;
    }

    public function categoryRFM($rfmScore)
    {
        $categories = ["Extremely low level of fat", "Essential fat", "Athletes", "Fitness", "Average", "Obese"];

        switch ($this->gender) {
            case 'M':
                if ($rfmScore < 2) {
                    $category = $categories[0];
                } elseif ($rfmScore >= 2 && $rfmScore < 6) {
                    $category = $categories[1];
                } elseif ($rfmScore >= 6 && $rfmScore < 14) {
                    $category = $categories[2];
                } elseif ($rfmScore >= 14 && $rfmScore < 18) {
                    $category = $categories[3];
                } elseif ($rfmScore >= 18 && $rfmScore < 24) {
                    $category = $categories[4];
                } else {
                    $category = $categories[5];
                }
                break;
            default:
                if ($rfmScore < 10) {
                    $category = $categories[0];
                } elseif ($rfmScore >= 10 && $rfmScore < 14) {
                    $category = $categories[1];
                } elseif ($rfmScore >= 14 && $rfmScore < 21) {
                    $category = $categories[2];
                } elseif ($rfmScore >= 21 && $rfmScore < 25) {
                    $category = $categories[3];
                } elseif ($rfmScore >= 25 && $rfmScore < 32) {
                    $category = $categories[4];
                } else {
                    $category = $categories[5];
                }
                break;
        }

        return $category;
    }
}
