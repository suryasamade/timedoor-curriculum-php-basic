<!-- APPLYING MATERIAL -->
<!-- MAKE METHODS, $this, SHORTHAND OPERATOR -->

<?php
class Person
{
    public $name            = "Person One",
        $age                = 24,
        $gender             = "m",
        $height             = 177,
        $weight             = 82,
        $waistCircumference = 68,
        $bmiScore           = 0,
        $bmiCategory        = "",
        $rfmScore           = 0,
        $rfmCategory        = "";

    public function setBio(
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
        $this->height   = $height;
        $this->weight   = $weight;
        $this->waistCircumference = $waistCircumference;
    }

    public function countBMI()
    {
        // convert $height in centimeter to meter unit
        $height         = $this->height / 100;
        $this->bmiScore = number_format($this->weight / ($height ** 2), 2);
        $this->setBMICategory($this->bmiScore);
    }

    public function setBMICategory($bmiScore)
    {
        if ($bmiScore < 16.0) {
            $this->bmiCategory = "Underweight (Severe thinness)";
        } elseif ($bmiScore >= 16.0 && $bmiScore <= 16.9) {
            $this->bmiCategory = "Underweight (Moderate thinness)";
        } elseif ($bmiScore >= 17.0 && $bmiScore <= 18.4) {
            $this->bmiCategory = "Underweight (Mild thinness)";
        } elseif ($bmiScore >= 18.5 && $bmiScore <= 24.9) {
            $this->bmiCategory = "Normal";
        } elseif ($bmiScore >= 25.0 && $bmiScore <= 29.9) {
            $this->bmiCategory = "Overweight (Pre-obese)";
        } elseif ($bmiScore >= 30.0 && $bmiScore <= 34.9) {
            $this->bmiCategory = "Obese (Class I)";
        } elseif ($bmiScore >= 35.0 && $bmiScore <= 39.9) {
            $this->bmiCategory = "Obese (Class II)";
        } else {
            $this->bmiCategory = "Obese (Class III)";
        }
    }

    public function countRFM()
    {
        $genderOperandValue = $this->gender == "m" ? 64 : 74;
        $this->rfmScore     = number_format($genderOperandValue - (20 * $this->height / $this->waistCircumference), 2);
        $this->setRFMCategory($this->rfmScore);
    }

    public function setRFMCategory($rfmScore)
    {
        $categories = [
            "Extremely low level of fat",
            "Essential fat",
            "Athletes",
            "Fitness",
            "Average",
            "Obese"
        ];

        switch ($this->gender) {
            case 'm':
                if ($rfmScore < 2) {
                    $this->rfmCategory = $categories[0];
                } elseif ($rfmScore >= 2 && $rfmScore < 6) {
                    $this->rfmCategory = $categories[1];
                } elseif ($rfmScore >= 6 && $rfmScore < 14) {
                    $this->rfmCategory = $categories[2];
                } elseif ($rfmScore >= 14 && $rfmScore < 18) {
                    $this->rfmCategory = $categories[3];
                } elseif ($rfmScore >= 18 && $rfmScore < 24) {
                    $this->rfmCategory = $categories[4];
                } else {
                    $this->rfmCategory = $categories[5];
                }
                break;
            default:
                if ($rfmScore < 10) {
                    $this->rfmCategory = $categories[0];
                } elseif ($rfmScore >= 10 && $rfmScore < 14) {
                    $this->rfmCategory = $categories[1];
                } elseif ($rfmScore >= 14 && $rfmScore < 21) {
                    $this->rfmCategory = $categories[2];
                } elseif ($rfmScore >= 21 && $rfmScore < 25) {
                    $this->rfmCategory = $categories[3];
                } elseif ($rfmScore >= 25 && $rfmScore < 32) {
                    $this->rfmCategory = $categories[4];
                } else {
                    $this->rfmCategory = $categories[5];
                }
                break;
        }
    }
}

function input_checker($inputName)
{
    if (isset($_GET[$inputName])) {
        return $_GET[$inputName];
    } else {
        return "null";
    }
}

$name       = input_checker('name');
$age        = input_checker('age');
$gender     = input_checker('gender');
$height     = input_checker('height');
$weight     = input_checker('weight');
$waistCircumference = input_checker('waist_circumference');

// instantiate the object
$objPerson = new Person();

$objPerson->setBio($name, $age, $gender, $height, $weight, $waistCircumference);

if (!($height == "null" || $weight == "null" || $waistCircumference == "null")) {
    $objPerson->countBMI();
    $objPerson->countRFM();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Medical Record</title>
</head>

<body>
    <h3>Body Mass Index (BMI) and Relative Fat Mass (RFM) Category Calculator</h3>
    <p>Form input</p>
    <form action="" method="GET">
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="age">Age</label>
        <input type="number" name="age" id="age">
        <br>
        <p>Select gender:</p>
        <input type="radio" name="gender" id="male" value="m" required>
        <label for="male">Male</label>
        <br>
        <input type="radio" name="gender" id="female" value="f" required>
        <label for="female">Female</label>
        <br>
        <label for="height">Height</label>
        <input type="number" name="height" id="height" required>
        <br>
        <label for="weight">Weight</label>
        <input type="number" name="weight" id="weight" step="0.1" required>
        <br>
        <label for="waist_circumference">Waist Circumference</label>
        <input type="number" name="waist_circumference" id="waist_circumference" required>
        <br>
        <input type="submit" value="Count">
    </form>
    <p>User detail:</p>
    <ul>
        <!-- print object properties -->
        <li>Name : <?= $objPerson->name ?></li>
        <li>Age : <?= $objPerson->age ?></li>
        <li>Gender : <?= $objPerson->gender ?></li>
        <li>Height : <?= $objPerson->height ?></li>
        <li>Weight : <?= $objPerson->weight ?></li>
        <li>Waist circumference : <?= $objPerson->waistCircumference ?></li>
        <li>BMI score : <?= "<b>{$objPerson->bmiScore}</b>, belongs to the category <b>{$objPerson->bmiCategory}</b>" ?></li>
        <li>RFM score : <?= "<b>{$objPerson->rfmScore}%</b>, belongs to the category <b>{$objPerson->rfmCategory}</b>" ?></li>
    </ul>
</body>

</html>