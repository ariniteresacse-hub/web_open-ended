<?php
include 'db.php';
session_start();

$user = $_SESSION['user'];

$result = $conn->query("SELECT * FROM events");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Events</title>
</head>

<body bgcolor="black" text="white">

<h2 align="center">EVENTS</h2>
<hr color="gray">

<center>

<?php while($row = $result->fetch_assoc()){ ?>

<table border="1" cellpadding="10" bgcolor="#111111" width="50%">

<tr>
    <td><b><?php echo $row['title']; ?></b></td>
</tr>

<tr>
    <td><?php echo $row['description']; ?></td>
</tr>

<tr>
    <td>Date: <?php echo $row['date']; ?></td>
</tr>

<tr>
    <td>
        <a href="register_event.php?id=<?php echo $row['id']; ?>" style="color:white;">
        Register
        </a>
    </td>
</tr>

</table>

<br>

<?php } ?>

</center>

</body>
</html>