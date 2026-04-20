<?php
$livro = $DB
    ->query("SELECT * FROM livros WHERE id = :id", Livro::class, [':id' => $_GET['id']])
    ->fetch();


$avaliacoes = $DB
    ->query("select * from avaliacoes where livro_id = :id", Avaliacao::class, ['id' =>$_GET['id']])
    ->fetchAll();


view('livro', compact('livro', 'avaliacoes'));