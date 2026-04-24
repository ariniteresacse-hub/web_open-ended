<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user'])){
    header("Location: login.html");
    exit();
}

$user_id = $_SESSION['user']['id'];
$event_id = $_GET['id'];

// check duplicate registration
$check = $conn->query("SELECT * FROM registrations 
                       WHERE user_id='$user_id' AND event_id='$event_id'");

if($check->num_rows > 0){
    echo "<p style='color:yellow; text-align:center;'>Already Registered</p>";
}
else{

    $sql = "INSERT INTO registrations(user_id,event_id)
            VALUES('$user_id','$event_id')";

    if($conn->query($sql)){
        echo "<p style='color:lightgreen; text-align:center;'>Registered Successfully</p>";
    } else {
        echo "<p style='color:red; text-align:center;'>Registration Failed</p>";
    }
}

echo "<p align='center'><a href='view_events.php' style='color:white;'>Back</a></p>";
?>