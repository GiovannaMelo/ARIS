<html>
    <head>

        <meta charset="utf-8">
        <title>ARIS - MÉDICOS CADASTRADOS</title>
        <link rel="icon" href="../../../Sistema/ARIS/image/icones/iconeAris.jpg">
        <link rel="stylesheet" href="../../../Sistema/ARIS/css/reset.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="../../../Sistema/ARIS/css/estilo-telas-gerais.css">
        <link rel="stylesheet" href="../../../Sistema/ARIS/css/estilo-telas-administrador.css">
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://kit.fontawesome.com/86027f91a6.js" crossorigin="anonymous"></script>
        <script src="../../../Sistema/ARIS/js/script-medico.js"></script>

        <?php
            include ("../valida-login.php");
            include ("valida-tipologin.php");
            include_once ('classes/Conexao.php');
            include_once ('classes/Medico.php');
                    try {
                        @$nomeMedico = $_POST['nome'];
                        @$crm = $_POST['crm'];
                        $Medico = new Medico();
                        
                        if(isset($crm)){
                            $Medico->setCrmMedico($crm);
                            $listaComCrm = $Medico->listarMedico($Medico);
                        }
                        if(isset($nomeMedico)){
                            $Medico->setNomePessoa($nomeMedico);
                            $listaComNome = $Medico->listarMedicoNome($Medico);
                        }
                        $listaCompleta = $Medico->listar();

                        
                    } catch(Exception $e) {
                        echo '<pre>';
                            print_r($e);
                        echo '</pre>';
                        echo $e->getMessage();
                    }
        ?>

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
                <h2>MÉDICOS CADASTRADOS</h2>
                <hr>
            </div>

            <div class="area-restrita-adm-medicos-cadastrados">
                <form action="<?php echo $_SERVER ['PHP_SELF'];?>" method="POST" class="form-formularios">
                    <div class="input-container campo-form-solitario">
                        <input maxlength="40"  id="nome-medico-cadastrados" name="nome" class="input-form" type="text" pattern=".+" required />
                        <label class="label-form" for="nome-medico-cadastrados">Médico</label>
                    </div>
                    <button type="submit" name="btnPesquisar" class="search-btn-form" id="btn-div-tabela-medico"><i class="fas fa-search"></i></button>
                </form>
                <form action="<?php echo $_SERVER ['PHP_SELF'];?>" method="POST" class="form-formularios">
                    <br>
                    <div class="input-container campo-form-solitario">
                        <input maxlength="15"  id="crmMedico-medico-cadastrados" name="crm" class="input-form" type="text" pattern=".+" required />
                        <label class="label-form" for="crmMedico-medico-cadastrados">CRM</label>
                    </div>
                    <button type="submit" name="btnPesquisar" class="search-btn-form" id="btn-div-tabela-medico-crm"><i class="fas fa-search"></i></button>
                </form>
                <div id="medicos-cadastrados-adm">
                    <a type="button" class="adicionar-cadastro adicionar" id="btn-div-form-cadastro-medico"><i class="fas fa-plus-circle"></i>
                        <p>Cadastrar Médico</p>
                    </a>
                    <div class="container-tabela-medico"  >
                    <table class="table table-striped">
                    
                
                        <thead>
                            <tr>
                                <th scope="col">Nome do médico</th>
                                <th scope="col">CRM do médico</th>
                                <th scope="col">Especialidade</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(isset($crm)){
                                foreach($listaComCrm as $linha){
                                    echo "<tr>";
                                    echo "<td>".$linha['nomeMedico']."</td>";
                                    echo "<td>".$linha['crmMedico']."</td>";
                                    echo "<td>".$linha['especialidadeMedico']."</td>";
                                    echo "<td><a href='editar-cadastro-medico.php?id=".$linha['codMedico']."' type='button'><i class='fas fa-edit'></i></a></td>";
                                    echo "<td><a type='button' onClick='(confirmarDelete(".$linha['codMedico']."))'><i class='fas fa-trash'></i></a></td>";
                                    echo "</tr>";
                                }

                                if (empty($listaComCrm)){
                                    echo "<tr>";
                                    echo "<td>Vazio</td>";
                                    echo "<td>Vazio</td>";
                                    echo "<td>Vazio</td>";
                                    echo "<td>Vazio</td>";
                                    echo "<td>Vazio</td>";
                                    echo "</tr>";
                                }

                            }else if(isset($nomeMedico)){
                                foreach($listaComNome as $linha){
                                    echo "<tr>";
                                    echo "<td>".$linha['nomeMedico']."</td>";
                                    echo "<td>".$linha['crmMedico']."</td>";
                                    echo "<td>".$linha['especialidadeMedico']."</td>";
                                    echo "<td><a href='editar-cadastro-medico.php?id=".$linha['codMedico']."' type='button'><i class='fas fa-edit'></i></a></td>";
                                    echo "<td><a type='button' onClick='(confirmarDelete(".$linha['codMedico']."))'><i class='fas fa-trash'></i></a></td>";
                                    echo "</tr>";
                                }

                                if (empty($listaComNome)){
                                    echo "<tr>";
                                    echo "<td>Vazio</td>";
                                    echo "<td>Vazio</td>";
                                    echo "<td>Vazio</td>";
                                    echo "<td>Vazio</td>";
                                    echo "<td>Vazio</td>";
                                    echo "<td>Vazio</td>";
                                    echo "</tr>";
                                }

                            }else{
                                foreach($listaCompleta as $linha){
                                    echo "<tr>";
                                    echo "<td>".$linha['nomeMedico']."</td>";
                                    echo "<td>".$linha['crmMedico']."</td>";
                                    echo "<td>".$linha['especialidadeMedico']."</td>";
                                    echo "<td><a href='editar-cadastro-medico.php?id=".$linha['codMedico']."' type='button'><i class='fas fa-edit'></i></a></td>";
                                    echo "<td><a type='button' onClick='(confirmarDelete(".$linha['codMedico']."))'><i class='fas fa-trash'></i></a></td>";
                                    echo "</tr>";
                                }
                            }
                        ?>
                        </tbody>
                    </table>    
                    </div>
                    
                <div class="container-form-medico" style="display: none">
                    <form action="classes/medico/cadastrarMedico.php" method="POST" class="form-formularios" name="formCadastrarMedico" onsubmit="return validaCPF()">
                            <div class="sub-descricao-formulario">
                                <h4>DADOS PESSOAIS</h4>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="cadastroNumeroCRMMedico" name="crmMedico" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="cadastroNumeroCRMMedico">Cadastrar número do CRM<sup>*</sup></label>
                            </div>

                            <div class="input-container campo-form-lado-a-lado">
                                <input id="nomePaciente" name="nomeMedico" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="nomePaciente">Nome Completo:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="nomeSocialPaciente" name="nomeSocialMedico" class="input-form" type="text" pattern=".+"  />
                                <label class="label-form" for="nomeSocialPaciente">Nome Social:</label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="dataNascimentoPaciente" name="dataNascimentoMedico" class="input-form" type="date" />
                                <label class="label-form" for="dataNascimentoPaciente">Data de Nascimento:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <select id="sexoPaciente" name="sexoMedico" class="input-form" type="text">
                                    <option>Feminino</option>
                                    <option>Masculino</option>
                                    <option>Não declarado</option>
                                </select>
                                <label class="label-form" for="sexoPaciente">Sexo:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="nacionalidadePaciente" name="nacionalidadeMedico" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form"  for="nacionalidadePaciente">Nacionalidade:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="cpfPaciente" name="cpfMedico" class="input-form" type="text" pattern=".+" required maxlength="14" onkeydown="mascaraCPF()" />
                                <label class="label-form" for="cpfPaciente">CPF<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="rgPaciente" name="rgMedico" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="rgPaciente">RG<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="orgaoEmissorRgPaciente" name="rgOrgaoMedico" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="orgaoEmissorRgPaciente">Orgão de Emissão<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="dataEmissaoRgPaciente" name="dataEmissorRgMedico" class="input-form" type="date" />
                                <label class="label-form" for="dataEmissaoRgPaciente">Data de Emissão:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <select id="racaPaciente" name="ufMedico" class="input-form" type="text">
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
                                <label class="label-form" for="racaPaciente">UF de emissão<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="cidadeNascimentoPaciente" name="cidadeNascMedico" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="cidadeNascimentoPaciente">Cidade de Nascimento:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <select id="racaCorPaciente" name="racaCorMedico" class="input-form" type="text">
                                    <option>Branco</option>
                                    <option>Pardo</option>
                                    <option>Amarelo</option>
                                    <option>Indígena</option>
                                    <option>Negro</option>
                                </select>
                                <label class="label-form" for="racaCorPaciente">Raça / Cor<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <select id="especialidadeMedicoCadastroFuncionario" name="especialidadeMedico" class="input-form" type="text" pattern=".+" required >
                                    <option>Clinico Geral</option>
                                    <option>Dentista</option>
                                    <option>Ortopedista</option>
                                    <option>Oftalmologista</option>
                                    <option>Pediatra</option>
                                </select>
                                <label class="label-form" for="especialidadeMedicoCadastroFuncionario">Especialidade:<sup>*</sup></label>
                            </div>
                            <div class="sub-descricao-formulario">
                                <h4>DADOS DE CONTATO</h4>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="telefoneCelularPaciente" name="celularMedico" class="input-form"  pattern=".+" />
                                <label class="label-form" for="telefoneCelularPaciente">Telefone Celular:</label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="telefoneFixoPaciente" name="telefoneMedico" class="input-form"  pattern=".+" />
                                <label class="label-form" for="telefoneFixoPaciente">Telefone Residencial:</label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="emailPaciente" name="emailMedico" class="input-form" type="email" pattern=".+" />
                                <label class="label-form" for="emailPaciente">E-mail:</label>
                            </div>
                            <br>
                            <div class="sub-descricao-formulario">
                                <h4>ENDEREÇO</h4>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="cepPaciente" name="cepMedico" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form"  for="cepPaciente">CEP<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <select id="tipoLograduroPaciente" name="tipoLogradouroMedico" class="input-form" type="text">
                                    <option>Rua</option>
                                    <option>Avenida</option>
                                    <option>Alameda</option>
                                    <option>Beco</option>
                                    <option>Travessa</option>
                                    <option>Estrada</option>
                                    <option>Rodovia</option>
                                    <option>Outro</option>
                                </select>
                                <label class="label-form" for="tipoLogradouroPaciente">Tipo de Logradouro:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="logradouroPaciente" name="logradouroMedico" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="logradouroPaciente">Logradouro:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="numerologradouroPaciente" name="numCasaMedico" class="input-form" type="number" pattern=".+" required />
                                <label class="label-form" for="numerologradouroPaciente">Número:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="complementologradouroPaciente" name="complementoMedico" class="input-form" type="text" pattern=".+"  />
                                <label class="label-form" for="complementologradouroPaciente">Complemento:</label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="bairrologradouroPaciente" name="bairroMedico" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="bairrologradouroPaciente">Bairro:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                    <input id="cidadeLogradouroPaciente" name="cidadeMedico" class="input-form" type="text" pattern=".+" required />
                                    <label class="label-form" for="cidadeLogradouroPaciente">Cidade:<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select id="estadoLogradouroPaciente" name="estadoMedico" class="input-form" type="text">
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
                                <center><input value="Cadastrar Médico" type="submit" name="btnCadastrar" class="geral-btn-form"/></center>
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
        </section>
        <script src="../js/confirmarMedicos.js"></script>
        <script src="../../../Sistema/ARIS/js/script-medico.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>

</html>
