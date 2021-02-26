<html>
    <head>

        <meta charset="utf-8">
        <title>ARIS - EDITAR CADASTRO</title>
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
                $cod = filter_input(INPUT_GET, "id");

                if(isset($cod)){
                    $Medico = new Medico();

                    $Medico->setCodMedico($cod);
                    $lista = $Medico->listarMedicoCod($Medico);
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
                        <a href="../../../Sistema/ARIS/index.php"><i class="fas fa-sign-out-alt"></i></a>
                    </div>
                </footer>
            </aside>

        </div>
        <section class="main">
            <div class="titulo-descricao-main">
                <h2>EDITAR CADASTRO MÉDICO</h2>
                <hr>
            </div>
            
                <div class="container-form-medico">
                    <form action="classes/medico/editarMedico.php" method="POST" class="form-formularios">
                    <input name="id" value="<?php foreach($lista as $linha){ $id= filter_input(INPUT_GET, "id"); echo $id;}?>" style="display:none;"/>
                        <div class="sub-descricao-formulario">
                            <h4>DADOS PESSOAIS</h4>
                        </div>
                        <div class="input-container campo-form-lado-a-lado">
                            <input name="crmMedico" value="<?php foreach($lista as $linha){echo $linha['crmMedico'];}?>" id="editarNumeroCRMMedico" class="input-form" type="text" pattern=".+" required />
                            <label class="label-form" for="editarNumeroCRMMedico">Editar número do CRM<sup>*</sup></label>
                        </div>

                        <div class="input-container campo-form-lado-a-lado">
                            <input name="nomeMedico" value="<?php foreach($lista as $linha){echo $linha['nomeMedico'];}?>" id="nomePaciente" class="input-form" type="text" pattern=".+" required />
                            <label class="label-form" for="nomePaciente">Nome Completo:<sup>*</sup></label>
                        </div>
                        <div class="input-container campo-form-lado-a-lado">
                            <input name="nomeSocialMedico" value="<?php foreach($lista as $linha){echo $linha['nomeSocialMedico'];}?>" id="nomeSocialPaciente" class="input-form" type="text" pattern=".+" required />
                            <label class="label-form" for="nomeSocialPaciente">Nome Social:<sup>*</sup></label>
                        </div>
                        <div class="input-container campo-form-lado-a-lado">
                            <input name="dataNascimentoMedico" value="<?php foreach($lista as $linha){echo ($linha['dataNascimentoMedico']);}?>" id="dataNascimentoPaciente" class="input-form" type="date" />
                            <label class="label-form" for="dataNascimentoPaciente">Data de Nascimento:<sup>*</sup></label>
                        </div>
                        <div class="input-container campo-form-lado-a-lado">
                            <select name="sexoMedico" id="sexoPaciente" class="input-form" type="text">
                            <?php foreach($lista as $linha){
                                echo "<option>".$linha['sexoMedico']."</option>";
                                if ($linha['sexoMedico'] == "Masculino"){
                                    echo "<option>Feminino</option>";
                                    echo "<option>Não declarado</option>";
                                }else if ($linha['sexoMedico'] == "Feminino"){
                                    echo "<option>Masculino</option>";
                                    echo "<option>Não declarado</option>";
                                }else if ($linha['sexoMedico'] == "Não declarado"){
                                    echo "<option>Masculino</option>";
                                    echo "<option>Feminino</option>";
                                }
                            }
                            ?>
                            </select>
                            <label class="label-form" for="sexoPaciente">Sexo:<sup>*</sup></label>
                        </div>
                        <div class="input-container campo-form-lado-a-lado">
                            <input name="nacionalidadeMedico" value="<?php foreach($lista as $linha){echo ($linha['nacionalidadeMedico']);}?>" id="nacionalidadePaciente" class="input-form" type="text" pattern=".+" required />
                            <label class="label-form" for="nacionalidadePaciente">Nacionalidade:<sup>*</sup></label>
                        </div>
                        <div class="input-container campo-form-lado-a-lado">
                            <input name="cpfMedico" value="<?php foreach($lista as $linha){echo ($linha['cpfMedico']);}?>" id="cpfPaciente" class="input-form" type="text" pattern=".+" required />
                            <label class="label-form" for="cpfPaciente">CPF<sup>*</sup></label>
                        </div>
                        <div class="input-container campo-form-lado-a-lado">
                            <input name="rgMedico" value="<?php foreach($lista as $linha){echo ($linha['rgMedico']);}?>" id="rgPaciente" class="input-form" type="text" pattern=".+" required />
                            <label class="label-form" for="rgPaciente">RG<sup>*</sup></label>
                        </div>
                        <div class="input-container campo-form-lado-a-lado">
                            <input name="rgOrgaoMedico" value="<?php foreach($lista as $linha){echo ($linha['rgOrgaoMedico']);}?>" id="orgaoEmissorRgPaciente" class="input-form" type="text" pattern=".+" required />
                            <label class="label-form" for="orgaoEmissorRgPaciente">Orgão de Emissão RG<sup>*</sup></label>
                        </div>
                        <div class="input-container campo-form-lado-a-lado">
                            <input name="dataRgOrgaoMedico" value="<?php foreach($lista as $linha){echo ($linha['dataRgOrgaoMedico']);}?>" id="dataEmissaoRgPaciente" class="input-form" type="date" />
                            <label class="label-form" for="dataEmissaoRgPaciente">Data de Emissão RG:<sup>*</sup></label>
                        </div>
                        <div class="input-container campo-form-lado-a-lado">
                            <select name="ufRgMedico" id="racaPaciente" class="input-form" type="text">
                                <?php echo "<option>".$linha['ufRgMedico']."</option>";?>
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
                            <label class="label-form" for="racaPaciente">UF de emissão RG<sup>*</sup></label>
                        </div>
                        <div class="input-container campo-form-lado-a-lado">
                            <input name="municipioNascMedico" value="<?php echo $linha['cidadeNascMedico'];?>" id="municipioNascimentoPaciente" class="input-form" type="text" pattern=".+" required />
                            <label class="label-form" for="municipioNascimentoPaciente">Município de Nascimento:<sup>*</sup></label>
                        </div>
                        <div class="input-container campo-form-lado-a-lado">
                            <select name="racaCorMedico" id="racaCorPaciente" class="input-form" type="text">
                            <?php echo "<option>".$linha['racaCorMedico']."</option>";?>
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
                                    <?php echo "<option>".$linha['especialidadeMedico']."</option>";?>
                                    <option>Clinico Geral</option>
                                    <option>Odontológico</option>
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
                            <input name="numeroTelefoneMedico" value="<?php echo $linha['numeroTelefoneMedico'];?>" id="telefoneCelularPaciente" class="input-form"  pattern=".+"  />
                            <label class="label-form" for="telefoneCelularPaciente">Telefone Celular:</label>
                        </div>
                        <div class="input-container campo-form-lado-a-lado">
                            <input name="numeroCelularMedico" value="<?php echo $linha['numeroCelularMedico'];?>" id="telefoneFixoPaciente" class="input-form"  pattern=".+"  />
                            <label class="label-form" for="telefoneFixoPaciente">Telefone Residencial:</label>
                        </div>
                        <div class="input-container campo-form-lado-a-lado">
                            <input name="emailMedico" value="<?php echo $linha['emailMedico'];?>" id="emailPaciente" class="input-form" type="email" pattern=".+"  />
                            <label class="label-form" for="emailFixoPaciente">E-mail:</label>
                        </div>
                        <br>
                        <div class="sub-descricao-formulario">
                            <h4>ENDEREÇO</h4>
                        </div>
                        <div class="input-container campo-form-lado-a-lado">
                            <input name="cepMedico" value="<?php echo $linha['cepMedico'];?>" id="cepPaciente" class="input-form" type="text" pattern=".+" required />
                            <label class="label-form" for="cepPaciente">CEP<sup>*</sup></label>
                        </div>
                        <div class="input-container campo-form-lado-a-lado">
                            <select name="tipoLogradouroMedico" id="tipoLograduroPaciente" class="input-form" type="text">
                                <?php echo "<option>".$linha['tipoLogradouroMedico']."</option>";?>
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
                            <input name="logradouroMedico" value="<?php echo $linha['logradouroMedico'];?>" id="logradouroPaciente" class="input-form" type="text" pattern=".+" required />
                            <label class="label-form" for="logradouroPaciente">Logradouro:<sup>*</sup></label>
                        </div>
                        <div class="input-container campo-form-lado-a-lado">
                            <input name="numCasaMedico" value="<?php echo $linha['numCasaMedico'];?>" id="numerologradouroPaciente" class="input-form" type="number" pattern=".+" required />
                            <label class="label-form" for="numerologradouroPaciente">Número:<sup>*</sup></label>
                        </div>
                        <div class="input-container campo-form-lado-a-lado">
                            <input name="complementoMedico" value="<?php echo $linha['complementoMedico'];?>" id="complementologradouroPaciente" class="input-form" type="text" pattern=".+" />
                            <label class="label-form" for="complementologradouroPaciente">Complemento:</label>
                        </div>
                        <div class="input-container campo-form-lado-a-lado">
                            <input name="bairroMedico" value="<?php echo $linha['bairroMedico'];?>" id="bairrologradouroPaciente" class="input-form" type="text" pattern=".+" required />
                            <label class="label-form" for="bairrologradouroPaciente">Bairro:<sup>*</sup></label>
                        </div>
                        <div class="input-container campo-form-lado-a-lado">
                            <input name="municipioMedico" value="<?php echo $linha['cidadeMedico'];?>" id="municipioLogradouroPaciente" class="input-form" type="text" pattern=".+" required />
                            <label class="label-form" for="municipioLogradouroPaciente">Município:<sup>*</sup></label>
                        </div>
                        <div class="input-container campo-form-lado-a-lado">
                            <select name="estadoLogradouroMedico" id="estadoLogradouroPaciente" class="input-form" type="text">
                            <?php echo "<option>".$linha['estadoMedico']."</option>";?>
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
                            <center><button  type="submit" class="geral-btn-form">Salvar</button></center>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <script src="../../../Sistema/ARIS/js/script-medico.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>

</html>
