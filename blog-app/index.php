<?php

require_once 'model.php';
require_once 'controller.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ($uri === '/' || $uri === '/index.php') {
    list_action();
} else if ($uri === '/index.php/show' && isset($_GET['id'])) {
    show_action($_GET['id']);
} else {
    header('HTTP/1.1 404 Not Found');
    echo '<html lang="en"><body><h1>Page Not Found</h1></body></html>';
}