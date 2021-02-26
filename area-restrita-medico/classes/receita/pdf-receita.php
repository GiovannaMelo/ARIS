<?php

    require_once ('../../../conexao.php');
    session_start();
    $codPaciente =  $_SESSION['paciente-session'];
    $codMedico =  $_SESSION['code-session'];

    $apresentar = '';

            $sql = "SELECT * from tbReceita
            inner join tbPaciente on (tbPaciente.codPaciente = tbReceita.codPaciente)
            inner join tbMedico on (tbMedico.codMedico = tbReceita.codMedico)
            where tbpaciente.codPaciente = '".$codPaciente."' and tbmedico.codMedico ='".$codMedico."' 
            and tbReceita.codReceita = (SELECT MAX(codReceita)) limit 1";

            $result = mysqli_query($connect, $sql);
            while ($dados = mysqli_fetch_assoc($result)){
                $apresentar .= '    
                <p style="margin-top: 3%; font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif; font-size: 18px; text-align: justify;">
            Paciente: '.$dados['nomePaciente'].'
        </p>
        <p style="margin-top: -4.5%; float:right; font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif; font-size: 17px; text-align: justify;">
            N° Cartão SUS: '.$dados['numCartaoSusPaciente'].'
        </p>
        <h1 style="text-align: center; margin-top: 10%;
        font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif; color: black;">
            RECEITUÁRIO</h1>
        <h4 style="font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif; margin-top:3%;">'.$dados['adminMedicamentoReceita'].'</h4>
        <p>'.$dados['medicamentoReceita'].'  -------------------------------</p>
        <p>Tomar '.$dados['qntMedicamentoReceita'].' '.$dados['unidadeMedidaReceita'].'  de '.$dados['tempoMedicamentoReceita'].' horas</p>
        <p>Durante '.$dados['diasMedicamentoReceita'].'</p>
        <br>';
        if(isset($dados['medicamentoReceita2'])){
        $apresentar .= ' 
        <p>'.$dados['medicamentoReceita2'].' 500g  -------------------------------</p>
        <p>Tomar '.$dados['qntMedicamentoReceita2'].' '.$dados['unidadeMedidaReceita2'].'  de '.$dados['tempoMedicamentoReceita2'].' horas</p>
        <p>Durante '.$dados['diasMedicamentoReceita2'].'</p>';

        }
        $apresentar .= ' 
        <p style="margin-top: 8%;">Dr(a) '.$dados['nomeMedico'].'</p>
        <p style="margin-top: 1%;">CRM '.$dados['crmMedico'].'</p>
        <div style="width: 40%; margin-left: 30%; margin-top: 5%;">
            <hr>
            <h4 style="text-align: center; font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;">Assinatura Médico</h4>
        </div>
        <img src="img/logoAris.jpg" style="width: 15%; margin-top: 5%; float:right;">
    </body>
        </html>';
    }



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
        <title>RECEITUÁRIO</title>
    </head>

    <body style="width: 100%; font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;">
        <img src="img/logo-prefeitura.png" style="width: 35%; margin-bottom: 7%;">
			'. $apresentar .'
		');

	
	$dompdf->setPaper('A4', 'portrait');	
		
	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"receita.pdf", 
		array(
			"Attachment" => true //Para realizar o download somente alterar para true
		)
    );
    unset($_SESSION['paciente-session']);
    header ("Location: ../medico.php");
?>