<?php
$pesquisar = $_REQUEST["pesquisar"] ?? '';



$livros =
    $DB->query(
        "SELECT * FROM livros where titulo like :filtro",
        Livro::class,
        ['filtro' => "%$pesquisar%"])->fetchAll();

//dd($livros);

view('index', compact('livros'));
