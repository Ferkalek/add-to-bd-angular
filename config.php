<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tr_exp_bd";

$mysqli = new mysqli($servername, $username, $password, $dbname);
$mysqli->query("SET NAMES 'utf8'");