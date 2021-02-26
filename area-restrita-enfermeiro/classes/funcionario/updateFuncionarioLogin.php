<?php

session_start();
//conexao com banco
require_once '../../../conexao.php';

//pegando os dados
if(isset($_POST['btnAtualizar'])):
    $nomeusuario = mysqli_escape_string($connect,$_POST['nomeusuario']);
    $senhausuario = mysqli_escape_string($connect,$_POST['senhausuario']);

//id para filtrar de quem sao os dados
    $id = mysqli_escape_string($connect,$_POST['id']);

//passando dados digitados para o banco
    $sql = "UPDATE tbusuario SET nomeusuario = '$nomeusuario'
    ,senhausuario = md5('$senhausuario')

    WHERE codusuario = '$id'";

//try catch para aparecer o erro
    if(mysqli_query($connect, $sql)):
        $_SESSION ['mensagem'] = 'Atualizado com Sucesso!';
        header("Location: ../../cadastro-funcionarios.php");
    else:
        $_SESSION ['mensagem'] = 'Erro na Atualização!'. $sql . "<br>" . mysqli_error($connect);
        header("Location: ../../cadastro-funcionarios.php");
    endif;
endif;
