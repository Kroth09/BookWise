<?php


// 1 - Receber o formulário com email e senha

dump($_SESSION);



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];


    $validacao = Validacao::validar([
        'email' => ['required', 'email'],
        'senha' => ['required'],
    ], $_POST);

    if (!empty($validacao->naoPassou())) {
        header('location: /login');
        exit();
    }

    // 2 - Fazer uma consulta ao banco de dados com o email e senha
// email e senha

    $usuario = $DB->query(
        query: " SELECT * FROM USUARIOS WHERE email = :email AND senha = :senha",
        class: Usuario::class,
        params: compact('email', 'senha')
    )
        ->fetch();

    if ($usuario) {
        $_SESSION['auth'] = $usuario;
        flash()->push('mensagem', 'Logado com sucesso!');
        $_SESSION['mensagem'] = "Seja bem vindo " . $usuario->nome . "!";
        header('location: /');
        exit();

    }

// 3- Se existir, adicionar na sessão que o usuário está autenticado


// 4 - Mudar a informação no nosso navbar pra mostrar o nome do usuário


}
view('login');