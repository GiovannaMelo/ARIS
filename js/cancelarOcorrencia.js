function cancelarOcorrencia(id){
  $confirmar = window.confirm("Aperte em 'ok' para cancelar esta ocorrencia");
  if($confirmar == true ){
      window.location.href='classes/ocorrencia/cancelarOcorrencia.php?id='+id;            
  }else if ($confirmar == false ){
  }
}