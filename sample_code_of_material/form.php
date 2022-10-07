<?php
echo $_POST['email'];
echo "<br>";
echo $_POST['password'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Form</title>
</head>

<body>
    <form action="" method="POST">
        <input type="email" name="email" placeholder="Email"><br><br>
        <input type="password" name="password" placeholder="Password"><br><br>
        <input type="submit" value="Log In">
    </form>
</body>

</html>