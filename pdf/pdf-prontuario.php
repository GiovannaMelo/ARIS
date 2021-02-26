<?php
    use Dompdf\Dompdf;
    require_once ("dompdf/autoload.inc.php");

    $dompdf  = new Dompdf('isRemoteEnabled', TRUE);
    $pagina = file_get_contents ("prontuario.php");
    $dompdf -> loadHtml($pagina);
    $dompdf -> setPaper("A4", "portrait");
    $dompdf -> render();
    $dompdf->stream(
		"pacientes.pdf", 
		array(
			"Attachment" => false 
		)
	);

    var_dump($dompdf);
?>