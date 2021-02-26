<?php

    require_once ('../../conexao.php');

    $codPaciente = filter_input(INPUT_GET, "id");
    $apresentar = '';

            $sql = "SELECT * from tbPaciente
            where codPaciente = '".$codPaciente."' limit 1";

            $result = mysqli_query($connect, $sql);
            while ($dados = mysqli_fetch_assoc($result)){
                $apresentar .= '    
                <p style="margin-top: 3%; font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif; font-size: 18px; text-align: justify;">'.' Paciente:' . $dados['nomePaciente'] ."</p>";
                $apresentar .= '
                <p style="margin-top: -4.5%; float:right; font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif; font-size: 17px; text-align: justify;">
                N° Cartão SUS:'.$dados['numCartaoSusPaciente']."</p>";
                $apresentar .= '
                <h1 style="text-align: center; margin-top: 10%; font-size: 40px;
                    font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif; color: black;">
                    PRONTUÁRIO MÉDICO</h1>
                    <hr>
                    <center>
                        <h4>FICHA DE CADASTRO DE PACIENTE DA RECEPÇÃO</h4>
                    </center><br>
                ';
                $apresentar .= '
                <table>
                                <thead>
                                    <tr>
                                        <th scope="col">NÚMERO DO CARTÃO DO SUS:</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>'.$dados['numCartaoSusPaciente'].'</td>
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
                                        <td>'.$dados['nomePaciente'].'</td>
                                        <td>'.$dados['nomeSocialPaciente'].'</td>
                                        <td>'.$dados['nomeMaePaciente'].'</td>
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
                                        <td>'.$dados['nomePaiPaciente'].'</td>
                                        <td>'.$dados['dataNascimentoPaciente'].'</td>
                                        <td>'.$dados['sexoPaciente'].'</td>
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
                                        <td>'.$dados['nacionalidadePaciente'].'</td>
                                        <td>'.$dados['cpfPaciente'].'</td>
                                        <td>'.$dados['rgPaciente'].'</td>
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
                                        <td>'.$dados['rgOrgaoPaciente'].'</td>
                                        <td>'.$dados['dataRgOrgaoPaciente'].'</td>
                                        <td>'.$dados['ufRgPaciente'].'</td>
                                    </tr>
                                </tbody>


                                <thead>
                                    <tr>
                                        <th scope="col">Município de nascimento:</th>
                                        <th scope="col">Escolaridade:</th>
                                        <th scope="col">Convênio:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>'.$dados['cidadeNascPaciente'].'</td>
                                        <td>'.$dados['escolaridadePaciente'].'</td>
                                        <td>'.$dados['convenioPaciente'].'</td>
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
                                        <td>'.$dados['statusFamiliar'].'</td>
                                        <td>'.$dados['numeroCelularPaciente'].'</td>
                                        <td>'.$dados['numeroTelefonePaciente'].'</td>
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
                                        <td>'.$dados['emailPaciente'].'</td>
                                        <td>'.$dados['cepPaciente'].'</td>
                                        <td>'.$dados['tipoLogradouroPaciente'].'</td>
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
                                        <td>'.$dados['logradouroPaciente'].'</td>
                                        <td>'.$dados['numCasaPaciente'].'</td>
                                        <td>'.$dados['complementoPaciente'].'</td>
                                    </tr>
                                </tbody>


                                <thead>
                                    <tr>
                                        <th scope="col">Bairro:</th>
                                        <th scope="col">Município:</th>
                                        <th scope="col">Estado:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>'.$dados['bairroPaciente'].'</td>
                                        <td>'.$dados['cidadePaciente'].'</td>
                                        <td>'.$dados['estadoPaciente'].'</td>
                                    </tr>
                                </tbody>
                            </table>';
            }

            $sql = "SELECT * from tbAnamnese
            where codPaciente = '".$codPaciente."' limit 1";

            $result = mysqli_query($connect, $sql);
            while ($dados = mysqli_fetch_assoc($result)){
                
                    $apresentar .= ' 
                    <hr>
                    <center>
                        <h4>FICHA DE ANAMNESE DO PACIENTE</h4>
                    </center>
                    <hr><br>
                    <div class="formulario-anamnese">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Tratamento médico?</th>
                                    <th scope="col">Especificação:</th>
                                    <th scope="col">É fumante?</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> '.$dados['tratamentoMedico'].'</td>
                                    <td> '.$dados['obsTratamentoMedico'].'</td>
                                    <td> '.$dados['fumante'].'</td>
                                </tr>
                            </tbody>


                            <thead>
                                <tr>
                                    <th scope="col">Alergias?</th>
                                    <th scope="col">Especificação:</th>
                                    <th scope="col">Possui marca-passo?</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> '.$dados['alergia'].'</td>
                                    <td> '.$dados['obsAlergia'].'</td>
                                    <td> '.$dados['marcaPasso'].'</td>
                                </tr>
                            </tbody>


                            <thead>
                                <tr>
                                    <th scope="col">Cirurgia recente?</th>
                                    <th scope="col">Especificação:</th>
                                    <th scope="col">Alterações cardíacas?</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> '.$dados['antCirurgico'].'</td>
                                    <td> '.$dados['obsAntCirurgico'].'</td>
                                    <td> '.$dados['alteracaoCardiaca'].'</td>
                                </tr>
                            </tbody>


                            <thead>
                                <tr>
                                    <th scope="col">Problemas de pele?</th>
                                    <th scope="col">Especificação:</th>
                                    <th scope="col">Distúrbios circulatórios?</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>'.$dados['problemaPele'].'</td>
                                    <td>'.$dados['obsProblemaPele'].'</td>
                                    <td>'.$dados['disturbioCirculatorio'].'</td>
                                </tr>
                            </tbody>


                            <thead>
                                <tr>
                                    <th scope="col">Gestante?</th>
                                    <th scope="col">Semanas:</th>
                                    <th scope="col">Disturbios renais?</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>'.$dados['gestante'].'</td>
                                    <td>'.$dados['obsGestante'].'</td>
                                    <td>'.$dados['disturbioRenal'].'</td>
                                </tr>
                            </tbody>


                            <thead>
                                <tr>
                                    <th scope="col">Problemas ortopedicos?</th>
                                    <th scope="col">Especificação:</th>
                                    <th scope="col">Distúrbios hormonais?</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>'.$dados['problemaOrtopedico'].'</td>
                                    <td>'.$dados['obsProblemaOrtopedico'].'</td>
                                    <td>'.$dados['disturbioHormonal'].'</td>
                                </tr>
                            </tbody>


                            <thead>
                                <tr>
                                    <th scope="col">Diabetes?</th>
                                    <th scope="col">Qual tipo?</th>
                                    <th scope="col">Controlada?</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>'.$dados['diabete'].'</td>
                                    <td>'.$dados['tipoDiabete'].'</td>
                                    <td>'.$dados['controleDiabete'].'</td>
                                </tr>
                            </tbody>


                            <thead>
                                <tr>
                                    <th scope="col">Tumor/Lesão pré cancerosa?</th>
                                    <th scope="col">Especificação:</th>
                                    <th scope="col">Epilético?</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>'.$dados['tumor'].'</td>
                                    <td>'.$dados['obsTumor'].'</td>
                                    <td>'.$dados['epiletico'].'</td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th scope="col">Prótese facial ou corporal?</th>
                                    <th scope="col">Especificação:</th>
                                    <th scope="col">Hipo/Hipertensão arterial?</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>'.$dados['protese'].'</td>
                                    <td>'.$dados['obsProtese'].'</td>
                                    <td>'.$dados['hipoHipertensao'].'</td>
                                </tr>
                            </tbody>


                            <thead>
                                <tr>
                                    <th scope="col">Ciclo menstrual regular?</th>
                                    <th scope="col">Funcionamento intestinal regular?</th>
                                    <th scope="col">Filhos? Quantos?</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>'.$dados['cicloMenstrual'].'</td>
                                    <td>'.$dados['funcIntestinal'].'</td>
                                    <td>'.$dados['filhos'].'</td>
                                </tr>
                            </tbody>

                            <thead>
                                <tr>
                                    <th scope="col">Nome do contato de emergência:</th>
                                    <th scope="col">Telefone Fixo:</th>
                                    <th scope="col">Celular:</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>'.$dados['nomePrimeiroContato'].'</td>
                                    <td>'.$dados['telPrimeiroContato'].'</td>
                                    <td>'.$dados['celPrimeiroContato'].'</td>
                                </tr>
                            </tbody>
                            
                            <thead>
                                <tr>
                                    <th scope="col">Nome do segundo contato de emergência:</th>
                                    <th scope="col">Telefone Fixo:</th>
                                    <th scope="col">Celular:</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>'.$dados['nomeSegundoContato'].'</td>
                                    <td>'.$dados['telSegundoContato'].'</td>
                                    <td>'.$dados['celSegundoContato'].'</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <hr>';
            }

            $sql = "SELECT * from tbocorrencia
            INNER JOIN tbtriagem on (tbocorrencia.codPaciente = tbtriagem.codPaciente)
            INNER JOIN tbreceita on (tbreceita.codPaciente = tbocorrencia.codPaciente)
            INNER JOIN tbPaciente on (tbPaciente.codPaciente = tbOcorrencia.codPaciente)
            INNER JOIN tbMedico on (tbMedico.codMedico = tbOcorrencia.codMedico)
            where tbocorrencia.codPaciente = '".$codPaciente."' ";

            $result = mysqli_query($connect, $sql);
            while ($dados = mysqli_fetch_assoc($result)){
                date_default_timezone_set('America/Sao_Paulo');
                $anoAtual = date('y');
                $anoNascimento = date('y',strtotime($dados['dataNascimentoPaciente']));
                $idade =  $anoAtual - $anoNascimento;


                    $apresentar .= '
                            <center>
                                <h4>FICHA DE TRIAGEM DO PACIENTE</h4>
                            </center>
                            <hr><br>
                            <div class="formulario-anamnese">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Queixas do paciente:</th>
                                            <th scope="col">Hora da Emissão:</th>
                                            <th scope="col">Data de Emissão</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>'.$dados['queixaTriagem'].'</td>
                                            <td>'.$dados['horaEmissaoTriagem'].'</td>
                                            <td>'.$dados['dataEmissaoTriagem'].'</td>
                                        </tr>
                                    </tbody>


                                    <thead>
                                        <tr>
                                            <th scope="col">Nome do paciente:</th>
                                            <th scope="col">Idade:</th>
                                            <th scope="col">Pressão sistólica:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>'.$dados['nomePaciente'].'</td>
                                            <td>'.$idade.'</td>
                                            <td>'.$dados['pressaoSitolicaTriagem'].'</td>
                                        </tr>
                                    </tbody>


                                    <thead>
                                        <tr>
                                            <th scope="col">Pressão diastólica:</th>
                                            <th scope="col">Batimentos Cardíacos (BMP)</th>
                                            <th scope="col">Temperatura Corporal:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>'.$dados['pressaoDiastolicaTriagem'].'</td>
                                            <td>'.$dados['batimentosTriagem'].'</td>
                                            <td>'.$dados['temperaturaTriagem'].'</td>
                                        </tr>
                                    </tbody>


                                    <thead>
                                        <tr>
                                            <th scope="col">Nível de dor:</th>
                                            <th scope="col">Alergias:</th>
                                            <th scope="col">Qual alergia?</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>'.$dados['nivelDorTriagem'].'</td>
                                            <td>'.$dados['alergiaTriagem'].'</td>
                                            <td>'.$dados['obsAlergiaTriagem'].'</td>
                                        </tr>
                                    </tbody>


                                    <thead>
                                        <tr>
                                            <th scope="col">Diabetes?</th>
                                            <th scope="col">Tipo:</th>
                                            <th scope="col">Gravidez?</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>'.$dados['diabetesTriagem'].'</td>
                                            <td>'.$dados['tipoDiabetesTriagem'].'</td>
                                            <td>'.$dados['gravidezTriagem'].'</td>
                                        </tr>
                                    </tbody>


                                    <thead>
                                        <tr>
                                            <th scope="col">Quantas semanas?</th>
                                            <th scope="col">Fumante?</th>
                                            <th scope="col">Histórico de doença?</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>'.$dados['tempoGravidezTriagem'].'</td>
                                            <td>'.$dados['fumanteTriagem'].'</td>
                                            <td>'.$dados['histDoencaTriagem'].'</td>
                                        </tr>
                                    </tbody>


                                    <thead>
                                        <tr>
                                            <th scope="col">Quais?</th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> '.$dados['obsHistDoencaTriagem'].'</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="documento">
                                <img src="img/logo-prefeitura.png" style="width: 35%; margin-bottom: 7%;">
                                <img src="img/logo-sus.png" style="width: 20%; float: right; margin-bottom: 5%; margin-top: 2%;">
                                <p style=" float:left; font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif; font-size: 17px; ">
                                </p>
                                <br>
                                <p style="margin-top: 2%; font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif; font-size: 18px;">
                                    Paciente: '.$dados['nomePaciente'].'
                                </p>
                                <p style="margin-top: -4.5%; margin-bottom: 20%; float:right; font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif; font-size: 19px;">
                                '.$idade.' anos
                                </p>
                                <br>
                                <br>
                                <hr>
                                <h1 style="text-align: center;
                                font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif; color: black;">
                                    OBSERVAÇÕES</h1>
                                <hr>

                                <p style="text-align:justify;  margin-top: 10%; font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif; font-size: 19px;">
                                    '.$dados['observacaoOcorrencia'].'.
                                </p>
                                <p style="margin-top: 10%;">Dr(a) '.$dados['nomeMedico'].'</p>
                                <p style="margin-top: 1%;">'.$dados['crmMedico'].'</p>
                            </div>
                            

                        <!--RECEITA-->
                        <div class="documento">
                            <img src="img/logo-prefeitura.png" style="width: 35%; margin-bottom: 7%;">
                            <img src="img/logo-sus.png" style="width: 20%; float: right; margin-bottom: 5%; margin-top: 2%;">
                            <p style="margin-top: 3%; font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif; font-size: 18px; text-align: justify;">
                                Paciente: '.$dados['nomePaciente'].'
                            </p>
                            <p style="margin-bottom: 10% ;margin-top: -4.5%; float:right; font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif; font-size: 17px; text-align: justify;">
                                N° Cartão SUS: '.$dados['numCartaoSusPaciente'].'
                            </p>
                            <br>
                            <br>
                            <hr>
                            <h1 style="text-align: center;
                            font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif; color: black;">
                                RECEITUÁRIO</h1>
                            <hr>
                            <h4 style="font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif; margin-top:3%;">Uso Oral</h4>
                            <p>'.$dados['medicamentoReceita'].' -------------------------------</p>
                            <p>Tomar '.$dados['qntMedicamentoReceita'].' '.$dados['unidadeMedidaReceita'].'de '.$dados['tempoMedicamentoReceita'].' horas</p>
                            <p>Durante '.$dados['diasMedicamentoReceita'].'</p>
                            <br>';
                            if(isset($dados['medicamentoReceita2'])){
                            $apresentar .= ' 
                            <p>'.$dados['medicamentoReceita2'].' -------------------------------</p>
                            <p>Tomar '.$dados['qntMedicamentoReceita2'].' '.$dados['unidadeMedidaReceita2'].'  de '.$dados['tempoMedicamentoReceita2'].' horas</p>
                            <p>Durante '.$dados['diasMedicamentoReceita2'].'</p>';
                            }
                            $apresentar .= '
                            <p style="margin-top: 10%;">Dr(a) '.$dados['nomeMedico'].'</</p>
                            <p style="margin-top: 1%;">CRM '.$dados['crmMedico'].'</p>

                            <img src="img/logoAris.jpg" style="width: 15%; margin-top: 20%; float:right;">
                    </div>
                ';
            }
        $apresentar .= '
            </body>
        
        </html>';



	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("../../dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF('isRemoteEnabled', TRUE);


	// Carrega seu HTML
    $dompdf->load_html('
    <html>

<head>
    <meta charset="utf-8">
    <link rel="icon" href="img/iconeAris.jpg">
    <title>PRONTUÁRIO MÉDICO</title>
    <style>

        body{
            font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;
        }
         
        table, td, th {
            border: 1px solid #black;
            text-align: left;
        }
        
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        th, td {
            padding: 15px;
        }
        h1,
        h2,
        h4 {
            font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;
        }

        table{
            page-break-after: always;
        }
        .documento{
            page-break-after: always;
        }
    </style>
</head>

<body style="width: 100%; font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;  backgroud-color:red;">
    <img src="img/logo-prefeitura.png" style="width: 35%; margin-bottom: 7%;">
    <img src="img/logo-sus.png" style="width: 20%; float: right; margin-bottom: 5%; margin-top: 2%;">
			'. $apresentar .'
		');

	
	$dompdf->setPaper('A4', 'portrait');	
		
	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"Prontuario.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>