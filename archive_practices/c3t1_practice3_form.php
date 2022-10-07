<?php
if ($_GET) {
    $errorMessage = $_GET['errorMessage'] == "emptyField" ? "Please fill your username and password!" : "Failed to login, wrong username or password!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Insta-geram Login</title>
</head>

<body>
    <?= $_GET ? "<p style='color:red;'>$errorMessage</p>" : "" ?>
    <h1>Insta-geram</h1>
    <form action="c3t1_practice3_action.php" method="POST">
        <label for="username">Usename</label>
        <input type="text" name="username" id="">
        <br>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="">
        <br>
        <input type="submit" value="Login">
    </form>
</body>

</html>