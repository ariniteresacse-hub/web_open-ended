<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user'])){
    header("Location: login.html");
    exit();
}

$id = $_GET['id'];

$sql = "DELETE FROM events WHERE id='$id'";

if($conn->query($sql)){
    echo "<p style='color:lightgreen; text-align:center;'>Event Deleted</p>";
} else {
    echo "<p style='color:red; text-align:center;'>Delete Failed</p>";
}

echo "<p align='center'><a href='view_events.php' style='color:white;'>Back</a></p>";
?>