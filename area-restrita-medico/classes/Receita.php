<?php
require_once 'Conexao.php';
class Receita
{
    private $codReceita;
    private $medicamentoReceita;
    private $qtdMedicamentoReceita;
    private $unidadeMedicamentoReceita;
    private $tempoMedicamentoReceita;
    private $diasMedicamentoReceita;
    private $validadeReceita;
    private $codPaciente;
    private $codMedico;

//
//

    public function getCodReceita(){
        return $this->codReceita;
    }
    public function getMedicamentoReceita(){
        return $this->medicamentoReceita;
    }
    public function getQtdMedicamentoReceita(){
        return $this->qtdMedicamentoReceita;
    }
    public function getUnidadeMedicamentoReceita(){
        return $this->unidadeMedicamentoReceita;
    }
    public function getTempoMedicamentoReceita(){
        return $this->tempoMedicamentoReceita;
    }
    public function getDiasMedicamentoReceita(){
        return $this->diasMedicamentoReceita;
    }
    public function getValidadeReceita(){
        return $this->validadeReceita;
    }
    public function getCodPaciente(){
        return $this->codPaciente;
    }
    public function getCodMedico(){
        return $this->codMedico;
    }
    public function getAdminMedicamentoReceita(){
        return $this->adminMedicamentoReceita;
    }
    public function getMedicamentoReceita2(){
        return $this->medicamentoReceita2;
    }
    public function getQtdMedicamentoReceita2(){
        return $this->qtdMedicamentoReceita2;
    }
    public function getUnidadeMedicamentoReceita2(){
        return $this->unidadeMedicamentoReceita2;
    }
    public function getTempoMedicamentoReceita2(){
        return $this->tempoMedicamentoReceita2;
    }
    public function getDiasMedicamentoReceita2(){
        return $this->diasMedicamentoReceita2;
    }
    public function getAdminMedicamentoReceita2(){
        return $this->adminMedicamentoReceita2;
    }
//
//
//


    public function setCodReceita($codReceita){
        $this->codReceita = $codReceita;
    }
    public function setQtdMedicamentoReceita($qtdMedicamentoReceita){
        $this->qtdMedicamentoReceita = $qtdMedicamentoReceita;
    }
    public function setMedicamentoReceita($medicamentoReceita){
        $this->medicamentoReceita = $medicamentoReceita;
    }
    public function setUnidadeMedicamentoReceita($unidadeMedicamentoReceita){
        $this->unidadeMedicamentoReceita = $unidadeMedicamentoReceita;
    }
    public function setTempoMedicamentoReceita($tempoMedicamentoReceita){
        $this->tempoMedicamentoReceita = $tempoMedicamentoReceita;
    }
    public function setDiasMedicamentoReceita($diasMedicamentoReceita){
        $this->diasMedicamentoReceita = $diasMedicamentoReceita;
    }
    public function setValidadeReceita($validadeReceita){
        $this->validadeReceita = $validadeReceita;
    }
    public function setCodPaciente($codPaciente){
        $this->codPaciente = $codPaciente;
    }
    public function setCodMedico($codMedico){
        $this->codMedico = $codMedico;
    }
    public function setAdminMedicamentoReceita($adminMedicamento){
        $this->adminMedicamentoReceita = $adminMedicamento;
    }
    public function setQtdMedicamentoReceita2($qtdMedicamentoReceita2){
        $this->qtdMedicamentoReceita2 = $qtdMedicamentoReceita2;
    }
    public function setMedicamentoReceita2($medicamentoReceita2){
        $this->medicamentoReceita2 = $medicamentoReceita2;
    }
    public function setUnidadeMedicamentoReceita2($unidadeMedicamentoReceita2){
        $this->unidadeMedicamentoReceita2 = $unidadeMedicamentoReceita2;
    }
    public function setTempoMedicamentoReceita2($tempoMedicamentoReceita2){
        $this->tempoMedicamentoReceita2 = $tempoMedicamentoReceita2;
    }
    public function setDiasMedicamentoReceita2($diasMedicamentoReceita2){
        $this->diasMedicamentoReceita2 = $diasMedicamentoReceita2;
    }
    public function setAdminMedicamentoReceita2($adminMedicamento2){
        $this->adminMedicamentoReceita2 = $adminMedicamento2;
    }


    public function cadastrarReceita($Receita){
        $conexao = Conexao::pegarConexao();
        $queryInsert = "INSERT INTO tbreceita 
        (codPaciente
        ,codMedico
        ,adminMedicamentoReceita
        ,medicamentoReceita
        ,qntMedicamentoReceita
        ,unidadeMedidaReceita
        ,tempoMedicamentoReceita
        ,diasMedicamentoReceita
        ,adminMedicamentoReceita2
        ,medicamentoReceita2
        ,qntMedicamentoReceita2
        ,unidadeMedidaReceita2
        ,tempoMedicamentoReceita2
        ,diasMedicamentoReceita2
        ,validadeReceita
        )
        VALUES 
        ('".$Receita->getCodPaciente()."'
        ,'".$Receita->getCodMedico()."'
        ,'".$Receita->getAdminMedicamentoReceita()."'
        ,'".$Receita->getMedicamentoReceita()."'
        ,'".$Receita->getQtdMedicamentoReceita()."'
        ,'".$Receita->getUnidadeMedicamentoReceita()."'
        ,'".$Receita->getTempoMedicamentoReceita()."'
        ,'".$Receita->getDiasMedicamentoReceita()."'
        ,'".$Receita->getAdminMedicamentoReceita2()."'
        ,'".$Receita->getMedicamentoReceita2()."'
        ,'".$Receita->getQtdMedicamentoReceita2()."'
        ,'".$Receita->getUnidadeMedicamentoReceita2()."'
        ,'".$Receita->getTempoMedicamentoReceita2()."'
        ,'".$Receita->getDiasMedicamentoReceita2()."'
        ,'".$Receita->getValidadeReceita()."'
        )";
        $conexao->exec($queryInsert);
    }

}
?>