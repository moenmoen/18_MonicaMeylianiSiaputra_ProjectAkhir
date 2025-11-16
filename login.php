<?php
include 'koneksi.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = $koneksi->prepare("SELECT password FROM bestdressed WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['username'] = $username;
            header("Location: tambah.php");
            exit;
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "Username not found.";
    }

    $stmt->close();
    $koneksi->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="landing.html">Best Dressed</a></li> 
            <li><a href="about_us.html">About Us</a></li> 
            <li><a href="login.php">Log In</a></li>             
        </ul>
    </nav>
    <form method="POST">

        <h2>Login</h2>

        <label>Username:</label>
        <input type="text" name="username" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>

        <p>Don’t have an account? <a href="register.php">Register here</a></p>
    </form>

</body>
</html>