<?php
$koneksi = mysqli_connect("localhost","root","mysql","fashion");
echo("");
if (mysqli_connect_error()){
    echo "koneksi database error" . mysqli_connect_error();
}
?>