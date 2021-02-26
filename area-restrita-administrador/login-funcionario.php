<html>

    <head>
    
        <meta charset="utf-8">
        <title>ARIS - CADASTRO LOGIN FUNCIONÁRIO</title>
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
            include ("classes/Funcionario.php");
            $cpf = filter_input(INPUT_GET, "cpf");
                        
            $Funcionario = new Funcionario();
            $Funcionario->setCpfPessoa($cpf);
            $listaFuncionario = $Funcionario->listarFuncionario($Funcionario);
            $btnPesquisar = filter_input(INPUT_GET, "btnPesquisar");
            if(isset($btnPesquisar)){
            foreach($listaFuncionario as $linha){
                $nomeFuncionario = $linha['nomeFuncionario'];
                $codFuncionario = $linha['codFuncionario'];
                }
            }
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		
		<script type="text/javascript">
			function mascaraCPF(){
				var cpf = document.getElementById("cpf-login-funcionario")

				if(cpf.value.length == 3 || cpf.value.length == 7){
					cpf.value += "."
				}
				if(cpf.value.length == 11)
				cpf.value += "-"
            };
            
            function validaCPF(){
				var cpf = document.getElementById("cpf-login-funcionario").value

				console.log(cpf);
				cpf  = cpf.replace( /\D/g , "");
				if (
					!cpf ||
					cpf.length != 11 ||
					cpf == "00000000000" ||
					cpf == "11111111111" ||
					cpf == "22222222222" ||
					cpf == "33333333333" ||
					cpf == "44444444444" ||
					cpf == "55555555555" ||
					cpf == "66666666666" ||
					cpf == "77777777777" ||
					cpf == "88888888888" ||
					cpf == "99999999999" 
				) {
					document.getElementById("cpf-login-funcionario").style.borderColor = "red"
					alert("CPF Inválido")
					return false;
				}
				if(!validaPrimeiroDigito(cpf)){		
					document.getElementById("cpf-login-funcionario").style.borderColor = "red"
					alert("CPF Inválido")	
					return false;
				}
				if(!validaSegundoDigito(cpf)){
					document.getElementById("cpf-login-enfermeiro").style.borderColor = "red"
					alert("CPF Inválido")
					return false;
				}
					
				return true;
			}
			function validaPrimeiroDigito(cpf){
				let soma = 0;
				for (var i = 0; i < cpf.length-2 ; i++) {
					soma += cpf[i] * ((cpf.length-1)-i);
				}
				soma = (soma * 10) % 11;
				if(soma == 10 || soma == 11)
					soma = 0;
				if(soma != cpf[9])
					return false;
				return true;	
			}
			function validaSegundoDigito(cpf){
				let soma = 0;
				for (var i = 0; i < cpf.length-1 ; i++) {
					soma += cpf[i] * ((cpf.length)-i);
				}
				soma = (soma * 10) % 11;
				if(soma == 10 || soma == 11)
					soma = 0;
				if(soma != cpf[10])
					return false;
				return true;
			}

		</script>
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
                <h2>CADASTRO LOGIN FUNCIONÁRIO</h2>
                <hr>
            </div>
            <div class="login-funcionario-adm">
                <form action=<?php echo $_SERVER ['PHP_SELF']; ?> class="form-formularios" onsubmit="return validaCPF()">
                    <div class="input-container campo-form-solitario">
                        <input id="cpf-login-funcionario" name="cpf" class="input-form" type="text" pattern=".+" required maxlength="14" onkeydown="mascaraCPF()"  />
                        <label class="label-form" for="cpf-login-funcionario">CPF<sup>*</sup></label>
                    </div>
                    <button value="pesquisar" name="btnPesquisar" type="submit" class="search-btn-form"><i class="fas fa-search"></i></button>
                </form>
                <form action="classes/funcionario/cadastrarLoginFuncionario.php" method="POST" class="form-formularios">
                    
                    <input value="<?php echo $codFuncionario;?>" type="hidden" name="codfuncionario" />
                    <input value="Recpcionista" type="hidden" name="tipofuncionario" />
                    <div class="input-container campo-form-lado-a-lado">
                        <input id="nome-completo-login-funcionario"  name="nomecompletousuario" value="<?php if (empty($nomeFuncionario)){echo"Insira o CPF primeiro";}else{echo $nomeFuncionario;}?>" class="input-form" type="text" pattern=".+" required />
                        <label class="label-form" for="nome-completo-login-funcionario">Nome Completo<sup>*</sup></label>
                    </div>
                    <div class="input-container campo-form-lado-a-lado">
                        <input id="usuario-login-funcionario" name="nomeusuario" class="input-form" type="text" pattern=".+" required />
                        <label class="label-form" for="usuario-login-funcionario">Usuário<sup>*</sup></label>
                    </div>
                    <div class="input-container campo-form-lado-a-lado">
                        <input id="senha-login-funcionario" name="senhausuario" class="input-form" type="password" pattern=".+" required />
                        <label class="label-form" for="senha-login-funcionario">Senha<sup>*</sup></label>
                    </div>
                    <div class="input-container campo-form-lado-a-lado">
                        <input id="confirmar-senha-login-funcionario" name="confirmarsenhausuario" class="input-form" type="password" pattern=".+" required />
                        <label class="label-form" for="confirmar-senha-login-funcionario">Confirmar Senha<sup>*</sup></label>
                    </div>
                    <div class="input-container campo-form-direita">
                        <button value="" type="submit" name="btnCadastrar" class="geral-btn-form">Salvar</button>
                    </div>
                </form>
                <script>
                    var password = document.getElementById("senha-login-funcionario")
                    , confirm_password = document.getElementById("confirmar-senha-login-funcionario");

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