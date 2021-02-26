<html>

<head>

    <meta charset="utf-8">
    <title>MÉDICO</title>
    <link rel="icon" href="../../../Sistema/ARIS/image/icones/iconeAris.jpg">
    <link rel="stylesheet" href="../../../Sistema/ARIS/css/reset.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../Sistema/ARIS/css/estilo-telas-gerais.css">
    <link rel="stylesheet" href="../../../Sistema/ARIS/css/estilo-telas-medico.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/86027f91a6.js" crossorigin="anonymous"></script>
    <script src="../../../Sistema/ARIS/js/script-medicamento.js"></script>
    <script src="../../../Sistema/ARIS/js/script-medico.js"></script>
    <?php
            include ("../valida-login.php");
            include ("valida-tipologin.php");
            include_once ('classes/Conexao.php');
            include_once ('classes/Ocorrencia.php');
            include_once ('classes/Anamnese.php');
            include_once ('classes/Triagem.php');
                
            try {
                //declaracando variaveis para as funções
                
                @$numCartaoSus = $_POST['numCartaoSus'];
                $cod = filter_input(INPUT_GET, "id");
                $codMedico = $_SESSION['code-session'] ;
                //Criando as classes para as funções
                $Anamnese = new Anamnese();
                $Triagem = new Triagem();
                $Medico = new Medico();
                $Ocorrencia = new Ocorrencia();

                //Definindo os atributos das classes
                
                //Atributos da classe medico
                $Medico->setCodMedico($codMedico);
                $Ocorrencia->setCodMedico($codMedico);
                
                //Chamando a função com os atributos declarados da classe Medico
                $listaMedico = $Medico->listarMedicoComCod($Medico);//recebe uma lista com as informações do médico logado
                
                if(isset($numCartaoSus)){
                    $listaComCartao = $Ocorrencia->listarComCartao($numCartaoSus,$codMedico);
                }else{
                $listaOcorrencia = $Ocorrencia->listar();
                }
                //$listaCartao = $Ocorrencia->listarOcorrenciaCartao($numCartaoSus,$codMedico);
                //Atributos da classe Ocorrencia
                $Ocorrencia->setCodPaciente($cod);
                $Ocorrencia->setCodMedico($codMedico);
                $listarCodOcorrencia = $Ocorrencia->listarOcorrencia($Ocorrencia);
                if(isset($cod,$codMedico)){
                
                //Chamando as funções com os atributos declarados da classe Ocorrencia
                $lista = $Ocorrencia->listarOcorrenciaConsulta($Ocorrencia);
                $listaHistorico = $Ocorrencia->listarHistorico($Ocorrencia);
                $listaPaciente = $Ocorrencia->listarPacienteConsulta($Ocorrencia);
                }
                //só ira definir os atributos e metodos caso o codigo do paciente estiver selecionado
                if(isset($cod)){
                    //Atributos da classe Triagem
                $Triagem->setCodPaciente($cod);
                //Chamando a função com os atributos declarados da classe Medico
                $listaTriagem = $Triagem->listarUm($Triagem);//lista a triagem do dia atual que tiver o codigo
                                                             //o código do paciente = $cod

                //Chamando a função com a variavel do codigo do paciente 
                $listaAnamnese = $Anamnese->listar($cod);//lista de anamnese do paciente que tiver 
                                                         //o cod = "$cod"  e status = "consulta"
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
                        <li><a href="#fila-paciente"><i class="fas fa-clock"></i>Fila</a></li>
                        <li><a href="#prontuarios"><i class="fas fa-file-medical"></i>Prontuários</a></li>
                        <li><a href="#anamnese"><i class="far fa-file-archive"></i>Anamnese</a></li>
                        <li><a href="#triagem"><i class="fas fa-heartbeat"></i>Triagem</a></li>
                        <li><a href="#paciente"><i class="fas fa-users"></i>Paciente</a></li>
                        <li><a href="#historico"><i class="fas fa-book-medical"></i>Histórico</a></li>
                        <li><a href="#observacoes"><i class="fas fa-stethoscope"></i>Observações</a></li>
                        <li><a href="#receita"><i class="fas fa-prescription-bottle-alt"></i>Receita</a></li>
                        <li><a href="#atestado"><i class="fas fa-file-signature"></i>Atestado</a></li>
                        <li><a href="#declaracao"><i class="fas fa-file-contract"></i>Declaração</a></li>
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
        <div class="area-restrita-medico">
        <div class="section-prontuarios">
                    <section class="prontuarios" id="prontuarios">
                        <div class="titulo-descricao-main">
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
                                    <form action="medico.php" method="POST" class="form-formularios">
                                            <div class="input-container campo-form-solitario">
                                                <input id="numeroDoCartaoSUS-prontuarios" name="numCartaoSus" class="input-form" type="text" pattern=".+" required />
                                                <label class="label-form" for="numeroDoCartaoSUS-prontuarios">Número do cartão do SUS</label>
                                            </div>
                                            <button type="submit" name="btnPesquisar" class="search-btn-form"><i class="fas fa-search"></i></button>
                                            <br>
                                        </form>
                                        <div class="prontuarios-em-andamento">
                                            <section class="tabela-rolavel-medico">
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
                                                        if(isset($listaOcorrencia)){
                                                            foreach($listaOcorrencia as $linha){
                                                                echo "<tr>";
                                                                echo "<td>".$linha['numCartaoSusPaciente']."</td>";
                                                                echo "<td><a href='medico.php?id=".$linha['codPaciente']."' type='button' >".$linha['nomePaciente']."</a></td>";
                                                                echo "<td>".$linha['horaEntradaOcorrencia']."</td>";
                                                                
                                                                if($linha['statusOcorrencia'] == "triagem"){
                                                                    echo "<td><center><i class='fas fa-circle' style='color: #F2E30F;'> </center></i></a></td>";
                                                                }else if($linha['statusOcorrencia'] == "consulta"){
                                                                    echo "<td><center><i class='fas fa-circle' style='color: #277CEB;'> </center></i></a></td>";
                                                                }else if($linha['statusOcorrencia'] == "cancelado"){
                                                                    echo "<td><center><i class='fas fa-circle' style='color: #D91E1E;'> </center></i></a></td>";
                                                                }
                                                                echo "<td><a type='button' onClick='(cancelarOcorrencia(".$linha['codOcorrencia']."))'><i class='fas fa-times'></i></a></td>";
                                                                echo "</tr>";
                                                            }
                                                        }else{} 
                                                        if(isset($listaComCartao)){
                                                            foreach($listaComCartao as $linha){
                                                                echo "<tr>";
                                                                echo "<td>".$linha['numCartaoSusPaciente']."</td>";
                                                                echo "<td><a href='medico.php?id=".$linha['codPaciente']."' type='button' >".$linha['nomePaciente']."</a></td>";
                                                                echo "<td>".$linha['horaEntradaOcorrencia']."</td>";
                                                                if($linha['statusOcorrencia'] == "triagem"){
                                                                    echo "<td><center><i class='fas fa-circle' style='color: #F2E30F;'> </center></i></a></td>";
                                                                }else if($linha['statusOcorrencia'] == "consulta"){
                                                                    echo "<td><center><i class='fas fa-circle' style='color: #277CEB;'> </center></i></a></td>";
                                                                }else if($linha['statusOcorrencia'] == "cancelado"){
                                                                    echo "<td><center><i class='fas fa-circle' style='color: #D91E1E;'> </center></i></a></td>";
                                                                }
                                                                echo "<td><a type='button' onClick='(cancelarOcorrencia(".$linha['codOcorrencia']."))'><i class='fas fa-times'></i></a></td>";
                                                                echo "</tr>";
                                                                
                                                            }
                                                        }
                                                    ?>
                                                    
                                                    
                                                    </tbody>
                                                  
                                                 </table>
                                            </section>
                                                 <div class="legenda-prontuarios">
                                            <div>
                                                <a class="triagem"><i class="fas fa-circle">
                                                        <p class="legenda-nome">Triagem</p>
                                                    </i></a>
                                            </div>
                                            <div>
                                                <a class="consulta"><i class="fas fa-circle">
                                                        <p class="legenda-nome">Consulta</p>
                                                    </i></a>
                                            </div>
                                            <div>
                                                <a class="finalizado"><i class="fas fa-circle">
                                                        <p class="legenda-nome">Finalizado</p>
                                                    </i></a>
                                            </div>
                                            <div>
                                                <a class="cancelado"><i class="fas fa-circle">
                                                        <p class="legenda-nome">Cancelado</p>
                                                    </i></a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                             </div>
                             </div>
                    </section>
                </div>
            
            <!--                            FIM SECTION PRONTUÁRIOS-->
            <!--                            INÍCIO SECTION ANAMNESE-->
            <div class="area-restrita-medico">
                <div class="section-anamnese" id="anamneseTela"style="display:none;">
                    <section class="anamnese" id="anamnese">
                        <div class="titulo-descricao-main">
                            <h2>ANAMNESE</h2>
                            <hr>
                        </div>
                        <center>
                            <h4>FICHA DE ANAMNESE DO PACIENTE</h4>
                        </center>
                        <hr><br>
                        <div class="formulario-anamnese">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="3">NÚMERO DO CARTÃO DO SUS:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if (isset($listaAnamnese)){
                                                foreach($listaAnamnese as $linha){
                                                    echo "<tr>";
                                                    echo "<td colspan='3'>".$linha['numCartaoSusPaciente']."</td>";
                                                    echo "<tr>";
                                                }
                                        }else {
                                            echo "<tr>";
                                            echo "<td colspan='3'>--</td>";
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
                    </section>
                </div>
                <!--FIM SECTION ANAMNESE -->
                <!--INICIO SECTION TRIAGEM -->
                <div class="section-triagem" id="triagemTela"style="display:none;">
                    <section class="triagem" id="triagem">
                        <div class="titulo-descricao-main">
                            <h2>TRIAGEM</h2>
                            <hr>
                        </div>
                        <center>
                            <h4>FICHA DE TRIAGEM DO PACIENTE</h4>
                        </center>
                        <hr><br>
                        <div class="formulario-anamnese">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th colspan="3">Queixas do paciente:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if (isset($listaTriagem)){
                                                foreach($listaTriagem as $linha){
                                                    echo "<tr>";
                                                    echo "<td colspan='3'>".$linha['queixaTriagem']."</td>";
                                                    echo "<tr>";
                                                }
                                        }else {
                                            echo "<tr>";
                                            echo "<td colspan='3'>--</td>";
                                            echo "<tr>";
                                        }
                                    ?>
                                </tbody>


                                <thead>
                                    <tr>
                                        <th scope="col">Nome do paciente:</th>
                                        <th scope="col">Idade:</th>
                                        <th scope="col">Pressão sistólica:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if (isset($listaTriagem)){
                                                foreach($listaTriagem as $linha){
                                                    echo "<tr>";
                                                    echo "<td>".$linha['nomePaciente']."</td>";
                                                    date_default_timezone_set('America/Sao_Paulo');
                                                    $anoAtual = date('y');
                                                    $anoNascimento = date('y',strtotime($linha['dataNascimentoPaciente']));
                                                    $idade =  $anoAtual - $anoNascimento;
                                                    echo "<td>".$idade."</td>";
                                                    echo "<td>".$linha['pressaoSitolicaTriagem']."</td>";
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
                                        <th scope="col">Pressão diastólica:</th>
                                        <th scope="col">Batimentos Cardíacos (BMP)</th>
                                        <th scope="col">Temperatura Corporal:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if (isset($listaTriagem)){
                                                foreach($listaTriagem as $linha){
                                                    echo "<tr>";
                                                    echo "<td>".$linha['pressaoDiastolicaTriagem']."</td>";
                                                    echo "<td>".$linha['batimentosTriagem']."</td>";
                                                    echo "<td>".$linha['temperaturaTriagem']."</td>";
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
                                        <th scope="col">Nível de dor:</th>
                                        <th scope="col">Alergias:</th>
                                        <th scope="col">Qual alergia?</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if (isset($listaTriagem)){
                                                foreach($listaTriagem as $linha){
                                                    echo "<tr>";
                                                    echo "<td>".$linha['nivelDorTriagem']."</td>";
                                                    echo "<td>".$linha['alergiaTriagem']."</td>";
                                                    echo "<td>".$linha['obsAlergiaTriagem']."</td>";
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
                                        <th scope="col">Tipo:</th>
                                        <th scope="col">Gravidez?</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if (isset($listaTriagem)){
                                                foreach($listaTriagem as $linha){
                                                    echo "<tr>";
                                                    echo "<td>".$linha['diabetesTriagem']."</td>";
                                                    echo "<td>".$linha['tipoDiabetesTriagem']."</td>";
                                                    echo "<td>".$linha['gravidezTriagem']."</td>";
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
                                        <th scope="col">Quantas semanas?</th>
                                        <th scope="col">Fumante?</th>
                                        <th scope="col">Histórico de doença?</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if (isset($listaTriagem)){
                                                foreach($listaTriagem as $linha){
                                                    echo "<tr>";
                                                    echo "<td>".$linha['tempoGravidezTriagem']."</td>";
                                                    echo "<td>".$linha['fumanteTriagem']."</td>";
                                                    echo "<td>".$linha['histDoencaTriagem']."</td>";
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
                                        <th scope="col">Quais?</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if (isset($listaTriagem)){
                                        foreach($listaTriagem as $linha){
                                            echo "<tr>";
                                            echo "<td>".$linha['obsHistDoencaTriagem']."</td>";
                                            echo "<td>--</td>";
                                            echo "<td>--</td>";
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
                    </section>
                    <br><br><br><br><br>
                </div>
                <!--FIM SECTION TRIAGEM -->
                <br>
                <br>
                <!--INICIO SECTION PACIENTE -->
                <div class="section-paciente" id="pacienteTela"style="display:none;">
                    <section class="paciente" id="paciente">
                        <div class="titulo-descricao-main">
                            <h2>PACIENTE</h2>
                            <hr>
                        </div>
                        <center>
                            <h4>FICHA DE INFORMAÇÕES DO PACIENTE</h4>
                        </center>
                        <hr><br>
                        <div class="formulario-paciente">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="3">NÚMERO DO CARTÃO DO SUS:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($listaPaciente)){
                                        foreach($listaPaciente as $linha){
                                            echo "<tr>";
                                            echo "<td colspan='3'>".$linha['numCartaoSusPaciente']."</td>";
                                            echo "<tr>";
                                        }
                                    }else{
                                            echo "<tr>";
                                            echo "<td colspan='3'>--</td>";
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
                <!--FIM SECTION PACIENTE -->
                <!--INICIO SECTION HISTÓRICO -->
                <div class="section-historico" id="historicoTela"style="display:none;">
                    <section class="historico" id="historico">
                        <div class="titulo-descricao-main">
                            <h2>HISTÓRICO DE OBSERVAÇÕES MÉDICAS</h2>
                            <hr>
                        </div>
                        <div class="tabela-fila-queixas">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Cartão SUS</th>
                                        <th scope="col">Paciente</th>
                                        <th scope="col">Data Emissão</th>
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
                                            echo "<td><a href='classes/pdf-historico.php?id=".$linha['codOcorrencia']."'><i class='fas fa-download'/></a></i></td>";
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
                <!--FIM SECTION HISTÓRICO -->
                <!--INICIO SECTION OBSERVACOES -->
                <div class="section-observacoes" id="obsTela"style="display:none;">
                    <section class="observacoes" id="observacoes">
                        <div class="titulo-descricao-main">
                            <h2>OBSERVAÇÕES</h2>
                            <hr>
                        </div>
                        <form action="classes/Ocorrencia/obsOcorrencia.php" method="POST" class="form-formularios">
                            <input name="codPaciente" id="codPacienteInput" value="<?php foreach($listaPaciente as $linha){echo $linha['codPaciente'];}?>"style="display:none"  />
                            <input name="codMedico" value="<?php echo $codMedico;?>" style="display:none" />
                            <input name="codOcorrencia" value="<?php foreach($listarCodOcorrencia as $linha){echo $linha['codOcorrencia']." ";}?>" style="display:none" />
                            <div class="input-container campo-form-solitario">
                                <input id="numeroDoCartaoSUS-observacoes" value="<?php if (isset($listaPaciente)){foreach($listaPaciente as $linha){echo $linha['numCartaoSusPaciente'];}}?>" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="numeroDoCartaoSUS-observacoes">Número do cartão do SUS<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="nomePaciente-observacoes" value="<?php if (isset($listaPaciente)){foreach($listaPaciente as $linha){echo $linha['nomePaciente'];}}?>" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="nomePaciente-observacoes">Nome Paciente<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="idadePaciente-observacoes" value="<?php if (isset($listaPaciente)){foreach($listaPaciente as $linha){echo $idade;}}?>" class="input-form" type="number" pattern=".+" required />
                                <label class="label-form" for="idadePaciente-observacoes">Idade Paciente<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <select id="selectSexo-observacoes" class="input-form" type="text" pattern=".+" required>
                                    <?php if (isset($listaPaciente)){foreach($listaPaciente as $linha){echo "<option>".$linha['sexoPaciente']."</option>";}}?>
                                    <option>Feminino</option>
                                    <option>Masculino</option>
                                    <option>Não declarar</option>
                                </select>
                                <label class="label-form" for="selectSexo-observacoes">Sexo<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input value="<?php date_default_timezone_set('America/Sao_Paulo'); $dataAtual =  date('d-m-Y');  $dataConvertida = date('Y-m-d',strtotime($dataAtual)); echo $dataConvertida; ?>" id="data-consulta" class="input-form" type="date" />
                                <label class="label-form" for="data-consulta">Data Consulta<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input value="<?php if (isset($listaMedico)){foreach($listaMedico as $linha){echo $linha['nomeMedico'];}}?>" id="medico-observacoes" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="medico-observacoes">Médico<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input value="<?php if (isset($listaMedico)){foreach($listaMedico as $linha){echo $linha['crmMedico'];}}?>" id="crmMedico-observacoes" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="crmMedico-observacoes">CRM<sup>*</sup></label>
                            </div>
                            <br>
                            <div class="textarea-observacoes">
                                <label class="label-textarea-medico">Observações<sup>*</sup></label>
                                <textarea name="obsOcorrencia" class="textarea-medico"></textarea>
                            </div>
                            <div class="botoes-observacoes">
                                <div class="botão-salvar-informacoes">
                                    <button type="submit" name="btnSalvar" class="print-btn-form"><i class="far fa-save"></i>
                                        <p class="legenda-btn-observacoes"> Salvar</p>
                                    </button>
                                </div>
                                <div class="botão-salvar-imprimir-informacoes">
                                    <button type="submit" name="btnImprimir" type="button" class="print-btn-form"><i class="fas fa-file-download"></i>
                                        <p class="legenda-btn-observacoes">Salvar e Imprimir</p>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
                <!--FIM SECTION OBSERVACOES -->
                <!--INICIO SECTION RECEITA -->
                <div class="section-receita" id="receitaTela"style="display:none;">
                    <section class="receita" id="receita">
                        <div class="titulo-descricao-main">
                            <h2>RECEITA</h2>
                            <hr>
                        </div>
                        <form action="classes/receita/cadastrarReceita.php" method="POST" class="form-formularios">
                            <input name="codPaciente" value="<?php if (isset($listaPaciente)){foreach($listaPaciente as $linha){echo $linha['codPaciente'];}}?>" style="display:none" />
                            <input name="codMedico" value="<?php echo $codMedico;?>" style="display:none" />
                            <input name="codProntuario" value="<?php foreach($listaPaciente as $linha){ echo $linha['codProntuario'];}?>" style="display:none" />

                            <div class="input-container campo-form-dois-lado-a-lado">
                                <input value="<?php if (isset($listaPaciente)){foreach($listaPaciente as $linha){echo $linha['numCartaoSusPaciente'];}}?>" id="numeroDoCartaoSUS-receita" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="numeroDoCartaoSUS-receita">Número do cartão do SUS<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-dois-lado-a-lado" style="float: left;">
                                <input value="<?php if (isset($listaPaciente)){foreach($listaPaciente as $linha){echo $linha['nomePaciente'];}}?>" id="nomePaciente-receita" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="nomePaciente-receita">Nome Paciente<sup>*</sup> </label>
                            </div>
                            <div class="subtitulo-descricao-main">
                                <h4 class="subtitulo">MEDICAMENTOS </h4>
                                <br>
                                <hr>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="medicamento-receita" name="medicamentoReceita" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="medicamento-receita">Medicamento<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="quantidadeMedicamento-receita" name="qtdMedicamentoReceita" class="input-form" type="number" pattern=".+" required />
                                <label class="label-form" for="quantidadeMedicamento-receita">Quantidade<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <select id="unidadeMedida-receita" name="unidadeMedicamentoReceita" class="input-form" type="text" pattern=".+" required>
                                    <option>g</option>
                                    <option>mg</option>
                                    <option>ml</option>
                                </select>
                                <label class="label-form" for="unidadeMedida-receita">Unidade de Medida<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="tomaraCada-receita" name="tempoMedicamentoReceita" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="tomaraCada-receita">Tomar a cada <sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="tomarDurante-receita" name="diasMedicamentoReceita" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="tomarDurante-receita">Durante <sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <select id="administracaoMedicamento-receita" name="adminMedicamento" class="input-form" type="text" pattern=".+" required>
                                    <option>Via Oral</option>
                                    <option>Via Parenteral</option>
                                    <option>Via Sublingual</option>
                                </select>
                                <label class="label-form" for="administracaoMedicamento-receita">Administração do Medicamento<sup>*</sup></label>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <a href="javascript:showDiv()" name="btnMedicamento" id="btn-div" class="adicionar-medicamento" onclick="mostrar_abas(this);" id="mostra_aba1"><i class="fas fa-plus-circle"></i></a>

                            <br>
                            <div id="hiddenDiv" style="display:none; margin-top: 10%;">
                                <br>
                                <hr>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="novo-medicamento-receita" name="medicamentoReceita2" class="input-form" type="text" pattern=".+"  />
                                    <label class="label-form" for="novo-medicamento-receita">Medicamento</label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="novo-quantidadeMedicamento-receita" name="qtdMedicamentoReceita2" class="input-form" type="number" pattern=".+"  />
                                    <label class="label-form" for="novo-quantidadeMedicamento-receita">Quantidade</label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select id="novo-unidadeMedida-receita" name="unidadeMedicamentoReceita2" class="input-form" type="text" pattern=".+" >
                                        <option>g</option>
                                        <option>mg</option>
                                        <option>ml</option>
                                    </select>
                                    <label class="label-form" for="novo-unidadeMedida-receita">Unidade de Medida</label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="novo-tomaraCada-receita" name="tempoMedicamentoReceita2" class="input-form" type="text" pattern=".+" />
                                    <label class="label-form" for="novo-tomaraCada-receita">Tomar a cada </label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <input id="novo-tomarDurante-receita" name="diasMedicamentoReceita2" class="input-form" type="text" pattern=".+"  />
                                    <label class="label-form" for="novo-tomarDurante-receita">Durante </label>
                                </div>
                                <div class="input-container campo-form-lado-a-lado">
                                    <select id="novo-administracaoMedicamento-receita" name="adminMedicamento2" class="input-form" type="text" pattern=".+" >
                                        <option>Via Oral</option>
                                        <option>Via Parenteral</option>
                                        <option>Via Sublingual</option>
                                    </select>
                                    <label class="label-form" for="novo-administracaoMedicamento-receita">Administração do Medicamento<sup>*</sup></label>
                                </div>
                                <br>
                                <br>
                                <hr>
                                <br>
                                <br>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <hr>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="dataValidade-receita" name="validadeReceita" class="input-form" type="date" />
                                <label class="label-form" for="dataValidade-receita">Validade da Receita<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input value="<?php if (isset($listaMedico)){foreach($listaMedico as $linha){echo $linha['nomeMedico'];}}?>" id="medico-receita" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="medico-receita">Médico<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input value="<?php if (isset($listaMedico)){foreach($listaMedico as $linha){echo $linha['crmMedico'];}}?>" id="crmMedico-receita" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="crmMedico-receita">CRM<sup>*</sup></label>
                            </div>
                            <br>
                            <div class="botoes-receita">
                                <div class="botão-salvar-informacoes">
                                    <button type="submit" name="btnSalvar" class="print-btn-form"><i class="far fa-save"></i>
                                        <p class="legenda-btn-receita"> Salvar</p>
                                    </button>
                                </div>
                                <div class="botão-salvar-imprimir-informacoes">
                                    <button type="submit" name="btnImprimir" class="print-btn-form"><i class="fas fa-file-download"></i>
                                        <p class="legenda-btn-receita">Salvar e Imprimir</p>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
                <!--FIM SECTION RECEITA -->
                <!--INICIO SECTION ATESTADO -->
                <div class="section-atestado" id="atestadoTela"style="display:none;">
                    <section class="atestado" id="atestado">
                        <div class="titulo-descricao-main">
                            <h2>ATESTADO</h2>
                            <hr>
                        </div>
                        <form action="classes/atestado/cadastrarAtestado.php" method="POST" class="form-formularios">
                            <input name="codPaciente" value="<?php if (isset($listaPaciente)){foreach($listaPaciente as $linha){echo $linha['codPaciente'];}}?>" style="display:none" />
                            <input name="codMedico" value="<?php echo $codMedico;?>" style="display:none" />
                            <div class="input-container campo-form-solitario">
                                <input value="<?php if (isset($listaPaciente)){foreach($listaPaciente as $linha){echo $linha['numCartaoSusPaciente'];}}?>" id="numeroDoCartaoSUS-atestado" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="numeroDoCartaoSUS-atestado">Número do cartão do SUS<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input value="<?php if (isset($listaPaciente)){foreach($listaPaciente as $linha){echo $linha['nomePaciente'];}}?>" id="nomePaciente-atestado" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="nomePaciente-atestado">Nome Paciente<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input value="<?php if (isset($listaPaciente)){foreach($listaPaciente as $linha){echo $linha['rgPaciente'];}}?>" id="rgPaciente-atestado" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="rgPaciente-atestado">RG<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="dias-atestado" name="diasAtestado" class="input-form" type="number" pattern=".+" required />
                                <label class="label-form" for="dias-atestado">Dias<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input id="motivoPaciente-atestado" name="motivoAtestado" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="motivoPaciente-atestado">Motivo<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input value="<?php date_default_timezone_set('America/Sao_Paulo'); $dataAtual =  date('d-m-Y');  $dataConvertida = date('Y-m-d',strtotime($dataAtual)); echo $dataConvertida; ?>" id="data-atestado" name="dataAtestado" class="input-form" type="date" />
                                <label class="label-form" for="data-atestado">Data<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input value="<?php if (isset($listaMedico)){foreach($listaMedico as $linha){echo $linha['nomeMedico'];}}?>" id="medico-atestado" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="medico-atestado">Médico<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input value="<?php if (isset($listaMedico)){foreach($listaMedico as $linha){echo $linha['crmMedico'];}}?>" id="crmMedico-atestado" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="crmMedico-atestado">CRM<sup>*</sup></label>
                            </div>
                            <div class="botoes-atestado">
                                <div class="botão-salvar-informacoes">
                                    <button type="submit" name="btnSalvar" class="print-btn-form"><i class="far fa-save"></i>
                                        <p class="legenda-btn-atestado"> Salvar</p>
                                    </button>
                                </div>
                                <div class="botão-salvar-imprimir-informacoes">
                                    <button type="submit" name="btnImprimir"  class="print-btn-form"><i class="fas fa-file-download"></i>
                                        <p class="legenda-btn-atestado">Salvar e Imprimir</p>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
                <!--FIM SECTION ATESTADO -->
                <!--INICIO SECTION DECLARAÇÃO -->
                <div class="section-declaracao" id="declaracaoTela"style="display:none;">
                    <section class="declaracao" id="declaracao">
                        <div class="titulo-descricao-main">
                            <h2>DECLARAÇÃO</h2>
                            <hr>
                        </div>
                        <form action="classes/declaracao/cadastrarDeclaracao.php" method="POST" class="form-formularios">
                            <input name="codPaciente" value="<?php if (isset($listaPaciente)){foreach($listaPaciente as $linha){echo $linha['codPaciente'];}}?>" style="display:none" />
                            <input name="codMedico" value="<?php echo $codMedico;?>" style="display:none" />
                            <div class="input-container campo-form-solitario">
                                <input value="<?php if (isset($listaPaciente)){foreach($listaPaciente as $linha){echo $linha['numCartaoSusPaciente'];}}?>" id="numeroDoCartaoSUS-declaracao" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="numeroDoCartaoSUS-declaracao">Número do cartão do SUS<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input value="<?php if (isset($listaPaciente)){foreach($listaPaciente as $linha){echo $linha['nomePaciente'];}}?>" id="nomeDeclaracao" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="nomeDeclaracao">Nome<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <select name="acompDeclaracao" id="select-tipoDeclaracao" class="input-form" type="text" pattern=".+" required>
                                    <option>Paciente</option>
                                    <option>Acompanhante</option>
                                </select>
                                <label class="label-form" for="select-tipoDeclaracao">Selecione uma opção<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input name="dataDeclaracao" value="<?php date_default_timezone_set('America/Sao_Paulo'); $dataAtual =  date('d-m-Y');  $dataConvertida = date('Y-m-d',strtotime($dataAtual)); echo $dataConvertida; ?>" id="data-declaracao" class="input-form" type="date" />
                                <label class="label-form" for="data-declaracao">Data<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input name="horaEntradaDeclaracao" value="<?php foreach($listaPaciente as $linha){ echo $linha['horaEntradaOcorrencia'];}?>" id="horario-entrada-declaracao" class="input-form" type="time" />
                                <label class="label-form" for="horario-entrada-declaracao">Horário de entrada<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input name="horaSaidaDeclaracao" value="<?php date_default_timezone_set('America/Sao_Paulo'); $horaAtual = date('H:i:s'); echo $horaAtual; ?>" name="horarioSaidaDeclaracao" id="horario-saida-declaracao" class="input-form" type="time" />
                                <label class="label-form" for="horario-saida-declaracao">Horário de saída<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input value="<?php if (isset($listaMedico)){foreach($listaMedico as $linha){echo $linha['nomeMedico'];}}?>" id="medico-declaracao" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="medico-declaracao">Médico<sup>*</sup></label>
                            </div>
                            <div class="input-container campo-form-lado-a-lado">
                                <input value="<?php if (isset($listaMedico)){foreach($listaMedico as $linha){echo $linha['crmMedico'];}}?>" id="crmMedico-declaracao" class="input-form" type="text" pattern=".+" required />
                                <label class="label-form" for="crmMedico-declaracao">CRM<sup>*</sup></label>
                            </div>
                            <div class="botoes-declaracao">
                                <div class="botão-salvar-informacoes">
                                    <button type="submit" name="btnSalvar" class="print-btn-form"><i class="far fa-save"></i>
                                        <p class="legenda-btn-declaracao"> Salvar</p>
                                    </button>
                                </div>
                                <div class="botão-salvar-imprimir-informacoes">
                                    <button type="submit" name="btnImprimir" class="print-btn-form"><i class="fas fa-file-download"></i>
                                        <p class="legenda-btn-declaracao">Salvar e Imprimir</p>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </section>
                    <form action="classes/ocorrencia/finalizarOcorrencia.php" method="POST">
                        <input name="codPaciente" value="<?php if (isset($listaPaciente)){foreach($listaPaciente as $linha){echo $linha['codPaciente'];}}?>" style="display:none" />
                        <input name="codMedico" value="<?php echo $codMedico;?>" style="display:none" />
                        <input name="codOcorrencia" value="<?php foreach($listaPaciente as $linha){ echo $linha['codOcorrencia'];}?>" style="display:none" />
                        <div class="input-container campo-form-direita">
                            <button type="submit" class="geral-btn-form btn-finalizar">Finalizar</button>
                        </div>
                    </form>
                </div>
                <!--FIM SECTION DECLARAÇÃO -->
            </div>
        </div>
    </section>
    <script language="javascript" type="text/javascript">
        function escondeDivs(){
            var inputCodPaciente = document.getElementById('codPacienteInput').value;
            var telaAnamnese = document.getElementById('anamneseTela');
            var telaTriagem = document.getElementById('triagemTela');
            var telaPaciente = document.getElementById('pacienteTela');
            var telaHistorico = document.getElementById('historicoTela');
            var telaObs = document.getElementById('obsTela');
            var telaReceita = document.getElementById('receitaTela');
            var telaAtestado = document.getElementById('atestadoTela');
            var telaDeclaracao = document.getElementById('declaracaoTela');

            if(inputCodPaciente>0){
                telaAnamnese.style.display = "block";
                telaTriagem.style.display = "block";
                telaPaciente.style.display = "block";
                telaHistorico.style.display = "block";
                telaObs.style.display = "block";
                telaReceita.style.display = "block";
                telaAtestado.style.display = "block";
                telaDeclaracao.style.display = "block";
            }
        }
        escondeDivs();
    </script>
    <script src="../js/cancelarOcorrencia.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>