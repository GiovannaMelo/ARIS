<html>

<head>

    <meta charset="utf-8">
    <title>FUNCIONÁRIO</title>
    <link rel="icon" href="../../../Sistema/ARIS/image/icones/iconeAris.jpg">
    <link rel="stylesheet" href="../../../Sistema/ARIS/css/reset.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../Sistema/ARIS/css/estilo-telas-gerais.css">
    <link rel="stylesheet" href="../../../Sistema/ARIS/css/estilo-telas-funcionarios.css">
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
            include_once ('classes/Paciente.php');
            include_once ('classes/Medico.php');
            include_once ('classes/Ocorrencia.php');
            include_once ('classes/Prontuario.php');
            try {
                @$numCartaoSus = $_POST['numCartaoSus'];
                @$numCartaoSus2 = $_POST['numCartaoSus2'];
                @$numCartaoSus3 = $_POST['numCartaoSus3'];
                @$cpf = $_POST['cpf'];
                $cod = filter_input(INPUT_GET, "id");

                $Medico = new Medico();
                $Ocorrencia = new Ocorrencia();
                $Paciente = new Paciente();
                $Prontuario = new Prontuario();

                if(isset($cpf)){
                    $listaCpf = $Paciente->listarComCpf($cpf);
                }else if(isset($numCartaoSus)){
                    $Paciente ->setNumCartaoSusPaciente($numCartaoSus);
                    $listaCartao = $Paciente->listarComCartao($Paciente);
                }else{
                    $listaCompleta = $Paciente->listarTodosPacientes();
                    
                }
                $Paciente->setCodPaciente($cod);
                $Ocorrencia->setcodPaciente($cod);
                $lista = $Paciente->listarComCod($Paciente);
                $listaMedico = $Medico->listarLogin();
                $listaOcorrencia = $Ocorrencia->listarTriagem();
                $listaOcorrenciaCartao = $Ocorrencia->listarComCartao($numCartaoSus2);
                $listaHistorico = $Ocorrencia->listarHistorico($Ocorrencia);

                if(isset($cod)){
                    $listaPaciente = $Ocorrencia->listarPaciente($cod);
                    $listarProntuario = $Prontuario->listarUmProntuario($cod);
                }
                if(isset($numCartaoSus2)){

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
                        <li><a href="#paciente"><i class="fas fa-users"></i>Paciente</a></li>
                        <li><a href="#prontuarios"><i class="fas fa-file-medical"></i>Ocorrências</a></li>
                    </ul>
                </nav>
            </section>
            <footer class="icones-sidebar">
                <div class="div-icones-sidebar">
                    <a href="classes/logout.php"><i class="fas fa-sign-out-alt"></i></a>
                </div>
            </footer>
        </aside>
    </div>
    <section class="main">
        <div class="area-restrita-funcionario">
            <div class="section-paciente">
                <section class="paciente" id="paciente">
                    <div class="titulo-descricao-main">
                        <h2>PACIENTE</h2>
                        <hr>
                        <input value="<?php echo $cod;?>" id="codPacienteInput" style="display:none;">
                    </div>
                    <div class="input-verificacao">
                        <form action="<?php echo $_SERVER ['PHP_SELF']; ?>" method="POST" class="form-formularios-verificacao">
                            <h4>VERIFICAÇÃO</h4>
                            <br>
                            <div class="input-container campo-form-dois-lado-a-lado">
                                <input maxlength="30" id="numeroDoCartaoSUS-pacientes-cadastrados" name="numCartaoSus" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="numeroDoCartaoSUS-pacientes-cadastrados">Número do cartão do SUS</label>
                            </div>
                            <button type="submit" name="btnPesquisar" class="search-btn-form-paciente-sus" id="btn-div-table"><i class="fas fa-search"></i></button>
                        </form>

                        <form action="<?php echo $_SERVER ['PHP_SELF']; ?>" method="POST" class="form-formularios-verificacao-cpf">
                            <div class="input-container campo-form-dois-lado-a-lado container-cpf">
                                <input maxlength="14" onkeydown="mascaraCPF2()" id="cpfPaciente2" name="cpf" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="cpfPaciente2">Número do CPF</label>
                            </div>
                            <button type="submit" class="search-btn-form-paciente-cpf" id="btn-div-table-cpf"><i class="fas fa-search"></i></button>
                           
                        </form>
                        <br>
                        <br>
                        <a type="submit" id="btn-div-form" class="adicionar-cadastro"><i class="fas fa-plus-circle" ></i><p >Cadastrar novo paciente</p></a>
                    </div>
                    <br>
                    <div class="" style="width:80%; margin:0 auto; overflow:auto; max-heigth:70%; ">
                    <br>
                    <div class="tabela-rolavel-funcionario">
                    <table class="table table-striped">
                                <thead>
                                <tr style="color:#0956B9">
                                    <th scope="col">Cartão SUS</th>
                                    <th scope="col">Paciente</th>
                                    <th scope="col">Data de Nascimento</th>
                                    <th scope="col">Imprimir</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(isset($listaCompleta)){
                                    foreach($listaCompleta as $linha){
                                        echo "<tr>";
                                        echo "<td>".$linha['numCartaoSusPaciente']."</td>";
                                        echo "<td><a style='color: black;' href='funcionario.php?id=".$linha['codPaciente']."' type='button' >".$linha['nomePaciente']."</a></td>";
                                        echo "<td>".$linha['dataNascimentoPaciente']."</td>";
                                        echo "<td><a style='color: black;' type='button' href='classes/pdf-prontuario.php?id=".$linha['codPaciente']."'><i class='fas fa-download'/></i></a></td>";
                                        echo "</tr>";
                                    }
                                }else if(isset($listaCartao)){
                                    foreach($listaCartao as $linha){
                                        echo "<tr>";
                                        echo "<td>".$linha['numCartaoSusPaciente']."</td>";
                                        echo "<td><a style='color: black;' href='funcionario.php?id=".$linha['codPaciente']."' type='button' >".$linha['nomePaciente']."</a></td>";
                                        echo "<td>".$linha['dataNascimentoPaciente']."</td>";
                                        echo "<td><a style='color: black;' type='button' href='classes/pdf-prontuario.php?id=".$linha['codPaciente']."'><i class='fas fa-download'/></i></a></td>";
                                        echo "</tr>";
                                    }
                                }else{
                                    foreach($listaCpf as $linha){
                                        echo "<tr>";
                                        echo "<td>".$linha['numCartaoSusPaciente']."</td>";
                                        echo "<td><a style='color: black;' href='funcionario.php?id=".$linha['codPaciente']."' type='button' >".$linha['nomePaciente']."</a></td>";
                                        echo "<td>".$linha['dataNascimentoPaciente']."</td>";
                                        echo "<td><a style='color: black;' type='button' href='classes/pdf-prontuario.php?id=".$linha['codPaciente']."'><i class='fas fa-download'/></i></a></td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                                
                                </tbody>
                            </table>
                            </div>
                            <br>
                </div>
                    <!--                            CADASTRO DA FICHA DA RECEPÇÃO-->
                    <div class="container-form tela-cadastro-paciente"  style="display:none;">
                            <hr>
                            <form action="classes/paciente/cadastrarPaciente.php" method="POST" class="form-formularios" onsubmit="return validaCPF()">
                                <h4>DADOS PESSOAIS</h4>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="cadastroNumeroDocartãoPaciente" name="numCartaoSusPaciente" class="input-form" type="number" pattern=".+" required />
                                    <label class="label-form" for="cadastroNumeroDocartãoPaciente">Cadastrar número do cartão do SUS<sup>*</sup></label>
                                </div>

                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="nomePaciente" name="nomePaciente" class="input-form" type="text" pattern=".+" required />
                                    <label class="label-form" for="nomePaciente">Nome Completo:<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="nomeSocialPaciente" name="nomeSocialPaciente" class="input-form" type="text" pattern=".+"  />
                                    <label class="label-form" for="nomeSocialPaciente">Nome Social:</label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="nomeMaePaciente" name="nomeMaePaciente" class="input-form" type="text" pattern=".+" required />
                                    <label class="label-form" for="nomeMaePaciente">Nome da Mãe:<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="nomePaiPaciente" name="nomePaiPaciente" class="input-form" type="text" pattern=".+" />
                                    <label class="label-form" for="nomePaiPaciente">Nome do Pai:</label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="dataNascimentoPaciente" name="dataNascPaciente" class="input-form" type="date" />
                                    <label class="label-form" for="dataNascimentoPaciente">Data de Nascimento:<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select id="sexoPaciente" name="sexoPaciente" class="input-form" type="text">
                                        <option>Feminino</option>
                                        <option>Masculino</option>
                                        <option>Não declarado</option>
                                    </select>
                                    <label class="label-form" for="sexoPaciente">Sexo:<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="nacionalidadePaciente" name="nacionalidadePaciente" class="input-form" type="text" pattern=".+" required />
                                    <label class="label-form" for="nacionalidadePaciente">Nacionalidade:<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="cpfPaciente" maxlength="14" onkeydown="mascaraCPF()" name="cpfPaciente" class="input-form" type="text" pattern=".+" required />
                                    <label class="label-form" for="cpfPaciente">CPF<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="rgPaciente" name="rgPaciente" class="input-form" type="text" pattern=".+" required />
                                    <label class="label-form" for="rgPaciente">RG<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="orgaoEmissorRgPaciente" name="orgaoEmissorRgPaciente" class="input-form" type="text" pattern=".+" required />
                                    <label class="label-form" for="orgaoEmissorRgPaciente">Orgão de Emissão<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="dataEmissaoRgPaciente" name="dataEmissaoRgPaciente" class="input-form" type="date" />
                                    <label class="label-form" for="dataEmissaoRgPaciente">Data de Emissão:<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select id="racaPaciente" name="ufRgPaciente" class="input-form" type="text">
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
                                    <label class="label-form" for="racaPaciente">UF<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="cidadeNascimentoPaciente" name="cidadeNascPaciente" class="input-form" type="text" pattern=".+" required />
                                    <label class="label-form" for="cidadeNascimentoPaciente">Cidade de Nascimento:<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select id="racaCorPaciente" name="racaCorPaciente" class="input-form" type="text">
                                        <option>Branco</option>
                                        <option>Pardo</option>
                                        <option>Amarelo</option>
                                        <option>Indígena</option>
                                        <option>Negro</option>
                                    </select>
                                    <label class="label-form" for="racaCorPaciente">Raça / Cor<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select id="escolaridadePaciente" name="escolaridadePaciente" class="input-form" type="text">
                                        <option>Analfabeto</option>
                                        <option>Fundamental Completo/Incompleto</option>
                                        <option>Médio Completo/Incompleto</option>
                                        <option>Superior Completo/Incompleto</option>
                                    </select>
                                    <label class="label-form" for="escolaridadePaciente">Escolaridade<sup>*</sup> </label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select id="convenioPaciente" name="convenioPaciente" class="input-form" type="text">
                                        <option>Possui</option>
                                        <option>Não Possui</option>
                                    </select>
                                    <label class="label-form" for="convenioPaciente">Convênio</label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select id="situacaoFamiliarPaciente" name="statusFamiliarPaciente" class="input-form" type="text">
                                        <option>Nuclear</option>
                                        <option>Extensa</option>
                                        <option>Matrimonial</option>
                                        <option>Informal</option>
                                        <option>Monoparental</option>
                                        <option>Unipessoal</option>
                                    </select>
                                    <label class="label-form" for="situacaoFamiliarPaciente">Situação Familiar<sup>*</sup></label>
                                </div>
                                <div class="sub-descricao-formulario">
                                    <h4>DADOS DE CONTATO</h4>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="telefoneCelularPaciente" name="celularPaciente" class="input-form" type="" pattern=".+" />
                                    <label class="label-form" for="telefoneCelularPaciente">Telefone Celular:</label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="telefoneFixoPaciente" name="telefonePaciente" class="input-form" type="" pattern=".+" />
                                    <label class="label-form" for="telefoneFixoPaciente">Telefone Residencial:</label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="emailPaciente" name="emailPaciente" class="input-form" type="email" pattern=".+" />
                                    <label class="label-form" for="emailPaciente">E-mail:</label>
                                </div>
                                <br>
                                <div class="sub-descricao-formulario">
                                    <h4>ENDEREÇO</h4>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="cepPaciente" name="cepPaciente"  class="input-form" type="text" pattern=".+" required />
                                    <label class="label-form" for="cepPaciente">CEP<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select id="tipoLograduroPaciente" name="tipoLogradouroPaciente" class="input-form" type="text">
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
                                    <input id="logradouroPaciente" name="logradouroPaciente" class="input-form" type="text" pattern=".+" required />
                                    <label class="label-form" for="logradouroPaciente">Logradouro:<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="numerologradouroPaciente" name="numCasaPaciente" class="input-form" type="number" pattern=".+" required />
                                    <label class="label-form" for="numerologradouroPaciente">Número:<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="complementologradouroPaciente" name="complementoPaciente" class="input-form" type="text" pattern=".+"/>
                                    <label class="label-form" for="complementologradouroPaciente">Complemento:</label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="bairrologradouroPaciente" name="bairroPaciente" class="input-form" type="text" pattern=".+" required />
                                    <label class="label-form" for="bairrologradouroPaciente">Bairro:<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="cidadeLogradouroPaciente" name="cidadePaciente" class="input-form" type="text" pattern=".+" required />
                                    <label class="label-form" for="cidadeLogradouroPaciente">Cidade:<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select id="estadoLogradouroPaciente" name="estadoPaciente" class="input-form" type="text">
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
                                    <center><input value="Cadastrar Paciente" type="submit" name="btnCadastrar" class="geral-btn-form" /> </center>
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
                        <!--                            FINAL DA FICHA DE CADASTRO DA RECEPÇÃO-->
                    <br>
                    <div class="formulario-paciente">
                        <div class="container-table" id="pacienteTela"style="display:none;">
                            <hr>
                            <center>
                                <h4>FICHA DE CADASTRO DE PACIENTE DA RECEPÇÃO</h4>
                            </center><br>
                            <table class="table table-striped">
                            
                                <thead>
                                    <tr>
                                        <th scope="col">NÚMERO DO CARTÃO DO SUS:</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <?php
                                        if(isset($lista)){
                                            foreach($lista as $linha){
                                                echo "<td>".$linha['numCartaoSusPaciente']."</td>";
                                            }
                                        }else{
                                            echo "<td>Vazio</td>";
                                        }
                                    ?>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th scope="col">Nome completo:</th>
                                        <th scope="col">Nome social:</th>
                                        <th scope="col">Nome da mãe:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <?php
                                        if(isset($lista)){
                                            foreach($lista as $linha){
                                                echo "<td>". $linha['nomePaciente'] ."</td>";
                                                echo "<td>". $linha['nomeSocialPaciente'] ."</td>";
                                                echo "<td>". $linha['nomeMaePaciente'] ."</td>";
                                            }
                                        }else{
                                            echo "<td>Vazio</td>";
                                            echo "<td>Vazio</td>";
                                            echo "<td>Vazio</td>";
                                        }
                                    ?>
                                    </tr>
                                </tbody>


                                <thead>
                                    <tr>
                                        <th scope="col">Nome do pai:</th>
                                        <th scope="col">Data de Nascimento:</th>
                                        <th scope="col">Sexo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <?php
                                        if(isset($lista)){
                                            foreach($lista as $linha){
                                                echo "<td>". $linha['nomePaiPaciente'] ."</td>";
                                                echo "<td>". $linha['dataNascimentoPaciente'] ."</td>";
                                                echo "<td>". $linha['sexoPaciente'] ."</td>";
                                            }
                                        }else{
                                            echo "<td>Vazio</td>";
                                            echo "<td>Vazio</td>";
                                            echo "<td>Vazio</td>";
                                        }
                                    ?>
                                    </tr>
                                </tbody>


                                <thead>
                                    <tr>
                                        <th scope="col">Nacionalidade:</th>
                                        <th scope="col">CPF:</th>
                                        <th scope="col">RG:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <?php
                                        if(isset($lista)){
                                            foreach($lista as $linha){
                                                echo "<td>". $linha['nacionalidadePaciente'] ."</td>";
                                                echo "<td>". $linha['cpfPaciente'] ."</td>";
                                                echo "<td>". $linha['rgPaciente'] ."</td>";
                                            }
                                        }else{
                                            echo "<td>Vazio</td>";
                                            echo "<td>Vazio</td>";
                                            echo "<td>Vazio</td>";
                                        }
                                    ?>
                                    
                                    </tr>
                                </tbody>


                                <thead>
                                    <tr>
                                        <th scope="col">Orgão emissor:</th>
                                        <th scope="col">Data emissão:</th>
                                        <th scope="col">UF:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <?php
                                        if(isset($lista)){
                                            foreach($lista as $linha){
                                                echo "<td>". $linha['rgOrgaoPaciente'] ."</td>";
                                                echo "<td>". $linha['dataRgOrgaoPaciente'] ."</td>";
                                                echo "<td>". $linha['ufRgPaciente'] ."</td>";
                                            }
                                        }else{
                                            echo "<td>Vazio</td>";
                                            echo "<td>Vazio</td>";
                                            echo "<td>Vazio</td>";
                                        }
                                    ?>
                                    </tr>
                                </tbody>


                                <thead>
                                    <tr>
                                        <th scope="col">Cidade de nascimento:</th>
                                        <th scope="col">Escolaridade:</th>
                                        <th scope="col">Convênio:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <?php
                                        if(isset($lista)){
                                            foreach($lista as $linha){
                                                echo "<td>". $linha['cidadeNascPaciente'] ."</td>";
                                                echo "<td>". $linha['escolaridadePaciente'] ."</td>";
                                                echo "<td>". $linha['convenioPaciente'] ."</td>";
                                            }
                                        }else{
                                            echo "<td>Vazio</td>";
                                            echo "<td>Vazio</td>";
                                            echo "<td>Vazio</td>";
                                        }
                                    ?>
                                    </tr>
                                </tbody>


                                <thead>
                                    <tr>
                                        <th scope="col">Situação familiar:</th>
                                        <th scope="col">Telefone celular:</th>
                                        <th scope="col">Telefone residencial:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <?php
                                        if(isset($lista)){
                                            foreach($lista as $linha){
                                                echo "<td>". $linha['statusFamiliar'] ."</td>";
                                                echo "<td>". $linha['numeroCelularPaciente'] ."</td>";
                                                echo "<td>". $linha['numeroTelefonePaciente'] ."</td>";
                                            }
                                        }else{
                                            echo "<td>Vazio</td>";
                                            echo "<td>Vazio</td>";
                                            echo "<td>Vazio</td>";
                                        }
                                    ?>
                                    </tr>
                                </tbody>


                                <thead>
                                    <tr>
                                        <th scope="col">E-mail:</th>
                                        <th scope="col">CEP</th>
                                        <th scope="col">Tipo logradouro:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <?php
                                        if(isset($lista)){
                                            foreach($lista as $linha){
                                                echo "<td>". $linha['emailPaciente'] ."</td>";
                                                echo "<td>". $linha['cepPaciente'] ."</td>";
                                                echo "<td>". $linha['tipoLogradouroPaciente'] ."</td>";
                                            }
                                        }else{
                                            echo "<td>Vazio</td>";
                                            echo "<td>Vazio</td>";
                                            echo "<td>Vazio</td>";
                                        }
                                    ?>
                                    </tr>
                                </tbody>


                                <thead>
                                    <tr>
                                        <th scope="col">Logradouro:</th>
                                        <th scope="col">Número:</th>
                                        <th scope="col">Complemento:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <?php
                                        if(isset($lista)){
                                            foreach($lista as $linha){
                                                echo "<td>". $linha['logradouroPaciente'] ."</td>";
                                                echo "<td>". $linha['numCasaPaciente'] ."</td>";
                                                echo "<td>". $linha['complementoPaciente'] ."</td>";
                                            }
                                        }else{
                                            echo "<td>Vazio</td>";
                                            echo "<td>Vazio</td>";
                                            echo "<td>Vazio</td>";
                                        }
                                    ?>
                                    </tr>
                                </tbody>


                                <thead>
                                    <tr>
                                        <th scope="col">Bairro:</th>
                                        <th scope="col">Cidade:</th>
                                        <th scope="col">Estado:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <?php
                                        if(isset($lista)){
                                            foreach($lista as $linha){
                                                echo "<td>". $linha['bairroPaciente'] ."</td>";
                                                echo "<td>". $linha['cidadePaciente'] ."</td>";
                                                echo "<td>". $linha['estadoPaciente'] ."</td>";
                                            }
                                        }else{
                                            echo "<td>Vazio</td>";
                                            echo "<td>Vazio</td>";
                                            echo "<td>Vazio</td>";
                                        }
                                    ?>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="input-container campo-form-direita">
                                <center><button value="" type="button" class="geral-btn-form" id="btn-div-alter">Alterar dados</button></center>
                            </div>
                        </div>

                        

                        <!--                            ALTERAÇÃO DE DADOS-->
                        <div class="container-alter tela-cadastro-paciente" style="display:none;">
                            <hr>
                            <form action="classes/paciente/editarPaciente.php" method="POST" class="form-formularios">
                                <h4>ALTERAR DADOS PESSOAIS</h4>
                                <div class="input-container campo-form-lado-a-lado" style="display: none;">
                                    <input id="numeroDocartãoPacienteAlteracao" value="<?php if(isset($lista)){foreach($lista as $linha){echo $linha['codPaciente'];}}else if(isset($cpf)){foreach($listaCpf as $linha){echo $linha['codPaciente'];}}else{echo "Vazio";} ?>" name="id" class="input-form" type="text" pattern=".+" required />
                                    <label class="label-form" for="numeroDocartãoPacienteAlteracao">Número do cartão do SUS<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="numeroDocartãoPacienteAlteracao" value="<?php if(isset($lista)){foreach($lista as $linha){echo $linha['numCartaoSusPaciente'];}}else if(isset($cpf)){foreach($listaCpf as $linha){echo $linha['numCartaoSusPaciente'];}}else{echo "Vazio";} ?>" name="numCartaoSusPacienteAlteracao" class="input-form" type="text" pattern=".+" required />
                                    <label class="label-form" for="numeroDocartãoPacienteAlteracao">Número do cartão do SUS<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="nomePacienteAlteracao" value="<?php if(isset($lista)){foreach($lista as $linha){echo $linha['nomePaciente'];}}else if(isset($cpf)){foreach($listaCpf as $linha){echo $linha['nomePaciente'];}}else{echo "Vazio";} ?>" name="nomePacienteAlteracao" class="input-form" type="text" pattern=".+" required />
                                    <label class="label-form" for="nomePacienteAlteracao">Nome Completo:<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="nomeSocialPacienteAlteracao" value="<?php if(isset($lista)){foreach($lista as $linha){echo $linha['nomeSocialPaciente'];}}else if(isset($cpf)){foreach($listaCpf as $linha){echo $linha['nomeSocialPaciente'];}}else{echo "Vazio";} ?>" value="<?php if(isset($lista)){foreach($lista as $linha){echo $linha['numCartaoSusPaciente'];}}else if(isset($cpf)){foreach($listaCpf as $linha){echo $linha['numCartaoSusPaciente'];}}else{echo "Vazio";} ?>" name="nomeSocialPacienteAlteracao"class="input-form" type="text" pattern=".+"  />
                                    <label class="label-form" for="nomeSocialPacienteAlteracao">Nome Social:</label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="nomeMaePacienteAlteracao" value="<?php if(isset($lista)){foreach($lista as $linha){echo $linha['nomeMaePaciente'];}}else if(isset($cpf)){foreach($listaCpf as $linha){echo $linha['nomeMaePaciente'];}}else{echo "Vazio";} ?>" name="nomeMaePacienteAlteracao"class="input-form" type="text" pattern=".+" required />
                                    <label class="label-form" for="nomeMaePacienteAlteracao">Nome da Mãe:<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="nomePaiPacienteAlteracao" value="<?php if(isset($lista)){foreach($lista as $linha){echo $linha['nomePaiPaciente'];}}else if(isset($cpf)){foreach($listaCpf as $linha){echo $linha['nomePaiPaciente'];}}else{echo "Vazio";} ?>" name="nomePaiPacienteAlteracao"class="input-form" type="text" pattern=".+" />
                                    <label class="label-form" for="nomePaiPacienteAlteracao">Nome do Pai:</label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="dataNascimentoPacienteAlteracao" value="<?php if(isset($lista)){foreach($lista as $linha){echo $linha['dataNascimentoPaciente'];}}else if(isset($cpf)){foreach($listaCpf as $linha){echo $linha['dataNascimentoPaciente'];}}else{echo "Vazio";} ?>" name="dataNascPacienteAlteracao"class="input-form" type="date" />
                                    <label class="label-form" for="dataNascimentoPacienteAlteracao">Data de Nascimento:<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select id="sexoPacienteAlteracao" name="sexoPacienteAlteracao"class="input-form" type="text">
                                        <option><?php if(isset($lista)){foreach($lista as $linha){echo $linha['sexoPaciente'];}}else if(isset($cpf)){foreach($listaCpf as $linha){echo $linha['sexoPaciente'];}}else{echo "Vazio";} ?></option>
                                        <option>Feminino</option>
                                        <option>Masculino</option>
                                        <option>Não declarado</option>
                                    </select>
                                    <label class="label-form" for="sexoPacienteAlteracao">Sexo:<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="nacionalidadePacienteAlteracao" value="<?php if(isset($lista)){foreach($lista as $linha){echo $linha['nacionalidadePaciente'];}}else if(isset($cpf)){foreach($listaCpf as $linha){echo $linha['nacionalidadePaciente'];}}else{echo "Vazio";} ?>" name="nacionalidadePacienteAlteracao" class="input-form" type="text" pattern=".+" required />
                                    <label class="label-form" for="nacionalidadePacienteAlteracao">Nacionalidade:<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="cpfPacienteAlteracao" value="<?php if(isset($lista)){foreach($lista as $linha){echo $linha['cpfPaciente'];}}else if(isset($cpf)){foreach($listaCpf as $linha){echo $linha['cpfPaciente'];}}else{echo "Vazio";} ?>" name="cpfPacienteAlteracao" class="input-form" type="text" pattern=".+" required />
                                    <label class="label-form" for="cpfPacienteAlteracao">CPF<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="rgPacienteAlteracao" value="<?php if(isset($lista)){foreach($lista as $linha){echo $linha['rgPaciente'];}}else if(isset($cpf)){foreach($listaCpf as $linha){echo $linha['rgPaciente'];}}else{echo "Vazio";} ?>" name="rgPacienteAlteracao" class="input-form" type="text" pattern=".+" required />
                                    <label class="label-form" for="rgPacienteAlteracao">RG<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="orgaoEmissorRgPacienteAlteracao" value="<?php if(isset($lista)){foreach($lista as $linha){echo $linha['rgOrgaoPaciente'];}}else if(isset($cpf)){foreach($listaCpf as $linha){echo $linha['rgOrgaoPaciente'];}}else{echo "Vazio";} ?>" name="orgaoEmissorRgPacienteAlteracao" class="input-form" type="text" pattern=".+" required />
                                    <label class="label-form" for="orgaoEmissorRgPacienteAlteracao">Orgão de Emissão<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="dataEmissaoRgPacienteAlteracao" value="<?php if(isset($lista)){foreach($lista as $linha){echo $linha['dataRgOrgaoPaciente'];}}else if(isset($cpf)){foreach($listaCpf as $linha){echo $linha['dataRgOrgaoPaciente'];}}else{echo "Vazio";} ?>" name="dataEmissaoRgPacienteAlteracao"class="input-form" type="date" />
                                    <label class="label-form" for="dataEmissaoRgPacienteAlteracao">Data de Emissão:<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select id="racaPacienteAlteracao" name="ufRgPacienteAlteracao" class="input-form" type="text">
                                        <option><?php if(isset($lista)){foreach($lista as $linha){echo $linha['ufRgPaciente'];}}else if(isset($cpf)){foreach($listaCpf as $linha){echo $linha['ufRgPaciente'];}}else{echo "Vazio";} ?></option>
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
                                    <label class="label-form" for="racaPacienteAlteracao">UF<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="municipioNascimentoPacienteAlteracao" value="<?php if(isset($lista)){foreach($lista as $linha){echo $linha['cidadeNascPaciente'];}}else if(isset($cpf)){foreach($listaCpf as $linha){echo $linha['cidadeNascPaciente'];}}else{echo "Vazio";} ?>" name="municipioNascPacienteAlteracao"class="input-form" type="text" pattern=".+" required />
                                    <label class="label-form" for="municipioNascimentoPacienteAlteracao">Cidade de Nascimento:<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select id="racaCorPacienteAlteracao" name="racaCorPacienteAlteracao"class="input-form" type="text">
                                        <option><?php if(isset($lista)){foreach($lista as $linha){echo $linha['racaCorPaciente'];}}else if(isset($cpf)){foreach($listaCpf as $linha){echo $linha['racaCorPaciente'];}}else{echo "Vazio";} ?></option>
                                        <option>Branco</option>
                                        <option>Pardo</option>
                                        <option>Amarelo</option>
                                        <option>Indígena</option>
                                        <option>Negro</option>
                                    </select>
                                    <label class="label-form" for="racaCorPacienteAlteracao">Raça / Cor<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select id="escolaridadePacienteAlteracao" name="escolaridadePacienteAlteracao"  class="input-form" type="text">
                                        <option><?php if(isset($lista)){foreach($lista as $linha){echo $linha['escolaridadePaciente'];}}else if(isset($cpf)){foreach($listaCpf as $linha){echo $linha['escolaridadePaciente'];}}else{echo "Vazio";} ?></option>
                                        <option>Analfabeto</option>
                                        <option>Fundamental Completo/Incompleto</option>
                                        <option>Médio Completo/Incompleto</option>
                                        <option>Superior Completo/Incompleto</option>
                                    </select>
                                    <label class="label-form" for="escolaridadePacienteAlteracao">Escolaridade<sup>*</sup> </label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select id="convenioPacienteAlteracao"  name="convenioPacienteAlteracao"class="input-form" type="text">
                                        <option><?php if(isset($lista)){foreach($lista as $linha){echo $linha['convenioPaciente'];}}else if(isset($cpf)){foreach($listaCpf as $linha){echo $linha['convenioPaciente'];}}else{echo "Vazio";} ?></option>
                                        <option>Possui</option>
                                        <option>Não Possui</option>
                                    </select>
                                    <label class="label-form" for="convenioPacienteAlteracao">Convênio</label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select id="situacaoFamiliarPacienteAlteracao"  name="statusFamiliarPacienteAlteracao" class="input-form" type="text">
                                        <option><?php if(isset($lista)){foreach($lista as $linha){echo $linha['statusFamiliar'];}}else if(isset($cpf)){foreach($listaCpf as $linha){echo $linha['statusFamiliar'];}}else{echo "Vazio";} ?></option>
                                        <option>Nuclear</option>
                                        <option>Extensa</option>
                                        <option>Matrimonial</option>
                                        <option>Informal</option>
                                        <option>Monoparental</option>
                                        <option>Unipessoal</option>
                                    </select>
                                    <label class="label-form" for="situacaoFamiliarPacienteAlteracao">Situação Familiar<sup>*</sup></label>
                                </div>
                                <div class="sub-descricao-formulario">
                                    <h4>ALTERAR DADOS DE CONTATO</h4>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="telefoneCelularPacienteAlteracao" value="<?php if(isset($lista)){foreach($lista as $linha){echo $linha['numeroCelularPaciente'];}}else if(isset($cpf)){foreach($listaCpf as $linha){echo $linha['numeroCelularPaciente'];}}else{echo "Vazio";} ?>" name="celularPacienteAlteracao" class="input-form" type="" pattern=".+" required />
                                    <label class="label-form" for="telefoneCelularPacienteAlteracao">Telefone Celular:</label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="telefoneFixoPacienteAlteracao" value="<?php if(isset($lista)){foreach($lista as $linha){echo $linha['numeroTelefonePaciente'];}}else if(isset($cpf)){foreach($listaCpf as $linha){echo $linha['numeroTelefonePaciente'];}}else{echo "Vazio";} ?>" name="telefonePacienteAlteracao" class="input-form" type="" pattern=".+" required />
                                    <label class="label-form" for="telefoneFixoPacienteAlteracao">Telefone Residencial:</label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="emailPacienteAlteracao" value="<?php if(isset($lista)){foreach($lista as $linha){echo $linha['emailPaciente'];}}else if(isset($cpf)){foreach($listaCpf as $linha){echo $linha['emailPaciente'];}}else{echo "Vazio";} ?>" name="emailPacienteAlteracao" class="input-form" type="email" pattern=".+" required />
                                    <label class="label-form" for="emailPacienteAlteracao">E-mail:</label>
                                </div>
                                <br>
                                <div class="sub-descricao-formulario">
                                    <h4>ALTERAR ENDEREÇO</h4>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="cepPacienteAlteracao" value="<?php if(isset($lista)){foreach($lista as $linha){echo $linha['cepPaciente'];}}else if(isset($cpf)){foreach($listaCpf as $linha){echo $linha['cepPaciente'];}}else{echo "Vazio";} ?>" name="cepPacienteAlteracao"class="input-form" type="text" pattern=".+" required />
                                    <label class="label-form" for="cepPacienteAlteracao">CEP<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select id="tipoLograduroPacienteAlteracao" name="tipoLogradouroPacienteAlteracao"class="input-form" type="text">
                                        <option><?php if(isset($lista)){foreach($lista as $linha){echo $linha['tipoLogradouroPaciente'];}}else if(isset($cpf)){foreach($listaCpf as $linha){echo $linha['tipoLogradouroPaciente'];}}else{echo "Vazio";} ?></option>
                                        <option>Rua</option>
                                        <option>Avenida</option>
                                        <option>Alameda</option>
                                        <option>Beco</option>
                                        <option>Travessa</option>
                                        <option>Estrada</option>
                                        <option>Rodovia</option>
                                        <option>Outro</option>
                                    </select>
                                    <label class="label-form" for="tipoLogradouroPacienteAlteracao">Tipo de Logradouro:<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="logradouroPacienteAlteracao" value="<?php if(isset($lista)){foreach($lista as $linha){echo $linha['logradouroPaciente'];}}else if(isset($cpf)){foreach($listaCpf as $linha){echo $linha['logradouroPaciente'];}}else{echo "Vazio";} ?>" name="logradouroPacienteAlteracao" class="input-form" type="text" pattern=".+" required />
                                    <label class="label-form" for="logradouroPacienteAlteracao">Logradouro:<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="numerologradouroPacienteAlteracao" value="<?php if(isset($lista)){foreach($lista as $linha){echo $linha['numCasaPaciente'];}}else if(isset($cpf)){foreach($listaCpf as $linha){echo $linha['numCasaPaciente'];}}else{echo "Vazio";} ?>" name="numCasaPacienteAlteracao" class="input-form" type="number" pattern=".+" required />
                                    <label class="label-form" for="numerologradouroPacienteAlteracao">Número:<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="complementologradouroPacienteAlteracao" value="<?php if(isset($lista)){foreach($lista as $linha){echo $linha['complementoPaciente'];}}else if(isset($cpf)){foreach($listaCpf as $linha){echo $linha['complementoPaciente'];}}else{echo "Vazio";} ?>" name="complementoPacienteAlteracao" class="input-form" type="text" pattern=".+" required />
                                    <label class="label-form" for="complementologradouroPacienteAlteracao">Complemento:<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="bairrologradouroPacienteAlteracao" value="<?php if(isset($lista)){foreach($lista as $linha){echo $linha['bairroPaciente'];}}else if(isset($cpf)){foreach($listaCpf as $linha){echo $linha['bairroPaciente'];}}else{echo "Vazio";} ?>" name="bairroPacienteAlteracao" class="input-form" type="text" pattern=".+" required />
                                    <label class="label-form" for="bairrologradouroPacienteAlteracao">Bairro:<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="municipioLogradouroPacienteAlteracao" value="<?php if(isset($lista)){foreach($lista as $linha){echo $linha['cidadePaciente'];}}else if(isset($cpf)){foreach($listaCpf as $linha){echo $linha['CidadePaciente'];}}else{echo "Vazio";} ?>" name="estadoPacienteAlteracao" class="input-form" type="text" pattern=".+" required />
                                    <label class="label-form" for="municipioLogradouroPacienteAlteracao">Cidade:<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select id="estadoLogradouroPacienteAlteracao"  name="municipioPacienteAlteracao" class="input-form" type="text">
                                        <option><?php if(isset($lista)){foreach($lista as $linha){echo $linha['estadoPaciente'];}}else if(isset($cpf)){foreach($listaCpf as $linha){echo $linha['estadoPaciente'];}}else{echo "Vazio";} ?></option>
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
                                    <label class="label-form" for="estadoLogradouroPacienteAlteracao">Estado:<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-direita">
                                    <center><input value="Salvar Alterações" type="submit" class="geral-btn-form" /> </center>
                                </div>
                            </form>
                        </div>
                        <!--                            FIM ALTERAÇÃO DE DADOS-->
                    </div>
                </section>
            </div>
        </div>
        <div class="area-restrita-selecionar-medico" id="selecionarMedicoTela" style="display:none;">
            <div class="section-selecionar-medico" >
                <section class="selecionar-prontuarios" id="selecionar-medico">
                    <div class="titulo-descricao-main">
                        <hr>
                        <h2>SELECIONAR MÉDICO E INICIAR OCORRÊNCIA</h2>
                        <hr>
                    </div>
                </section>
            </div>
            <form action="classes/ocorrencia/cadastrarOcorrencia.php" method="POST" class="form-formularios">
                <input type="text" style="display: none;" value="<?php echo $linha['codPaciente']."-".$numCartaoSus;?>" name="pacienteEscolhido">
                <input style="display: none;" value="<?php foreach($listarProntuario as $linha){echo $linha['codProntuario'];}?>" name="codProntuario">
                <div class="input-container campo-form-solitario">
                    <select id="medicoAtendimentoRecepcao" name="medicoEscolhido" class="input-form" type="text">
                        <?php
                            foreach($listaMedico as $linha){
                                echo "<option >".$linha['codMedico']."-".$linha['nomeMedico']."</option>";
                            }
                        ?>
                    </select>
                    
                    <label class="label-form" for="medicoAtendimentoRecepcao">Selecione um médico para atendimento:<sup>*</sup></label>
                </div>
                
                <br>
                <div class="input-container campo-form-direita">
                    <center><button  type="submit" class="geral-btn-form">Iniciar ocorrência</button></center>
                </div>
            </form>
        </div>

        <div class="area-restrita-funcionario">
            <div class="section-prontuarios">
                <section class="prontuarios" id="prontuarios">
                    <div class="titulo-descricao-main">
                        <hr>
                        <h2>OCORRÊNCIAS EM ANDAMENTO</h2>
                        <hr>
                    </div>
                    <div class="container-prontuario">
                                <div class="menu-prontuario">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Em Andamento</a>
                                        </li>  
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <form action="" method="POST" class="form-formularios">
                                            <div class="input-container campo-form-solitario">
                                                <input name="numCartaoSus2" id="numeroDoCartaoSUS-prontuarios" class="input-form" type="text" pattern=".+" required />
                                                <label class="label-form" for="numeroDoCartaoSUS-prontuarios">Número do cartão do SUS</label>
                                            </div>
                                            <button type="submit" name="btnPesquisar" class="search-btn-form"><i class="fas fa-search"></i></button>
                                        </form>
                                        <div class="prontuarios-em-andamento">
                                        <div class="tabela-rolavel-funcionario">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Cartão SUS</th>
                                                            <th scope="col">Paciente</th>
                                                            <th scope="col">Emissão</th>
                                                            <th scope="col">Situação</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        if(isset($numCartaoSus2)){
                                                            foreach($listaOcorrenciaCartao as $linha){
                                                                echo "<tr>";
                                                                echo "<td>".$linha['numCartaoSusPaciente']."</td>";
                                                                echo "<td>".$linha['nomePaciente']."</td>";
                                                                echo "<td>".$linha['horaEntradaOcorrencia']."</td>";
                                                                if($linha['statusOcorrencia'] == "triagem"){
                                                                    echo "<td><center><i class='fas fa-circle' style='color: #F2E30F;'> </center></i></a></td>";
                                                                }else if($linha['statusOcorrencia'] == "consulta"){
                                                                    echo "<td><center><i class='fas fa-circle' style='color: #277CEB;'> </center></i></a></td>";
                                                                }else if($linha['statusOcorrencia'] == "cancelado"){
                                                                    echo "<td><center><i class='fas fa-circle' style='color: #D91E1E;'> </center></i></a></td>";
                                                                }
                                                                    echo "</tr>";
                                                            }
                                                        }else{
                                                            foreach($listaOcorrencia as $linha){
                                                                echo "<tr>";
                                                                echo "<td>".$linha['numCartaoSusPaciente']."</td>";
                                                                echo "<td>".$linha['nomePaciente']."</td>";
                                                                echo "<td>".$linha['horaEntradaOcorrencia']."</td>";
                                                                if($linha['statusOcorrencia'] == "triagem"){
                                                                    echo "<td><center><i class='fas fa-circle' style='color: #F2E30F;'> </center></i></a></td>";
                                                                }else if($linha['statusOcorrencia'] == "consulta"){
                                                                    echo "<td><center><i class='fas fa-circle' style='color: #277CEB;'> </center></i></a></td>";
                                                                }else if($linha['statusOcorrencia'] == "cancelado"){
                                                                    echo "<td><center><i class='fas fa-circle' style='color: #D91E1E;'> </center></i></a></td>";
                                                                }
                                                                echo "</tr>";
                                                            }
                                                        }
                                                    ?>
                                                    
                                                    </tbody>
                                                 </table>
                                                 </div>
                                                 <div class="legenda-prontuarios">
                                                <div>
                                                    <a class="triagem"><i class="fas fa-circle"> <p class="legenda-nome">Triagem</p></i></a>
                                                </div>
                                                <div>
                                                    <a class="consulta"><i class="fas fa-circle"> <p class="legenda-nome">Consulta</p></i></a>
                                                </div>
                                                <div>
                                                    <a class="finalizado"><i class="fas fa-circle"> <p class="legenda-nome">Finalizado</p></i></a>
                                                </div>
                                                <div>
                                                    <a class="cancelado"><i class="fas fa-circle"> <p class="legenda-nome">Cancelado</p></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             </div>
                        </div>
                </section>
            </div>
            <div class="section-historico" id="historicoTela" style="display:none;">
                <section class="historico" id="historico">
                    <div class="titulo-descricao-main">
                        <hr>
                        <h2>HISTÓRICO DE OCORRÊNCIAS</h2>
                        <hr>
                    </div>
                    <div class="" style="">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Cartão SUS</th>
                                    <th scope="col">Paciente</th>
                                    <th scope="col">Data de emissão</th>
                                    <th scope="col">Imprimir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(isset($listaHistorico)){
                                        foreach($listaHistorico as $linha){
                                            echo"<tr>";
                                            echo "<td>". $linha['numCartaoSusPaciente'] ."</td>";
                                            echo "<td>". $linha['nomePaciente'] ."</td>";
                                            echo "<td>". $linha['dataOcorrencia'] ."</td>";
                                            echo "<td><i class='fas fa-download'/></i></td>";
                                            echo"</tr>";
                                        }
                                    }
                                    if(empty($listaHistorico)){
                                        echo "<td>Vazio</td>";
                                        echo "<td>Vazio</td>";
                                        echo "<td>Vazio</td>";
                                        echo "<td>Vazio</td>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <script language="javascript" type="text/javascript">
        function escondeDivs(){
            var inputCodPaciente = document.getElementById('codPacienteInput').value;
            var telaPaciente = document.getElementById('pacienteTela');
            var telaSelecionarMedico = document.getElementById('selecionarMedicoTela');
            var telaHistorico = document.getElementById('historicoTela');

            if(inputCodPaciente>0){
                telaPaciente.style.display = "block";
                telaSelecionarMedico.style.display = "block";
                telaHistorico.style.display = "block";
            }
        }
        escondeDivs();
    </script>
    <script src="../js/confirmarPaciente.js"></script>
    <script src="../../../Sistema/ARIS/js/script-funcionario.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>
