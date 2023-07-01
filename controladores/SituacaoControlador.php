<?php
    require_once "./daos/SituacaoDAO.php";
    
    class SituacaoControlador{

        public static function salvar($situacoes, $idInventario, $conexao){
            try{
                       
                SituacaoDAO::salvar($situacoes, $idInventario, $conexao);
            }catch (Exception $e){
                throw $e;
            }      
        }

    }
?>