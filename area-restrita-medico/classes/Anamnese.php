<?php
require_once 'Conexao.php';
class Anamnese{
    private $codAnamnese;
    private $codPaciente;
    private $observacaoAnamnese;
//    
//
//
    public function getCodAnamnese(){
        return $this->codAnamnese;
    }
    public function getCodPaciente(){
        return $this->codPaciente;
    }
    public function getTratamentoMedico(){
        return $this->tratamentoMedico;
    }
    public function getObsTratamentoMedico(){
        return $this->obsTratamentoMedico;
    }
    public function getAlergia(){
        return $this->alergia;
    }
    public function getObsAlergia(){
        return $this->obsAlergia;
    }
    public function getAntCirurgico(){
        return $this->antCirurgico;
    }
    public function getObsAntCirugico(){
        return $this->obsAntCirurgico;
    }
    public function getProblemaPele(){
        return $this->problemaPele;
    }
    public function getObsProblemaPele(){
        return $this->obsProblemaPele;
    }
    public function getGestante(){
        return $this->gestante;
    }
    public function getObsGestante(){
        return $this->obsGestante;
    }
    public function getProblemaOrtopedico(){
        return $this->problemaOrtopedico;
    }
    public function getObsProblemaOrtopedico(){
        return $this->obsProblemaOrtopedico;
    }
    public function getDiabete(){
        return $this->diabete;
    }
    public function getTipoDiabete(){
        return $this->tipoDiabete;
    }
    public function getControleDiabete(){
        return $this->controleDiabete;
    }
    public function getTumor(){
        return $this->tumor;
    }
    public function getObsTumor(){
        return $this->obsTumor;
    }
    public function getProtese(){
        return $this->protese;
    }
    public function getObsProtese(){
        return $this->obsProtese;
    }
    public function getCicloMestrual(){
        return $this->cicloMenstrual;
    }
    public function getFumante(){
        return $this->fumante;
    }
    public function getMarcaPasso(){
        return $this->marcaPasso;
    }
    public function getAlteracaoCardiaca(){
        return $this->alteracaoCardiaca;
    }
    public function getDisturbioCirculatorio(){
        return $this->disturbioCirculatorio;
    }
    public function getDisturbioRenal(){
        return $this->disturbioRenal;
    }
    public function getDisturbioHormonal(){
        return $this->disturbioHormonal;
    }
    public function getEpiletico(){
        return $this->epiletico;
    }
    public function getHipoHipertensao(){
        return $this->hipoHipertensao;
    }
    public function getFilhos(){
        return $this->filhos;
    }
    public function getFuncIntestinal(){
        return $this->funcIntestinal;
    }
    public function getNomePrimeiroContato(){
        return $this->nomePrimeiroContato;
    }
    public function getTelPrimeiroContato(){
        return $this->telPrimeiroContato;
    }
    public function getCelPrimeiroContato(){
        return $this->celPrimeiroContato;
    }
    public function getNomeSegundoContato(){
        return $this->nomeSegundoContato;
    }
    public function getTelSegundoContato(){
        return $this->telSegundoContato;
    }
    public function getCelSegundoContato(){
        return $this->celSegundoContato;
    }
    
    
    
//                                                                                                      
//                                                                                                                    
//                                                                                                                    
    public function setCodAnamnese($cod){
        $this->codAnamnese = $cod;
    }
    public function setCodPaciente($codP){
        $this->codPaciente = $codP;
    }
    public function setTratamentoMedico($tratamento){
        $this->tratamentoMedico = $tratamento;
    }
    public function setObsTratamentoMedico($obsTratamento){
        $this->obsTratamentoMedico = $obsTratamento;
    }
    public function setAlergia($alergia){
        $this->alergia = $alergia;
    }
    public function setObsAlergia($obsAlergia){
        $this->obsAlergia = $obsAlergia;
    }
    public function setAntCirurgico($ant){
        $this->antCirurgico = $ant;
    }
    public function setObsAntCirugico($obsAnt){
        $this->obsAntCirurgico = $obsAnt;
    }
    public function setProblemaPele($problema){
        $this->problemaPele = $problema;
    }
    public function setObsProblemaPele($obsProblema){
        $this->obsProblemaPele = $obsProblema;
    }
    public function setGestante($gestante){
        $this->gestante = $gestante;
    }
    public function setObsGestante($obsGestante){
        $this->obsGestante = $obsGestante;
    }
    public function setProblemaOrtopedico($problemaO){
        $this->problemaOrtopedico = $problemaO;
    }
    public function setObsProblemaOrtopedico($obsProblemaO){
        $this->obsProblemaOrtopedico = $obsProblemaO;
    }
    public function setDiabete($diabete){
        $this->diabete = $diabete;
    }
    public function setTipoDiabete($tipo){
        $this->tipoDiabete = $tipo;
    }
    public function setControleDiabete($controle){
        $this->controleDiabete = $controle;
    }
    public function setTumor($tumor){
        $this->tumor = $tumor;
    }
    public function setObsTumor($obsT){
        $this->obsTumor = $obsT;
    }
    public function setProtese($protese){
        $this->protese = $protese;
    }
    public function setObsProtese($obsPr){
        $this->obsProtese = $obsPr;
    }
    public function setCicloMestrual($ciclo){
        $this->cicloMenstrual = $ciclo;
    }
    public function setFumante($fumante){
        $this->fumante = $fumante;
    }
    public function setMarcaPasso($marca){
        $this->marcaPasso = $marca;
    }
    public function setAlteracaoCardiaca($alteracao){
        $this->alteracaoCardiaca = $alteracao;
    }
    public function setDisturbioCirculatorio($disturbio){
        $this->disturbioCirculatorio = $disturbio;
    }
    public function setDisturbioRenal($disturbioR){
        $this->disturbioRenal = $disturbioR;
    }
    public function setDisturbioHormonal($disturbioH){
        $this->disturbioHormonal = $disturbioH;
    }
    public function setEpiletico($epiletico){
        $this->epiletico = $epiletico;
    }
    public function setHipoHipertensao($hipoHipertensao){
        $this->hipoHipertensao = $hipoHipertensao;
    }
    public function setFilhos($filhos){
        $this->filhos = $filhos;
    }
    public function setFuncIntestinal($func){
        $this->funcIntestinal = $func;
    }
    public function setNomePrimeiroContato($nomePrimeiro){
        $this->nomePrimeiroContato = $nomePrimeiro;
    }
    public function setTelPrimeiroContato($telPrimeiro){
        $this->telPrimeiroContato = $telPrimeiro;
    }
    public function setCelPrimeiroContato($celPrimeiro){
        $this->celPrimeiroContato = $celPrimeiro;
    }
    public function setNomeSegundoContato($nomeSegundo){
        $this->nomeSegundoContato = $nomeSegundo;
    }
    public function setTelSegundoContato($telSegundo){
        $this->telSegundoContato = $telSegundo;
    }
    public function setCelSegundoContato($celSegundo){
        $this->celSegundoContato = $celSegundo;
    }
    
// 
//
// 
    public function cadastrar($Anamnese){
        $conexao = Conexao::pegarConexao();
        $queryInsert = "INSERT INTO tbAnamnese 
        (codPaciente
        ,tratamentoMedico
        ,obsTratamentoMedico
        ,alergia
        ,obsAlergia
        ,antCirurgico
        ,obsAntCirurgico
        ,problemaPele
        ,obsProblemaPele
        ,gestante
        ,obsGestante
        ,problemaOrtopedico
        ,obsProblemaOrtopedico
        ,diabete
        ,tipoDiabete
        ,controleDiabete
        ,tumor
        ,obsTumor
        ,protese
        ,obsProtese
        ,cicloMenstrual
        ,fumante
        ,marcaPasso
        ,alteracaoCardiaca
        ,disturbioCirculatorio
        ,disturbioRenal
        ,disturbioHormonal
        ,epiletico
        ,hipoHipertensao
        ,filhos
        ,funcIntestinal
        ,nomePrimeiroContato
        ,telPrimeiroContato
        ,celPrimeiroContato
        ,nomeSegundoContato
        ,telSegundoContato
        ,CelSegundoContato
        )
        VALUES 
        ('".$Anamnese->getCodPaciente()."'
        ,'".$Anamnese->getTratamentoMedico()."'
        ,'".$Anamnese->getObsTratamentoMedico()."'
        ,'".$Anamnese->getAlergia()."'
        ,'".$Anamnese->getObsAlergia()."'
        ,'".$Anamnese->getAntCirurgico()."'
        ,'".$Anamnese->getObsAntCirugico()."'
        ,'".$Anamnese->getProblemaPele()."'
        ,'".$Anamnese->getObsProblemaPele()."'
        ,'".$Anamnese->getGestante()."'
        ,'".$Anamnese->getObsGestante()."'
        ,'".$Anamnese->getProblemaOrtopedico()."'
        ,'".$Anamnese->getObsProblemaOrtopedico()."'
        ,'".$Anamnese->getDiabete()."'
        ,'".$Anamnese->getTipoDiabete()."'
        ,'".$Anamnese->getControleDiabete()."'
        ,'".$Anamnese->getTumor()."'
        ,'".$Anamnese->getObsTumor()."'
        ,'".$Anamnese->getProtese()."'
        ,'".$Anamnese->getObsProtese()."'
        ,'".$Anamnese->getCicloMestrual()."'
        ,'".$Anamnese->getFumante()."'
        ,'".$Anamnese->getMarcaPasso()."'
        ,'".$Anamnese->getAlteracaoCardiaca()."'
        ,'".$Anamnese->getDisturbioCirculatorio()."'
        ,'".$Anamnese->getDisturbioRenal()."'
        ,'".$Anamnese->getDisturbioHormonal()."'
        ,'".$Anamnese->getEpiletico()."'
        ,'".$Anamnese->getHipoHipertensao()."'
        ,'".$Anamnese->getFilhos()."'
        ,'".$Anamnese->getFuncIntestinal()."'
        ,'".$Anamnese->getNomePrimeiroContato()."'
        ,'".$Anamnese->getTelPrimeiroContato()."'
        ,'".$Anamnese->getCelPrimeiroContato()."'
        ,'".$Anamnese->getNomeSegundoContato()."'
        ,'".$Anamnese->getTelSegundoContato()."'
        ,'".$Anamnese->getCelSegundoContato()."'
        )";
        $conexao->exec($queryInsert);
    }
//
//
//
    public function listar($cod){
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT * FROM tbAnamnese INNER JOIN tbpaciente on (tbAnamnese.codPaciente = tbpaciente.codPaciente)
        where tbpaciente.codPaciente like '%$cod%' order by tbpaciente.codPaciente";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }
    
//
//
//    
}