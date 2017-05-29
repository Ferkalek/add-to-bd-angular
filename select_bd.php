<?php
include_once "config.php";
$result = $mysqli->query("SELECT `id`, `name`, `quantity` FROM books");

$data = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $data[] = $row;
    }
} else {
    $data[] = array("name"=>"0 results");
}

echo json_encode($data);
$mysqli->close();
exit();