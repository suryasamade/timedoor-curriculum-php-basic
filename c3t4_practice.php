<!-- APPLYING MATERIAL -->
<!-- VALIDATION: TAMBAH VALIDASI UNTUK MIN/MAX KARAKTER INPUT, GANTI MENJADI POST METHOD -->

<?php
    require_once "class/MySQLConnection.php";

    $config = require_once "c3t4_config.php";

    $connection = new MySQLConnection($config['host'],$config['database'],$config['user']);
    $connection = $connection->getConnection();
    
    // $selectsQuery = "SELECT * FROM persons";
    $selectsQuery = "SELECT * FROM persons JOIN rfm ON persons.id_rfm = rfm.id JOIN bmi ON persons.id_bmi = bmi.id";
    $query = $connection->query($selectsQuery);
    $persons = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Medical Record</title>
</head>

<body>
<h3>Body Mass Index (BMI) and Relative Fat Mass (RFM) Category Calculator</h3>
    <p>Form input</p>
    <form action="c3t4_practice_create.php" method="POST">
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
                    $id = $person['id'];
            ?>
            <tr>
                <td><?= $idx+1; ?></td>
                <td><?= $person["name"]; ?></td>
                <td><?= $person["age"]; ?></td>
                <td><?= $person["gender"] === "m" ? "Male" : "Female"; ?></td>
                <td><?= $person["height"]; ?></td>
                <td><?= $person["weight"]; ?></td>
                <td><?= $person["waist_size"]; ?></td>
                <td><?= $person["score_bmi"]; ?></td>
                <td><?= $person["category_bmi"]; ?></td>
                <td><?= $person["score_rfm"]; ?></td>
                <td><?= $person["category_rfm"]; ?></td>
                <td>
                    <a href=<?="c3t4_practice_edit.php?id={$id}"?>>Edit</a> | <a href=<?="c3t4_practice_delete.php?id={$id}"?>>Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>