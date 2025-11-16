<?php
include 'koneksi.php';
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Content Index</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="tambah.php">New Post</a></li> 
            <li><a href="index.php">Your posts</a></li> 
            <li><a href="landing.html">Log out</a></li>             
        </ul>
    </nav>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h3>
    <h2>Posts</h2>
    <p>Here's what you posted so far.</p>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Content Code</th>
            <th>Title</th>
            <th>Date Written</th>
            <th>Content</th>
            <th>Credits</th>
            <th>Sources</th>
            <th>Post Scriptum</th>
            <th>Actions</th>
        </tr>

        <?php
        $data = mysqli_query($koneksi, "SELECT * FROM indeks");
        while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?php echo $d['content_code']; ?></td>
            <td><?php echo $d['title']; ?></td>
            <td><?php echo $d['date_written']; ?></td>
            <td><?php echo $d['content']; ?></td>
            <td><?php echo $d['credits']; ?></td>
            <td><?php echo $d['sources']; ?></td>
            <td><?php echo $d['post_scriptum']; ?></td>
            <td>
                <a href="update.php?content_code=<?php echo $d['content_code']; ?>">EDIT</a> |
                <a href="delete.php?content_code=<?php echo $d['content_code']; ?>" onclick="return confirm('Are you sure you want to delete this record?')">DELETE</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
