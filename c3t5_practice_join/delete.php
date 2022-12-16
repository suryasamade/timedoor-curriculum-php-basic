<?php
    require_once "c3t5_config.php";

    $id = $_GET['id'];
    $selectQuery = $dbh->prepare("SELECT * FROM persons WHERE id=?");
    $selectQuery->execute([$id]);
    $person = $selectQuery->fetch();

    $deleteQuery = $dbh->prepare("DELETE FROM persons WHERE id=?");
    $delete = $deleteQuery->execute([$id]);

    if ($delete) {
        echo "{$person['name']}'s data is successfully deleted!";
        header('Refresh:3; url=c3t5_practice.php');
    }
?>