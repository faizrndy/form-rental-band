<?php
// Gantilah dengan detail database Anda
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rental_band";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
