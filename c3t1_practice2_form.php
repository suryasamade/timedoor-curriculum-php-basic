<!-- SKENARIO -->
<!-- melakukan validasi terhadap input value yang dikirimkan oleh form, sebelum data/input value diproses -->
<!-- menggunakan form method POST untuk mengirimkan data yang lebih aman -->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Individual Health Record: BMI and RFM</title>
</head>

<body>
    <h1><?= "Body Mass Index (BMI) and Relative Fat Mass (RFM) Result." ?></h1>
    <form action="c3t1_practice2_action.php" method="get">
        <label for="name">Name</label>
        <input type="text" name="name" required>
        <br>
        <br>
        <label for="age">Age</label>
        <input type="number" name="age" required>
        <br>
        <br>
        <label for="height">Height</label>
        <input type="text" name="height" required>
        <br>
        <br>
        <label for="weight">Weight</label>
        <input type="text" name="weight" required>
        <br>
        <br>
        <label for="waist_circumference">Waist Circumference</label>
        <input type="text" name="waist_circumference" required>
        <br>
        <br>
        <label for="gender">Gender</label>
        <input type="radio" name="gender" id="male" value="M" checked>
        <label for="male">Male</label>
        <input type="radio" name="gender" id="female" value="F">
        <label for="female">Female</label>
        <br>
        <br>
        <label for="standard">Standard</label>
        <select name="standard" id="">
            <option value="Person">WHO</option>
            <option value="Hongkong">Hongkong</option>
            <option value="Singapore">Singapore</option>
            <option value="Japan">Japan</option>
        </select>
        <br>
        <br>
        <input type="submit">
    </form>
</body>

</html>