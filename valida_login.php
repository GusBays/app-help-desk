<?php

    //inicia sessão para bloqueio de acesso a outras páginas
    session_start();

    $usuario_autenticado = false;
    $usuario_id = null;
    $usuario_perfil_id = null;

    //array para tipos de usuário
    $perfis = [1 => 'Administrativo', 2 => 'Usuário'];

    //array de usuários válidos enquanto não é utilizado banco de dados
    $usuarios_app = [
        array('id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '1234', 'perfil_id' => 1),
        array('id' => 2, 'email' => 'webmaster@teste.com.br', 'senha' => '1234', 'perfil_id' => 1),
        array('id' => 3, 'email' => 'jose@teste.com.br', 'senha' => '1234', 'perfil_id' => 2),
        array('id' => 4, 'email' => 'maria@teste.com.br', 'senha' => '1234', 'perfil_id' => 2)
    ];

    //percorre array de usuários
    foreach($usuarios_app as $user) {
        //valida se email e senha inseridos no front estão cadastrados no array
        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
            //caso sim transforma a variável para true pro if redirecioná-lo depois
            $usuario_autenticado = true;
            $usuario_id = $user['id'];
            $usuario_perfil_id = $user['perfil_id'];
        }
    }

    //se o usuário estiver cadastrado entra no if
    if($usuario_autenticado) {
        header('Location: home.php');
        //define o parametro da seção como sim para liberar o acesso do usuário
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        $_SESSION['id'] = $usuario_id;
    } else {
        //se o usuário não estiver cadastrado, redireciona para a home através do header e define a seção como não para bloquear outras páginas
        header('Location: index.php?login=erro');
        $_SESSION['autenticado'] = 'NAO';
    }
?>