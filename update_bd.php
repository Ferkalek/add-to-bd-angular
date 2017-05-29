<?php
include_once "config.php";

if (isset($_GET['name']) && isset($_GET['quantity'])) {
    $id = $_GET['id'];
    $name = $_GET['name'];
    $quantity = $_GET['quantity'];

    $result = $mysqli->query("UPDATE `books` SET  `name` =  '".$name."', `quantity` =  '".$quantity."' WHERE `id` = '".$id."'") or die($mysqli->error.__LINE__);
    $result = $mysqli->affected_rows;
    echo $json_response = json_encode($result);
}
$mysqli->close();
exit();