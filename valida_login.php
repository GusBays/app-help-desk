<?php

    //inicia sessão para bloqueio de acesso a outras páginas
    session_start();

    //variavel que identifica se o usuário foi autenticado
    $usuario_autenticado = false;

    //array de usuários válidos enquanto não é utilizado banco de dados
    $usuarios_app = [
        array('email' => 'adm@teste.com.br', 'senha' => '123456'),
        array('email' => 'teste@teste.com.br', 'senha' => 'abcd')
    ];

    //percorre array de usuários
    foreach($usuarios_app as $user) {
        //valida se email e senha inseridos no front estão cadastrados no array
        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
            //caso sim transforma a variável para true pro if redirecioná-lo depois
            $usuario_autenticado = true;
        }
    }

    //se o usuário estiver cadastrado entra no if
    if($usuario_autenticado) {
        header('Location: home.php');
        //define o parametro da seção como sim para liberar o acesso do usuário
        $_SESSION['autenticado'] = 'SIM';
    } else {
        //se o usuário não estiver cadastrado, redireciona para a home através do header e define a seção como não para bloquear outras páginas
        header('Location: index.php?login=erro');
        $_SESSION['autenticado'] = 'NAO';
    }
?>