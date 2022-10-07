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
    function get_input(string $inputName, mixed $default = null) : mixed
    {
        // TERAPKAN KONSEP EARLY RETURN
        if (isset($_GET[$inputName])) {
            return $_GET[$inputName];
        } 

        return $default;
    }

    // do instantiate the class to object
    $objPerson = new Person();

    // re-assign the object properties with input form and validate it at once
    $objPerson->name      = get_input('name', '');
    $objPerson->age       = get_input('age', 0);
    $objPerson->gender    = get_input('gender', 'm');
    $objPerson->height    = get_input('height', 0);
    $objPerson->weight    = get_input('weight', 0);
    $objPerson->waistSize = get_input('waistSize', 0);
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
        <li>Name : <?= $objPerson->name ?></li>
        <li>Age : <?= $objPerson->age ?></li>
        <li>Gender : <?= $objPerson->gender ?></li>
        <li>Height : <?= $objPerson->height ?></li>
        <li>Weight : <?= $objPerson->weight ?></li>
        <li>Waist Size : <?= $objPerson->waistSize ?></li>
    </ul>
</body>

</html>