<?php

    require_once "./classes/Conexao.php";
    require_once "./daos/TecnicoDAO.php";
    require_once "./modelos/Tecnico.php";

    class TecnicoControlador{

        public static function salvar($tecnico, $conexao){
            try{
                     
                TecnicoDAO::salvar($tecnico,$conexao);
            }catch (Exception $e){
                throw $e;
            }      
        }

        public static function autenticar($tecnico,$conexao){
            try{              
                return TecnicoDAO::autenticar($tecnico,$conexao);        

            }catch(PDOException $erro){
                throw $erro;
            }finally{
                //Conexao::fecharConexao();
            }
        }
    }
?>