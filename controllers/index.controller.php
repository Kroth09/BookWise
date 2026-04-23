<?php

$livros = Livro::all($_REQUEST["pesquisar"] ?? '');
//dd($livros);

view('index', compact('livros'));
