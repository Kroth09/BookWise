<?php
$livro = $DB->query("SELECT * FROM livros WHERE id = :id", Livro::class, [':id' => $_GET['id']])->fetch();


view('livro', compact('livro'));