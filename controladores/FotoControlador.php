<?php

    require_once "./classes/Conexao.php";
    require_once "./daos/FotoDAO.php";
    require_once "./modelos/Foto.php";

    class FotoControlador{

        public static function salvar($fotos, $idInventario, $conexao){
            try{
                FotoDAO::salvar($fotos, $idInventario, $conexao);
            }catch (Exception $e){
                throw $e;
            }      
        }
    }
?>