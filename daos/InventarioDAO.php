<?php

 require_once "./modelos/Inventario.php";
     
 class InventarioDAO{

    public static function salvar($inventario, $tecnico, $conexao){
        $sql = "INSERT INTO inventarios(nome, data, tecnico) VALUES (:nome, :data, :tecnico)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':nome', $inventario->getNome());
        $stmt->bindValue(':data', $inventario->getData());
        $stmt->bindValue(':tecnico', $tecnico);
        $stmt->execute();
        
        $inventario->setId($conexao->lastInsertId());
            
        return $inventario;
    }

}
?>