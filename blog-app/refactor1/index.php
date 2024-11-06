<?php

$connection = new PDO('mysql:host=db;dbname=blog_app_db', 'root', 'secret');
$result = $connection->query("SELECT id, title FROM posts");

$posts = [];
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $posts[] = $row;
}

$connection = null;

// include the HTML presentation code
require 'templates/list.php';