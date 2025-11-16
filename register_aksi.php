<?php
include 'koneksi.php';

$username   = $_POST['username'];
$full_name  = $_POST['full_name'];
$age        = $_POST['age'];
$email      = $_POST['email'];
$password   = $_POST['password'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$check = mysqli_query($koneksi, "SELECT username FROM fashion WHERE username='$username'");
if (mysqli_num_rows($check) > 0) {
    echo "Username is already in use. Please choose another.";
} else {

    $query = "INSERT INTO fashion (username, full_name, age, email, password) VALUES ('$username', '$full_name', '$age', '$email', '$hashed_password')";
     
    if (mysqli_query($koneksi, $query)) {
        header("Location: landing.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
