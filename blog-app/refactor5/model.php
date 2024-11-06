<?php

function open_database_connection(): PDO
{
    return new PDO('mysql:host=db;dbname=blog_app_db', 'root', 'secret');
}

function close_database_connection(&$connection): void
{
    $connection = null;
}

function get_all_posts(): array
{
    $connection = open_database_connection();

    $result = $connection->query('SELECT id, title FROM posts');

    $posts = [];
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $posts[] = $row;
    }
    close_database_connection($connection);

    return $posts;
}

function get_post_by_id(int $id): array
{
    $connection = open_database_connection();

    $statement = $connection->prepare('SELECT created_at, title, body FROM posts WHERE id = :id');
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute(['id' => $id]);

    $row = $statement->fetch(PDO::FETCH_ASSOC);

    close_database_connection($connection);

    return $row;
}