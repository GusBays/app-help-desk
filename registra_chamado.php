<?php

    session_start();

    //recebe os campos cadastrados no HTML através do name e formata
    //retirando qualquer ocorrência de # substituindo por -
    $titulo = str_replace('#', '-', $_POST['titulo']);
    $categoria = str_replace('#', '-', $_POST['categoria']);
    $descricao = str_replace('#', '-', $_POST['descricao']);

    //cria um arquivo txt para inserir as informações dos chamados,
    // se não existir arquivo, um novo será criado
    $arquivo = fopen('arquivo.txt', 'a');

    //concatena as informações formatadas antes separando por # e usa o end of line
    $texto = $_SESSION['id'] . '#' . $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL;

    //escreve as informações dentro da variável arquivo que foi criada antes,
    //usando as informações da variável texto
    fwrite($arquivo, $texto);

    //fechando o arquivo
    fclose($arquivo);

    header('Location: abrir_chamado.php');

?>