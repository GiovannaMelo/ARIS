<?php
require_once 'Conexao.php';
class Atestado 
{
    private $codAtestado;
    private $diasAtestado;
    private $motivoAtestado;
    private $dataAtestado;
    private $codPaciente;
    private $codMedico;

//
//

    public function getCodAtestado(){
        return $this->codAtestado;
    }
    public function getDiasAtestado(){
        return $this->diasAtestado;
    }
    public function getMotivoAtestado(){
        return $this->motivoAtestado;
    }
    public function getDataAtestado(){
        return $this->dataAtestado;
    }
    public function getHoraAtestado(){
        return $this->horaAtestado;
    }
    public function getCodPaciente(){
        return $this->codPaciente;
    }
    public function getCodMedico(){
        return $this->codMedico;
    }
//
//
//
    public function setCodAtestado($codAtestado){
        $this->codAtestado = $codAtestado;
    }
    public function setDiasAtestado($diasAtestado){
        $this->diasAtestado = $diasAtestado;
    }
    public function setMotivoAtestado($motivoAtestado){
        $this->motivoAtestado = $motivoAtestado;
    }
    public function setDataAtestado($dataAtestado){
        $this->dataAtestado = $dataAtestado;
    }
    public function setHoraAtestado($horaAtestado){
        $this->horaAtestado = $horaAtestado;
    }
    public function setCodPaciente($codPaciente){
        $this->codPaciente = $codPaciente;
    }
    public function setCodMedico($codMedico){
        $this->codMedico = $codMedico;
    }

    public function cadastrarAtestado($Atestado){
        $conexao = Conexao::pegarConexao();
        $queryInsert = "INSERT INTO tbatestado 
        (codPaciente
        ,codMedico
        ,diasAtestado
        ,motivoAtestado
        ,dataAtestado
        ,horaAtestado
        )
        VALUES 
        ('".$Atestado->getCodPaciente()."'
        ,'".$Atestado->getCodMedico()."'
        ,'".$Atestado->getDiasAtestado()."'
        ,'".$Atestado->getMotivoAtestado()."'
        ,'".$Atestado->getDataAtestado()."'
        ,'".$Atestado->getHoraAtestado()."'
        )";
        $conexao->exec($queryInsert);
    }

}
?>