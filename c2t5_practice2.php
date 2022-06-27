<!-- SKENARIO -->
<!-- membuat/menambahkan method, menggunakan $this keyword untuk merujuk sebuah objek -->
<!-- concatenation types: '{$variable}' -->

<?php
class Person
{
    var $name;
    var $age;
    var $gender;
    var $height;
    var $weight;
    var $waistCircumference;
    var $bmiStatus;
    var $rfmStatus;

    public function setNameAgeGender($name, $age, $gender)
    {
        $this->name     = $name;
        $this->age      = $age;
        $this->gender   = $gender;
    }

    public function welcomeGreeting()
    {
        // menggunakan kurung-kurawal agar lebih mudah dibaca
        return "Hi, {$this->name}! Let's check your body health results.";
    }

    public function countBMI($height, $weight)
    {
        // convert $height in centimeter to meter unit
        $height /= 100;
        $bmi    = number_format($weight / ($height ** 2), 2);

        return $bmi;
    }

    public function categoryBMI($bmiScore)
    {
        if ($bmiScore < 16.0) {
            $category = "Underweight (Severe thinness)";
        } elseif ($bmiScore >= 16.0 && $bmiScore <= 16.9) {
            $category = "Underweight (Moderate thinness)";
        } elseif ($bmiScore >= 17.0 && $bmiScore <= 18.4) {
            $category = "Underweight (Mild thinness)";
        } elseif ($bmiScore >= 18.5 && $bmiScore <= 24.9) {
            $category = "Normal";
        } elseif ($bmiScore >= 25.0 && $bmiScore <= 29.9) {
            $category = "Overweight (Pre-obese)";
        } elseif ($bmiScore >= 30.0 && $bmiScore <= 34.9) {
            $category = "Obese (Class I)";
        } elseif ($bmiScore >= 35.0 && $bmiScore <= 39.9) {
            $category = "Obese (Class II)";
        } else {
            $category = "Obese (Class III)";
        }

        return $category;
    }

    public function countRFM($height, $waistCircumference)
    {
        $genderOperand  = $this->gender == "M" ? 64 : 74;
        $rfm            = number_format($genderOperand - (20 * $height / $waistCircumference), 2);

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

// instantiate the object
$roki = new Person;
$roki->setNameAgeGender("Roki", 23, "M");
$rokiBMI = $roki->countBMI(180, 68);
$rokiRFM = $roki->countRFM(180, 65);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $roki->name ?> Health Record: BMI and RFM</title>
</head>

<body>
    <h1><?= "{$roki->name}'s Body Mass Index (BMI) and Relative Fat Mass (RFM) Result." ?></h1>
    <h3><?= $roki->welcomeGreeting() ?></h3>
    <p><?= "BMI: <b>$rokiBMI</b>, belongs to the category <b>{$roki->categoryBMI($rokiBMI)}</b>." ?></p>
    <p><?= "RFM: <b>$rokiRFM%</b>, belongs to the category <b>{$roki->categoryRFM($rokiRFM)}</b>." ?></p>
</body>

</html>