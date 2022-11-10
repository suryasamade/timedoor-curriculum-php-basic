<!-- APPLYING MATERIAL -->
<!-- SELECT, INSERT, UPDATE, DELETE -->

<?php
    require_once "class/MySQLConnection.php";
    require_once "class/Person.php";
    // CONNECTING DATABASE AND CHECK THE STATUS
    $config = require_once "c3t3_config.php";

    $connection = new MySQLConnection($config['host'],$config['database'],$config['user']);
    $connection = $connection->getConnection();
    // END
    // SEBAGAI OPSI, CONFIG FILE DIATAS DIJADIKAN/DIMASUKKAN JADI SATU FILE KHUSUS
    // MAKA UNTUK MENGGUNAKANNYA, HANYA PERLU ME-REQUIRE SATU FILE ITU SAJA 
    // DAN LANGSUNG DIJADIKAN/DIMASUKKAN SEBAGAI SEBUAH VARIABLE

    // SELECT ALL PERSONS TABLE
    $selectsQuery = "SELECT * FROM persons";
    $query        = $connection->query($selectsQuery);

    $persons = [];

    foreach ($query->fetchAll() as $data) {
        $person = new Person(
            $data['name'],
            $data['age'],
            $data['gender'],
        );

        // $person->setDataFromDB($data);
        $person->setId($data['id']);
        $person->bodyFact($data['height'], $data['weight'], $data['waist_size']);
        $person->massIndex($data['bmi_score'], $data['bmi_category'], $data['rfm_score'], $data['rfm_category']);

        $persons[] = $person;
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
    <form action="c3t3_practice2_create.php" method="GET">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="age">Age</label>
        <input type="number" name="age" id="age" required>
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
        <input type="submit" value="Save">
    </form>

    <br>
    
    <table border="1">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Height (cm)</th>
                <th>Weight (kg)</th>
                <th>Waist Size (cm)</th>
                <th>BMI Score</th>
                <th>BMI Category</th>
                <th>RFM Score</th>
                <th>RFM Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($persons as $idx => $person):
            ?>
            <tr>
                <td><?= $idx+1; ?></td>
                <td><?= $person->getName() ?></td>
                <td><?= $person->getAge() ?></td>
                <td><?= $person->getGender() ?></td>
                <td><?= $person->getHeight() ?></td>
                <td><?= $person->getWeight() ?></td>
                <td><?= $person->getWaistSize() ?></td>
                <!-- INSERT KE NEW COLUMN -->
                <!-- INI GIMANA CARANYA, APAKAH HITUNG ULANG ATAU BUAT METHOD SETTER-GETTER BARU DI MASING-MASING CLASS -->
                <!-- ATAU GIMANA??? -->
                <td><?= $person->getBMIScore() ?></td>
                <td><?= $person->getBMICategory() ?></td>
                <td><?= $person->getRFMScore() ?></td>
                <td><?= $person->getRFMCategory() ?></td>
                <td>
                    <a href=<?="c3t3_practice2_edit.php?id={$person->getId()}"?> >Edit</a> | 
                    <a href=<?="c3t3_practice2_delete.php?id={$person->getId()}"?> >Delete</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>