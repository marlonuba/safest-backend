<?php

require_once "../modelos/Situacao.php"; //colocar o caminho correto.

session_start();
$funcao = $_POST['funcao']; 
$descricao = $_POST['descricao'];
$equipamento =  $_POST['epi'];
$tipoRisco = $_POST['tipoRisco'];
$agenteCondicao = $_POST['agente'];
$fonte = $_POST['fonte'];
$consequenciaExposicao = $_POST['exposicao'];
$probabilidade = $_POST['classificacao-probabilidade'];
$consequencia = $_POST['classificacao-cosequencia'];
$medidasAdministrativas = $_POST['medidascontrole'];
$probabilidadeReferencia = $_POST['classificacao-probabilidade-referencia'];
$consequenciaReferencia = $_POST['classificacao-cosequencia-referencia'];
$matrizAvaliacao = $_POST['matrix'];

$situacao = new Situacao(); //objeto que guarda os dados no array 

$situacao -> setFuncao($funcao); 
$situacao -> setDescricaoAtividade ($descricao); 
$situacao  -> setEquipamento($equipamento);
$situacao  -> setTipoRisco($tipoRisco);
$situacao  ->setAgenteCondicao($agenteCondicao);
$situacao  -> setConsequenciaExposicao($consequenciaExposicao);
$situacao  -> setProbabilidade($probabilidade);
$situacao  -> setConsequencia($consequencia);
$situacao  -> setMedidasAdministrativas($medidasAdministrativas);
$situacao  -> setProbabilidadeReferencia($probabilidadeReferencia);
$situacao  -> setConsequenciaReferencia($consequenciaReferencia);
$situacao  -> setMatrizAvaliacao($matrizAvaliacao);
$situacao  -> setFonte($fonte);

$situacoes = unserialize($_SESSION['situacoes']);

if($situacoes == null){
    $situacoes = array();
}


array_push($situacoes,$situacao);

$_SESSION['situacoes'] = serialize($situacoes);
echo $_POST['acao'];
if($_POST['acao'] == "adicionar"){
    header('Location:../pages/formCadastrarSituacoes.php');
}else{
    header('Location:../pages/formCadastrarImagens.html');
}



?>