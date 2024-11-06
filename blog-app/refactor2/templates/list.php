<!DOCTYPE html>
<html lang="en">
    <head>
        <title>List of Posts (refactor2)</title>
    </head>
    <body>
        <h1>List of Posts (refactor2)</h1>
        <ul>
            <?php foreach($posts as $post): ?>
            <li>
                <a href="/show.php?id=<?php echo $post['id'] ?>">
                    <?php echo $post['title'] ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </body>
</html>