<!-- APPLYING MATERIAL -->
<!-- MAKE METHODS, $this, SHORTHAND OPERATOR -->

<?php
    class Person
    {
        public string $name   = "";
        public int $age       = 0;
        public string $gender = "m";

        public float $height    = 0;
        public float $weight    = 0;
        public float $waistSize = 0;

        // PISAHKAN/BUAT SETTER UNTUK TIAP PROPERTY
        public function bio(string $name, int $age, string $gender): void 
        {
            $this->name   = $name ?: "";
            $this->age    = $age;
            $this->gender = $gender === "m" ? "Male" : "Female";
        }

        public function bodyFact(float $height, float $weight, float $waistSize): void 
        {
            $this->height    = $height;
            $this->weight    = $weight;
            $this->waistSize = $waistSize;
        }
    }

    class BodyMassIndex
    {
        public float $score     = 0;
        public string $category = "";

        public function calculate(float $height, float $weight): void
        {
            if ($height) {
                $heightInMeter = $height / 100;
                $result        = $weight / ($heightInMeter ** 2);

                $this->score = round($result, 2);
            }

            $this->category = $this->determineCategory();
        }

        public function determineCategory(): string
        {
            if ($this->score >= 40) return "Obese (Class III)";

            if ($this->score >= 35) return "Obese (Class II)";

            if ($this->score >= 30) return "Obese (Class I)";

            if ($this->score >= 25) return "Overweight (Pre-obese)";

            if ($this->score >= 18.5) return "Normal";

            if ($this->score >= 17.0) return "Underweight (Mild thinness)";

            if ($this->score >= 16.0) return "Underweight (Moderate thinness)";

            return "Underweight (Severe thinness)";
        }
    }

    class RelativeFatMass
    {
        public array $categories = [
            "Extremely low level of fat",
            "Essential fat",
            "Athletes",
            "Fitness",
            "Average",
            "Obese",
        ];
        
        public float $score     = 0;
        public string $category = "";

        public function calculate(float $height, float $waistSize, string $gender): void
        {
            if ($waistSize) {
                $result = $this->baseIndex($gender) - 20 * ($height / $waistSize);

                $this->score = round($result, 2);
            }
            
            $this->category = $this->isGenderMale($gender) ? $this->maleCategory() : $this->femaleCategory();
        }

        public function isGenderMale(string $gender): bool
        {
            return $gender === "m";
        }

        public function baseIndex(string $gender): int
        {
            return $this->isGenderMale($gender) ? 64 : 76;
        }

        public function maleCategory(): string
        {
            if ($this->score < 2) return $this->categories[0];

            if ($this->score < 6) return $this->categories[1];

            if ($this->score < 14) return $this->categories[2];

            if ($this->score < 18) return $this->categories[3];

            if ($this->score < 24) return $this->categories[4];
            
            return $this->categories[5];
        }

        public function femaleCategory(): string
        {
            if ($this->score < 10) return $this->categories[0];

            if ($this->score < 14) return $this->categories[1];

            if ($this->score < 21) return $this->categories[2];

            if ($this->score < 25) return $this->categories[3];

            if ($this->score < 32) return $this->categories[4];
            
            return $this->categories[5];
        }
    }

    function get_input(string $inputName, $default)
    {
        return $_GET[$inputName] ?? $default;
    }

    $name      = get_input('name', '');
    $age       = get_input('age', 0);
    $gender    = get_input('gender', 'm');
    $height    = get_input('height', 0);
    $weight    = get_input('weight', 0);
    $waistSize = get_input('waist_size', 0);

    // instantiate the object
    $person = new Person();
    $person->bio($name, $age, $gender);
    $person->bodyFact($height, $weight, $waistSize);

    $bmi = new BodyMassIndex();
    $bmi->calculate($height, $weight);

    $rfm = new RelativeFatMass();
    $rfm->calculate($height, $waistSize, $gender);
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
        <label for="waist_size">Waist Size</label>
        <input type="number" name="waist_size" id="waist_size" required>
        <br>
        <input type="submit" value="Count">
    </form>
    <p>User detail:</p>
    <ul>
        <!-- print object properties -->
        <li>Name : <?= $person->name ?></li>
        <li>Age : <?= $person->age ?></li>
        <li>Gender : <?= $person->gender ?></li>
        <li>Height : <?= $person->height ?></li>
        <li>Weight : <?= $person->weight ?></li>
        <li>Waist Size : <?= $person->waistSize ?></li>
        <li>BMI score : <?= "<b>{$bmi->score}</b>, belongs to the category <b>{$bmi->category}</b>" ?></li>
        <li>RFM score : <?= "<b>{$rfm->score}%</b>, belongs to the category <b>{$rfm->category}</b>" ?></li>
    </ul>
</body>

</html>