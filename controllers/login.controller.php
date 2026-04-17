<?php


// 1 - Receber o formulário com email e senha

//dump($_SESSION);



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];


    $validacao = Validacao::validar([
        'email' => ['required', 'email'],
        'senha' => ['required'],
    ], $_POST);

    if ($validacao->naoPassou('login')) {
        header('location: /login');
        exit();
    }

    // 2 - Fazer uma consulta ao banco de dados com o email e senha
// email e senha

    $usuario = $DB->query(
        query: " SELECT * FROM USUARIOS WHERE email = :email",
        class: Usuario::class,
        params: compact('email', )
    )->fetch();


    if (!$usuario) {

        flash()->push('validacoes_login',['Usuário ou senha não encontrados']);
        header('location: /login');
        exit();


        $_SESSION['auth'] = $usuario;
        flash()->push('mensagem', 'Logado com sucesso!');
//        $_SESSION['mensagem'] = "Seja bem vindo " . $usuario->nome . "!";
        header('location: /');
        exit();

    }

    $senhaDoPost = $_POST['senha'];
    $senhaDoBanco = $usuario->senha;


    if (! password_verify($senhaDoPost, $senhaDoBanco)){
        flash()->push('validacoes_login',['Usuário ou senha não encontrados']);
        header('location: /login');
        exit();
    }

    $_SESSION['auth'] = $usuario;

    flash()->push('mensagem', 'Logado com sucesso!');

    header('location: /');
    exit();


// 3- Se existir, adicionar na sessão que o usuário está autenticado


// 4 - Mudar a informação no nosso navbar pra mostrar o nome do usuário


}
view('login');