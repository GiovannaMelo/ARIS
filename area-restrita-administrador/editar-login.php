<html>

    <head>
    
        <meta charset="utf-8">
        <title>ARIS - EDITAR LOGIN</title>
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
            include_once ('classes/Conexao.php');
            include_once ('classes/Medico.php');
            $cod = filter_input(INPUT_GET, "id");
            
            try {
                $Medico = new Medico();
                if(isset($cod)){
                    $Medico->setCodUsuario($cod);
                    $lista = $Medico->listarLoginUpdate($Medico);
                }
            foreach($lista as $linha){
                    $codUsuario = $linha['codUsuario'];
                    $nomeCompleto = $linha['nomeCompletoUsuario'];
                    $nome = $linha['nomeUsuario'];
                    $tipo = $linha['tipoUsuario'];
                }
            } catch(Exception $e) {
                echo '<pre>';
                    print_r($e);
                echo '</pre>';
                echo $e->getMessage();
            }

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
                        <a href="../../Sistema/ARIS/index.php"><i class="fas fa-sign-out-alt"></i></a>
                    </div>
                </footer>
            </aside>
            
        </div>
        <section class="main">
            <div class="titulo-descricao-main">
                <h2>EDITAR LOGIN</h2>
                <hr>
            </div>
            <div class="editar-login-adm">
                <form action="classes/medico/updateLogin.php" method="POST" class="form-formularios">
                            <input name="codUsuario" value= "<?php echo $codUsuario;?>" style="display:none;" />
                            
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="nome-completo-editar-login" name="nomeCompleto" value= "<?php echo $nomeCompleto;?>"class="input-form" type="text" pattern=".+"  />
                                <label class="label-form" for="nome-completo-editar-login">Nome Completo<sup></sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="usuario-editar-login" name="nome" value= "<?php echo $nome;?>" class="input-form" type="text" pattern=".+"  />
                                <label class="label-form" for="usuario-editar-login">Usuário<sup></sup></label>
                            </div>
                            
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="senha-editar-login" name="senha" class="input-form" type="password" pattern=".+"  />
                                <label class="label-form" for="senha-editar-login">Senha<sup></sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="confirmar-senha-editar-login" class="input-form" type="password" pattern=".+" />
                                <label class="label-form" for="confirmar-senha-editar-login">Confirmar Senha<sup></sup></label>
                            </div>
                        <div class="input-container campo-form-direita">
                            <button type="submit" name="btnAtualizar" class="geral-btn-form">Editar</button>
                        </div>

                </form>
            </div>
        </section>
    </body>
</html>