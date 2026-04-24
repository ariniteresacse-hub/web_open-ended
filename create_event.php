<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user'])){
    header("Location: login.html");
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Event</title>
</head>

<body bgcolor="black" text="white">

<h2 align="center">CREATE EVENT</h2>
<hr color="gray">

<form method="POST">

<center>

<table border="1" cellpadding="10" bgcolor="#111111">

<tr>
    <td>Title</td>
    <td><input type="text" name="title" required></td>
</tr>

<tr>
    <td>Description</td>
    <td><textarea name="description" required></textarea></td>
</tr>

<tr>
    <td>Date</td>
    <td><input type="date" name="date" required></td>
</tr>

<tr>
    <td colspan="2" align="center">
        <button type="submit" name="create">Create Event</button>
    </td>
</tr>

</table>

</center>

</form>

<br>

<p align="center">
    <a href="dashboard.php" style="color:white;">Back to Dashboard</a>
</p>

</body>
</html>

<?php
if(isset($_POST['create'])){

    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];

    $sql = "INSERT INTO events(title,description,date,created_by)
            VALUES('$title','$description','$date','".$user['id']."')";

    if($conn->query($sql)){
        echo "<p style='color:lightgreen; text-align:center;'>Event Created Successfully</p>";
    } else {
        echo "<p style='color:red; text-align:center;'>Error Creating Event</p>";
    }
}
?>