<!-- CASE -->
<!-- validasi form, input required, jika salah satu kosong redirect ke form lagi -->
<!-- jika lolos validasi, cocokkan credential-nya, jika cocok tampilkan halaman, jika tidak kembali ke form lagi -->

<?php
// deklarasi data user, seolah-olah diambil/bersumber dari database
$dataUsername = "suryasa";
$dataPassword = password_hash("12345", PASSWORD_DEFAULT);

// validasi apakah username dan password tidak kosong
if (empty($_POST['username']) || empty($_POST['password'])) {
    header("Location: c3t1_practice3_form.php?errorMessage=emptyField");
    die();
}

$isLoggedIn = False;
if (($_POST['username'] == $dataUsername) && password_verify($_POST['password'], $dataPassword)) {
    $isLoggedIn = True;
} else {
    header("Location: c3t1_practice3_form.php?errorMessage=invalidCredential");
    die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Insta-geram Page</title>
</head>

<body>
    <h1>Connect your friends with Insta-geram!</h1>
    <?php if ($isLoggedIn) : ?>
        <h3>Hi, <?= $_POST['username'] . "! You're logged-in now." ?></h3>
    <?php else : ?>
        <h3>You're not logged-in.</h3>
    <?php endif ?>
</body>

</html>