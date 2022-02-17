<?php
  session_start();

  //verifica se a seção não foi iniciada com o indice autenticado (pagina index.php) ou se o valor desse índice NÃO é sim (usuário inválido)
  if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
    //se alguma das verificações for verdadeira, redireciona para a página de login novamente
    header('Location: index.php?login=erro2');
  }

?>