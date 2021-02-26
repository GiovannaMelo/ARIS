<html>

<head>

    <meta charset="utf-8">
    <title>ENFERMEIROS</title>
    <link rel="icon" href="../../../Sistema/ARIS/image/icones/iconeAris.jpg">
    <link rel="stylesheet" href="../../../Sistema/ARIS/css/reset.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../Sistema/ARIS/css/estilo-telas-gerais.css">
    <link rel="stylesheet" href="../../../Sistema/ARIS/css/estilo-telas-enfermeiro.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/86027f91a6.js" crossorigin="anonymous"></script>
    <script src="../../../Sistema/ARIS/js/script-anamnese.js"></script>
    
    <?php
            include ("../valida-login.php");
            include ("valida-tipologin.php");
            include_once ('classes/Conexao.php');
            include_once ('classes/Ocorrencia.php');
            //include_once ('classes/Prontuario.php');
            include_once ('classes/Anamnese.php');
            try {
                @$numCartaoSus = $_POST['numCartaoSus'];
                $cod = filter_input(INPUT_GET, "id");

                $Ocorrencia = new Ocorrencia();
                $Anamnese = new Anamnese();                                        
                $lista = $Ocorrencia->listarOcorrenciaTriagem();
                if(isset($cod)){
                    $listaPaciente = $Ocorrencia->listarPaciente($cod);
                    $listaAnamnese = $Anamnese->listar($cod);
                }
                $listaCartao = $Ocorrencia->listarOcorrenciaCartao($numCartaoSus);

                

                

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
                        <li><a href="#prontuarios"><i class="fas fa-file-medical"></i>Prontuários</a></li>
                        <li><a href="#anamnese"><i class="fas fa-book-medical"></i>Anamnese</a></li>
                        <li><a href="#triagem"><i class="fas fa-file-medical"></i>Triagem</a></li>
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
    <input value="<?php echo $cod;?>" id="codPacienteInput" style="display:none">
        
        <div class="area-restrita-enfermeiro">
        
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
                                    <form action="#prontuarios" method="POST" class="form-formularios">
                                            <div class="input-container campo-form-dois-lado-a-lado">
                                                <input id="numeroDoCartaoSUS-prontuarios" name="numCartaoSus" class="input-form" type="text" pattern=".+" required />
                                                <label class="label-form" for="numeroDoCartaoSUS-prontuarios">Número do cartão do SUS</label>
                                            </div>
                                            <button type="submit" name="btnPesquisar" class="search-btn-form-prontuario-sus"><i class="fas fa-search"></i></button>
                                            <br>
                                        </form>
                                        <div class="prontuarios-em-andamento">
                                                <table class="table table-striped">
                                                
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Cartão SUS</th>
                                                            <th scope="col">Paciente</th>
                                                            <th scope="col">Emissão</th>
                                                            <th scope="col">Situação</th>
                                                            <th scope="col">Finalizar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        if(isset($numCartaoSus)){
                                                            foreach($listaCartao as $linha){
                                                                echo "<tr>";
                                                                echo "<td>".$linha['numCartaoSusPaciente']."</td>";
                                                                echo "<td><a  style='color: black;' href='enfermeiro.php?id=".$linha['codPaciente']."' type='button' >".$linha['nomePaciente']."</a></td>";
                                                                echo "<td>".$linha['horaEntradaOcorrencia']."</td>";
                                                                if($linha['statusOcorrencia'] == "triagem"){
                                                                    echo "<td><center><i class='fas fa-circle' style='color: #F2E30F;'> </center></i></a></td>";
                                                                }else if($linha['statusOcorrencia'] == "consulta"){
                                                                    echo "<td><center><i class='fas fa-circle' style='color: #277CEB;'> </center></i></a></td>";
                                                                }else if($linha['statusOcorrencia'] == "cancelado"){
                                                                    echo "<td><center><i class='fas fa-circle' style='color: #D91E1E;'> </center></i></a></td>";
                                                                }
                                                                echo "<td><a type='button' onClick='(cancelarProntuario(".$linha['codProntuario']."))'><i class='fas fa-times'></i></a></td>";
                                                                echo "</tr>";
                                                            }
                                                        }else{
                                                            foreach($lista as $linha){
                                                                echo "<tr>";
                                                                echo "<td>".$linha['numCartaoSusPaciente']."</td>";
                                                                echo "<td><a style='color: black;' href='enfermeiro.php?id=".$linha['codPaciente']."' type='button' >".$linha['nomePaciente']."</a></td>";
                                                                echo "<td>".$linha['horaEntradaOcorrencia']."</td>";
                                                                if($linha['statusOcorrencia'] == "triagem"){
                                                                    echo "<td><center><i class='fas fa-circle' style='color: #F2E30F;'> </center></i></a></td>";
                                                                }else if($linha['statusOcorrencia'] == "consulta"){
                                                                    echo "<td><center><i class='fas fa-circle' style='color: #277CEB;'> </center></i></a></td>";
                                                                }else if($linha['statusOcorrencia'] == "cancelado"){
                                                                    echo "<td><center><i class='fas fa-circle' style='color: #D91E1E;'> </center></i></a></td>";
                                                                }
                                                                echo "<td><a type='button' onClick='(cancelarOcorrencia(".$linha['codOcorrencia']."))' class='fas fa-times'></a></td>";
                                                                echo "</tr>";
                                                            }
                                                        }
                                                    ?>
                                                    </tbody>
                                                 </table>
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
            <div class="area-restrita-enfermeiro">
            <div class="section-paciente" id="pacienteTela" style="display:none">
                <section class="paciente" id="paciente">
                    <div class="titulo-descricao-main">
                        <h2>PACIENTE</h2>
                        <hr>
                    </div>
                    <div class="formulario-paciente">
                        <center>
                            <h4>INFORMAÇÕES DO PACIENTE</h4>
                        </center>
                        <hr><br>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">NÚMERO DO CARTÃO DO SUS:</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    if (isset($listaPaciente)){
                                        foreach($listaPaciente as $linha){
                                            echo "<tr>";
                                            echo "<td>".$linha['numCartaoSusPaciente']."</td>";
                                            echo "<tr>";
                                        }
                                    }else{
                                            echo "<tr>";
                                            echo "<td>--</td>";
                                            echo "<tr>";
                                    }
                                ?>
                            </tbody>
                            <thead>
                                <tr>
                                    <th scope="col">Nome completo:</th>
                                    <th scope="col">Nome social:</th>
                                    <th scope="col">Nome da mãe:</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    if (isset($listaPaciente)){
                                        foreach($listaPaciente as $linha){
                                            echo "<tr>";
                                            echo "<td>".$linha['nomePaciente']."</td>";
                                            echo "<td>".$linha['nomeSocialPaciente']."</td>";
                                            echo "<td>".$linha['nomeMaePaciente']."</td>";
                                            echo "<tr>";
                                        }
                                    }else{
                                            echo "<tr>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<tr>";
                                    }
                                ?>
                            </tbody>


                            <thead>
                                <tr>
                                    <th scope="col">Nome do pai:</th>
                                    <th scope="col">Data de Nascimento:</th>
                                    <th scope="col">Sexo</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    if (isset($listaPaciente)){
                                        foreach($listaPaciente as $linha){
                                            echo "<tr>";
                                            echo "<td>".$linha['nomePaiPaciente']."</td>";
                                            echo "<td>".$linha['dataNascimentoPaciente']."</td>";
                                            echo "<td>".$linha['sexoPaciente']."</td>";
                                            echo "<tr>";
                                        }
                                    }else{
                                            echo "<tr>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<tr>";
                                    }
                                ?>
                            </tbody>


                            <thead>
                                <tr>
                                    <th scope="col">Nacionalidade:</th>
                                    <th scope="col">CPF:</th>
                                    <th scope="col">RG:</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    if (isset($listaPaciente)){
                                        foreach($listaPaciente as $linha){
                                            echo "<tr>";
                                            echo "<td>".$linha['nacionalidadePaciente']."</td>";
                                            echo "<td>".$linha['cpfPaciente']."</td>";
                                            echo "<td>".$linha['rgPaciente']."</td>";
                                            echo "<tr>";
                                        }
                                    }else{
                                            echo "<tr>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<tr>";
                                    }
                                ?>
                            </tbody>


                            <thead>
                                <tr>
                                    <th scope="col">Orgão emissor:</th>
                                    <th scope="col">Data emissão:</th>
                                    <th scope="col">UF:</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    if (isset($listaPaciente)){
                                        foreach($listaPaciente as $linha){
                                            echo "<tr>";
                                            echo "<td>".$linha['rgOrgaoPaciente']."</td>";
                                            echo "<td>".$linha['dataRgOrgaoPaciente']."</td>";
                                            echo "<td>".$linha['ufRgPaciente']."</td>";
                                            echo "<tr>";
                                        }
                                    }else{
                                            echo "<tr>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<tr>";
                                    }
                                ?>
                            </tbody>


                            <thead>
                                <tr>
                                    <th scope="col">Município de nascimento:</th>
                                    <th scope="col">Escolaridade:</th>
                                    <th scope="col">Convênio:</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    if (isset($listaPaciente)){
                                        foreach($listaPaciente as $linha){
                                            echo "<tr>";
                                            echo "<td>".$linha['cidadeNascPaciente']."</td>";
                                            echo "<td>".$linha['escolaridadePaciente']."</td>";
                                            echo "<td>".$linha['convenioPaciente']."</td>";
                                            echo "<tr>";
                                        }
                                    }else{
                                            echo "<tr>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<tr>";
                                    }
                                ?>
                            </tbody>


                            <thead>
                                <tr>
                                    <th scope="col">Situação familiar:</th>
                                    <th scope="col">Telefone celular:</th>
                                    <th scope="col">Telefone residencial:</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    if (isset($listaPaciente)){
                                        foreach($listaPaciente as $linha){
                                            echo "<tr>";
                                            echo "<td>".$linha['statusFamiliar']."</td>";
                                            echo "<td>".$linha['numeroCelularPaciente']."</td>";
                                            echo "<td>".$linha['numeroTelefonePaciente']."</td>";
                                            echo "<tr>";
                                        }
                                    }else{
                                            echo "<tr>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<tr>";
                                    }
                                ?>
                            </tbody>


                            <thead>
                                <tr>
                                    <th scope="col">E-mail:</th>
                                    <th scope="col">CEP</th>
                                    <th scope="col">Tipo logradouro:</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    if (isset($listaPaciente)){
                                        foreach($listaPaciente as $linha){
                                            echo "<tr>";
                                            echo "<td>".$linha['emailPaciente']."</td>";
                                            echo "<td>".$linha['cepPaciente']."</td>";
                                            echo "<td>".$linha['tipoLogradouroPaciente']."</td>";
                                            echo "<tr>";
                                        }
                                    }else{
                                            echo "<tr>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<tr>";
                                    }
                                ?>
                            </tbody>


                            <thead>
                                <tr>
                                    <th scope="col">Logradouro:</th>
                                    <th scope="col">Número:</th>
                                    <th scope="col">Complemento:</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    if (isset($listaPaciente)){
                                        foreach($listaPaciente as $linha){
                                            echo "<tr>";
                                            echo "<td>".$linha['logradouroPaciente']."</td>";
                                            echo "<td>".$linha['numCasaPaciente']."</td>";
                                            echo "<td>".$linha['complementoPaciente']."</td>";
                                            echo "<tr>";
                                        }
                                    }else{
                                            echo "<tr>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<tr>";
                                    }
                                ?>
                            </tbody>


                            <thead>
                                <tr>
                                    <th scope="col">Bairro:</th>
                                    <th scope="col">Município:</th>
                                    <th scope="col">Estado:</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    if (isset($listaPaciente)){
                                        foreach($listaPaciente as $linha){
                                            echo "<tr>";
                                            echo "<td>".$linha['bairroPaciente']."</td>";
                                            echo "<td>".$linha['cidadePaciente']."</td>";
                                            echo "<td>".$linha['estadoPaciente']."</td>";
                                            echo "<tr>";
                                        }
                                    }else{
                                            echo "<tr>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
        <div class="area-restrita-enfermeiro">
            <div class="section-anamnese" id="anamneseTela" style="display:none;">
                <section class="anamnese"  id="anamnese">
                    <div class="titulo-descricao-main">
                        <hr>
                        <h2>ANAMNESE</h2>
                        <hr>
                    </div>
                    <div class="tela-cadastro-ficha-anamnese">
                            <button style="display:none" type="submit" class="search-btn-form" id="btn-div-formulario-anamnese"><i class="fas fa-search"></i></button>
                        <a  type="button" class="adicionar-cadastro" id="btn-div-cadastrar-anamnese"><i class="fas fa-plus-circle" ></i>
                                <p>Cadastrar anamnese</p>
                            </a>
                        <div class="container-formulario-anamnese" style="display:none;">
                            <form action="classes/anamnese/cadastrarAnamnese.php" method="POST" class="form-formularios">
                                <div class="input-container campo-form-lado-a-lado">
                                    <input value="<?php if (isset($listaPaciente)){foreach($listaPaciente as $linha){echo $linha['nomePaciente'];}}?>" id="nomePacienteFichaAnamnese" class="input-form" type="text" pattern=".+" required />
                                    <label class="label-form" for="nomePacienteFichaAnamnese">Nome do Paciente:<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input value="<?php if (isset($listaPaciente)){foreach($listaPaciente as $linha){date_default_timezone_set('America/Sao_Paulo');$anoAtual = date('y');$anoNascimento = date('y',strtotime($linha['dataNascimentoPaciente']));$idade =  $anoAtual - $anoNascimento;echo $idade;}
                                    }?>" id="idadeFichaAnamnese" class="input-form" type="number" pattern=".+" required />
                                    <label class="label-form" for="idadeFichaAnamnese">Idade:<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input name="dataNascimento" value="<?php if (isset($listaPaciente)){foreach($listaPaciente as $linha){echo $linha['dataNascimentoPaciente'];}}?>" id="dataNascimentoAnamnese" class="input-form" type="date" />
                                    <label class="label-form" for="dataNascimentoAnamnese">Data de nascimento:<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select  name="tratamentoMedico" id="tratamentoMedicoAnamnese" class="input-form" type="text">
                                        <option>Não</option>
                                        <option>Sim</option>
                                    </select>
                                    <label class="label-form" for="tratamentoMedicoAnamnese">Está em tratamento médico?<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input  name="obsTratamentoMedico" id="especifiqueTratamentoMedicoanamnese" class="input-form" type="text" pattern=".+" />
                                    <label class="label-form" for="especifiqueTratamentoMedicoanamnese">Especifique:</label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select  name="fumante" id="fumanteAnamnese" class="input-form" type="text">
                                        <option>Não</option>
                                        <option>Sim</option>
                                    </select>
                                    <label class="label-form" for="fumanteAnamnese">É fumante?<sup>*</sup></label>
                                </div>


                                <div class="input-container campo-form-lado-a-lado">
                                    <select  name="alergia" id="alergiaAnamnese" class="input-form" type="text">
                                        <option>Não</option>
                                        <option>Sim</option>
                                    </select>
                                    <label class="label-form" for="alergiaAnamnese">Alergia?<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input  name="obsAlergia" id="especifiqueAlergiaAnamnese" class="input-form" type="text" pattern=".+"  />
                                    <label class="label-form" for="especifiqueAlergiaAnamnese">Especifique:</label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select name="marcaPasso" id="marcapassoAnamnese" class="input-form" type="text">
                                        <option>Não</option>
                                        <option>Sim</option>
                                    </select>
                                    <label class="label-form" for="marcapassoAnamnese">Possui marca-passo?<sup>*</sup></label>
                                </div>




                                <div class="input-container campo-form-lado-a-lado">
                                    <select name="antCirurgia" id="antecedenteCirurgicoAnamnese" class="input-form" type="text">
                                        <option>Não</option>
                                        <option>Sim</option>
                                    </select>
                                    <label class="label-form" for="antecedenteCirurgicoAnamnese">Antecedentes Cirurgicos?<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input name="obsAntCirurgia" id="especifiqueAntecedenteCirurgicoAnamnese" class="input-form" type="text" pattern=".+" />
                                    <label class="label-form" for="especifiqueAntecedenteCirurgicoAnamnese">Especifique:</label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select name="alteracaoCardiaca" id="alteracaoCardiacaAnamnese" class="input-form" type="text">
                                        <option>Não</option>
                                        <option>Sim</option>
                                    </select>
                                    <label class="label-form" for="alteracaoCardiacaAnamnese">Alterações cardíacas?<sup>*</sup></label>
                                </div>




                                <div class="input-container campo-form-lado-a-lado">
                                    <select name="problemaPele" id="problemaDePeleAnamnese" class="input-form" type="text">
                                        <option>Não</option>
                                        <option>Sim</option>
                                    </select>
                                    <label class="label-form" for="problemaDePeleAnamnese">Problemas de pele?<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input name="obsProblemaPele" id="especifiqueProblemaDePeleAnamnese" class="input-form" type="text" pattern=".+"  />
                                    <label class="label-form" for="especifiqueProblemaDePeleAnamnese">Especifique:</label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select name="disturbioCirculatorio" id="disturbioCirculatorioAnamnese" class="input-form" type="text">
                                        <option>Não</option>
                                        <option>Sim</option>
                                    </select>
                                    <label class="label-form" for="disturbioCirculatorioAnamnese">Distúrbios Circulatórios?<sup>*</sup></label>
                                </div>




                                <div class="input-container campo-form-lado-a-lado">
                                    <select name="gestante" id="gestanteAnamnese" class="input-form" type="text">
                                        <option>Não</option>
                                        <option>Sim</option>
                                    </select>
                                    <label class="label-form" for="gestanteAnamnese">Gestante?<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select name="obsGestante" id="semanaGestanteAnamnese" class="input-form" type="text">
                                        <option>Não sabe informar</option>
                                        <option>1 a 4 semanas</option>
                                        <option>5 a o semanas</option>
                                        <option>9 a 2 semanas</option>
                                        <option>13 a 16 semanas</option>
                                        <option>17 a 21 semanas</option>
                                        <option>22 a 26 semanas</option>
                                        <option>27 a 30 semanas</option>
                                        <option>31 a 35 semanas</option>
                                        <option>36 a 40 semanas</option>
                                        <option>mais de 40 semanas</option>
                                    </select>
                                    <label class="label-form" for="semanaGestanteAnamnese">Quantas semanas?<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select name="disturbioRenal" id="disturbioRenalAnamnese" class="input-form" type="text">
                                        <option>Não</option>
                                        <option>Sim</option>
                                    </select>
                                    <label class="label-form" for="disturbioRenalAnamnese">Distúrbios renais?<sup>*</sup></label>
                                </div>



                                <div class="input-container campo-form-lado-a-lado">
                                    <select name="problemaOrtopedico" id="problemasOrtopedicosAnamnese" class="input-form" type="text">
                                        <option>Não</option>
                                        <option>Sim</option>
                                    </select>
                                    <label class="label-form" for="problemasOrtopedicosAnamnese">Problemas ortopédicos?<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input name="obsProblemaOrtopedico" id="especifiqueProblemasOrtopedicosAnamnese" class="input-form" type="text" pattern=".+" />
                                    <label class="label-form" for="especifiqueProblemasOrtopedicosAnamnese">Especifique:</label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select name="disturbioHormonal" id="disturbiosHormonaisAnamnese" class="input-form" type="text">
                                        <option>Não</option>
                                        <option>Sim</option>
                                    </select>
                                    <label class="label-form" for="disturbiosHormonaisAnamnese">Distúbios hormonais?<sup>*</sup></label>
                                </div>


                                <div class="input-container campo-form-lado-a-lado">
                                    <select name="diabete" id="diabetesAnamnese" class="input-form" type="text">
                                        <option>Não</option>
                                        <option>Sim</option>
                                    </select>
                                    <label class="label-form" for="diabetesAnamnese">Diabetes?<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select name="tipoDiabete" id="tipoDiabeteAnamnese" class="input-form" type="text">
                                        <option>Não possui</option>
                                        <option>Tipo 1</option>
                                        <option>Tipo 2</option>
                                        <option>DMG (Gestacional)</option>
                                        <option>LADA (Latente autoimune)</option>
                                    </select>
                                    <label class="label-form" for="tipoDiabeteAnamnese">Qual o tipo?<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select name="controleDiabete" id="controleDiabeteAnamnese" class="input-form" type="text">
                                        <option>Não Possui</option>
                                        <option>Não</option>
                                        <option>Sim</option>
                                    </select>
                                    <label class="label-form" for="controleDiabeteAnamnese">Controlada?<sup>*</sup></label>
                                </div>



                                <div class="input-container campo-form-lado-a-lado">
                                    <select name="tumor" id="tumorLesaoAnamnese" class="input-form" type="text">
                                        <option>Não</option>
                                        <option>Sim</option>
                                    </select>
                                    <label class="label-form" for="tumorLesaoAnamnese">Tumor/Lesão pré cancerosa?<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input name="obsTumor" id="especifiqueTumorLesaoAnamnese" class="input-form" type="text" pattern=".+" />
                                    <label class="label-form" for="especifiqueTumorLesaoAnamnese">Especifique:</label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select name="epiletico" id="epileticoAnamnese" class="input-form" type="text">
                                        <option>Não</option>
                                        <option>Sim</option>
                                    </select>
                                    <label class="label-form" for="epileticoAnamnese">Epilético?<sup>*</sup></label>
                                </div>



                                <div class="input-container campo-form-lado-a-lado">
                                    <select name="protese" id="proteseAnamnese" class="input-form" type="text">
                                        <option>Não</option>
                                        <option>Sim</option>
                                    </select>
                                    <label class="label-form" for="proteseAnamnese">Prótese facial/corporal?<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input name="obsProtese" id="especifiqueProteseAnamnese" class="input-form" type="text" pattern=".+" />
                                    <label class="label-form" for="especifiqueProteseAnamnese">Especifique:</label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select name="hipoHipertensao" id="hipoHipertensaoAnamnese" class="input-form" type="text">
                                        <option>Não</option>
                                        <option>Sim</option>
                                    </select>
                                    <label class="label-form" for="hipoHipertensaoAnamnese">Hipo/Hipertensão arterial?<sup>*</sup></label>
                                </div>



                                <div class="input-container campo-form-lado-a-lado">
                                    <select name="cicloMenstrual" id="cicloMensatrualAnamnese" class="input-form" type="text">
                                        <option>Não</option>
                                        <option>Sim</option>
                                    </select>
                                    <label class="label-form" for="cicloMensatrualAnamnese">Ciclo mentrual regular?<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select name="funcIntestinal" id="funcionamentoIntestinalAnamnese" class="input-form" type="text">
                                        <option>Não</option>
                                        <option>Sim</option>
                                    </select>
                                    <label class="label-form" for="funcionamentoIntestinalAnamnese">Funcionamento intestinal regular?<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select name="filhos" id="filhosAnamnese" class="input-form" type="text">
                                        <option>Não tem filhos</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4 ou mais</option>
                                    </select>
                                    <label class="label-form" for="filhosAnamnese">Filhos? Quantos?<sup>*</sup></label>
                                </div>

                                <div class="sub-descricao-formulario">
                                    <h4>DADOS DE URGÊNCIA / EMERGÊNCIA</h4>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input name="nomePrimeiroContato" id="nomeContatoUrgenciaAnamnese" class="input-form" type="text" pattern=".+" required />
                                    <label class="label-form" for="nomeContatoUrgenciaAnamnese">Nome do contato:<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input name="telPrimeiroContato" id="fixoContatoUrgenciaAnamnese" class="input-form"  pattern=".+" required />
                                    <label class="label-form" for="fixoContatoUrgenciaAnamnese">Telefone Fixo:</label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input name="celPrimeiroContato" id="celularContatoUrgenciaAnamnese" class="input-form"  pattern=".+" required />
                                    <label class="label-form" for="celularContatoUrgenciaAnamnese">Telefone Celular:<sup>*</sup></label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input name="nomeSegundoContato" id="nomeSegundoContatoUrgenciaAnamnese" class="input-form" type="text" pattern=".+"  />
                                    <label class="label-form" for="nomeSegundoContatoUrgenciaAnamnese">Nome do segundo contato:</label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input name="telSegundoContato" id="fixoSegundoContatoUrgenciaAnamnese" class="input-form" type="number" pattern=".+"  />
                                    <label class="label-form" for="fixoSegundoContatoUrgenciaAnamnese">Telefone Fixo:</label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input name="celSegundoContato" id="celularSegundoContatoUrgenciaAnamnese" class="input-form" type="number" pattern=".+"  />
                                    <label class="label-form" for="celularSegundoContatoUrgenciaAnamnese">Telefone Celular:</label>
                                </div>
                                <div class="input-container campo-form-direita">
                                    <input type="text" style="display: none;" value="<?php echo $linha['codPaciente']?>" name="pacienteEscolhido">
                                    <center><button name="btnSalvar" type="submit" class="geral-btn-form">Salvar</button></center>
                                </div>
                            </form>

                        </div>



                        <div class="container-tabela-anamnese" style="">
                            <center>
                                <h4>FICHA DE ANAMNESE DO PACIENTE</h4>
                                <hr>
                            </center>
                            <br>
                            <div class="formulario-anamnese">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">NÚMERO DO CARTÃO DO SUS:</th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if (isset($listaAnamnese)){
                                                foreach($listaAnamnese as $linha){
                                                    echo "<tr>";
                                                    echo "<td>".$linha['numCartaoSusPaciente']."</td>";
                                                    echo "<tr>";
                                                }
                                        }else {
                                            echo "<tr>";
                                            echo "<td>--</td>";
                                            echo "<tr>";
                                        }
                                    ?>
                                    </tbody>

                                    <thead>
                                        <tr>
                                            <th scope="col">Nome do paciente:</th>
                                            <th scope="col">Idade:</th>
                                            <th scope="col">Data de nascimento</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if (isset($listaAnamnese)){
                                                foreach($listaAnamnese as $linha){
                                                    echo "<tr>";
                                                    echo "<td>".$linha['nomePaciente']."</td>";
                                                    if (isset($listaPaciente)){
                                                        foreach($listaPaciente as $linha){
                                                            date_default_timezone_set('America/Sao_Paulo');
                                                            $anoAtual = date('y');
                                                            $anoNascimento = date('y',strtotime($linha['dataNascimentoPaciente']));
                                                            $idade =  $anoAtual - $anoNascimento;
                                                            echo "<td>".$idade."</td>";
                                                        }
                                        }
                                                    echo "<td>".$linha['dataNascimentoPaciente']."</td>";
                                                    echo "<tr>";
                                                }
                                        }else {
                                            echo "<tr>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<tr>";
                                        }
                                    ?>
                                    </tbody>

                                    <thead>
                                        <tr>
                                            <th scope="col">Tratamento médico?</th>
                                            <th scope="col">Especificação:</th>
                                            <th scope="col">É fumante?</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if (isset($listaAnamnese)){
                                                foreach($listaAnamnese as $linha){
                                                    echo "<tr>";
                                                    echo "<td>".$linha['tratamentoMedico']."</td>";
                                                    echo "<td>".$linha['obsTratamentoMedico']."</td>";
                                                    echo "<td>".$linha['fumante']."</td>";
                                                    echo "<tr>";
                                                }
                                        }else {
                                            echo "<tr>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<tr>";
                                        }
                                    ?>
                                    </tbody>


                                    <thead>
                                        <tr>
                                            <th scope="col">Alergias?</th>
                                            <th scope="col">Especificação:</th>
                                            <th scope="col">Possui marca-passo?</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if (isset($listaAnamnese)){
                                                foreach($listaAnamnese as $linha){
                                                    echo "<tr>";
                                                    echo "<td>".$linha['alergia']."</td>";
                                                    echo "<td>".$linha['obsAlergia']."</td>";
                                                    echo "<td>".$linha['fumante']."</td>";
                                                    echo "<tr>";
                                                }
                                        }else {
                                            echo "<tr>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<tr>";
                                        }
                                    ?>
                                    </tbody>


                                    <thead>
                                        <tr>
                                            <th scope="col">Cirurgia recente?</th>
                                            <th scope="col">Especificação:</th>
                                            <th scope="col">Alterações cardíacas?</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if (isset($listaAnamnese)){
                                                foreach($listaAnamnese as $linha){
                                                    echo "<tr>";
                                                    echo "<td>".$linha['antCirurgico']."</td>";
                                                    echo "<td>".$linha['obsAntCirurgico']."</td>";
                                                    echo "<td>".$linha['alteracaoCardiaca']."</td>";
                                                    echo "<tr>";
                                                }
                                        }else {
                                            echo "<tr>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<tr>";
                                        }
                                    ?>
                                    </tbody>


                                    <thead>
                                        <tr>
                                            <th scope="col">Problemas de pele?</th>
                                            <th scope="col">Especificação:</th>
                                            <th scope="col">Distúrbios circulatórios?</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if (isset($listaAnamnese)){
                                                foreach($listaAnamnese as $linha){
                                                    echo "<tr>";
                                                    echo "<td>".$linha['problemaPele']."</td>";
                                                    echo "<td>".$linha['obsProblemaPele']."</td>";
                                                    echo "<td>".$linha['disturbioCirculatorio']."</td>";
                                                    echo "<tr>";
                                                }
                                        }else {
                                            echo "<tr>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<tr>";
                                        }
                                    ?>
                                    </tbody>


                                    <thead>
                                        <tr>
                                            <th scope="col">Gestante?</th>
                                            <th scope="col">Semanas:</th>
                                            <th scope="col">Disturbios renais?</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if (isset($listaAnamnese)){
                                                foreach($listaAnamnese as $linha){
                                                    echo "<tr>";
                                                    echo "<td>".$linha['gestante']."</td>";
                                                    echo "<td>".$linha['obsGestante']."</td>";
                                                    echo "<td>".$linha['disturbioRenal']."</td>";
                                                    echo "<tr>";
                                                }
                                        }else {
                                            echo "<tr>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<tr>";
                                        }
                                    ?>
                                    </tbody>


                                    <thead>
                                        <tr>
                                            <th scope="col">Problemas ortopedicos?</th>
                                            <th scope="col">Especificação:</th>
                                            <th scope="col">Distúrbios hormonais?</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if (isset($listaAnamnese)){
                                                foreach($listaAnamnese as $linha){
                                                    echo "<tr>";
                                                    echo "<td>".$linha['problemaOrtopedico']."</td>";
                                                    echo "<td>".$linha['obsProblemaOrtopedico']."</td>";
                                                    echo "<td>".$linha['disturbioHormonal']."</td>";
                                                    echo "<tr>";
                                                }
                                        }else {
                                            echo "<tr>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<tr>";
                                        }
                                    ?>
                                    </tbody>


                                    <thead>
                                        <tr>
                                            <th scope="col">Diabetes?</th>
                                            <th scope="col">Qual tipo?</th>
                                            <th scope="col">Controlada?</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if (isset($listaAnamnese)){
                                                foreach($listaAnamnese as $linha){
                                                    echo "<tr>";
                                                    echo "<td>".$linha['diabete']."</td>";
                                                    echo "<td>".$linha['tipoDiabete']."</td>";
                                                    echo "<td>".$linha['controleDiabete']."</td>";
                                                    echo "<tr>";
                                                }
                                        }else {
                                            echo "<tr>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<tr>";
                                        }
                                    ?>
                                    </tbody>


                                    <thead>
                                        <tr>
                                            <th scope="col">Tumor/Lesão pré cancerosa?</th>
                                            <th scope="col">Especificação:</th>
                                            <th scope="col">Epilético?</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if (isset($listaAnamnese)){
                                                foreach($listaAnamnese as $linha){
                                                    echo "<tr>";
                                                    echo "<td>".$linha['tumor']."</td>";
                                                    echo "<td>".$linha['obsTumor']."</td>";
                                                    echo "<td>".$linha['epiletico']."</td>";
                                                    echo "<tr>";
                                                }
                                        }else {
                                            echo "<tr>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<tr>";
                                        }
                                    ?>
                                    </tbody>


                                    <thead>
                                        <tr>
                                            <th scope="col">Prótese facial ou corporal?</th>
                                            <th scope="col">Especificação:</th>
                                            <th scope="col">Hipo/Hipertensão arterial?</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if (isset($listaAnamnese)){
                                                foreach($listaAnamnese as $linha){
                                                    echo "<tr>";
                                                    echo "<td>".$linha['protese']."</td>";
                                                    echo "<td>".$linha['obsProtese']."</td>";
                                                    echo "<td>".$linha['hipoHipertensao']."</td>";
                                                    echo "<tr>";
                                                }
                                        }else {
                                            echo "<tr>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<tr>";
                                        }
                                    ?>
                                    </tbody>


                                    <thead>
                                        <tr>
                                            <th scope="col">Ciclo menstrual regular?</th>
                                            <th scope="col">Funcionamento intestinal regular?</th>
                                            <th scope="col">Filhos? Quantos?</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if (isset($listaAnamnese)){
                                                foreach($listaAnamnese as $linha){
                                                    echo "<tr>";
                                                    echo "<td>".$linha['cicloMenstrual']."</td>";
                                                    echo "<td>".$linha['funcIntestinal']."</td>";
                                                    echo "<td>".$linha['filhos']."</td>";
                                                    echo "<tr>";
                                                }
                                        }else {
                                            echo "<tr>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<tr>";
                                        }
                                    ?>
                                    </tbody>


                                    <thead>
                                        <tr>
                                            <th scope="col">Nome do contato de emergência:</th>
                                            <th scope="col">Telefone Fixo:</th>
                                            <th scope="col">Celular:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if (isset($listaAnamnese)){
                                                foreach($listaAnamnese as $linha){
                                                    echo "<tr>";
                                                    echo "<td>".$linha['nomePrimeiroContato']."</td>";
                                                    echo "<td>".$linha['celPrimeiroContato']."</td>";
                                                    echo "<td>".$linha['telPrimeiroContato']."</td>";
                                                    echo "<tr>";
                                                }
                                        }else {
                                            echo "<tr>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<tr>";
                                        }
                                    ?>
                                    </tbody>


                                    <thead>
                                        <tr>
                                            <th scope="col">Nome do segundo contato de emergência:</th>
                                            <th scope="col">Telefone Fixo:</th>
                                            <th scope="col">Celular:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if (isset($listaAnamnese)){
                                                foreach($listaAnamnese as $linha){
                                                    echo "<tr>";
                                                    echo "<td>".$linha['nomeSegundoContato']."</td>";
                                                    echo "<td>".$linha['celSegundoContato']."</td>";
                                                    echo "<td>".$linha['telSegundoContato']."</td>";
                                                    echo "<tr>";
                                                }
                                        }else {
                                            echo "<tr>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
                                            echo "<tr>";
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="area-restrita-enfermeiro">
            <div class="section-triagem" id="triagemTela" style="display:none;">
            <section class="triagem" id="triagem">
                    <div class="titulo-descricao-main">
                        <hr>
                        <h2>TRIAGEM</h2>
                    </div>
                    <div class="tela-ficha-triagem">

                    
                        <form action="classes/triagem/cadastrarTriagem.php" method="POST" class="form-formularios">
                        <input type="text" style="display: none;" value="<?php echo $linha['codPaciente']?>" name="pacienteEscolhido">
                            <div class="textarea-observacoes">
                                <label class="label-textarea-trisgem">Queixas do Paciente<sup>*</sup></label>
                                <textarea class="textarea-triagem" name="queixaTriagem"></textarea>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="horaEntradaTriagem" name="horaEntradaTriagem" class="input-form" type="time" />
                                <label class="label-form"  for="horaEntradaTriagem">Hora de Emissão:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="dataEntradaTriagem" class="input-form" type="date" />
                                <label class="label-form" for="dataEntradaTriagem">Data de Emissão:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                            <input value="<?php if (isset($listaPaciente)){foreach($listaPaciente as $linha){echo $linha['nomePaciente'];}}?>" id="nomePacienteFichaAnamnese" class="input-form" type="text" pattern=".+" required />                                <label class="label-form" for="nomePacienteTriagem">Nome do Paciente:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                            <input value="<?php if (isset($listaPaciente)){foreach($listaPaciente as $linha){date_default_timezone_set('America/Sao_Paulo');$anoAtual = date('y');$anoNascimento = date('y',strtotime($linha['dataNascimentoPaciente']));$idade =  $anoAtual - $anoNascimento;echo $idade;}
                                    }?>" id="idadeFichaAnamnese" class="input-form" type="number" pattern=".+" required />                                <label class="label-form" for="idadePacienteTriagem">Idade:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="pressaoSistólicaPacienteTriagem" name="pressaoSitolicaTriagem" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="pressaoSistólicaPacienteTriagem">Pressão Sistólica<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="pressaoDiastolicaPacienteTriagem" name="pressaoDiastolicaTriagem" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="pressaoDiastolicaPacienteTriagem">Pressão Diastólica<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input  id="batimentosPacienteTriagem" name="batimentosTriagem" class="input-form" type="text" pattern=".+" required/>
                                <label class="label-form" for="batimentosPacienteTriagem">Batimentos Cardíacos (BPM)<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <select id="select" name="temperaturaTriagem" class="input-form" type="text">
                                    <option>menor de 35º</option>
                                    <option>36º à 37.6º</option>
                                    <option>37.6º à 39.5º</option>
                                    <option>39.6º à 41º</option>
                                    <option>maior de 41º</option>
                                </select>
                                <label class="label-form" for="select">Temperatura Corporal<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <select id="select" name="nivelDorTriagem" class="input-form" type="text">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                                <label class="label-form"  for="select">Nível de dor:<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <select id="alergiasPacienteTriagem" name="alergiaTriagem" class="input-form" type="text">
                                    <option>Não</option>
                                    <option>Sim</option>
                                </select>
                                <label class="label-form"  for="alergiasPacienteTriagem">Alergias à medicamentos<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="alergiaQualPacienteTriagem" name="obsAlergiaTriagem"  class="input-form" type="text" pattern=".+"  />
                                <label class="label-form" for="alergiaQualPacienteTriagem">Quais?</label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <select id="diabetePacienteTriagem" name="diabetesTriagem"  class="input-form" type="text">
                                    <option>Não</option>
                                    <option>Sim</option>
                                </select>
                                <label class="label-form"  for="diabetePacienteTriagem">Diabetes<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <select id="tipoDiabeteTriagem" name="tipoDiabetesTriagem" class="input-form" type="text">
                                    <option>Não possui</option>
                                    <option>Tipo 1</option>
                                    <option>Tipo 2</option>
                                    <option>DMG (Gestacional)</option>
                                    <option>LADA (Latente autoimune)</option>
                                </select>
                                <label class="label-form" for="tipoDiabeteTriagem">Qual o tipo?<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <select id="gravidezPacienteTriagem" name="gravidezTriagem" class="input-form" type="text">
                                    <option>Não</option>
                                    <option>Sim</option>
                                    <option>Talvez</option>
                                </select>
                                <label class="label-form" for="gravidezPacienteTriagem">Gravidez<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="mesesGravidezPacienteTriagem" name="tempoGravidezTriagem" class="input-form" type="text" pattern=".+"  />
                                <label class="label-form" for="mesesGravidezPacienteTriagem">Semanas</label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <select id="fumantePacienteTriagem" name="fumanteTriagem" class="input-form" type="text">
                                    <option>Não</option>
                                    <option>Sim</option>
                                </select>
                                <label class="label-form" for="fumantePacienteTriagem">Fumante<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <select id="doencaPacienteTriagem" name="histDoencaTriagem" class="input-form" type="text">
                                    <option>Não</option>
                                    <option>Sim</option>
                                </select>
                                <label class="label-form" for="doencaPacienteTriagem">Histórico de Doença<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="qualDoencaPacienteTriagem" name="obsDoencaTriagem" class="input-form" type="text" pattern=".+" />
                                <label class="label-form" for="qualDoencaPacienteTriagem">Quais?</label>
                            </div>
                        <center><button name="btnCadastrar" type="submit" class="geral-btn-form">Salvar dados da ocorrência</button></center>
                        </form>
                    </div>
                </section>
            </div>
        </div>

    </section>
    <script language="javascript" type="text/javascript">
        function escondeDivs(){
            var inputCodPaciente = document.getElementById('codPacienteInput').value;
            var telaPaciente = document.getElementById('pacienteTela');
            var telaAnamnese = document.getElementById('anamneseTela');
            var telaTriagem = document.getElementById('triagemTela');

            if(inputCodPaciente>0){
                telaPaciente.style.display = "block";
                telaAnamnese.style.display = "block";
                telaTriagem.style.display = "block";
            }
        }
        escondeDivs();
    </script>
    <script src="../js/cancelarOcorrencia.js"></script>
    <script src="../../../Sistema/ARIS/js/script-anamnese.js"></script>
    <script src="../../../Sistema/ARIS/js/script-funcionario.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>
