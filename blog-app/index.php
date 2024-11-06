<?php

$connection = new PDO('mysql:host=db;dbname=basic_blog_plain_php_db', 'root', 'secret');
$result = $connection->query("SELECT id, title FROM posts");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>List of Posts</title>
</head>
<body>
<h1>List of Posts</h1>
<ul>
    <?php while($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
    <li>
        <a href="/show.php?id=<?php echo $row['id']; ?>">
            <?php echo $row['title']; ?>
        </a>
    </li>
    <?php endwhile; ?>
</ul>
</body>
</html>

<?php $connection = null; ?>