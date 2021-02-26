<?php

    require_once ('../../../conexao.php');
    session_start();
    $codPaciente =  $_SESSION['paciente-session'];
    $codMedico =  $_SESSION['code-session'];
    $apresentar = '';

            $sql = "SELECT (nomeMedico), (crmMedico), (nomePaciente) AS 'Nome',(observacaoOcorrencia) 
            FROM tbOcorrencia 
            INNER JOIN tbPaciente ON (tbPaciente.codPaciente = tbOcorrencia.codPaciente) 
            INNER JOIN tbMedico ON (tbMedico.codMedico = tbOcorrencia.codMedico) 
            WHERE tbpaciente.codPaciente = '". $codPaciente."' AND tbmedico.codMedico = '". $codMedico."' AND tbOcorrencia.dataOcorrencia = (SELECT MAX(dataOcorrencia)) 
            LIMIT 1";

            $result = mysqli_query($connect, $sql);
            while ($dados = mysqli_fetch_assoc($result)){

                $apresentar .= '    
                <p style="text-align:justify;  margin-top: 10%; font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif; font-size: 19px;">
                '.$dados['observacaoOcorrencia']."</p>";
                $apresentar .= '
                <p style="margin-top: 10%;">'.$dados['nomeMedico'].'</p>
                <p style="margin-top: 1%;">CRM '.$dados['crmMedico'].'</p>';
        }
        $apresentar .= '
        <div style="width: 40%; margin-left: 30%; margin-top: 15%;">
        <hr>
        <h4 style="text-align: center; font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;">Assinatura Médico</h4>
    </div>
    <img src="img/logoAris.jpg" style="width: 15%; margin-top: 5%; float:right;">

</body>

</html>';



	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("../../../dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF('isRemoteEnabled', TRUE);


	// Carrega seu HTML
    $dompdf->load_html('
    <html>

<head>
    <meta charset="utf-8">
    <link rel="icon" href="img/iconeAris.jpg">
    <title>OBSERVAÇÕES</title>
</head>

<body style="width: 100%; font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;">
    <img src="img/logo-prefeitura.png" style="width: 35%; margin-bottom: 7%;">
    <img src="img/logo-sus.png" style="width: 20%; float: right; margin-bottom: 5%; margin-top: 2%;">
    <p style=" float:left; font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif; font-size: 17px; ">
    </p>
    <br>
			'. $apresentar .'
		');

	
	$dompdf->setPaper('A4', 'portrait');	
		
	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"Observacao.pdf", 
		array(
			"Attachment" => true //Para realizar o download somente alterar para true
		)
    );
    unset($_SESSION['paciente-session']);
    header ("Location: ../medico.php");
?>