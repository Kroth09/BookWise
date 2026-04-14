<?php
$pesquisar = $_REQUEST["pesquisar"] ?? '';

$db = new DB;

$livros =
    $db->query(
        "SELECT * FROM livros where titulo like :filtro",
        Livro::class,
        ['filtro' => "%$pesquisar%"])->fetchAll();

//dd($livros);

view('index', compact('livros'));
