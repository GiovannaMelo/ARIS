<html>

    <head>
    
        <meta charset="utf-8">
        <title>ARIS - CADASTRO LOGIN MÉDICO</title>
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
            include ("classes/Medico.php");
                        $crm = filter_input(INPUT_GET, "crm");
                        
                        $Medico = new Medico();

                        $Medico->setCrmMedico($crm);
                        $listaMedico = $Medico->listarMedico($Medico);
                        $btnPesquisar = filter_input(INPUT_GET, "btnPesquisar");
                        if(isset($btnPesquisar)){
                        foreach($listaMedico as $linha){
                            $nomeMedico = $linha['nomeMedico'];
                            $codMedico = $linha['codMedico'];
                            }
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
                        <a href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
                    </div>
                </footer>
            </aside>
            
        </div>
        <section class="main">
            <div class="titulo-descricao-main">
                <h2>CADASTRO LOGIN MÉDICO</h2>
                <hr>
            </div>
            <div class="login-medico-adm">
                <form action=<?php echo $_SERVER ['PHP_SELF']; ?> class="form-formularios" onsubmit="return validaCPF()">
                        <div class="input-container campo-form-solitario">
                            <input id="crm-login-medico" name="crm" class="input-form" type="text" pattern=".+" required />
                            <label class="label-form" for="crm-login-medico">CRM<sup>*</sup></label>
                        </div>
                        <button value="pesquisar" name="btnPesquisar" type="submit" class="search-btn-form"><i class="fas fa-search"></i></button>
                
                </form>
                        
                <form action="classes/medico/cadastrarLoginMedico.php" method="POST" class="form-formularios">
                
                    <input value="<?php echo $codMedico;?>" type="hidden" name="codmedico" />
                    <div class="input-container campo-form-lado-a-lado">
                    <input value="<?php if (empty($nomeMedico)){echo"Insira o CRM primeiro";}else{echo $nomeMedico;}?>" id="nome-completo-login-medico" name="nomecompletousuario" class="input-form" type="text" pattern=".+" required />
                        <label class="label-form" for="nome-completo-login-medico">Nome Completo<sup>*</sup></label>
                    </div>
                    <div class="input-container campo-form-lado-a-lado">
                        <input id="usuario-login-medico" name="nomeusuario" class="input-form" type="text" pattern=".+" required />
                        <label class="label-form" for="usuario-login-medico">Usuário<sup>*</sup></label>
                    </div>
                    <div class="input-container campo-form-lado-a-lado">
                        <input id="senha-login-medico" name="senhausuario" class="input-form" type="password" pattern=".+" required />
                        <label class="label-form" for="senha-login-medico">Senha<sup>*</sup></label>
                    </div>
                    <div class="input-container campo-form-lado-a-lado">
                        <input id="confirmar-senha-login-medico" name="confirmarsenhausuario" class="input-form" type="password" pattern=".+" required />
                        <label class="label-form" for="confirmar-senha-login-medico">Confirmar Senha<sup>*</sup></label>
                    </div>
                    <div class="input-container campo-form-direita">
                        <button value="" type="submit" name="btnCadastrar" class="geral-btn-form">Salvar</button>
                    </div>
                </form>
                <script>
                    var password = document.getElementById("senha-login-medico")
                    , confirm_password = document.getElementById("confirmar-senha-login-medico");

                    function validatePassword(){
                    if(password.value != confirm_password.value) {
                        confirm_password.setCustomValidity("Senhas diferentes!");
                    } else {
                        confirm_password.setCustomValidity('');
                    }
                    }

                    password.onchange = validatePassword;
                    confirm_password.onkeyup = validatePassword;
                </script>
            </div>
        </section>
    </body>
</html>