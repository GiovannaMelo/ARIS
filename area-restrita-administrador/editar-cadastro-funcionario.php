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
            include_once ('classes/Funcionario.php');
            try {
                $cod = filter_input(INPUT_GET, "id");

                if(isset($cod)){
                    $Funcionario = new Funcionario();

                    $Funcionario->setCodFuncionario($cod);
                    $lista = $Funcionario->listarFuncionarioCod($Funcionario);
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
                <h2>EDITAR CADASTRO FUNCIONÁRIO</h2>
                <hr>
            </div>
            
            <div class="container-form-funcionario">
                        <form action="classes/funcionario/editarFuncionario.php" method="POST" class="form-formularios">
                            <input name="id" value="<?php foreach($lista as $linha){ $id= filter_input(INPUT_GET, "id"); echo $id;}?>" style="display:none;"/>

                            <div class="sub-descricao-formulario">
                                <h4>DADOS PESSOAIS</h4>
                            </div>

                            <div class="input-container campo-form-lado-a-lado">
                                <input name="nomeFuncionario" value="<?php foreach($lista as $linha){echo $linha['nomeFuncionario'];}?>"  id="nomePaciente" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="nomePaciente">Nome Completo:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input name="nomeSocialFuncionario" value="<?php foreach($lista as $linha){echo $linha['nomeSocialFuncionario'];}?>" id="nomeSocialPaciente" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="nomeSocialPaciente">Nome Social:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input name="dataNascimentoFuncionario" value="<?php foreach($lista as $linha){echo $linha['dataNascimentoFuncionario'];}?>" id="dataNascimentoPaciente" class="input-form" type="date" />
                                <label class="label-form" for="dataNascimentoPaciente">Data de Nascimento:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <select name="sexoFuncionario" id="sexoPaciente" class="input-form" type="text">
                                    <?php foreach($lista as $linha){
                                    echo "<option>".$linha['sexoFuncionario']."</option>";
                                    if ($linha['sexoFuncionario'] == "Masculino"){
                                        echo "<option>Feminino</option>";
                                        echo "<option>Não declarado</option>";
                                    }else if ($linha['sexoFuncionario'] == "Feminino"){
                                        echo "<option>Masculino</option>";
                                        echo "<option>Não declarado</option>";
                                    }else if ($linha['sexoFuncionario'] == "Não declarado"){
                                        echo "<option>Masculino</option>";
                                        echo "<option>Feminino</option>";
                                    }
                                    }
                                ?>
                                </select>
                                <label class="label-form" for="sexoPaciente">Sexo:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input name="nacionalidadeFuncionario" value="<?php foreach($lista as $linha){echo ($linha['nacionalidadeFuncionario']);}?>" id="nacionalidadePaciente" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="nacionalidadePaciente">Nacionalidade:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input name="cpfFuncionario" value="<?php foreach($lista as $linha){echo ($linha['cpfFuncionario']);}?>" id="cpfPaciente" id="cpfPaciente" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="cpfPaciente">CPF<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input name="rgFuncionario" value="<?php foreach($lista as $linha){echo ($linha['rgFuncionario']);}?>" id="rgPaciente" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="rgPaciente">RG<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input name="rgOrgaoFuncionario" value="<?php foreach($lista as $linha){echo ($linha['rgOrgaoFuncionario']);}?>" id="orgaoEmissorRgPaciente" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="orgaoEmissorRgPaciente">Orgão de Emissão<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input name="dataRgOrgaoFuncionario" value="<?php foreach($lista as $linha){echo ($linha['dataRgOrgaoFuncionario']);}?>" id="dataEmissaoRgPaciente" class="input-form" type="date" />
                                <label class="label-form" for="dataEmissaoRgPaciente">Data de Emissão:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <select name="ufRgFuncionario" id="racaPaciente" class="input-form" type="text">
                                <?php echo "<option>".$linha['ufRgFuncionario']."</option>";?>
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
                                <input name="municipioNascFuncionario" value="<?php echo $linha['cidadeNascFuncionario'];?>" id="municipioNascimentoPaciente" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="municipioNascimentoPaciente">Município de Nascimento:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <select name="racaCorFuncionario" id="racaCorPaciente" class="input-form" type="text">
                                <?php echo "<option>".$linha['racaCorFuncionario']."</option>";?>
                                    <option>Branco</option>
                                    <option>Pardo</option>
                                    <option>Amarelo</option>
                                    <option>Indígena</option>
                                    <option>Negro</option>
                                </select>
                                <label class="label-form" for="racaCorPaciente">Raça / Cor<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                            <select id="especialidadeMedicoCadastroFuncionario" name="tipoFuncionario" class="input-form" type="text" pattern=".+" required >
                                <?php echo "<option>".$linha['tipoFuncionario']."</option>";?>
                                    <option>Recepcionista</option>
                                    <option>Enfermeiro(a)</option>
                            </select>
                                <label class="label-form" for="especialidadeMedicoCadastroFuncionario">Tipo funcionario:<sup>*</sup></label>
                            </div>
                            <div class="sub-descricao-formulario">
                                <h4>DADOS DE CONTATO</h4>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input name="numeroTelefoneFuncionario" value="<?php echo $linha['numeroTelefoneFuncionario'];?>" id="telefoneCelularPaciente" class="input-form"  pattern=".+"  />
                                <label class="label-form" for="telefoneCelularPaciente">Telefone Celular:</label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input name="numeroCelularFuncionario" value="<?php echo $linha['numeroCelularFuncionario'];?>" id="telefoneFixoPaciente" class="input-form"  pattern=".+"  />
                                <label class="label-form" for="telefoneFixoPaciente">Telefone Residencial:</label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input name="emailFuncionario" value="<?php echo $linha['emailFuncionario'];?>" id="emailPaciente" class="input-form" type="email" pattern=".+" />
                                <label class="label-form" for="emailFuncionario">E-mail:</label>
                            </div>
                            <br>
                            <div class="sub-descricao-formulario">
                                <h4>ENDEREÇO</h4>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input name="cepFuncionario" value="<?php echo $linha['cepFuncionario'];?>" id="cepPaciente" id="cepPaciente" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="cepPaciente">CEP<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <select name="tipoLogradouroFuncionario" id="tipoLograduroPaciente" class="input-form" type="text">
                                <?php echo "<option>".$linha['tipoLogradouroFuncionario']."</option>";?>
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
                                <input name="logradouroFuncionario" value="<?php echo $linha['logradouroFuncionario'];?>" id="logradouroPaciente" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="logradouroPaciente">Logradouro:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input name="numCasaFuncionario" value="<?php echo $linha['numCasaFuncionario'];?>" id="numerologradouroPaciente" class="input-form" type="number" pattern=".+" required />
                                <label class="label-form" for="numerologradouroPaciente">Número:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input name="complementoFuncionario" value="<?php echo $linha['complementoFuncionario'];?>" id="complementologradouroPaciente" class="input-form" type="text" pattern=".+" />
                                <label class="label-form" for="complementologradouroPaciente">Complemento:</label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input name="bairroFuncionario" value="<?php echo $linha['bairroFuncionario'];?>" id="bairrologradouroPaciente" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="bairrologradouroPaciente">Bairro:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input name="municipioFuncionario" value="<?php echo $linha['cidadeFuncionario'];?>" id="municipioLogradouroPaciente" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="municipioLogradouroPaciente">Município:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <select name="estadoLogradouroFuncionario" id="estadoLogradouroPaciente" class="input-form" type="text">
                                <?php echo "<option>".$linha['estadoFuncionario']."</option>";?>
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
