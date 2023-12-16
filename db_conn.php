<?php
$servername = "localhost";
$username = "root";
$password = "blythe";
$dbname = "crud";

$text = "balls";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}