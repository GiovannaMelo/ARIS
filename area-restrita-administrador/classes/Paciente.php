<?php
require_once 'Conexao.php';
class Paciente{
    private $codPaciente;
    private $nomePaciente;
    private $nomeSocialPaciente;
    private $dataNascimentoPaciente;
    private $rgPaciente;
    private $cpfPaciente;
    private $sexoPaciente;
    private $numCartaoSusPaciente;
    private $nacionalidadePaciente;
    private $nomeMaePaciente;
    private $logradouroPaciente;
    private $cidadePaciente;
    private $bairroPaciente;
    private $ruaPaciente;
    private $cepPaciente;
    private $numCasaPaciente;
    private $municipioPaciente;
    private $tipoLogradouroPaciente;
    private $email;
    private $complemento;
    private $referenciaLogradouro;
//    
//
//
    public function getCodPaciente(){
        return $this->codPaciente;
    }
    public function getNomePaciente(){
        return $this->nomePaciente;
    }
    public function getNomeSocialPaciente(){
        return $this->nomeSocialPaciente;
    }
    public function getDataNascimentoPaciente(){
        return $this->dataNascimentoPaciente;
    }
    public function getCpfPaciente(){
        return $this->cpfPaciente;
    }
    public function getRgPaciente(){
        return $this->rgPaciente;
    }
    public function getSexoPaciente(){
        return $this->sexoPaciente;
    }
    public function getNumCartaoSusPaciente(){
        return $this->numCartaoSusPaciente;
    }
    public function getNacionalidadePaciente(){
        return $this->nacionalidadePaciente;
    }
    public function getNomeMaePaciente(){
        return $this->nomeMaePaciente;
    }
    public function getLogradouroPaciente(){
        return $this->logradouroPaciente;
    }
    public function getCidadePaciente(){
        return $this->cidadePaciente;
    }
    public function getBairroPaciente(){
        return $this->bairroPaciente;
    }
    public function getRuaPaciente(){
        return $this->ruaPaciente;
    }
    public function getCepPaciente(){
        return $this->cepPaciente;
    }
    public function getNumCasaPaciente(){
        return $this->numCasaPaciente;
    }
    public function getMunicipioPaciente(){
        return $this->municipioPaciente;
    }
    public function getTipoLogradouroPaciente(){
        return $this->tipoLogradouroPaciente;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getComplementoPaciente(){
        return $this->complementoPaciente;
    }
    public function getReferenciaLogradouro(){
        return $this->referenciaLogradouro;
    }

//  

    public function getTipoUsuario(){
        return $this->tipoUsuario;
    }
    public function getNomeUsuario(){
        return $this->nomeUsuario;
    }
    public function getNomeCompletoUsuario(){
        return $this->nomeCompletoUsuario;
    }
    public function getSenhaUsuario(){
        return $this->senhaUsuario;
    }
//                                                                                                      
//                                                                                                                    
//                                                                                                                    
    public function setCodPaciente($cod){
        $this->codPaciente = $cod;
    }
    public function setNomePaciente($nome){
        $this->nomePaciente = $nome;
    }
    public function setCpfPaciente($cpf){
        $this->cpfPaciente = $cpf;
    }
    public function setRgPaciente($rg){
        $this->rgPaciente = $rg;
    }
    public function setNomeSocialPaciente($nomeSocial){
        $this->nomeSocialPaciente = $nomeSocial;
    }
    public function setDataNascimentoPaciente($dataNascimento){
        $this->dataNascimentoPaciente = $dataNascimento;
    }
    public function setSexoPaciente($sexo){
        $this->sexoPaciente = $sexo;
    }
    public function setNumCartaoSusPaciente($numCartaoSus){
        $this->numCartaoSusPaciente = $numCartaoSus;
    }
    public function setNacionalidadePaciente($nacionalidade){
        $this->nacionalidadePaciente = $nacionalidade;
    }
    public function setNomeMaePaciente($nomeMae){
        $this->nomeMaePaciente = $nomeMae;
    }
    public function setLogradouroPaciente($logradouro){
        $this->logradouroPaciente = $logradouro;
    }
    public function setCidadePaciente($cidade){
        $this->cidadePaciente = $cidade;
    }
    public function setBairroPaciente($bairro){
        $this->bairroPaciente = $bairro;
    }
    public function setCepPaciente($cep){
        $this->cepPaciente = $cep;
    }
    public function setNumCasaPaciente($numCasa){
        $this->numCasaPaciente = $numCasa;
    }
    public function setMunicipioPaciente($municipio){
        $this->municipioPaciente = $municipio;
    }
    public function setTipoLogradouroPaciente($tipoLogradouro){
        $this->tipoLogradouroPaciente = $tipoLogradouro;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setComplementoPaciente($complemento){
        $this->complementoPaciente = $complemento;
    }
    public function setReferenciaLogradouro($referencia){
        $this->referenciaLogradouro = $referencia;
    }
    
//    
    
    public function setTipoUsuario($tipoUsuario){
        $this->tipoUsuario = $tipoUsuario;
    }
    public function setNomeUsuario($nomeUsuario){
        $this->nomeUsuario = $nomeUsuario;
    }
    public function setNomeCompletoUsuario($nomeCompletoUsuario){
        $this->nomeCompletoUsuario = $nomeCompletoUsuario;
    }
    public function setSenhaUsuario($senhaUsuario){
        $this->senhaUsuario = $senhaUsuario;
    }
// 
//
// 
    public function listar($numCartaoSus){
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT * FROM tbpaciente WHERE numCartaoSusPaciente like '".$numCartaoSus."'";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }
    public function listarTodos(){
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT * FROM tbpaciente ";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }
//
//
//
     public function editar($Paciente){
         $conexao = Conexao::pegarConexao();
         $queryUpdate = "update tbPaciente
                         set nomePaciente = '".$Paciente->getNomePaciente()."'
                         , nomeSocialPaciente = '".$Paciente->getNomeSocialPaciente()."'
                         , dataNascimentoPaciente = '".$Paciente->getDataNascimentoPaciente()."'
                         , rgPaciente = '".$Paciente->getRgPaciente()."'
                         , cpfPaciente = '".$Paciente->getCpfPaciente()."'
                         , sexoPaciente = '".$Paciente->getSexoPaciente()."'
                         , numCartaoSusPaciente = '".$Paciente->getNumCartaoSusPaciente()."'
                         , nacionalidadePaciente = '".$Paciente->getNacionalidadePaciente()."'
                         , nomeMaePaciente = '".$Paciente->getNomeMaePaciente()."'
                         , logradouroPaciente = '".$Paciente->getLogradouroPaciente()."'
                         , cidadePaciente = '".$Paciente->getCidadePaciente()."'
                         , bairroPaciente = '".$Paciente->getBairroPaciente()."'
                         , ruaPaciente = '".$Paciente->getRuaPaciente()."'
                         , cepPaciente = '".$Paciente->getCepPaciente()."'
                         , numCasaPaciente = '".$Paciente->getNumCasaPaciente()."'
                         , cidadePaciente = '".$Paciente->getMunicipioPaciente()."'
                         , tipoLogradouroPaciente = '".$Paciente->getTipoLogradouroPaciente()."'
                         , emailPaciente = '".$Paciente->getEmail()."'
                         , complementoPaciente = '".$Paciente->getRgPaciente()."'
                         , referenciaLogradouro = '".$Paciente->getReferenciaLogradouro()."'
                          where codPaciente = ".$Paciente->getCodPaciente();
         $conexao->exec($queryUpdate);
     }
//
//
//
     public function excluir($Paciente){
         $conexao = Conexao::pegarConexao();
         $queryDelete = "delete from tbPaciente
                         where codPaciente = ".$Paciente->getCodPaciente();
         $conexao->exec($queryDelete);
     }
}