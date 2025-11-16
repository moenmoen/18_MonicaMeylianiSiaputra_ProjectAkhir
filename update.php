<?php
include 'koneksi.php';

$content_code = $_GET['content_code'];

$data = mysqli_query($koneksi, "SELECT * FROM indeks WHERE content_code='$content_code'");
$d = mysqli_fetch_array($data);

if (!$d) {
    die("Record not found!");
}

if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $date_written = $_POST['date_written'];
    $content = $_POST['content'];
    $credits = $_POST['credits'];
    $sources = $_POST['sources'];
    $post_scriptum = $_POST['post_scriptum'];

    mysqli_query($koneksi, "UPDATE indeks SET 
        title='$title', 
        date_written='$date_written', 
        content='$content', 
        credits='$credits', 
        sources='$sources', 
        post_scriptum='$post_scriptum'
        WHERE content_code='$content_code'");

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Content</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>UPDATE CONTENT</h2>
    <form method="post">
        <label>Title:</label><br>
        <input type="text" name="title" value="<?php echo $d['title']; ?>" required><br><br>

        <label>Date Written:</label><br>
        <input type="date" name="date_written" value="<?php echo $d['date_written']; ?>" required><br><br>

        <label>Content:</label><br>
        <textarea name="content" rows="6" cols="50" required><?php echo $d['content']; ?></textarea><br><br>

        <label>Credits:</label><br>
        <input type="text" name="credits" value="<?php echo $d['credits']; ?>"><br><br>

        <label>Sources:</label><br>
        <input type="text" name="sources" value="<?php echo $d['sources']; ?>"><br><br>

        <label>Post Scriptum:</label><br>
        <input type="text" name="post_scriptum" value="<?php echo $d['post_scriptum']; ?>"><br><br>

        <input type="submit" name="update" value="Update">
        <a href="index.php">Cancel</a>
    </form>
</body>
</html>
