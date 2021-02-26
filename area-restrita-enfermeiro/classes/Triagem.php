<?php
require_once 'Conexao.php';
class Triagem
{
    private $codTriagem;
    private $queixaTriagem;
    private $horaEmissaoTriagem;
    private $dataEmissaoTriagem;
    private $pressaoSitolicaTriagem;
    private $pressaoDiastolicaTriagem;
    private $batimentosTriagem;
    private $temperaturaTriagem;
    private $nivelDorTriagem;
    private $alergiaTriagem;
    private $obsAlergiaTriagem;
    private $diabetesTriagem;
    private $tipoDiabetesTriagem;
    private $gravidezTriagem;
    private $tempoGravidezTriagem;
    private $fumanteTriagem;	
    private $histDoencaTriagem;	
    private $obsHistDoencaTriagem;	
    private $codPaciente;	
//    
//
//
    public function getCodTriagem(){
        return $this->codTriagem;
    }
    public function getQueixaTriagem(){
        return $this->queixaTriagem;
    }
    public function getHoraEmissaoTriagem(){
        return $this->horaEmissaoTriagem;
    }
    public function getDataEmissaoTriagem(){
        return $this->dataEmissaoTriagem;
    }
    public function getPressaoSitolicaTriagem(){
        return $this->pressaoSitolicaTriagem;
    }
    public function getPressaoDiastolicaTriagem(){
        return $this->pressaoDiastolicaTriagem;
    }
    public function getBatimentosTriagem(){
        return $this->batimentosTriagem;
    }
    public function getTemperaturaTriagem(){
        return $this->temperaturaTriagem;
    }
    public function getNivelDorTriagem(){
        return $this->nivelDorTriagem;
    }
    public function getAlergiaTriagem(){
        return $this->alergiaTriagem;
    }
    public function getObsAlergiaTriagem(){
        return $this->obsAlergiaTriagem;
    }
    public function getDiabetesTriagem(){
        return $this->diabetesTriagem;
    }
    public function getTipoDiabetesTriagem(){
        return $this->tipoDiabetesTriagem;
    }
    public function getGravidezTriagem(){
        return $this->gravidezTriagem;
    }
    public function getTempoGravidezTriagem(){
        return $this->tempoGravidezTriagem;
    }
    public function getFumanteTriagem(){
        return $this->fumanteTriagem;
    }
    public function getHistDoencaTriagem(){
        return $this->histDoencaTriagem;
    }
    public function getObsHistDoencaTriagem(){
        return $this->obsHistDoencaTriagem;
    }
    public function getcodPaciente(){
        return $this->codPaciente;
    }
//                                                                                                      
//                                                                                                                    
//         
    public function setCodTriagem($codTriagem){
        return $this->codTriagem = $codTriagem;
    }
    public function setQueixaTriagem($queixa){
        $this->queixaTriagem = $queixa;
    }
    public function setHoraEmissaoTriagem($horaEmissao){
        $this->horaEmissaoTriagem = $horaEmissao;
    }
    public function setDataEmissaoTriagem($dataEmissao){
        $this->dataEmissaoTriagem = $dataEmissao;
    }
    public function setPressaoSitolicaTriagem($pressaoSitolica){
        $this->pressaoSitolicaTriagem = $pressaoSitolica;
    }
    public function setPressaoDiastolicaTriagem($pressaoDiastolica){
        $this->pressaoDiastolicaTriagem = $pressaoDiastolica;
    }
    public function setBatimentosTriagem($batimento){
        $this->batimentosTriagem = $batimento;
    }
    public function setTemperaturaTriagem($temperatura){
        $this->temperaturaTriagem = $temperatura;
    }
    public function setNivelDorTriagem($nivelDor){
        $this->nivelDorTriagem = $nivelDor;
    }
    public function setAlergiaTriagem($alergia){
        $this->alergiaTriagem = $alergia;
    }
    public function setObsAlergiaTriagem($obsAlergia){
        $this->obsAlergiaTriagem = $obsAlergia;
    }
    public function setDiabetesTriagem($diabetes){
        $this->diabetesTriagem = $diabetes;
    }
    public function setTipoDiabetesTriagem($tipoDiabetes){
        $this->tipoDiabetesTriagem = $tipoDiabetes;
    }
    public function setGravidezTriagem($gravidez){
        $this->gravidezTriagem = $gravidez;
    }
    public function setTempoGravidezTriagem($tempoGravidez){
        $this->tempoGravidezTriagem = $tempoGravidez;
    }
    public function setFumanteTriagem($fumante){
        $this->fumanteTriagem = $fumante;
    }
    public function setHistDoencaTriagem($histDoenca){
        $this->histDoencaTriagem = $histDoenca;
    }
    public function setObsHistDoencaTriagem($obsHistDoenca){
        $this->obsHistDoencaTriagem = $obsHistDoenca;
    }
    public function setCodPaciente($codPaciente){
        $this->codPaciente = $codPaciente;
    }
//
//
//   
    public function cadastrar($Triagem){
        $conexao = Conexao::pegarConexao();
        $queryInsert = "INSERT INTO tbTriagem 
        (queixaTriagem
        ,horaEmissaoTriagem
        ,dataEmissaoTriagem
        ,pressaoSitolicaTriagem
        ,pressaoDiastolicaTriagem
        ,batimentosTriagem
        ,temperaturaTriagem
        ,nivelDorTriagem
        ,alergiaTriagem
        ,obsAlergiaTriagem
        ,diabetesTriagem
        ,tipoDiabetesTriagem
        ,gravidezTriagem
        ,tempoGravidezTriagem
        ,fumanteTriagem
        ,histDoencaTriagem
        ,obsHistDoencaTriagem
        ,codPaciente
        )
        VALUES 
        ('".$Triagem->getQueixaTriagem()."'
        ,'".$Triagem->getHoraEmissaoTriagem()."'
        ,'".$Triagem->getDataEmissaoTriagem()."'
        ,'".$Triagem->getPressaoSitolicaTriagem()."'
        ,'".$Triagem->getPressaoDiastolicaTriagem()."'
        ,'".$Triagem->getBatimentosTriagem()."'
        ,'".$Triagem->getTemperaturaTriagem()."'
        ,'".$Triagem->getNivelDorTriagem()."'
        ,'".$Triagem->getAlergiaTriagem()."'
        ,'".$Triagem->getObsAlergiaTriagem()."'
        ,'".$Triagem->getDiabetesTriagem()."'
        ,'".$Triagem->getTipoDiabetesTriagem()."'
        ,'".$Triagem->getGravidezTriagem()."'
        ,'".$Triagem->getTempoGravidezTriagem()."'
        ,'".$Triagem->getFumanteTriagem()."'
        ,'".$Triagem->getHistDoencaTriagem()."'
        ,'".$Triagem->getObsHistDoencaTriagem()."'
        ,'".$Triagem->getcodPaciente()."'
        )";
        $conexao->exec($queryInsert);
    } 
}