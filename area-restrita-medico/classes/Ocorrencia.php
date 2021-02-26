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
        )
        VALUES 
        ('".$Ocorrencia->getDataOcorrencia()."'
        ,'".$Ocorrencia->getHoraEntradaOcorrencia()."'
        ,'".$Ocorrencia->getStatusOcorrencia()."'
        ,'".$Ocorrencia->getCodMedico()."'
        ,'".$Ocorrencia->getCodPaciente()."'
        )";
        $conexao->exec($queryInsert);
    }
 
public function observacaoMedico($Ocorrencia){
    $conexao = Conexao::pegarConexao();
    $queryUpdate = "update tbOcorrencia
                         set observacaoOcorrencia = '".$Ocorrencia->getObservacaoOcorrencia()."'
                          where codOcorrencia = ".$Ocorrencia->getCodOcorrencia()." and
                           codMedico like '".$Ocorrencia->getCodMedico()."' 
                           and statusOcorrencia like 'consulta'" ;
    $conexao->exec($queryUpdate);
}
//
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
    public function listar(){
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT * FROM tbOcorrencia INNER JOIN tbpaciente on
         (tbOcorrencia.codPaciente = tbpaciente.codPaciente)
         WHERE statusOcorrencia like 'consulta'";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }
    public function listarOcorrencia($Ocorrencia){
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT * FROM tbOcorrencia
         WHERE codPaciente like '".$Ocorrencia->getCodPaciente()."' AND statusOcorrencia like 'consulta'";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }
    public function listarPaciente($Prontuario){
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT * FROM tbprontuario INNER JOIN tbpaciente on 
        (tbprontuario.codPaciente = tbpaciente.codPaciente)
        where tbprontuario.codPaciente like '".$Prontuario->getCodPaciente()."' 
        and statusProntuario like 'consulta' and codMedico like '".$Prontuario->getCodMedico()."' 
        order by tbprontuario.codPaciente";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }
    public function listarPacienteConsulta($Ocorrencia){
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT * FROM tbOcorrencia INNER JOIN tbpaciente on 
        (tbOcorrencia.codPaciente = tbpaciente.codPaciente)
        where tbpaciente.codPaciente like '".$Ocorrencia->getCodPaciente()."' and statusOcorrencia
         like 'consulta' and codMedico like '".$Ocorrencia->getCodMedico()."' order by tbpaciente.codPaciente";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }
    public function listarTriagem(){
        date_default_timezone_set('America/Sao_Paulo');
        $dataAtual =  date('d-m-Y');
        $dataConvertida = date('Y-m-d',strtotime($dataAtual));
        
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT * FROM tbtriagem INNER JOIN tbpaciente on
         (tbtriagem.codPaciente = tbpaciente.codPaciente)
        where dataEmissaoTriagem like '".$dataConvertida."'";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }
    public function listarComCartao($numCartaoSus,$codMedico){
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT * FROM tbocorrencia INNER JOIN tbpaciente on 
        (tbocorrencia.codPaciente = tbpaciente.codPaciente) where numCartaoSusPaciente like '$numCartaoSus' 
        and codMedico like '".$codMedico."'
        and statusOcorrencia like 'consulta' 
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
    /*public function listarOcorrenciaCartao($numCartaoSus){
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT * FROM tbOcorrencia INNER JOIN tbpaciente on 
        (tbOcorrencia.codPaciente = tbpaciente.codPaciente) where numCartaoSusPaciente like '$numCartaoSus'
        and statusOcorrencia like 'triagem' 
        order by numCartaoSusPaciente";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }*/
    public function listarOcorrenciaConsulta($Ocorrencia){
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT * FROM tbocorrencia INNER JOIN tbpaciente on 
        (tbocorrencia.codPaciente = tbpaciente.codPaciente) where statusOcorrencia like 'consulta' 
        and codMedico like '".$Ocorrencia->getCodMedico()."'
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
    public function finalizar($Ocorrencia){
        $conexao = Conexao::pegarConexao();
        $queryUpdate = "update tbOcorrencia
            set statusOcorrencia = '".$Ocorrencia->getStatusOcorrencia()."'
            ,horaSaidaOcorrencia = '".$Ocorrencia->getHoraSaidaOcorrencia()."'
            where codOcorrencia = ".$Ocorrencia->getCodOcorrencia() ;
        $conexao->exec($queryUpdate);
    }  
//
//
//    
}