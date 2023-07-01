<?php
require_once "Fotos.php";
$numeroImagens = count($_FILES["fotos"]["name"]);
    $fotos = [];

    for($i=0;$i<$numeroImagens;$i++){
        $foto = new Fotos();
        $foto->setNome($_FILES["fotos"]["name"][$i]);
        $foto->setTipo($_FILES["fotos"]["type"][$i]);
        $tamanho = $_FILES["fotos"]["size"][$i];

        //manipular o aquivo
        $arquivo = $_FILES["fotos"]["tmp_name"][$i]; 
        $fp = fopen($arquivo, "rb");
        $conteudo = fread($fp, $tamanho);
       //$conteudo = addslashes($conteudo);
        fclose($fp);     

        $foto->setConteudo($conteudo);
        array_push($fotos,$foto);
    }

    echo count ($fotos);
    session_start();
    $_SESSION['fotos'] = serialize ($fotos); 
    header('Location:salvarInventario.php');
?>