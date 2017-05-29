<?php
include_once "config.php";

if (isset($_GET['name']) && isset($_GET['quantity'])) {
    $name = $_GET['name'];
    $quantity = $_GET['quantity'];

    $result = $mysqli->query("INSERT INTO `books` (`name`, `quantity`) VALUES ('".$name."', '".$quantity."')") or die($mysqli->error.__LINE__);
    $result = $mysqli->affected_rows;
    echo $json_response = json_encode($result);
}
$mysqli->close();
exit();