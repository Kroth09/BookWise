<?php

function view($view, $data = null){
    foreach ($data as $key => $value) {
        $$key = $value;
    }
    require "views/templates/app.php";
}

function dump($value) {
    echo '<pre style="background:#111; color:#0f0; padding:10px;">';
    print_r($value);
    echo '</pre>';
}

function dd (...$dump)
{
    echo '<pre style="background:#111; color:#0f0; padding:10px;">';
    var_dump($dump);
    echo '</pre>';
    die();
}

function abort($code){
    http_response_code($code);
    view($code);
    die();
}

function flash(){
    return new Flash;
}