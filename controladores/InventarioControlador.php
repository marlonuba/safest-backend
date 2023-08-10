<?php

    require_once "./classes/Conexao.php";
    require_once "./daos/InventarioDAO.php";
    require_once "./controladores/EnderecoControlador.php";
    require_once "./controladores/SituacaoControlador.php";
    require_once "./controladores/FotoControlador.php";
    require_once "./controladores/TecnicoControlador.php";

    class InventarioControlador{

        public static function salvar($inventario,$idTecnico,$conexao){
            try{
                
                $conexao->beginTransaction();       
                $inventario = InventarioDAO::salvar($inventario,$idTecnico, $conexao);
                EnderecoControlador::salvar($inventario->getEndereco(), $inventario->getId(),$conexao);
                SituacaoControlador::salvar($inventario->getSituacoes(), $inventario->getId(),$conexao);
                FotoControlador::salvar($inventario->getFotos(), $inventario->getId(), $conexao);
                $conexao->commit();

            }catch (Exception $erro){
                $conexao->rollback();
                throw $erro;
                
            }      
        }
        
        public static function buscarRelatorio($idInventario, $idTecnico, $conexao) {
            try {
                $query = "SELECT 
                              inv.id AS inventario_id,
                              inv.nome AS inventario_nome,
                              inv.data AS inventario_data,
                              inv.tecnico AS inventario_tecnico,
                              ir.id AS identificacao_risco_id,
                              ir.setor AS identificacao_risco_setor,
                              ir.nomeFuncionario AS identificacao_risco_nomeFuncionario,
                              ir.funcao AS identificacao_risco_funcao,
                              ir.descricao AS identificacao_risco_descricao,
                              ir.equipamento AS identificacao_risco_equipamento,
                              ir.tipoRisco AS identificacao_risco_tipoRisco,
                              ir.AgenteCondicao AS identificacao_risco_AgenteCondicao,
                              ir.fonte AS identificacao_risco_fonte,
                              ir.consequenciaExposicao AS identificacao_risco_consequenciaExposicao,
                              ir.probabilidade AS identificacao_risco_probabilidade,
                              ir.consequencia AS identificacao_risco_consequencia,
                              ir.medidasAdministrativas AS identificacao_risco_medidasAdministrativas,
                              ir.probabilidadeReferencia AS identificacao_risco_probabilidadeReferencia,
                              ir.consequenciaReferencia AS identificacao_risco_consequenciaReferencia,
                              ir.MatrizAvaliacao AS identificacao_risco_MatrizAvaliacao,
                              ir.IdInve AS identificacao_risco_IdInve,
                              tec.cpf AS tecnico_cpf,
                              tec.nome AS tecnico_nome,
                              tec.email AS tecnico_email
                          FROM inventarios AS inv
                          LEFT JOIN identificacaorisco AS ir ON inv.id = ir.IdInve
                          LEFT JOIN tecnicos AS tec ON inv.tecnico = tec.id
                          WHERE inv.id = :idInventario AND tec.id = :idTecnico";
        
                $stmt = $conexao->conectar()->prepare($query);
                $stmt->bindParam(":idInventario", $idInventario, PDO::PARAM_INT);
                $stmt->bindParam(":idTecnico", $idTecnico, PDO::PARAM_INT);
                $stmt->execute();
                $relatorios = $stmt->fetchAll(PDO::FETCH_ASSOC);

                return $relatorios[0];

            } catch (Exception $erro) {
                $conexao->desconectar();
                throw $erro;
            }
        }
        
        public static function buscarTodos($idTecnico,$conexao){
            try{              
                return InventarioDAO::buscarTodos($idTecnico, $conexao);   
            }catch (Exception $erro){
                $conexao->rollback();
                throw $erro;
                
            }      
        }



    }
?>