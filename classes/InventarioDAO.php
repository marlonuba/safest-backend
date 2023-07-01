<?php
require_once "situacao.php";
require_once "fotos.php";


    class InventarioDAO {
        private static $conn;

        public static function setConnection(PDO $conn) {
            self::$conn = $conn;
        }


        public function salveInventario($nomeInve, $data) {
            $sql = "INSERT INTO inventarios(nome, data) VALUES (:nomeInve, :data)";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindParam(':nomeInve', $nomeInve);
            $stmt->bindParam(':data', $data);
            $stmt->execute();
        
            $lastInsertId = self::$conn->lastInsertId();
            
            return $lastInsertId;
        }
        
        public function getLastInsertId($conn) {
            return $conn->lastInsertId();
        }
/* 
        public function salveEndereco($rua, $bairro, $numero, $cep, $cidade, $estado, $inventario_id, $complemento) {
            $sql = "INSERT INTO enderecos(rua, numero, cep, bairro,  cidade, estado, id_inventarios, complemento) VALUES (:rua, :numero, :cep, :bairro, :cidade, :estado, :inventario_id, :complemento)";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindParam(':rua', $rua);
            $stmt->bindParam(':numero', $numero);
            $stmt->bindParam(':cep', $cep);
            $stmt->bindParam(':bairro', $bairro);
            $stmt->bindParam(':cidade', $cidade);
            $stmt->bindParam(':estado', $estado);
            $stmt->bindParam(':inventario_id', $inventario_id);
            $stmt->bindParam(':complemento', $complemento);
            $stmt->execute();
        } */
        
        // public function salveIdentificacao($situacoes, $inventario_id) {
        //     $sql = "INSERT INTO identificacaorisco (descricao,equipamento,tipoRisco,AgenteCondicao,fonte,consequenciaExposicao,probabilidade,
        //         consequencia,medidasAdministrativas,probabilidadeReferencia,consequenciaReferencia,matrizAvaliacao,funcao,idInve)
        //         VALUES (:descricao,:equipamento,:tipoRisco,:agenteCondicao,:fonte,:consequenciaExposicao,:probabilidade,
        //         :consequencia,:medidasAdministrativas,:probabilidadeReferencia,:consequenciaReferencia,:matrizAvaliacao,:funcao,:idInve)";
            
        //     $stmt = self::$conn->prepare($sql);
        
        //     foreach ($situacoes as $situacao) {
        //         $stmt->bindValue(':descricao', $situacao->getDescricaoAtividade());
        //         $stmt->bindValue(':equipamento', $situacao->getEquipamento());
        //         $stmt->bindValue(':tipoRisco', $situacao->getTipoRisco());
        //         $stmt->bindValue(':agenteCondicao', $situacao->getAgenteCondicao());
        //         $stmt->bindValue(':fonte', $situacao->getFonte());
        //         $stmt->bindValue(':consequenciaExposicao', $situacao->getConsequenciaExposicao());
        //         $stmt->bindValue(':probabilidade', $situacao->getProbabilidade());
        //         $stmt->bindValue(':consequencia', $situacao->getConsequencia());
        //         $stmt->bindValue(':medidasAdministrativas', $situacao->getMedidasAdministrativas());
        //         $stmt->bindValue(':probabilidadeReferencia', $situacao->getProbabilidadeReferencia());
        //         $stmt->bindValue(':consequenciaReferencia', $situacao->getConsequenciaReferencia());
        //         $stmt->bindValue(':matrizAvaliacao', $situacao->getMatrizAvaliacao());
        //         $stmt->bindValue(':funcao', $situacao->getFuncao());
        //         $stmt->bindValue(':idInve', $inventario_id);
        //         $stmt->execute();
        //     }
        // }

   /*      public function salveFotos($fotos, $inventario_id) {
            $sql = "INSERT INTO fotos(nome,tipo,idInventario,conteudo) VALUES (?,?,?,?)";
            $stmt = self::$conn->prepare($sql);
            
            foreach ($fotos as $foto) {
                $stmt->bindValue(1, $foto->getNome());
                $stmt->bindValue(2, $foto->getTipo());
                $stmt->bindValue(3, $inventario_id);
                $stmt->bindValue(4, $foto->getConteudo());
                $stmt->execute(); 
            }
        }
         */

    }
?>