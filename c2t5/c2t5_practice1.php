<!-- APPLYING MATERIAL -->
<!-- MAKE CLASS, PROPERTIES, OBJECT, PUBLIC VISIBILITY -->

<?php
    class Person
    {
        // make properties and initiate it
        // TERAPKAN ATURAN PENAMAAN PROPERTI DISERTAI TYPE HINT
        // PENGELOMPOKAN VARIABLE/PROPERTIES PERLU DILAKUKAN AGAR LEBIH MUDAH DIBACA
        public string $name   = "";
        public int $age       = 0;
        public string $gender = "m";

        public float $height    = 0;
        public float $weight    = 0;
        public float $waistSize = 0;
    }

    // TERAPKAN TYPE HINTING (PARAMETER & OUTPUT) PADA FUNCTION
    // make function to validation input form
    function get_input(string $inputName, $default)
    {
        // TERAPKAN KONSEP EARLY RETURN
        if (isset($_GET[$inputName])) return $_GET[$inputName]; 

        return $default;
    }

    // do instantiate the class to object
    $person = new Person();

    // re-assign the object properties with input form and validate it at once
    $person->name      = get_input('name', '');
    $person->age       = get_input('age', 0);
    $person->gender    = get_input('gender', 'm');
    $person->height    = get_input('height', 0);
    $person->weight    = get_input('weight', 0);
    $person->waistSize = get_input('waist_size', 0);
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
    </ul>
</body>

</html>