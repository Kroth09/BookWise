<?php

//require 'Validacao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $validacao = Validacao::validar([
        'nome' => ['required'],
        'email' => ['required', 'email', 'confirmed', 'unique:USUARIOS'],
        'senha' => ['required', 'min:8', 'max:16', 'strong'],

    ], $_POST);

    if (!empty($validacao->naoPassou())) {
        header('location: /login');
        exit();
    }


    $resultado = $DB->query(query: "insert into USUARIOS (nome, email, senha) values(:nome, :email , :senha)", params: [
        'nome' => $_POST['nome'],
        'email' => $_POST['email'],
        'senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT),
    ]);


    header('location: /login?mensagem=Registrado com sucesso');

    flash()->push('mensagem', 'Registrado com sucesso!');
    header('location: /login'); // ou '/'
    exit();

}

header('location: /login');
exit();