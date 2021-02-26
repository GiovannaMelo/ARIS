<html>

    <head>
    
        <meta charset="utf-8">
        <title>ARIS - HOME</title>
        <link rel="icon" href="../../../Sistema/ARIS/image/icones/iconeAris.jpg">
        <link rel="stylesheet" href="../../../Sistema/ARIS/css/reset.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="../../../Sistema/ARIS/css/estilo-telas-gerais.css">
        <link rel="stylesheet" href="../../../Sistema/ARIS/css/estilo-telas-administrador.css">
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://kit.fontawesome.com/86027f91a6.js" crossorigin="anonymous"></script>
        <?php
            include ("../valida-login.php");
            include ("valida-tipologin.php");
        ?>
    </head>
    <body>
        <div id="esqueleto">
            
            <aside class="animate-right">
                <header class="header-sidebar">
                    <img class="aside-logo" src="../../../Sistema/ARIS/image/logo/logoAris.jpg" alt="ARIS" width="60%">
                </header>
                <section class="secao-itens-sidebar">
                    <nav class="nav-itens-sidebar">
                            <br>
                            <ul> 
                                <li><a href="../../../Sistema/ARIS/area-restrita-administrador/home-adm.php"><i class="fas fa-home"></i>Home</a></li>
                                <li><a href="../../../Sistema/ARIS/area-restrita-administrador/medicos-cadastrados.php" class="nomeDoLink-btn" ><i class="fas fa-user-md"></i>Médico</a></li>
                                <li><a href="../../../Sistema/ARIS/area-restrita-administrador/funcionarios-cadastrados.php" class="nomeDoLink2-btn" ><i class="fas fa-user-nurse"></i>Funcionário</a></li>
                                <li><a href="../../../Sistema/ARIS/area-restrita-administrador/pacientes-cadastrados.php" class="nomeDoLink3-btn" ><i class="fas fa-users"></i>Pacientes</a></li>
                                <li><a href="#" class="nomeDoLink4-btn"><i class="fas fa-user-lock"></i>Login
                                        <span class="fas fa-caret-down third"></span>
                                    </a>
                                    <ul class="nomeDoLink4-show">
                                        <li><a href="../../../Sistema/ARIS/area-restrita-administrador/gerenciar-login.php">Gerenciar Login</a></li>
                                    <li><a href="../../../Sistema/ARIS/area-restrita-administrador/login-enfermeiro.php">Enfermeiro</a></li>
                                    <li><a href="../../../Sistema/ARIS/area-restrita-administrador/login-funcionario.php">Funcionário</a></li>
                                    <li><a href="../../../Sistema/ARIS/area-restrita-administrador/login-medico.php">Médico</a></li>
                                    </ul>
                                </li>
                                <li><a href="../../../Sistema/ARIS/area-restrita-administrador/relatorios.php" class="nomeDoLink5-btn" ><i class="fas fa-chart-line"></i>Relatórios</a></li>
                            </ul>
                        </nav>
                    <script>
                        $('.nomeDoLink-btn').click(function(){
                            $('.nav-itens-sidebar ul .nomeDoLink-show').toggleClass("show");
                        });
                        $('.nomeDoLink2-btn').click(function(){
                            $('.nav-itens-sidebar ul .nomeDoLink2-show').toggleClass("show2");
                        });
                        $('.nomeDoLink3-btn').click(function(){
                            $('.nav-itens-sidebar ul .nomeDoLink3-show').toggleClass("show3");
                        });
                        $('.nomeDoLink4-btn').click(function(){
                            $('.nav-itens-sidebar ul .nomeDoLink4-show').toggleClass("show4");
                        });
                    </script>
                </section>
                <footer class="icones-sidebar">
                    <div class="div-icones-sidebar">
                        <a href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
                    </div>
                </footer>
            </aside>
            
        </div>
        <section class="main">
            <div class="titulo-descricao-main">
                <h2>BEM VINDO AO ARIS!</h2>
                <hr>
            </div>
            <div class="construcao-home-adm">
                            <div class="texto">
                               <h3>SISTEMA DE INFORMATIZAÇÃO DE PRONTUÁRIOS ELETRÔNICOS.</h3>
                               <hr>
                            </div>
                                <section class="fila-um">
                                    <a class="tamanho-a" href="../../../Sistema/ARIS/area-restrita-administrador/medicos-cadastrados.php"><div class="conteudo-fila cont-um"><center><i class="fas fa-user-md fasz"></i></center><p>MÉDICO</p></div></a>
                                    
                                </section>
                                <section class="fila-um">
                                    <a class="tamanho-a" href="../../../Sistema/ARIS/area-restrita-administrador/funcionarios-cadastrados.php"><div class="conteudo-fila cont-dois"><center><i class="fas fa-user-nurse fasz"></i></center><p>FUNCIONARIOS</p></div></a>
                                    <a class="tamanho-a" href="../../../Sistema/ARIS/area-restrita-administrador/pacientes-cadastrados.php"><div class="conteudo-fila cont-tres"><center><i class="fas fa-users fasz"></i></center><p>PACIENTES</p></div></a>
                                </section>
                                <section class="fila-dois">
                                <a class="tamanho-a" href="../../../Sistema/ARIS/area-restrita-administrador/login-medico.php"><div class="conteudo-fila cont-tres"><center><i class="fas fa-user-lock fasz"></i></center><p>LOGIN</p></div></a>
                                    <a class="tamanho-a" href="../../../Sistema/area-restrita-administrador/ARIS/relatorios.php"><div class="conteudo-fila cont-quatro"><center><i class="fas fa-chart-line fasz"></i></center><p>RELATORIOS</p></div></a>
                                    <a class="tamanho-a" href="../../../Sistema//ARIS/index.php"><div class="conteudo-fila cont-cinco"><center><i class="fas fa-door-open fasz"></i></center><p>SAIR</p></div></a>
                                </section>
                        </div>
        </section>
    </body>
</html>