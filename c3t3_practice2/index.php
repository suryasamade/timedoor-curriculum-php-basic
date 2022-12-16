<!-- APPLYING MATERIAL -->
<!-- SELECT, INSERT, UPDATE, DELETE -->

<?php
    require_once "class/Person.php";
    
    $connection = require_once "helper/connection.php";

    $selectsQuery = "SELECT * FROM persons";
    $query        = $connection->query($selectsQuery);

    $persons = [];

    foreach ($query->fetchAll() as $data) {
        $person = new Person(
            $data['name'],
            $data['age'],
            $data['gender'],
        );

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
    <a href="insert.php">Insert Data</a>
    <br>
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
            <?php foreach($persons as $index => $person): ?>
            <tr>
                <td><?= 1 + $index; ?></td>
                <td><?= $person->getName() ?></td>
                <td><?= $person->getAge() ?></td>
                <td><?= $person->getGender() ?></td>
                <td><?= $person->getHeight() ?></td>
                <td><?= $person->getWeight() ?></td>
                <td><?= $person->getWaistSize() ?></td>
                <td><?= $person->getBMIScore() ?></td>
                <td><?= $person->getBMICategory() ?></td>
                <td><?= $person->getRFMScore() ?></td>
                <td><?= $person->getRFMCategory() ?></td>
                <td>
                    <a href=<?="edit.php?id={$person->getId()}"?> >Edit</a> | 
                    <a href=<?="confirm.php?id={$person->getId()}"?> >Delete</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>