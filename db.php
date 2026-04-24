<?php
$host = "localhost";
$user = "root";
$password = ""; // default XAMPP password is empty
$database = "event_db";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>