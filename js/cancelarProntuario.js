function cancelarProntuario(id){
  $confirmar = window.confirm("Aperte em 'ok' para cancelar este prontuario");
  if($confirmar == true ){
      window.location.href='classes/prontuario/cancelarProntuario.php?id='+id;            
  }else if ($confirmar == false ){
  }
}