<html>
    <head>
        <meta charset="utf-8">
        <title>ARIS - FUNCIONÁRIOS CADASTRADOS</title>
        <link rel="icon" href="../../../Sistema/ARIS/image/icones/iconeAris.jpg">
        <link rel="stylesheet" href="../../../Sistema/ARIS/css/reset.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="../../../Sistema/ARIS/css/estilo-telas-gerais.css">
        <link rel="stylesheet" href="../../../Sistema/ARIS/css/estilo-telas-administrador.css">
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://kit.fontawesome.com/86027f91a6.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
			function mascaraCPF(){
				var cpf = document.getElementById("cpfPaciente")

				if(cpf.value.length == 3 || cpf.value.length == 7){
					cpf.value += "."
				}
				if(cpf.value.length == 11)
				cpf.value += "-"
            };
            function mascaraCPF2(){
				var cpf = document.getElementById("cpfPaciente2")

				if(cpf.value.length == 3 || cpf.value.length == 7){
					cpf.value += "."
				}
				if(cpf.value.length == 11)
				cpf.value += "-"
			};


			function validaCPF(){
				var cpf = document.getElementById("cpfPaciente").value

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
					document.getElementById("cpfPaciente").style.borderColor = "red"
					alert("CPF Inválido")
					return false;
				}
				if(!validaPrimeiroDigito(cpf)){		
					document.getElementById("cpfPaciente").style.borderColor = "red"
					alert("CPF Inválido")	
					return false;
				}
				if(!validaSegundoDigito(cpf)){
					document.getElementById("cpfPaciente").style.borderColor = "red"
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
        <?php
        
            include ("../valida-login.php");
            include ("valida-tipologin.php");
            include_once ('classes/Conexao.php');
            include_once ('classes/Funcionario.php');
                try {
                    @$nomeFuncionario = $_POST['nome'];
                    @$cpf = $_POST['cpf'];

                    $Funcionario = new Funcionario();
                        
                        if(isset($nomeFuncionario)){
                            $Funcionario->setNomePessoa($nomeFuncionario);
                            $listaComNome = $Funcionario->listarFuncionarioNome($Funcionario);
                        }
                        if(isset($cpf)){
                            $Funcionario->setCpfPessoa($cpf);
                            $listaComCpf = $Funcionario->listarFuncionario($Funcionario);
                        }
                        $listaCompleta = $Funcionario->listar();
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
                        $('.nomeDoLink-btn').click(function() {
                            $('.nav-itens-sidebar ul .nomeDoLink-show').toggleClass("show");
                        });
                        $('.nomeDoLink2-btn').click(function() {
                            $('.nav-itens-sidebar ul .nomeDoLink2-show').toggleClass("show2");
                        });
                        $('.nomeDoLink3-btn').click(function() {
                            $('.nav-itens-sidebar ul .nomeDoLink3-show').toggleClass("show3");
                        });
                        $('.nomeDoLink4-btn').click(function() {
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
                <h2>FUNCIONÁRIOS CADASTRADOS</h2>
                <hr>
            </div>

            <div class="area-restrita-adm-funcionarios-cadastrados">
                <form action="<?php echo $_SERVER ['PHP_SELF'];?>"   method="POST" class="form-formularios">
                    <div class="input-container campo-form-solitario">
                        <input maxlength="40" id="nome-funcionario-cadastrados" name="nome" class="input-form" type="text" pattern=".+" required />
                        <label class="label-form" for="nome-funcionario-cadastrados">Nome do funcionário</label>
                    </div>
                    <button type="submit" name="btnPesquisar" class="search-btn-form" id="btn-div-tabela-funcionario"><i class="fas fa-search"></i></button>
                </form>
                <form action="<?php echo $_SERVER ['PHP_SELF'];?>" method="POST" class="form-formularios">
                    <br>
                    <div class="input-container campo-form-solitario">
                        <input onkeydown="mascaraCPF2()" maxlength="14" id="cpfPaciente2" name="cpf" class="input-form" type="text" pattern=".+" required />
                        <label class="label-form" for="cpfPaciente2">CPF</label>
                    </div>
                    <button type="submit" name="btnPesquisar" class="search-btn-form" id="btn-div-tabela-funcionario-cpf"><i class="fas fa-search"></i></button>
                        <br>
                </form>
                <div class="funcionarios-cadastrados-adm">
                <a type="button" class="adicionar-cadastro adicionar" id="btn-div-form-cadastro-funcionario"><i class="fas fa-plus-circle"></i>
                        <p>Cadastrar Funcionário</p>
                    </a>
                    <div class="container-tabela-funcionario-cadastrado" >
                        <table class="table table-striped">
                        
                            <thead>
                                <tr>

                                    <th scope="col">Funcionário</th>
                                    <th scope="col">Área de atuação</th>
                                    <th scope="col">CPF</th>
                                    <th scope="col">Editar</th>
                                    <th scope="col">Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(isset($cpf)){
                                foreach($listaComCpf as $linha){
                                    echo "<tr>";
                                    echo "<td>".$linha['nomeFuncionario']."</td>";
                                    echo "<td>".$linha['tipoFuncionario']."</td>";
                                    echo "<td>".$linha['cpfFuncionario']."</td>";
                                    echo "<td><a href='editar-cadastro-funcionario.php?id=".$linha['codFuncionario']." type='button'><i class='fas fa-edit'></i></a></td>";
                                    echo "<td><a type='button' onClick='(confirmarDelete(".$linha['codFuncionario']."))'><i class='fas fa-trash'></i></a></td>";
                                    echo "</tr>";
                                }

                                if (empty($listaComCpf)){
                                    echo "<tr>";
                                    echo "<td>--</td>";
                                    echo "<td>--</td>";
                                    echo "<td>--</td>";
                                    echo "<td>--</td>";
                                    echo "<td>--</td>";
                                    echo "</tr>";
                                }

                            }else if(isset($nomeFuncionario)){
                                foreach($listaComNome as $linha){
                                    echo "<tr>";
                                    echo "<td>".$linha['nomeFuncionario']."</td>";
                                    echo "<td>".$linha['tipoFuncionario']."</td>";
                                    echo "<td>".$linha['cpfFuncionario']."</td>";
                                    echo "<td><a href='editar-cadastro-funcionario.php?id=".$linha['codFuncionario']."' type='button'><i class='fas fa-edit'></i></a></td>";
                                    echo "<td><a type='button' onClick='(confirmarDelete(".$linha['codFuncionario']."))'><i class='fas fa-trash'></i></a></td>";
                                    echo "</tr>";
                                }

                                if (empty($listaComNome)){
                                    echo "<tr>";
                                    echo "<td>--</td>";
                                    echo "<td>--</td>";
                                    echo "<td>--</td>";
                                    echo "<td>--</td>";
                                    echo "<td>--</td>";
                                    echo "</tr>";
                                }

                            }else{
                                foreach($listaCompleta as $linha){
                                    echo "<tr>";
                                    echo "<td>".$linha['nomeFuncionario']."</td>";
                                    echo "<td>".$linha['tipoFuncionario']."</td>";
                                    echo "<td>".$linha['cpfFuncionario']."</td>";
                                    echo "<td><a href='editar-cadastro-funcionario.php?id=".$linha['codFuncionario']."' type='button'><i class='fas fa-edit'></i></a></td>";
                                    echo "<td><a type='button' onClick='(confirmarDelete(".$linha['codFuncionario']."))'><i class='fas fa-trash'></i></a></td>";
                                    echo "</tr>";
                                }
                            }
                            
                        ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="container-form-funcionario" style="display: none">
                        <form action="classes/funcionario/cadastrarFuncionario.php" method="POST" class="form-formularios" onsubmit="return validaCPF()">
                            <div class="sub-descricao-formulario">
                            <center><h4>CADASTRAR FUNCIONARIO</h4></center>
                            <hr>
                            <h4>DADOS PESSOAIS</h4>
                            </div>

                            <div class="input-container campo-form-lado-a-lado">
                                <input id="nomePaciente" name="nomeFuncionario" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="nomePaciente">Nome Completo:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="nomeSocialPaciente" name="nomeSocialFuncionario" class="input-form" type="text" pattern=".+"  />
                                <label class="label-form" for="nomeSocialPaciente">Nome Social:</label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="dataNascimentoPaciente" name="dataNascimentoFuncionario" class="input-form" type="date" />
                                <label class="label-form" for="dataNascimentoPaciente">Data de Nascimento:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <select id="sexoPaciente" name="sexoFuncionario" class="input-form" type="text">
                                    <option >Feminino</option>
                                    <option >Masculino</option>
                                    <option >Não declarado</option>
                                </select>
                                <label class="label-form" for="sexoPaciente">Sexo:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="nacionalidadePaciente" name="nacionalidadeFuncionario" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="nacionalidadePaciente">Nacionalidade:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="cpfPaciente" onkeydown="mascaraCPF()" maxlength="14"  name="cpfFuncionario" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="cpfPaciente">CPF<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="rgPaciente" name="rgFuncionario" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="rgPaciente">RG<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="orgaoEmissorRgPaciente" name="rgOrgaoFuncionario" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="orgaoEmissorRgPaciente">Orgão de Emissão<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="dataEmissaoRgPaciente" name="dataEmissorRgFuncionario" class="input-form" type="date" />
                                <label class="label-form" for="dataEmissaoRgPaciente">Data de Emissão:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <select id="racaPaciente" name="ufFuncionario" class="input-form" type="text">
                                    <option >AC</option>
                                    <option >AL</option>
                                    <option >AM</option>
                                    <option >AP</option>
                                    <option >BA</option>
                                    <option >CE</option>
                                    <option >DF</option>
                                    <option >ES</option>
                                    <option >GO</option>
                                    <option >MA</option>
                                    <option >MT</option>
                                    <option >MS</option>
                                    <option >MG</option>
                                    <option >PA</option>
                                    <option >PB</option>
                                    <option >PR</option>
                                    <option >PE</option>
                                    <option >PI</option>
                                    <option >RJ</option>
                                    <option >RN</option>
                                    <option >RS</option>
                                    <option >RO</option>
                                    <option >RR</option>
                                    <option >SC</option>
                                    <option >SP</option>
                                    <option >SE</option>
                                    <option >TO</option>
                                </select>
                                <label class="label-form" for="racaPaciente">UF<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="cidadeNascimentoPaciente" name="cidadeNascFuncionario" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="cidadeNascimentoPaciente">Cidade de Nascimento:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <select id="racaCorPaciente" name="racaCorFuncionario" class="input-form" type="text">
                                    <option >Branco</option>
                                    <option >Pardo</option>
                                    <option >Amarelo</option>
                                    <option >Indígena</option>
                                    <option >Negro</option>
                                </select>
                                <label class="label-form" for="racaCorPaciente">Raça / Cor<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                            <select id="especialidadeMedicoCadastroFuncionario" name="tipoFuncionario" class="input-form" type="text" pattern=".+" required >
                                    <option>Recepcionista</option>
                                    <option>Enfermeiro(a)</option>
                            </select>
                                <label class="label-form" for="especialidadeMedicoCadastroFuncionario">Tipo do funcionario:<sup>*</sup></label>
                            </div>
                            <div class="sub-descricao-formulario">
                                <h4>DADOS DE CONTATO</h4>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="telefoneCelularPaciente" name="celularFuncionario" class="input-form"  pattern=".+"  />
                                <label class="label-form" for="telefoneCelularPaciente">Telefone Celular:</label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="telefoneFixoPaciente" name="telefoneFuncionario" class="input-form"  pattern=".+"  />
                                <label class="label-form" for="telefoneFixoPaciente">Telefone Residencial:</label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="emailPaciente" name="emailFuncionario" class="input-form" type="email" pattern=".+"  />
                                <label class="label-form" for="emailFixoPaciente">E-mail:</label>
                            </div>
                            <br>
                            <div class="sub-descricao-formulario">
                                <h4>ENDEREÇO</h4>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="cepPaciente" name="cepFuncionario" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="cepPaciente">CEP<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <select id="tipoLograduroPaciente" name="tipoLogradouroFuncionario" class="input-form" type="text">
                                    <option >Rua</option>
                                    <option >Avenida</option>
                                    <option >Alameda</option>
                                    <option >Beco</option>
                                    <option >Travessa</option>
                                    <option >Estrada</option>
                                    <option >Rodovia</option>
                                    <option >Outro</option>
                                </select>
                                <label class="label-form" for="tipoLogradouroPaciente">Tipo de Logradouro:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="logradouroPaciente" name="logradouroFuncionario" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="logradouroPaciente">Logradouro:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="numerologradouroPaciente" name="numCasaFuncionario" class="input-form" type="number" pattern=".+" required />
                                <label class="label-form" for="numerologradouroPaciente">Número:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="complementologradouroPaciente" name="complementoFuncionario" class="input-form" type="text" pattern=".+" />
                                <label class="label-form" for="complementologradouroPaciente">Complemento:</label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="bairrologradouroPaciente" name="bairroFuncionario" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="bairrologradouroPaciente">Bairro:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                    <input id="cidadeLogradouroPaciente" name="cidadeFuncionario" class="input-form" type="text" pattern=".+" required />
                                    <label class="label-form" for="cidadeLogradouroPaciente">Cidade:<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select id="estadoLogradouroPaciente" name="estadoFuncionario" class="input-form" type="text">
                                        <option>AC</option>
                                        <option>AL</option>
                                        <option>AM</option>
                                        <option>AP</option>
                                        <option>BA</option>
                                        <option>CE</option>
                                        <option>DF</option>
                                        <option>ES</option>
                                        <option>GO</option>
                                        <option>MA</option>
                                        <option>MT</option>
                                        <option>MS</option>
                                        <option>MG</option>
                                        <option>PA</option>
                                        <option>PB</option>
                                        <option>PR</option>
                                        <option>PE</option>
                                        <option>PI</option>
                                        <option>RJ</option>
                                        <option>RN</option>
                                        <option>RS</option>
                                        <option>RO</option>
                                        <option>RR</option>
                                        <option>SC</option>
                                        <option>SP</option>
                                        <option>SE</option>
                                        <option>TO</option>
                                    </select>
                                    <label class="label-form" for="estadoLogradouroPaciente">Estado:<sup>*</sup></label>
                                </div>
                            <div class="input-container campo-form-direita">
                                <center><input value="Cadastrar Funcionario" type="submit" name="btnCadastrar" class="geral-btn-form"/></center>
                            </div>
                        </form>
                        <script type="text/javascript">
                            $("#cepPaciente").focusout(function(){
                                //Início do Comando AJAX
                                $.ajax({
                                    //O campo URL diz o caminho de onde virá os dados
                                    //É importante concatenar o valor digitado no CEP
                                    url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
                                    //Aqui você deve preencher o tipo de dados que será lido,
                                    //no caso, estamos lendo JSON.
                                    dataType: 'json',
                                    //SUCESS é referente a função que será executada caso
                                    //ele consiga ler a fonte de dados com sucesso.
                                    //O parâmetro dentro da função se refere ao nome da variável
                                    //que você vai dar para ler esse objeto.
                                    success: function(resposta){
                                        //Agora basta definir os valores que você deseja preencher
                                        //automaticamente nos campos acima.
                                        $("#logradouroPaciente").val(resposta.logradouro);
                                        $("#complementologradouroPaciente").val(resposta.complemento);
                                        $("#bairrologradouroPaciente").val(resposta.bairro);
                                        $("#cidadeLogradouroPaciente").val(resposta.localidade);
                                        $("#estadoLogradouroPaciente").val(resposta.uf);
                                        //Vamos incluir para que o Número seja focado automaticamente
                                        //melhorando a experiência do usuário
                                        $("#numerologradouroPaciente").focus();
                                    }
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </section>
        <script src="../js/confirmarFuncionario.js"></script>
        <script src="../../../Sistema/ARIS/js/script-administrador.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>

</html>