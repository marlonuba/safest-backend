<?php
    require_once "./modelos/Foto.php";
   
    class FotoDAO{

        public static function salvar($fotos, $idInventario, $conexao){
            try {
                $sql = "INSERT INTO fotos(nome,tipo,idInventario,conteudo) VALUES (?,?,?,?)";
                $stmt = $conexao->prepare($sql);
                foreach ($fotos as $foto) {
                    $stmt->bindValue(1, $foto->getNome());
                    $stmt->bindValue(2, $foto->getTipo());
                    $stmt->bindValue(3, $idInventario);
                    $stmt->bindValue(4, $foto->getConteudo());
                    $stmt->execute(); 
                }
  
            } catch (Exception $e) {
               throw $e;
            }
        }
        public static function editar(){
            
        }
        public static function buscar(){
            
        }
        public static function excluir(){
            
        }
    }

?>