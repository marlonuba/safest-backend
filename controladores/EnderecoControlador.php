<?php

require_once "./classes/Conexao.php";
require_once "./daos/EnderecoDAO.php";

    class EnderecoControlador{
        public static function salvar($endereco, $idInventario, $conexao){
            try{
                EnderecoDao::salvar($endereco, $idInventario, $conexao);

            }catch(Exception $e){
                throw $e;
            }
        }

        
    }

?>