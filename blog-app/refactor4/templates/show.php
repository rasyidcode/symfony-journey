<?php $title = $post['title'] . '(refactor4)' ?>

<?php ob_start() ?>
    <h1><?php echo $post['title'] ?> (refactor4)</h1>
    <div class="date"><?php echo $post['created_at'] ?></div>
    <div class="body">
        <?php echo $post['body'] ?>
    </div>

<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>