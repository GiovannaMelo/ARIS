<?php
require_once 'Conexao.php';
include_once 'Pessoa.php';
try {
    $Pessoa = new Pessoa();

class Paciente extends Pessoa {
    private $codPaciente;
    private $numCartaoSusPaciente;
    private $nomeMaePaciente;
    private $nomePaiPaciente;
    private $escolaridadePaciente;
    private $convenioPaciente;
    private $statusFamiliarPaciente;
    private $dataCadastroPacientePaciente;
//    
//
//
public function getCodPaciente(){
    return $this->codPaciente;
}
public function getNumCartaoSusPaciente(){
    return $this->numCartaoSusPaciente;
}
public function getNomeMaePaciente(){
    return $this->nomeMaePaciente;
}
public function getNomePaiPaciente(){
    return $this->nomePaiPaciente;
}
public function getEscolaridadePaciente(){
    return $this->escolaridadePaciente;
}
public function getConvenioPaciente(){
    return $this->convenioPaciente;
}
public function getStatusFamiliarPaciente(){
    return $this->statusFamiliarPaciente;
}
public function getDataCadastroPaciente(){
    return $this->dataCadastroPaciente;
}

//  
//                                                                                                                    
//                                                                                                                    
public function setCodPaciente($cod){
    return $this->codPaciente = $cod;
}
public function setNumCartaoSusPaciente($numCartaoSus){
    return $this->numCartaoSusPaciente = $numCartaoSus;
}
public function setNomeMaePaciente($nomeMae){
    return $this->nomeMaePaciente = $nomeMae;
}
public function setNomePaiPaciente($nomePai){
    return $this->nomePaiPaciente = $nomePai;
}
public function setEscolaridadePaciente($escolaridade){
    return $this->escolaridadePaciente = $escolaridade;
}
public function setConvenioPaciente($convenio){
    return $this->convenioPaciente = $convenio;
}
public function setStatusFamiliarPaciente($statusFamiliar){
    return $this->statusFamiliarPaciente = $statusFamiliar;
}
public function setDataCadastroPaciente($dataCadastro){
    return $this->dataCadastroPaciente = $dataCadastro;
}

    
//    
//
// 
public function cadastrar($Paciente){
    $conexao = Conexao::pegarConexao();
    $queryInsert = "INSERT INTO tbpaciente 
    (numCartaoSusPaciente
        , nomePaciente
        , nomeSocialPaciente
        , nomeMaePaciente
        , nomePaiPaciente
        , dataNascimentoPaciente
        , sexoPaciente
        , nacionalidadePaciente
        , cpfPaciente
        , rgPaciente
        , rgOrgaoPaciente
        , dataRgOrgaoPaciente
        , ufRgPaciente
        , cidadeNascPaciente
        , racaCorPaciente
        , escolaridadePaciente
        , convenioPaciente
        , statusFamiliar
        , numeroCelularPaciente
        , numeroTelefonePaciente
        , emailPaciente
        , cepPaciente
        , tipoLogradouroPaciente
        , logradouroPaciente
        , numCasaPaciente
        , complementoPaciente
        , bairroPaciente
        , cidadePaciente
        , estadoPaciente
        , dataCadastroPaciente)
    
    VALUES 
    ('".$Paciente->getNumCartaoSusPaciente()."'
        , '".$Paciente->getNomePessoa()."'
        , '".$Paciente->getNomeSocialPessoa()."'
        , '".$Paciente->getNomeMaePaciente()."'
        , '".$Paciente->getNomePaiPaciente()."'
        , '".$Paciente->getDataNascimentoPessoa()."'
        , '".$Paciente->getSexoPessoa()."'
        , '".$Paciente->getNacionalidadePessoa()."'
        , '".$Paciente->getCpfPessoa()."'
        , '".$Paciente->getRgPessoa()."'
        , '".$Paciente->getOrgaoEmissorPessoa()."'
        , '".$Paciente->getDataEmissaoPessoa()."'
        , '".$Paciente->getUfRgPessoa()."'
        , '".$Paciente->getCidadeNascimentoPessoa()."'
        , '".$Paciente->getRacaCorPessoa()."'
        , '".$Paciente->getEscolaridadePaciente()."'
        , '".$Paciente->getConvenioPaciente()."'
        , '".$Paciente->getStatusFamiliarPaciente()."'
        , '".$Paciente->getCelularPessoa()."'
        , '".$Paciente->getTelefonePessoa()."'
        , '".$Paciente->getEmailPessoa()."'
        , '".$Paciente->getCepPessoa()."'
        , '".$Paciente->getTipoLogradouroPessoa()."'
        , '".$Paciente->getLogradouroPessoa()."'
        , '".$Paciente->getNumCasaPessoa()."'
        , '".$Paciente->getComplementoPessoa()."'
        , '".$Paciente->getBairroPessoa()."'
        , '".$Paciente->getCidadePessoa()."'
        , '".$Paciente->getEstadoPessoa()."'
        , '".$Paciente->getDataCadastroPaciente()."'
    )";
    $conexao->exec($queryInsert);
}
//
//
//
    public function listarTodosPacientes(){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select * from tbPaciente";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }
    public function listarComCod($Paciente){
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT * FROM tbpaciente where codPaciente
          like '".$Paciente->getCodPaciente()."' order by dataCadastroPaciente";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }
    public function listarComCartao($Paciente){
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT * FROM tbpaciente where numCartaoSusPaciente
          like '".$Paciente->getNumCartaoSusPaciente()."' order by dataCadastroPaciente";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }
    public function listarComCpf($cpf){
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT * FROM tbpaciente where cpfPaciente
          like '$cpf' order by cpfPaciente";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }
//
//
//    
public function editar($Paciente){
    $conexao = Conexao::pegarConexao();
    $queryUpdate = "update tbpaciente
                    set numCartaoSusPaciente = '".$Paciente->getNumCartaoSusPaciente()."'
                    , nomePaciente  = '".$Paciente->getNomePessoa()."'
                    , nomeSocialPaciente = '".$Paciente->getNomeSocialPessoa()."'
                    , nomeMaePaciente = '".$Paciente->getNomeMaePaciente()."'
                    , nomePaiPaciente = '".$Paciente->getNomePaiPaciente()."'
                    , dataNascimentoPaciente = '".$Paciente->getDataNascimentoPessoa()."'
                    , sexoPaciente = '".$Paciente->getSexoPessoa()."'
                    , nacionalidadePaciente = '".$Paciente->getNacionalidadePessoa()."'
                    , cpfPaciente = '".$Paciente->getCpfPessoa()."'
                    , rgPaciente = '".$Paciente->getRgPessoa()."'
                    , rgOrgaoPaciente = '".$Paciente->getOrgaoEmissorPessoa()."'
                    , dataRgOrgaoPaciente = '".$Paciente->getDataEmissaoPessoa()."'
                    , ufRgPaciente = '".$Paciente->getUfRgPessoa()."'
                    , cidadeNascPaciente = '".$Paciente->getCidadeNascimentoPessoa()."'
                    , racaCorPaciente = '".$Paciente->getRacaCorPessoa()."'
                    , escolaridadePaciente = '".$Paciente->getEscolaridadePaciente()."'
                    , convenioPaciente = '".$Paciente->getConvenioPaciente()."'
                    , statusFamiliar = '".$Paciente->getStatusFamiliarPaciente()."'
                    , numeroCelularPaciente = '".$Paciente->getCelularPessoa()."'
                    , numeroTelefonePaciente = '".$Paciente->getTelefonePessoa()."'
                    , emailPaciente = '".$Paciente->getEmailPessoa()."'
                    , cepPaciente = '".$Paciente->getCepPessoa()."'
                    , tipoLogradouroPaciente = '".$Paciente->getTipoLogradouroPessoa()."'
                    , logradouroPaciente = '".$Paciente->getLogradouroPessoa()."'
                    , numCasaPaciente = '".$Paciente->getNumCasaPessoa()."'
                    , complementoPaciente = '".$Paciente->getComplementoPessoa()."'
                    , bairroPaciente = '".$Paciente->getBairroPessoa()."'
                    , cidadePaciente = '".$Paciente->getCidadePessoa()."'
                    , estadoPaciente = '".$Paciente->getEstadoPessoa()."'
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
} catch(Exception $e) {
        echo '<pre>';
            print_r($e);
        echo '</pre>';
        echo $e->getMessage();
        echo "teste";
        
        }