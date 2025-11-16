<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new data</title>
    <link rel="stylesheet" href="tambah.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="tambah.php">New Post</a></li> 
            <li><a href="index.php">Your posts</a></li> 
            <li><a href="landing.html">Log out</a></li>             
        </ul>
    </nav>
    <h2>New Post</h2>
    <form method="post" action="tambah_aksi.php">
        <label>Title:</label><br>
        <input type="text" name="title" required><br><br>

        <label>Date Written:</label><br>
        <input type="date" name="date_written" required><br><br>

        <label>Content:</label><br>
        <textarea name="content" rows="6" cols="50" required></textarea><br><br>

        <label>Credits:</label><br>
        <input type="text" name="credits"><br><br>

        <label>Sources:</label><br>
        <input type="text" name="sources"><br><br>

        <label>Post Scriptum:</label><br>
        <input type="text" name="post_scriptum"><br><br>

        <input type="submit" value="Tambah Data">
        <a href="index.php">Kembali</a>
    </form>
</body>
</html>
