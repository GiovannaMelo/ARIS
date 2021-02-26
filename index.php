<html>

<head>
    <title>LOGIN</title>
    <link href="../ARIS/image/icones/iconeAris.jpg" rel="icon">
    <link rel="stylesheet" href="../ARIS/css/reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../ARIS/css/estilo-telas-gerais.css">
    <link rel="stylesheet" href="../ARIS/css/estilo-telas-administrador.css">
    <script src="https://kit.fontawesome.com/86027f91a6.js" crossorigin="anonymous"></script>
</head>

<body class="body-login">
    <div class="login-ladoE">
        <img src="../ARIS/image/logo/logoAris.jpg" class="logo-login">
    </div>
    <div class="login-ladoD">
        <form class="formLogin" method="POST" action="login.php">
            <i class="fas fa-user"></i><label class="label-login">Login</label>
            <br/>
            <input type="text" id="txtlogin" name="txtlogin">
            <br/>
            <i class="fas fa-lock" _mstvisible="2"></i><label>Senha</label>
            <br/>
            <input type="password" id="txtsenha" name="txtsenha">
            <br>
            <a href="../Aris/area-restrita-adm/home-administrador.php"></a><button type="submit" class="buttonEntrar" text="Entrar">Entrar</button><br/>
        </form>
    </div>
</body>

</html>