<?php
require_once 'Conexao.php';
include_once 'Pessoa.php';
try {
$Pessoa = new Pessoa();
class Medico extends Pessoa{
    private $codMedico;
    private $crmMedico;
    private $especialidadeMedico;
//    
//
//
    public function getCodMedico(){
        return $this->codMedico;
    }
    public function getCrmMedico(){
        return $this->crmMedico;
    }
    public function getEspecialidadeMedico(){
        return $this->especialidadeMedico;
    }

//                                                                                                                    
    public function getCodUsuario(){
        return $this->codUsuario;
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
    public function setCodUsuario($CodUsuario){
        $this->codUsuario = $CodUsuario;
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
public function cadastrar($Medico){
    $conexao = Conexao::pegarConexao();
    $queryInsert = "INSERT INTO tbmedico 
    (crmMedico
    , nomeMedico
    , nomeSocialMedico
    , dataNascimentoMedico
    , sexoMedico
    , nacionalidadeMedico
    , cpfMedico
    , rgMedico 
    , rgOrgaoMedico
    , dataRgOrgaoMedico
    , ufRgMedico
    , cidadeNascMedico
    , racaCorMedico
    , especialidadeMedico
    , numeroCelularMedico
    , numeroTelefoneMedico
    , emailMedico
    , cepMedico
    , tipoLogradouroMedico
    , logradouroMedico
    , numCasaMedico
    , complementoMedico 
    , bairroMedico 
    , cidadeMedico
    , estadoMedico)
    
    VALUES 
    ('".$Medico->getCrmMedico()."'
        , '".$Medico->getNomePessoa()."'
        , '".$Medico->getNomeSocialPessoa()."'
        , '".$Medico->getDataNascimentoPessoa()."'
        , '".$Medico->getSexoPessoa()."'
        , '".$Medico->getNacionalidadePessoa()."'
        , '".$Medico->getCpfPessoa()."'
        , '".$Medico->getRgPessoa()."'
        , '".$Medico->getOrgaoEmissorPessoa()."'
        , '".$Medico->getDataEmissaoPessoa()."'
        , '".$Medico->getUfRgPessoa()."'
        , '".$Medico->getCidadeNascimentoPessoa()."'
        , '".$Medico->getRacaCorPessoa()."'
        , '".$Medico->getEspecialidadeMedico()."'
        , '".$Medico->getCelularPessoa()."'
        , '".$Medico->getTelefonePessoa()."'
        , '".$Medico->getEmailPessoa()."'
        , '".$Medico->getCepPessoa()."'
        , '".$Medico->getTipoLogradouroPessoa()."'
        , '".$Medico->getLogradouroPessoa()."'
        , '".$Medico->getNumCasaPessoa()."'
        , '".$Medico->getComplementoPessoa()."'
        , '".$Medico->getBairroPessoa()."'
        , '".$Medico->getCidadePessoa()."'
        , '".$Medico->getEstadoPessoa()."'
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
public function listarMedicoCod($Medico){
    $conexao = Conexao::pegarConexao();
    $querySelect = "select * from tbmedico where codMedico like '".$Medico->getCodMedico()."'";
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
                         set nomeMedico = '".$Medico->getNomePessoa()."'
                         ,crmMedico = '".$Medico->getCrmMedico()."'
                         ,especialidadeMedico = '".$Medico->getEspecialidadeMedico()."'
                         ,cpfMedico = '".$Medico->getCpfPessoa()."'
                         ,nomeSocialMedico = '".$Medico->getNomeSocialPessoa()."'
                         ,dataNascimentoMedico = '".$Medico->getDataNascimentoPessoa()."'
                         ,sexoMedico = '".$Medico->getSexoPessoa()."'
                         ,nacionalidadeMedico = '".$Medico->getNacionalidadePessoa()."'
                         ,rgMedico = '".$Medico->getRgPessoa()."'
                         ,rgOrgaoMedico = '".$Medico->getOrgaoEmissorPessoa()."'
                         ,dataRgOrgaoMedico = '".$Medico->getDataEmissaoPessoa()."'
                         ,ufRgMedico = '".$Medico->getUfRgPessoa()."'
                         ,cidadeNascMedico = '".$Medico->getCidadeNascimentoPessoa()."'
                         ,racaCorMedico = '".$Medico->getRacaCorPessoa()."'
                         ,numerocelularMedico = '".$Medico->getCelularPessoa()."'
                         ,numeroTelefoneMedico = '".$Medico->getTelefonePessoa()."'
                         ,emailMedico = '".$Medico->getEmailPessoa()."'
                         ,cepMedico = '".$Medico->getCepPessoa()."'
                         ,tipoLogradouroMedico = '".$Medico->getTipoLogradouroPessoa()."'
                         ,logradouroMedico = '".$Medico->getLogradouroPessoa()."'
                         ,numCasaMedico = '".$Medico->getNumCasaPessoa()."'
                         ,complementoMedico = '".$Medico->getComplementoPessoa()."'
                         ,bairroMedico = '".$Medico->getBairroPessoa()."'
                         ,cidadeMedico = '".$Medico->getCidadePessoa()."'
                         ,estadoMedico = '".$Medico->getEstadoPessoa()."'
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
//
//
//
public function editarLogin($Medico){
    $conexao = Conexao::pegarConexao();
    $queryUpdate = "update tbusuario
                    set nomeCompletoUsuario = '".$Medico->getNomeCompletoUsuario()."'
                    ,nomeUsuario = '".$Medico->getNomeUsuario()."'
                    ,senhaUsuario = '".$Medico->getSenhaUsuario()."'
                     where codUsuario = ".$Medico->getCodUsuario();
    $conexao->exec($queryUpdate);
}
//
//
//
public function listarMedico($Medico){
    $conexao = Conexao::pegarConexao();
    $querySelect = "SELECT * FROM tbmedico 
    where crmMedico like '".$Medico->getCrmMedico()."' 
    order by crmMedico";
    $resultado = $conexao->query($querySelect);
    $lista = $resultado->fetchAll();
    return $lista;   
}
//
//
//
public function listarMedicoNome($Medico){
    $conexao = Conexao::pegarConexao();
    $querySelect = "SELECT * FROM tbmedico 
    where nomeMedico like '%".$Medico->getNomePessoa()."%' 
    order by nomeMedico";
    $resultado = $conexao->query($querySelect);
    $lista = $resultado->fetchAll();
    return $lista;   
}
//
//
//
public function listarLogin(){
    $conexao = Conexao::pegarConexao();
    $querySelect = "select * from tbusuario where tipoUsuario not like 'administrador'";
    $resultado = $conexao->query($querySelect);
    $lista = $resultado->fetchAll();
    return $lista;   
}
public function listarLoginUpdate($Medico){
    $conexao = Conexao::pegarConexao();
    $querySelect = "select * from tbusuario where tipoUsuario not like 'administrador'
     and codUsuario like '".$Medico->getCodUsuario()."'";
    $resultado = $conexao->query($querySelect);
    $lista = $resultado->fetchAll();
    return $lista;   
}
//
//
//    
 public function excluirLogin($Medico){
     $conexao = Conexao::pegarConexao();
     $queryDelete = "delete from tbusuario
                     where codusuario = ".$Medico->getCodUsuario();
     $conexao->exec($queryDelete);
 }

//
//
//    
}
}catch(Exception $e) {
    echo '<pre>';
        print_r($e);
    echo '</pre>';
    echo $e->getMessage();
    echo "teste";
    
    }