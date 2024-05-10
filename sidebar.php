<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$con = mysqli_connect("localhost", "root", "root", "you");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$title_name = $_GET['title_name'];
$query = "SELECT * FROM travel WHERE username = '$title_name'";
$result = mysqli_query($con, $query);

if ($result) {
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($rows);
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}

mysqli_close($con);



header('Content-Type: application/json');

?>