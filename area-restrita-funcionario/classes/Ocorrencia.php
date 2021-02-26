<?php
require_once 'Conexao.php';
class Ocorrencia{
    private $codOcorrencia;
    private $codPaciente;
    private $codMedico;
    private $observacaoOcorrencia;
    private $horaEntradaOcorrencia;
    private $horaSaidaOcorrencia;
    private $dataOcorrencia;
//    
//
//
    public function getCodOcorrencia(){
        return $this->codOcorrencia;
    }
    public function getCodPaciente(){
        return $this->codPaciente;
    }
    public function getCodMedico(){
        return $this->codMedico;
    }
    public function getCodTriagem(){
        return $this->codTriagem;
    }
    public function getCodProntuario(){
        return $this->codProntuario;
    }
    public function getCodReceita(){
        return $this->codReceita;
    }
    public function getCodDeclaracao(){
        return $this->codDeclaracao;
    }
    public function getCodAtestado(){
        return $this->codAtestado;
    }
    public function getObservacaoOcorrencia(){
        return $this->observacaoOcorrencia;
    }
    public function getHoraEntradaOcorrencia(){
        return $this->horaEntradaOcorrencia;
    }
    public function getHoraSaidaOcorrencia(){
        return $this->horaSaidaOcorrencia;
    }
    public function getStatusOcorrencia(){
        return $this->statusOcorrencia;
    }
    public function getDataOcorrencia(){
        return $this->dataOcorrencia;
    }
    
//                                                                                                      
//                                                                                                                    
//                                                                                                                    
    public function setCodOcorrencia($cod){
        $this->codOcorrencia = $cod;
    }
    public function setCodPaciente($codP){
        $this->codPaciente = $codP;
    }
    public function setCodMedico($codM){
        $this->codMedico = $codM;
    }
    public function setCodTriagem($codT){
        $this->codTriagem  = $codT;
    }
    public function setCodProntuario($codPront){
        $this->codProntuario = $codPront;
    }
    public function setCodReceita($codRec){
        $this->codReceita = $codRec;
    }
    public function setCodDeclaracao($codDec){
        $this->codDeclaracao = $codDec;
    }
    public function setCodAtestado($codAtes){
        $this->codAtestado = $codAtes;
    }
    public function setObservacaoOcorrencia($obs){
        $this->observacaoOcorrencia = $obs;
    }
    public function setHoraEntradaOcorrencia($horaEntrada){
        $this->horaEntradaOcorrencia  = $horaEntrada;
    }
    public function setHoraSaidaOcorrencia($horaSaida){
        $this->horaSaidaOcorrencia = $horaSaida;
    }
    public function setStatusOcorrencia($statusOcorrencia){
        $this->statusOcorrencia = $statusOcorrencia;
    }
    public function setDataOcorrencia($dataOcorrencia){
        $this->dataOcorrencia = $dataOcorrencia;
    }
// 
//
// 
    public function cadastrar($Ocorrencia){
        $conexao = Conexao::pegarConexao();
        $queryInsert = "INSERT INTO tbOcorrencia 
        (dataOcorrencia
        ,horaEntradaOcorrencia
        ,statusOcorrencia
        ,codMedico
        ,codPaciente
        ,codProntuario
        )
        VALUES 
        ('".$Ocorrencia->getDataOcorrencia()."'
        ,'".$Ocorrencia->getHoraEntradaOcorrencia()."'
        ,'".$Ocorrencia->getStatusOcorrencia()."'
        ,'".$Ocorrencia->getCodMedico()."'
        ,'".$Ocorrencia->getCodPaciente()."'
        ,'".$Ocorrencia->getCodProntuario()."'
        )";
        $conexao->exec($queryInsert);
    }
//
//
/* isso vai para a classe do Prontuario
public function cadastrarAnamneseOcorrencia($Ocorrencia){
    $conexao = Conexao::pegarConexao();
    $queryUpdate = "update tbOcorrencia
                         set codAnamnese = '".$Ocorrencia->getCodAnamnese()."'
                          where codPaciente = ".$Ocorrencia->getCodPaciente() ;
    $conexao->exec($queryUpdate);
}
*/
//
//    
public function cancelar($Ocorrencia){
    $conexao = Conexao::pegarConexao();
    $queryUpdate = "update tbOcorrencia
                         set statusOcorrencia = '".$Ocorrencia->getStatusOcorrencia()."'
                          where codOcorrencia = ".$Ocorrencia->getCodOcorrencia() ;
    $conexao->exec($queryUpdate);
}  
//
//
//
    public function listar($numCartaoSus){
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT * FROM tbOcorrencia INNER JOIN tbpaciente on
         (tbOcorrencia.codPaciente = tbpaciente.codPaciente)
        where numCartaoSusPaciente like '$numCartaoSus' order by numCartaoSusPaciente";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }
    public function listarPaciente($cod){
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT * FROM tbOcorrencia INNER JOIN tbpaciente on 
        (tbOcorrencia.codPaciente = tbpaciente.codPaciente)
        where tbpaciente.codPaciente like '$cod' and statusOcorrencia
         like 'triagem' order by tbpaciente.codPaciente";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }
    public function listarTriagem(){
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT * FROM tbocorrencia INNER JOIN tbpaciente on
         (tbocorrencia.codPaciente = tbpaciente.codPaciente)
        where statusOcorrencia not like 'finalizado' order by statusOcorrencia";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }
    public function listarComCartao($numCartaoSus){
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT * FROM tbocorrencia INNER JOIN tbpaciente on
         (tbocorrencia.codPaciente = tbpaciente.codPaciente)
        where numCartaoSusPaciente like '".$numCartaoSus."' and statusOcorrencia not like 'finalizado'
         order by numCartaoSusPaciente";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }
    public function listarHistorico($Ocorrencia){
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT * FROM tbocorrencia INNER JOIN tbpaciente on
         (tbocorrencia.codPaciente = tbpaciente.codPaciente)
         where tbOcorrencia.codPaciente like '".$Ocorrencia->getCodPaciente()."' and statusOcorrencia like 'finalizado'
         order by numCartaoSusPaciente";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }
    public function listarOcorrenciaCartao($numCartaoSus){
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT * FROM tbOcorrencia INNER JOIN tbpaciente on 
        (tbOcorrencia.codPaciente = tbpaciente.codPaciente) where numCartaoSusPaciente like '$numCartaoSus'
        and statusOcorrencia not like 'finalizado' 
        order by numCartaoSusPaciente";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }
    public function listarOcorrenciaTriagem(){
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT * FROM tbOcorrencia INNER JOIN tbpaciente on 
        (tbOcorrencia.codPaciente = tbpaciente.codPaciente) where statusOcorrencia like 'triagem' 
        and statusOcorrencia like 'triagem' 
        order by numCartaoSusPaciente";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }
//
//
//    
}