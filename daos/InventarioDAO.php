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

    public static function buscarTodos($tecnico, $conexao){
        $sql = "SELECT * FROM Inventarios WHERE tecnico = :tecnico";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':tecnico', $tecnico);
        $stmt->execute();

        $inventariosDoBanco = $stmt->fetchAll(PDO::FETCH_OBJ);

        $inventarios = array();
        foreach($inventariosDoBanco as $inventarioDoBanco){

            $inventario = new Inventario();
            $inventario->setId($inventarioDoBanco->id);
            $inventario->setNome($inventarioDoBanco->nome);
            $inventario->setData($inventarioDoBanco->data);
            array_push($inventarios, $inventario);
        }

        return $inventarios;
    }
}
?>