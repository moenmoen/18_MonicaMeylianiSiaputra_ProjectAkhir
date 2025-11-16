<?php
include 'koneksi.php';

$content_code = $_GET['content_code'];

if (!$content_code) {
    die("Content code not provided!");
}

mysqli_query($koneksi, "DELETE FROM indeks WHERE content_code='$content_code'");

header("Location: index.php");
exit();
?>
