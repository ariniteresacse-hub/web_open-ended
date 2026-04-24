<?php
session_start();
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>

<body bgcolor="black" text="white">

<h2 align="center">DASHBOARD</h2>
<hr color="gray">

<p align="center">
Welcome <b><?php echo $user['name']; ?></b> |
Role: <b><?php echo $user['role']; ?></b>
</p>

<center>

<a href="view_events.php" style="color:white;">View Events</a> |

<?php if($user['role']=="organizer"){ ?>
<a href="create_event.html" style="color:white;">Create Event</a> |
<?php } ?>

<a href="logout.php" style="color:white;">Logout</a>

</center>

</body>
</html>