<?php
    include "conexao.php";
    $login = $_POST['txtlogin'];
    $senha = $_POST['txtsenha'];

    if(empty($login) || empty($senha) ){
        header('Location: index.php');
    }

    $sql = "SELECT * FROM tbusuario WHERE nomeUsuario LIKE '$login' AND senhaUsuario LIKE md5('$senha')";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_num_rows($result);
    $dados = mysqli_fetch_array($result);
    if ($row==1){
        if($dados['tipoUsuario'] == "recepcao"){
            session_start();        
            $_SESSION['login-session'] = $login;
            $_SESSION['senha-session'] = $senha;
            $_SESSION['tipo-session'] = $dados['tipoUsuario'];
            $_SESSION['code-session'] = $dados['codFuncionario'];
            $_SESSION['status-session'] = "Disponivel";
            header("Location: area-restrita-funcionario/funcionario.php");

            exit();
        }else if ($dados['tipoUsuario'] == "administrador"){
            session_start();
            $_SESSION['login-session'] = $login;
            $_SESSION['senha-session'] = $senha;
            $_SESSION['tipo-session'] = $dados['tipoUsuario'];
            header("Location: area-restrita-administrador/home-adm.php");
            exit();
        }else if ($dados['tipoUsuario'] == "medico"){
            session_start();
            $_SESSION['login-session'] = $login;
            $_SESSION['senha-session'] = $senha;
            $_SESSION['tipo-session'] = $dados['tipoUsuario'];
            $_SESSION['code-session'] = $dados['codMedico'];
            $_SESSION['status-session'] = "Disponivel";
            header("Location: area-restrita-medico/medico.php");
            exit();
        }else if($dados['tipoUsuario'] == "enfermagem"){
            session_start();        
            $_SESSION['login-session'] = $login;
            $_SESSION['senha-session'] = $senha;
            $_SESSION['tipo-session'] = $dados['tipoUsuario'];
            $_SESSION['code-session'] = $dados['codFuncionario'];
            $_SESSION['status-session'] = "Disponivel";
            header("Location: area-restrita-enfermeiro/enfermeiro.php");

            exit();
        }

    } else{
        header('Location: index.php');
    }
?>