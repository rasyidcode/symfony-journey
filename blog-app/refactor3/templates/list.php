<?php $title = 'List of Posts (refactor3)' ?>

<?php ob_start() ?>
<h1>List of Posts (refactor3)</h1>
<ul>
    <?php foreach ($posts as $post): ?>
        <li>
            <a href="/show.php?id=<?php echo $post['id'] ?>">
                <?php echo $post['title'] ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>
