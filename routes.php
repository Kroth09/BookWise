<?php

$controller = "index";


if( isset($_SERVER['PATH_INFO'])) {
    $controller = str_replace('/', '', $_SERVER['PATH_INFO']);
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

if( ! file_exists("controllers/$controller.php") ) {
    http_response_code(404);
    echo "Error 404 | Página não existe";
    die();
}






require "controllers/{$controller}.controller.php";
