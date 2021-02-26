<?php
require_once 'Conexao.php';
class Medico{
    private $codMedico;
    private $nomeMedico;
    private $crmMedico;
    private $especialidadeMedico;
//    
//
//
    public function getCodMedico(){
        return $this->codMedico;
    }
    public function getNomeMedico(){
        return $this->nomeMedico;
    }
    public function getCrmMedico(){
        return $this->crmMedico;
    }
    public function getEspecialidadeMedico(){
        return $this->especialidadeMedico;
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
    public function setCodMedico($cod){
        $this->codMedico = $cod;
    }
    public function setNomeMedico($nome){
        $this->nomeMedico = $nome;
    }
    public function setCrmMedico($crm){
        $this->crmMedico = $crm;
    }
    public function setEspecialidadeMedico($especialidade){
        $this->especialidadeMedico = $especialidade;
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
    public function cadastrar($Medico){
        $conexao = Conexao::pegarConexao();
        $queryInsert = "INSERT INTO tbmedico 
        (nomeMedico
        ,crmMedico
        ,especialidadeMedico)
        
        VALUES 
        ('".$Medico->getNomeMedico()."'
            , '".$Medico->getcrmMedico()."'
            ,'".$Medico->getEspecialidadeMedico()."'
        )";
        $conexao->exec($queryInsert);
    }
//
//
//
    public function listar(){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select * from tbmedico";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }
//
//
//    
     public function editar($Medico){
         $conexao = Conexao::pegarConexao();
         $queryUpdate = "update tbmedico
                         set nomeMedico = '".$Medico->getNomeMedico()."'
                         , crmMedico = '".$Medico->getCrmMedico()."'
                         , especialidadeMedico = '".$Medico->getEspecialidadeMedico()."'
                          where codMedico = ".$Medico->getCodMedico();
         $conexao->exec($queryUpdate);
     }
//
//
//
     public function excluir($Medico){
         $conexao = Conexao::pegarConexao();
         $queryDelete = "delete from tbmedico
                         where codMedico = ".$Medico->getCodMedico();
         $conexao->exec($queryDelete);
     }

//
//
// 
public function cadastrarLogin($Medico){
    $conexao = Conexao::pegarConexao();
    $queryInsert = "INSERT INTO tbusuario 
    (nomeCompletoUsuario
    ,nomeUsuario
    ,senhaUsuario
    ,tipoUsuario
    ,codMedico)
    
    VALUES 
    ('".$Medico->getNomeCompletoUsuario()."'
        , '".$Medico->getNomeUsuario()."'
        ,'".$Medico->getSenhaUsuario()."'
        ,'".$Medico->getTipoUsuario()."'
        ,'".$Medico->getCodMedico()."'
    )";
    $conexao->exec($queryInsert);
}
public function listarMedico($crm){
    $conexao = Conexao::pegarConexao();
    $querySelect = "SELECT * FROM tbmedico 
    where crmMedico like '$crm' 
    order by crmMedico";
    $resultado = $conexao->query($querySelect);
    $lista = $resultado->fetchAll();
    return $lista;   
}
//
//
//
public function listarLogin(){
    $conexao = Conexao::pegarConexao();
    $querySelect = "SELECT * FROM tbusuario INNER JOIN tbmedico on (tbusuario.codMedico = tbmedico.codMedico)
     where statusUsuario like 'Disponivel' order by statusUsuario";
    $resultado = $conexao->query($querySelect);
    $lista = $resultado->fetchAll();
    return $lista;   
}
//
//
//    
 public function editarLogin($Medico){
     $conexao = Conexao::pegarConexao();
     $queryUpdate = "update tbMedico
                     set nomeMedico = '".$Medico->getNomeMedico()."'
                     , crmMedico = '".$Medico->getcrmMedico()."'
                     , tipoMedico = '".$Medico->getTipoMedico()."'
                      where codMedico = ".$Medico->getCodMedico();
     $conexao->exec($queryUpdate);
 }
//
//
//
 public function excluirLogin($Medico){
     $conexao = Conexao::pegarConexao();
     $queryDelete = "delete from tbMedico
                     where codMedico = ".$Medico->getCodMedico();
     $conexao->exec($queryDelete);
 }
 public function ligarLogin($codigo){
    $conexao = Conexao::pegarConexao();
    $queryUpdateStatus = "update tbusuario
        set statusUsuario = 'Disponivel'
        where codMedico = ".$codigo;
    $conexao->exec($queryUpdateStatus);
}
 public function desligarLogin($codigo){
    $conexao = Conexao::pegarConexao();
    $queryUpdateStatus = "update tbusuario
        set statusUsuario = 'Indisponivel'
        where codMedico = ".$codigo;
    $conexao->exec($queryUpdateStatus);
 }

//
//
//    
}