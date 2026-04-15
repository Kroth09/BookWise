<?php

$_SESSION['teste'] = '';
header('location: /login');
exit();

if( $_SERVER['REQUEST_METHOD'] == 'POST' ){

    $validacoes = [];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $email_confirmacao = $_POST['email-confirmacao'];
    $senha = $_POST['senha'];

    //Nome deve ser obrigatório!
    if(strlen($nome) === 0){
        $validacoes[] = "O nome é obrigatório.";
    }

    if(strlen($email) === 0){
        $validacoes[] = "O email é obrigatório.";
    }

    if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        $validacoes[] = "Obrigatório usar um email valido.";
    }

    if($email !== $email_confirmacao){
        $validacoes[] = "Emails diferentes.";
    }

    if(strlen($senha) < 8 || strlen($senha) > 16){
        $validacoes[]= "A senha precisa ter entre 8 e 16 caracteres.";
    }

    if(sizeof($validacoes) > 0){
        $_SESSION['teste'] = '';
        header('location: /login');
        exit();
    }

    $resultado = $DB->query(query: "insert into USUARIOS (nome, email, senha) values(:nome, :email , :senha)", params: [
        'nome' => $_POST['nome'],
        'email' => $_POST['email'],
        'senha' => $_POST['senha'],
    ]);

    header('location: /login?mensagem=Registrado com sucesso');
    exit();
}