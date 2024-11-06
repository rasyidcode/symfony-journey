<?php

function list_action(): void
{
    $posts = get_all_posts();
    require 'templates/list.php';
}

function show_action($id): void
{
    $posts = get_post_by_id($id);
    require 'templates/show.php';
}