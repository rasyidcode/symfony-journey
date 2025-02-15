<?php

use Symfony\Component\HttpFoundation\Response;

function list_action(): Response
{
    $posts = get_all_posts();
    $html = render_template('templates/list.php', ['posts' => $posts]);

    return new Response($html);
}

function show_action($id): Response
{
    $post = get_post_by_id($id);
    $html = render_template('templates/show.php', ['post' => $post]);

    return new Response($html);
}

// helper function to render templates
function render_template($path, array $args)
{
    extract($args);
    ob_start();
    require $path;
    return ob_get_clean();
}