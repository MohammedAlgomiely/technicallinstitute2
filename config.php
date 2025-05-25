<?php
$host = "localhost";
$user = "root";
$password = "root";
$dbname = "tempdatabas2";

$conn = mysqli_connect($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
