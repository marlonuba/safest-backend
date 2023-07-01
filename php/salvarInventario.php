<?php
session_start();
require_once "../classes/InventarioDAO.php";

try{
    
    $username = "root";
    $password = "";

    //recebendo os dados da seção
 
    $nomeInve = $_SESSION['nomeInve'] ;
    $data =  $_SESSION['data'];
    $rua = $_SESSION['rua'];
    $bairro = $_SESSION['bairro'];
    $numero = $_SESSION['numero'];
    $cep = $_SESSION['cep'];
    $cidade = $_SESSION['cidade'];
    $estado = $_SESSION['estado'] ;
    $complemento = $_SESSION['complemento'];
    $fotos = unserialize($_SESSION['fotos']);
    

    $conn = new PDO("mysql:host=localhost;dbname=safest_v1",$username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); /* linha de captura erro  */
    InventarioDAO::setConnection($conn);

    $pg = new InventarioDAO();
    
    $inventario_id = $pg->salveInventario($nomeInve, $data);

    $pg->salveEndereco($rua, $numero, $cep, $bairro, $cidade, $estado, $inventario_id, $complemento);

    //adicionar os outros dados da seção
    $situacoes = unserialize($_SESSION['situacoes']);

    $pg->salveIdentificacao($situacoes, $inventario_id);
  
    $pg->salveFotos($fotos, $inventario_id);
    
}catch(PDOException $erro){
    echo "Erro no cadastro do Inventário. Tente novamente!".$erro->getMessage();
}   

echo "Inventário foi Cadastrado com sucesso!"; 
session_destroy();

?>