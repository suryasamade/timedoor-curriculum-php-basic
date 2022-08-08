<?php
echo var_dump($_GET['email']);
echo "<br>";
echo $_GET['password'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Form</title>
</head>

<body>
    <form action="" method="get">
        <input type="email" name="email" placeholder="Email"><br><br>
        <input type="password" name="password" placeholder="Password"><br><br>
        <input type="submit" value="Log In">
    </form>
</body>

</html>