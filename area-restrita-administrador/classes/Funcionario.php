<?php 
require_once 'Conexao.php';
include_once 'Pessoa.php';
try {
    $Pessoa = new Pessoa();
class Funcionario extends Pessoa{
    private $codFuncionario;
    private $tipoFuncionario;
//    
//
//
    public function getCodFuncionario(){
        return $this->codFuncionario;
    }
    public function getTipoFuncionario(){
        return $this->tipoFuncionario;
    }
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
    public function setCodFuncionario($cod){
        $this->codFuncionario = $cod;
    }
    public function setTipoFuncionario($tipo){
        $this->tipoFuncionario = $tipo;
    }
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
public function cadastrar($Funcionario){
    $conexao = Conexao::pegarConexao();
    $queryInsert = "INSERT INTO tbFuncionario 
    (cpfFuncionario
    , nomeFuncionario
    , nomeSocialFuncionario
    , dataNascimentoFuncionario
    , sexoFuncionario
    , nacionalidadeFuncionario
    , rgFuncionario 
    , rgOrgaoFuncionario
    , dataRgOrgaoFuncionario
    , ufRgFuncionario
    , cidadeNascFuncionario
    , racaCorFuncionario
    , tipoFuncionario
    , numeroCelularFuncionario
    , numeroTelefoneFuncionario
    , emailFuncionario
    , cepFuncionario
    , tipoLogradouroFuncionario
    , logradouroFuncionario
    , numCasaFuncionario
    , complementoFuncionario 
    , bairroFuncionario 
    , cidadeFuncionario
    , estadoFuncionario)
    VALUES 
    ('".$Funcionario->getCpfPessoa()."'
        , '".$Funcionario->getNomePessoa()."'
        , '".$Funcionario->getNomeSocialPessoa()."'
        , '".$Funcionario->getDataNascimentoPessoa()."'
        , '".$Funcionario->getSexoPessoa()."'
        , '".$Funcionario->getNacionalidadePessoa()."'
        , '".$Funcionario->getRgPessoa()."'
        , '".$Funcionario->getOrgaoEmissorPessoa()."'
        , '".$Funcionario->getDataEmissaoPessoa()."'
        , '".$Funcionario->getUfRgPessoa()."'
        , '".$Funcionario->getCidadeNascimentoPessoa()."'
        , '".$Funcionario->getRacaCorPessoa()."'
        , '".$Funcionario->getTipoFuncionario()."'
        , '".$Funcionario->getCelularPessoa()."'
        , '".$Funcionario->getTelefonePessoa()."'
        , '".$Funcionario->getEmailPessoa()."'
        , '".$Funcionario->getCepPessoa()."'
        , '".$Funcionario->getTipoLogradouroPessoa()."'
        , '".$Funcionario->getLogradouroPessoa()."'
        , '".$Funcionario->getNumCasaPessoa()."'
        , '".$Funcionario->getComplementoPessoa()."'
        , '".$Funcionario->getBairroPessoa()."'
        , '".$Funcionario->getCidadePessoa()."'
        , '".$Funcionario->getEstadoPessoa()."'
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
public function listarFuncionario($Funcionario){
    $conexao = Conexao::pegarConexao();
    $querySelect = "select * from tbfuncionario where cpfFuncionario like 
    '".$Funcionario->getCpfPessoa()."' order by cpfFuncionario";
    $resultado = $conexao->query($querySelect);
    $lista = $resultado->fetchAll();
    return $lista;   
}
//
//
//
public function listarFuncionarioCod($Funcionario){
    $conexao = Conexao::pegarConexao();
    $querySelect = "select * from tbFuncionario where codFuncionario 
    like '".$Funcionario->getCodFuncionario()."'";
    $resultado = $conexao->query($querySelect);
    $lista = $resultado->fetchAll();
    return $lista;   
}   
//
//
//
public function listarFuncionarioNome($Funcionario){
    $conexao = Conexao::pegarConexao();
    $querySelect = "select * from tbfuncionario 
    where nomeFuncionario like '%".$Funcionario->getNomePessoa()."%' 
    order by nomeFuncionario";
    $resultado = $conexao->query($querySelect);
    $lista = $resultado->fetchAll();
    return $lista;   
}
//
//
//
     public function editar($Funcionario){
         $conexao = Conexao::pegarConexao();
         $queryUpdate = "update tbFuncionario
                         set nomeFuncionario = '".$Funcionario->getNomePessoa()."'
                         ,tipoFuncionario = '".$Funcionario->getTipoFuncionario()."'
                         ,cpfFuncionario = '".$Funcionario->getCpfPessoa()."'
                         ,nomeSocialFuncionario = '".$Funcionario->getNomeSocialPessoa()."'
                         ,dataNascimentoFuncionario = '".$Funcionario->getDataNascimentoPessoa()."'
                         ,sexoFuncionario = '".$Funcionario->getSexoPessoa()."'
                         ,nacionalidadeFuncionario = '".$Funcionario->getNacionalidadePessoa()."'
                         ,rgFuncionario = '".$Funcionario->getRgPessoa()."'
                         ,rgOrgaoFuncionario = '".$Funcionario->getOrgaoEmissorPessoa()."'
                         ,dataRgOrgaoFuncionario = '".$Funcionario->getDataEmissaoPessoa()."'
                         ,ufRgFuncionario = '".$Funcionario->getUfRgPessoa()."'
                         ,cidadeNascFuncionario = '".$Funcionario->getCidadeNascimentoPessoa()."'
                         ,racaCorFuncionario = '".$Funcionario->getRacaCorPessoa()."'
                         ,numerocelularFuncionario = '".$Funcionario->getCelularPessoa()."'
                         ,numeroTelefoneFuncionario = '".$Funcionario->getTelefonePessoa()."'
                         ,emailFuncionario = '".$Funcionario->getEmailPessoa()."'
                         ,cepFuncionario = '".$Funcionario->getCepPessoa()."'
                         ,tipoLogradouroFuncionario = '".$Funcionario->getTipoLogradouroPessoa()."'
                         ,logradouroFuncionario = '".$Funcionario->getLogradouroPessoa()."'
                         ,numCasaFuncionario = '".$Funcionario->getNumCasaPessoa()."'
                         ,complementoFuncionario = '".$Funcionario->getComplementoPessoa()."'
                         ,bairroFuncionario = '".$Funcionario->getBairroPessoa()."'
                         ,cidadeFuncionario = '".$Funcionario->getCidadePessoa()."'
                         ,estadoFuncionario = '".$Funcionario->getEstadoPessoa()."'
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
        ,tipoUsuario
        ,codFuncionario)
        
        VALUES 
        ('".$Funcionario->getNomeCompletoUsuario()."'
            , '".$Funcionario->getNomeUsuario()."'
            ,'".$Funcionario->getSenhaUsuario()."'
            ,'".$Funcionario->getTipoUsuario()."'
            ,'".$Funcionario->getCodFuncionario()."'
        )";
        $conexao->exec($queryInsert);
    }  
}
    }catch(Exception $e) {
    echo '<pre>';
        print_r($e);
    echo '</pre>';
    echo $e->getMessage();
    }