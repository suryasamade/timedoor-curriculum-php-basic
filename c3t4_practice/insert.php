<!DOCTYPE html>
<html lang="en">
<head>
    <title>Medical Record</title>
</head>
<body>
    <h3>Input New Data</h3>
    <form action="create.php" method="POST">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="age">Age</label>
        <input type="number" name="age" id="age" min="18" max="60" required>
        <br>
        <p>Select gender:</p>
        <input type="radio" name="gender" id="male" value="m" required>
        <label for="male">Male</label>
        <br>
        <input type="radio" name="gender" id="female" value="f" required>
        <label for="female">Female</label>
        <br>
        <label for="height">Height</label>
        <input type="number" name="height" id="height" min="120" max="220" required>
        <br>
        <label for="weight">Weight</label>
        <input type="number" name="weight" id="weight" step="0.1" min="40" max="150" required>
        <br>
        <label for="waist_size">Waist Size</label>
        <input type="number" name="waist_size" id="waist_size" min="50" max="100" required>
        <br>
        <a href="index.php">Back</a>
        <input type="submit" value="Save">
    </form>
</body>
</html>