<?php
    require_once "./modelos/Situacao.php";

    class SituacaoDAO {
        
        public static function salvar($situacoes, $idInventario, $conexao) { // public function salveIdentificacao($situacoes, $inventario_id) 
            try{

                $sql = "INSERT INTO identificacaorisco (descricao,equipamento,tipoRisco,AgenteCondicao,fonte,consequenciaExposicao,probabilidade,
                    consequencia,medidasAdministrativas,probabilidadeReferencia,consequenciaReferencia,matrizAvaliacao,funcao,idInve)
                    VALUES (:descricao,:equipamento,:tipoRisco,:agenteCondicao,:fonte,:consequenciaExposicao,:probabilidade,
                    :consequencia,:medidasAdministrativas,:probabilidadeReferencia,:consequenciaReferencia,:matrizAvaliacao,:funcao,:idInve)";
                
                $stmt = $conexao->prepare($sql);
            
                foreach ($situacoes as $situacao) {
                    $stmt->bindValue(':descricao', $situacao->getDescricaoAtividade());
                    $stmt->bindValue(':equipamento', $situacao->getEquipamento());
                    $stmt->bindValue(':tipoRisco', $situacao->getTipoRisco());
                    $stmt->bindValue(':agenteCondicao', $situacao->getAgenteCondicao());
                    $stmt->bindValue(':fonte', $situacao->getFonte());
                    $stmt->bindValue(':consequenciaExposicao', $situacao->getConsequenciaExposicao());
                    $stmt->bindValue(':probabilidade', $situacao->getProbabilidade());
                    $stmt->bindValue(':consequencia', $situacao->getConsequencia());
                    $stmt->bindValue(':medidasAdministrativas', $situacao->getMedidasAdministrativas());
                    $stmt->bindValue(':probabilidadeReferencia', $situacao->getProbabilidadeReferencia());
                    $stmt->bindValue(':consequenciaReferencia', $situacao->getConsequenciaReferencia());
                    $stmt->bindValue(':matrizAvaliacao', $situacao->getMatrizAvaliacao());
                    $stmt->bindValue(':funcao', $situacao->getFuncao());
                    $stmt->bindValue(':idInve', $idInventario);
                    $stmt->execute();

                }
                } catch (Exception $e) {
                    throw $e;
                 }
            }
        }
    

?>