<?php $title = 'List of Posts (refactor4)' ?>

<?php ob_start() ?>
<h1>List of Posts (refactor4)</h1>
<ul>
    <?php foreach ($posts as $post): ?>
        <li>
            <a href="/refactor4/show.php?id=<?php echo $post['id'] ?>">
                <?php echo $post['title'] ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>
