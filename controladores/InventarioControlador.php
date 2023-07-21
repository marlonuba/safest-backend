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