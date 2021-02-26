function confirmarTeste(cod,nome,nomeCompleto,senha){
  $confirmar = window.confirm("Aperte em 'ok' para continuar");
  if($confirmar == true ){
      window.location.href='classes/enfermeiro/cadastrarLoginEnfermeiro.php?id=';            
  }else if ($confirmar == false ){
  }
}