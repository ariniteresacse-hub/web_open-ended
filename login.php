<?php
session_start();
include 'db.php';

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $_SESSION['user'] = $result->fetch_assoc();
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid Email or Password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>

<body bgcolor="black" text="white">

<h2 align="center">LOGIN</h2>
<hr color="gray">

<?php if(isset($error)){ ?>
<p align="center" style="color:red;"><?php echo $error; ?></p>
<?php } ?>

<form method="POST">

<center>

<table border="1" cellpadding="10" bgcolor="#111111">

<tr>
    <td>Email</td>
    <td><input type="email" name="email" required></td>
</tr>

<tr>
    <td>Password</td>
    <td><input type="password" name="password" required></td>
</tr>

<tr>
    <td colspan="2" align="center">
        <button type="submit" name="login">Login</button>
    </td>
</tr>

</table>

</center>

</form>

<p align="center">
    <a href="register.php" style="color:white;">Create Account</a>
</p>

</body>
</html>