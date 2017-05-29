<?php
include_once "config.php";

if (isset($_GET['itemID'])) {
    $id = $_GET['itemID'];
    $result = $mysqli->query("DELETE FROM `books` WHERE id = '".$id."'") or die($mysqli->error.__LINE__);
}

$mysqli->close();
exit();