<!-- APPLYING MATERIAL -->
<!-- VALIDATION: TAMBAH VALIDASI UNTUK MIN/MAX KARAKTER INPUT, GANTI MENJADI POST METHOD -->

<?php
    require_once "c3t4_config.php";
    
    $querySelectPersons = $dbh->query("SELECT * FROM persons");
    $persons = $querySelectPersons->fetchAll();
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
        <label for="waist_circumference">Waist Circumference</label>
        <input type="number" name="waist_circumference" id="waist_circumference" required>
        <br>
        <input type="submit" value="Count & Save">
    </form>

    <br>
    
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Height (cm)</th>
                <th>Weight (kg)</th>
                <th>Waist Circumference (cm)</th>
                <th>RFM Measure</th>
                <th>RFM Category</th>
                <th>BMI Measure</th>
                <th>BMI Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($persons as $person): ?>
            <tr>
                <?php $id = $person["id"]; ?>
                <td><?= $id; ?></td>
                <td><?= $person["name"]; ?></td>
                <td><?= $person["age"]; ?></td>
                <td><?= $person["gender"] === "m" ? "Male" : "Female"; ?></td>
                <td><?= $person["height"]; ?></td>
                <td><?= $person["weight"]; ?></td>
                <td><?= $person["waist_circumference"]; ?></td>
                <!-- INSERT KE NEW COLUMN -->
                <td><?= $person["score_rfm"]; ?></td>
                <td><?= $person["category_rfm"]; ?></td>
                <td><?= $person["score_bmi"]; ?></td>
                <td><?= $person["category_bmi"]; ?></td>
                <td>
                    <a href=<?="c3t4_practice_edit.php?id={$id}"?>>Edit</a> | <a href=<?="c3t4_practice_delete.php?id={$id}"?>>Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>