<?php
require_once 'Conexao.php';
class Pessoa{
    private $nomePessoa;
    private $nomeSocialPessoa;
    private $dataNascimentoPessoa;
    private $sexoPessoa;
    private $nacionalidadePessoa;
    private $cpfPessoa;
    private $rgPessoa;
    private $orgaoEmissorPessoa;
    private $dataEmissaoPessoa;
    private $ufRgPessoa;
    private $cidadeNascimentoPessoa;
    private $racaPessoa;
//
    private $celularPessoa;
    private $telefonePessoa;
    private $emailPessoa;
//
    private $cepPessoa;
    private $tipoLogradouroPessoa;
    private $logradouroPessoa;
    private $numCasaPessoa;
    private $complementoPessoa;
    private $bairroPessoa;
    private $cidadePessoa;
    private $estadoPessoa;
//    
//
//
    public function getNomePessoa(){
        return $this->nomePessoa;
    }
    public function getNomeSocialPessoa(){
        return $this->nomeSocialPessoa;
    }
    public function getDataNascimentoPessoa(){
        return $this->dataNascimentoPessoa;
    }
    public function getSexoPessoa(){
        return $this->sexoPessoa;
    }
    public function getNacionalidadePessoa(){
        return $this->nacionalidadePessoa;
    }
    public function getCpfPessoa(){
        return $this->cpfPessoa;
    }
    public function getRgPessoa(){
        return $this->rgPessoa;
    }
    public function getOrgaoEmissorPessoa(){
        return $this->orgaoEmissorPessoa;
    }
    public function getDataEmissaoPessoa(){
        return $this->dataEmissaoPessoa;
    }
    public function getUfRgPessoa(){
        return $this->ufRgPessoa;
    }
    public function getCidadeNascimentoPessoa(){
        return $this->cidadeNascimentoPessoa;
    }
    public function getRacaCorPessoa(){
        return $this->racaPessoa;
    }
//  
    public function getCelularPessoa(){
        return $this->celularPessoa;
    }
    public function getTelefonePessoa(){
        return $this->telefonePessoa;
    }
    public function getEmailPessoa(){
        return $this->emailPessoa;
    }
//
    public function getCepPessoa(){
        return $this->cepPessoa;
    }
    public function getTipoLogradouroPessoa(){
        return $this->tipoLogradouroPessoa;
    }
    public function getLogradouroPessoa(){
        return $this->logradouroPessoa;
    }
    public function getNumCasaPessoa(){
        return $this->numCasaPessoa;
    }
    public function getComplementoPessoa(){
        return $this->complementoPessoa;
    }
    public function getBairroPessoa(){
        return $this->bairroPessoa;
    }
    public function getCidadePessoa(){
        return $this->cidadePessoa;
    }
    public function getEstadoPessoa(){
        return $this->estadoPessoa;
    }
//                                                                                                      
//                                                                                                                    
//                                                                                                                    
    public function setNomePessoa($nome){
        $this->nomePessoa = $nome;
    }
    public function setNomeSocialPessoa($nomeSocial){
        $this->nomeSocialPessoa = $nomeSocial;
    }
    public function setDataNascimentoPessoa($dataNascimento){
        $this->dataNascimentoPessoa = $dataNascimento;
    }
    public function setSexoPessoa($sexo){
        $this->sexoPessoa = $sexo;
    }
    public function setNacionalidadePessoa($nacionalidade){
        $this->nacionalidadePessoa = $nacionalidade;
    }
    public function setCpfPessoa($cpf){
        $this->cpfPessoa = $cpf;
    }
    public function setRgPessoa($rg){
        $this->rgPessoa = $rg;
    }
    public function setOrgaoEmissorPessoa($orgaoEmissor){
        $this->orgaoEmissorPessoa = $orgaoEmissor;
    }
    public function setDataEmissaoPessoa($dataEmissao){
        $this->dataEmissaoPessoa = $dataEmissao;
}
    public function setUfRgPessoa($uf){
        $this->ufRgPessoa = $uf;
    }
    public function setCidadeNascimentoPessoa($cidadeNascimento){
        $this->cidadeNascimentoPessoa = $cidadeNascimento;
    }
    public function setRacaCorPessoa($raca){
        $this->racaPessoa = $raca;
    }
//  
    public function setCelularPessoa($celular){
        $this->celularPessoa = $celular;
    }
    public function setTelefonePessoa($telefone){
        $this->telefonePessoa = $telefone;
    }
    public function setEmailPessoa($email){
        $this->emailPessoa = $email;
    }
//
    public function setCepPessoa($cep){
        $this->cepPessoa = $cep;
    }
    public function setTipoLogradouroPessoa($tipoLogradouro){
        $this->tipoLogradouroPessoa = $tipoLogradouro;
    }
    public function setLogradouroPessoa($logradouro){
        $this->logradouroPessoa = $logradouro;
    }
    public function setNumCasaPessoa($numCasa){
        $this->numCasaPessoa = $numCasa;
    }
    public function setComplementoPessoa($complemento){
        $this->complementoPessoa = $complemento;
    }
    public function setBairroPessoa($bairro){
        $this->bairroPessoa = $bairro;
    }
    public function setCidadePessoa($Cidade){
        $this->cidadePessoa = $Cidade;
    }
    public function setEstadoPessoa($estado){
        $this->estadoPessoa = $estado;
    }
//
//
//    
}