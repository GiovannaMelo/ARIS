<?php
require_once 'Conexao.php';
class Funcionario{
    private $codFuncionario;
    private $nomeFuncionario;
    private $dataNascimentoFuncionario;
    private $cpfFuncionario;
    private $rgFuncionario;
    private $telefoneFuncionario;
    private $tipoFuncionario;
//    
//
//
    public function getCodFuncionario(){
        return $this->codFuncionario;
    }
    public function getNomeFuncionario(){
        return $this->nomeFuncionario;
    }
    public function getDataNascimentoFuncionario(){
        return $this->dataNascimentoFuncionario;
    }
    public function getCpfFuncionario(){
        return $this->cpfFuncionario;
    }
    public function getRgFuncionario(){
        return $this->rgFuncionario;
    }
    public function getNumeroTelefoneFuncionario(){
        return $this->NumerotelefoneFuncionario;
    }
    public function getTipoFuncionario(){
        return $this->tipoFuncionario;
    }
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
    public function setCodFuncionario($cod){
        $this->codFuncionario = $cod;
    }
    public function setNomeFuncionario($nome){
        $this->nomeFuncionario = $nome;
    }
    public function setDataNascimentoFuncionario($dataNascimento){
        $this->dataNascimentoFuncionario = $dataNascimento;
    }
    public function setCpfFuncionario($cpf){
        $this->cpfFuncionario = $cpf;
    }
    public function setRgFuncionario($rg){
        $this->rgFuncionario = $rg;
    }
    public function setNumeroTelefoneFuncionario($numeroTelefone){
        $this->NumerotelefoneFuncionario = $numeroTelefone;
    }
    public function setTipoFuncionario($tipo){
        $this->tipoFuncionario = $tipo;
    }
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
    public function cadastrar($funcionario){
        $conexao = Conexao::pegarConexao();
        $queryInsert = "INSERT INTO tbfuncionario 
        (nomeFuncionario
        ,cpfFuncionario
        ,rgFuncionario
        ,dataNascimentoFuncionario
        ,numeroTelefoneFuncionario
        ,tipoFuncionario)
        
        VALUES 
        ('".$funcionario->getNomeFuncionario()."'
            , '".$funcionario->getCpfFuncionario()."'
            , '".$funcionario->getRgFuncionario()."'
            ,'".$funcionario->getDataNascimentoFuncionario()."'
            ,'".$funcionario->getNumeroTelefoneFuncionario()."'
            ,'".$funcionario->getTipoFuncionario()."'
        )";
        $conexao->exec($queryInsert);
    }
//
//
//
    public function listar(){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select * from tbfuncionario";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }
//
//
//    
     public function editar($Funcionario){
         $conexao = Conexao::pegarConexao();
         $queryUpdate = "update tbfuncionario
                         set nomeFuncionario = '".$Funcionario->getNomeFuncionario()."'
                         , cpfFuncionario = '".$Funcionario->getCpfFuncionario()."'
                         , rgFuncionario = '".$Funcionario->getRgFuncionario()."'
                         , dataNascimentoFuncionario = '".$Funcionario->getDataNascimentoFuncionario()."'
                         , numeroTelefoneFuncionario = '".$Funcionario->getNumeroTelefoneFuncionario()."'
                         , tipoFuncionario = '".$Funcionario->getTipoFuncionario()."'
                          where codFuncionario = ".$Funcionario->getCodFuncionario();
         $conexao->exec($queryUpdate);
     }
//
//
//
     public function excluir($Funcionario){
         $conexao = Conexao::pegarConexao();
         $queryDelete = "delete from tbFuncionario
                         where codFuncionario = ".$Funcionario->getCodFuncionario();
         $conexao->exec($queryDelete);
     }

//
//
// 
public function cadastrarLogin($Funcionario){
    $conexao = Conexao::pegarConexao();
    $queryInsert = "INSERT INTO tbusuario 
    (nomeCompletoUsuario
    ,nomeUsuario
    ,senhaUsuario
    ,tipoUsuario)
    
    VALUES 
    ('".$Funcionario->getNomeCompletoUsuario()."'
        , '".$Funcionario->getNomeUsuario()."'
        ,'".$Funcionario->getSenhaUsuario()."'
        ,'".$Funcionario->getTipoUsuario()."'
    )";
    $conexao->exec($queryInsert);
}    
public function ligarLogin($codigo){
    $conexao = Conexao::pegarConexao();
    $queryUpdateStatus = "update tbusuario
        set statusUsuario = 'Disponivel'
        where codFuncionario = ".$codigo;
    $conexao->exec($queryUpdateStatus);
}
 public function desligarLogin($codigo){
    $conexao = Conexao::pegarConexao();
    $queryUpdateStatus = "update tbusuario
        set statusUsuario = 'Indisponivel'
        where codFuncionario = ".$codigo;
    $conexao->exec($queryUpdateStatus);
 }
}