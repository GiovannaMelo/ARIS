function confirmarDados(id){
  $confirmar = window.confirm("Aperte em 'ok' se você tem certeza de que deseja cadastrar essa triagem");
  if($confirmar == true ){
      window.location.href='classes/triagem/cadastrarTriagem.php';            
  }else if ($confirmar == false ){
  }
}