<?php

    require_once ('../../conexao.php');
    date_default_timezone_set('America/Sao_Paulo');
    $anoAtual = date('y');
    $ano = date('Y');

    $apresentar = '';
    $apresentar .= '<table class="table table-bordered" style="text-align: center;">';
    $apresentar .= '<thead style="text-align: center;">';
    $apresentar .= '<tr>';
    $apresentar .= '<th scope="col" style="text-align: center;">Quantidade</th>';
    $apresentar .= '<th scope="col" style="text-align: center;">Cadastrados</th>';
    $apresentar .= '</tr>';
    $apresentar .= '</thead>';
    $apresentar .= '<tbody>';
    $apresentar .= '<tr>';

            $sql = "SELECT count(codPaciente) as qtdPacientes FROM tbPaciente";
            $result = mysqli_query($connect, $sql);
            while ($dados = mysqli_fetch_assoc($result)){

                $apresentar .= '<th scope="row" style="text-align: center;">' . $dados['qtdPacientes'] ."</th>";
            }
                $apresentar .= '<td>Pacientes</td>
                </tr>
                <tr>';
            $sql = "SELECT count(codFuncionario) as qtdFuncionario FROM tbFuncionario";
            $result = mysqli_query($connect, $sql);
            while ($dados = mysqli_fetch_assoc($result)){
                $apresentar .= '<th scope="row" style="text-align: center;">'. $dados['qtdFuncionario'] ."</th>";
            }
                $apresentar .= '
                <td>Funcionários</td>
                </tr>
                <tr>';
            $sql = "SELECT count(codMedico) as qtdMedico FROM tbMedico";
            $result = mysqli_query($connect, $sql);
            while ($dados = mysqli_fetch_assoc($result)){
                $apresentar .= '
                <th scope="row" style="text-align: center;">'. $dados['qtdMedico']."</th>";
            }
                $apresentar .= '
                <td>Médicos</td>
                </tr>
            </tbody>
            </table>
            <br>
                <hr>
                <h4 style="text-align: center;
                font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif; color: black;">
                    PACIENTES CADASTRADOS</h4>
                <hr>
                <br>
                <table class="table table-bordered" style="text-align: center;">
                    <thead>
                        <tr>
                        <th scope="col" style="text-align: center;">N° Cartão SUS</th>
                        <th scope="col" style="text-align: center;">Nome</th>
                        <th scope="col" style="text-align: center;">Idade</th>
                        <th scope="col" style="text-align: center;">Sexo</th>
                        </tr>
                    </thead>';

                $sql = "SELECT * FROM tbPaciente";
                $result = mysqli_query($connect, $sql);
                while ($dados = mysqli_fetch_assoc($result)){
                    $anoNascimento = date('y',strtotime($dados['dataNascimentoPaciente']));
                    $idade =  $anoAtual - $anoNascimento;

                    $apresentar .= '
                    <tbody>
                        <tr>';
                    $apresentar .= '
                        <th scope="row" style="text-align: center;">' . $dados ['numCartaoSusPaciente'] . "</th>";
                    $apresentar .= '
                        <td>' . $dados ['nomePaciente'] . "</td>";
                    $apresentar .= '
                        <td>' . $idade . "</td>";
                    $apresentar .= '
                        <td>' . $dados ['sexoPaciente'] . "</td>";
                    $apresentar .= '
                        </tr>
                    </tbody>';
                }
                    $apresentar .= '
                </table>
                    <br>
                    <hr>
                    <h4 style="text-align: center;
                    font-family: Gill Sans, Gill Sans MT, Calibri, Trebuchet MS, sans-serif; color: black;">
                        CONSULTAS ATENDIDAS</h4>
                    <hr>
                    <br>
                    <table class="table table-bordered" style="text-align: center;">

                    <thead>
                        <tr>
                        <th scope="col" style="text-align: center;">Janeiro</th>
                        <th scope="col" style="text-align: center;">Fevereiro</th>
                        <th scope="col" style="text-align: center;">Março</th>
                        <th scope="col" style="text-align: center;">Abril</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>';
                $sql = "SELECT count(codOcorrencia) as qtdOcorrencia FROM tbOcorrencia WHERE MONTH(dataOcorrencia) = 1 AND YEAR(dataOcorrencia) = $ano";
                $result = mysqli_query($connect, $sql);
                while ($dados = mysqli_fetch_assoc($result)){
                        $apresentar .= '
                        <td>'. $dados['qtdOcorrencia'] ."</td>";
                    }
                    $sql = "SELECT count(codOcorrencia) as qtdOcorrencia FROM tbOcorrencia WHERE MONTH(dataOcorrencia) = 2 AND YEAR(dataOcorrencia) = $ano";
                $result = mysqli_query($connect, $sql);
                while ($dados = mysqli_fetch_assoc($result)){
                        $apresentar .= '
                        <td>'. $dados['qtdOcorrencia'] ."</td>";
                    }
                    $sql = "SELECT count(codOcorrencia) as qtdOcorrencia FROM tbOcorrencia WHERE MONTH(dataOcorrencia) = 3 AND YEAR(dataOcorrencia) = $ano";
                $result = mysqli_query($connect, $sql);
                while ($dados = mysqli_fetch_assoc($result)){
                        $apresentar .= '
                        <td>'. $dados['qtdOcorrencia'] ."</td>";
                    }
                    $sql = "SELECT count(codOcorrencia) as qtdOcorrencia FROM tbOcorrencia WHERE MONTH(dataOcorrencia) = 4 AND YEAR(dataOcorrencia) = $ano";
                $result = mysqli_query($connect, $sql);
                while ($dados = mysqli_fetch_assoc($result)){
                        $apresentar .= '
                        <td>'. $dados['qtdOcorrencia'] ."</td>";
                    }
                    
                $apresentar .= '
                </tr>
                    </tbody>
                    <thead>
                    <tr>
                    <th scope="col" style="text-align: center;">Maio</th>
                    <th scope="col" style="text-align: center;">Junho</th>
                    <th scope="col" style="text-align: center;">Julho</th>
                    <th scope="col" style="text-align: center;">Agosto</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>';
            $sql = "SELECT count(codOcorrencia) as qtdOcorrencia FROM tbOcorrencia WHERE MONTH(dataOcorrencia) = 5 AND YEAR(dataOcorrencia) = $ano";
            $result = mysqli_query($connect, $sql);
            while ($dados = mysqli_fetch_assoc($result)){
                    $apresentar .= '
                    <td>'. $dados['qtdOcorrencia'] ."</td>";
                }
                $sql = "SELECT count(codOcorrencia) as qtdOcorrencia FROM tbOcorrencia WHERE MONTH(dataOcorrencia) = 6 AND YEAR(dataOcorrencia) = $ano";
            $result = mysqli_query($connect, $sql);
            while ($dados = mysqli_fetch_assoc($result)){
                    $apresentar .= '
                    <td>'. $dados['qtdOcorrencia'] ."</td>";
                }
                $sql = "SELECT count(codOcorrencia) as qtdOcorrencia FROM tbOcorrencia WHERE MONTH(dataOcorrencia) = 7 AND YEAR(dataOcorrencia) = $ano";
            $result = mysqli_query($connect, $sql);
            while ($dados = mysqli_fetch_assoc($result)){
                    $apresentar .= '
                    <td>'. $dados['qtdOcorrencia'] ."</td>";
                }
                $sql = "SELECT count(codOcorrencia) as qtdOcorrencia FROM tbOcorrencia WHERE MONTH(dataOcorrencia) = 8 AND YEAR(dataOcorrencia) = $ano";
            $result = mysqli_query($connect, $sql);
            while ($dados = mysqli_fetch_assoc($result)){
                    $apresentar .= '
                    <td>'. $dados['qtdOcorrencia'] ."</td>";
                }
                
            $apresentar .= '
            </tr>
                </tbody>
                <thead>
                <tr>
                <th scope="col" style="text-align: center;">Setembro</th>
                <th scope="col" style="text-align: center;">Outubro</th>
                <th scope="col" style="text-align: center;">Novembro</th>
                <th scope="col" style="text-align: center;">Dezembro</th>
                </tr>
            </thead>
            <tbody>
                <tr>';
        $sql = "SELECT count(codOcorrencia) as qtdOcorrencia FROM tbOcorrencia WHERE MONTH(dataOcorrencia) = 9 AND YEAR(dataOcorrencia) = $ano";
        $result = mysqli_query($connect, $sql);
        while ($dados = mysqli_fetch_assoc($result)){
                $apresentar .= '
                <td>'. $dados['qtdOcorrencia'] ."</td>";
            }
            $sql = "SELECT count(codOcorrencia) as qtdOcorrencia FROM tbOcorrencia WHERE MONTH(dataOcorrencia) = 10 AND YEAR(dataOcorrencia) = $ano";
        $result = mysqli_query($connect, $sql);
        while ($dados = mysqli_fetch_assoc($result)){
                $apresentar .= '
                <td>'. $dados['qtdOcorrencia'] ."</td>";
            }
            $sql = "SELECT count(codOcorrencia) as qtdOcorrencia FROM tbOcorrencia WHERE MONTH(dataOcorrencia) = 11 AND YEAR(dataOcorrencia) = $ano";
        $result = mysqli_query($connect, $sql);
        while ($dados = mysqli_fetch_assoc($result)){
                $apresentar .= '
                <td>'. $dados['qtdOcorrencia'] ."</td>";
            }
            $sql = "SELECT count(codOcorrencia) as qtdOcorrencia FROM tbOcorrencia WHERE MONTH(dataOcorrencia) = 12 AND YEAR(dataOcorrencia) = $ano";
        $result = mysqli_query($connect, $sql);
        while ($dados = mysqli_fetch_assoc($result)){
                $apresentar .= '
                <td>'. $dados['qtdOcorrencia'] ."</td>";
            }
            
        $apresentar .= '
        </tr>
            </tbody>
                    </table>
                    <img src="img/logoAris.jpg" style="width: 15%; margin-top: 5%; float:right;">

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
    <title>RELATÓRIOS</title>
    
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

    </style>

</head>

<body style="width: 100%; font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;">
            <img src="img/logo-prefeitura.png" style="width: 35%; margin-bottom: 7%;">
            <img src="img/logo-sus.png" style="width: 20%; float: right; margin-bottom: 5%; margin-top: 2%;">
            <p style=" float:left; font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif; font-size: 17px; ">
            </p>
            <br>
            <hr>
            <h1 style="text-align: center;
            font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif; color: black;">
                RELATÓRIOS</h1>
            <hr>
            <br>
            <hr>
            <h4 style="text-align: center;
            font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif; color: black;">
                CADASTROS REALIZADOS</h4>
            <hr>
            <br>'. $apresentar .'
		');

	
	$dompdf->setPaper('A4', 'portrait');	
		
	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"Relatorio.pdf", 
		array(
			"Attachment" => true //Para realizar o download somente alterar para true
		)
	);
?>