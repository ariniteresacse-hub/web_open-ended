<?php
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>

<body bgcolor="black" text="white">

<br>

<h2 align="center">REGISTER</h2>
<hr color="gray">

<form method="POST">

<center>

<table border="1" cellpadding="10" bgcolor="#111111">

<tr>
    <td>Name</td>
    <td><input type="text" name="name" required></td>
</tr>

<tr>
    <td>Email</td>
    <td><input type="email" name="email" required></td>
</tr>

<tr>
    <td>Password</td>
    <td><input type="password" name="password" required></td>
</tr>

<tr>
    <td>Role</td>
    <td>
        <select name="role">
            <option value="organizer">Organizer</option>
            <option value="participant">Participant</option>
        </select>
    </td>
</tr>

<tr>
    <td colspan="2" align="center">
        <button type="submit" name="submit">Register</button>
    </td>
</tr>

</table>

</center>

</form>

<br>

<p align="center">
    <a href="login.php" style="color:white;">Already have account? Login</a>
</p>

</body>
</html>

<?php
if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];

    // check duplicate email
    $check = $conn->query("SELECT * FROM users WHERE email='$email'");

    if($check->num_rows > 0){
        echo "<p style='color:red; text-align:center;'>Email already exists!</p>";
    }
    else{

        $sql = "INSERT INTO users(name,email,password,role)
                VALUES('$name','$email','$password','$role')";

        if($conn->query($sql)){

            // ✅ IMPORTANT FIX (no double page issue)
            header("Location: login.php");
            exit();

        } else {
            echo "<p style='color:red; text-align:center;'>Error registering user</p>";
        }
    }
}
?>