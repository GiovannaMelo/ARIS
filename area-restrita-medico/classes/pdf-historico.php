<?php

    require_once ('../../conexao.php');

    $codOcorrencia = filter_input (INPUT_GET, "id");
    $apresentar = '';


            $sql = "SELECT * from tbocorrencia
            INNER JOIN tbtriagem on (tbocorrencia.codPaciente = tbtriagem.codPaciente)
            INNER JOIN tbreceita on (tbreceita.codPaciente = tbocorrencia.codPaciente)
            INNER JOIN tbPaciente on (tbPaciente.codPaciente = tbOcorrencia.codPaciente)
            INNER JOIN tbMedico on (tbMedico.codMedico = tbOcorrencia.codMedico)
            where tbOcorrencia.codOcorrencia = '".$codOcorrencia."' ";

            $result = mysqli_query($connect, $sql);
            while ($dados = mysqli_fetch_assoc($result)){
                date_default_timezone_set('America/Sao_Paulo');
                $anoAtual = date('y');
                $anoNascimento = date('y',strtotime($dados['dataNascimentoPaciente']));
                $idade =  $anoAtual - $anoNascimento;


                    $apresentar .= '
                    <p style="margin-top: 3%; font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif; font-size: 18px; text-align: justify;">
                        Paciente: '.$dados['nomePaciente'].'
                    </p>
                    <p style="margin-top: -4.5%; float:right; font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif; font-size: 17px; text-align: justify;">
                        N° Cartão SUS: '.$dados['numCartaoSusPaciente'].'
                    </p>
                    <h1 style="text-align: center; margin-top: 10%; font-size: 40px;
                    font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif; color: black;">
                        HISTÓRICO MÉDICO</h1>
                    <hr>
                            <center>
                                <h4>FICHA DE TRIAGEM DO PACIENTE</h4>
                            </center>
                            <hr><br>
                            <div class="formulario-anamnese">
                                <table class="table table-striped">
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
                                        <th scope="col">Pressão sistólica:</th>
                                            <th scope="col">Pressão diastólica:</th>
                                            <th scope="col">Batimentos Cardíacos (BMP)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>'.$dados['pressaoSitolicaTriagem'].'</td>
                                            <td>'.$dados['pressaoDiastolicaTriagem'].'</td>
                                            <td>'.$dados['batimentosTriagem'].'</td>
                                        </tr>
                                    </tbody>


                                    <thead>
                                        <tr>
                                            <th scope="col">Temperatura Corporal:</th>
                                            <th scope="col">Nível de dor:</th>
                                            <th scope="col">Alergias:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>'.$dados['temperaturaTriagem'].'</td>
                                            <td>'.$dados['nivelDorTriagem'].'</td>
                                            <td>'.$dados['alergiaTriagem'].'</td>
                                        </tr>
                                    </tbody>


                                    <thead>
                                        <tr>
                                            <th scope="col">Qual alergia?</th>
                                            <th scope="col">Diabetes?</th>
                                            <th scope="col">Tipo:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>'.$dados['obsAlergiaTriagem'].'</td>
                                            <td>'.$dados['diabetesTriagem'].'</td>
                                            <td>'.$dados['tipoDiabetesTriagem'].'</td>
                                        </tr>
                                    </tbody>


                                    <thead>
                                        <tr>
                                            <th scope="col">Gravidez?</th>
                                            <th scope="col">Quantas semanas?</th>
                                            <th scope="col">Fumante?</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>'.$dados['gravidezTriagem'].'</td>
                                            <td>'.$dados['tempoGravidezTriagem'].'</td>
                                            <td>'.$dados['fumanteTriagem'].'</td>
                                        </tr>
                                    </tbody>


                                    <thead>
                                        <tr>
                                            <th scope="col">Histórico de doença?</th>
                                            <th scope="col">Quais?</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>'.$dados['histDoencaTriagem'].'</td>
                                            <td> '.$dados['obsHistDoencaTriagem'].'</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <br>
                            </div>

                            <img src="img/logo-prefeitura.png" style="width: 35%; margin-bottom: 7%;">
                        <img src="img/logo-sus.png" style="width: 20%; float: right; margin-bottom: 5%; margin-top: 2%;">
                        <p style=" float:left; font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif; font-size: 17px; ">
                        </p>
                        <br>
                        <p style="margin-top: 2%; font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif; font-size: 18px;">
                            Paciente: Leandro de Sales Cotrim
                        </p>
                        <p style="margin-top: -4.5%; margin-bottom: 20%; float:right; font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif; font-size: 19px;">
                        19 anos
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

                        <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                        <br>
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
                ';
            }
        $apresentar .= '
            <img src="img/logoAris.jpg" style="width: 15%; margin-top: 15%; float:right;">
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>HISTÓRICO MÉDICO</title>
</head>

<body style="width: 100%; font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;">
    <img src="img/logo-prefeitura.png" style="width: 35%; margin-bottom: 7%;">
    <img src="img/logo-sus.png" style="width: 20%; float: right; margin-bottom: 5%; margin-top: 2%;">
			'. $apresentar .'
		');

	
	$dompdf->setPaper('A4', 'portrait');	
		
	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"historico.pdf", 
		array(
			"Attachment" => true //Para realizar o download somente alterar para true
		)
	);
?>