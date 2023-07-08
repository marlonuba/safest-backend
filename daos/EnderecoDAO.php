<?php
    require_once "./modelos/Endereco.php";
   
    class EnderecoDAO{

        public static function salvar($endereco, $idInventario, $conexao){
            try {
                $sql = "INSERT INTO enderecos(rua,numero,cep,bairro,cidade,estado,id_inventarios,complemento) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conexao->prepare($sql);
                $stmt->bindValue(1, $endereco->getRua());
                $stmt->bindValue(2, $endereco->getNumero());
                $stmt->bindValue(3, $endereco->getCep());
                $stmt->bindValue(4, $endereco->getBairro());
                $stmt->bindValue(5, $endereco->getCidade());
                $stmt->bindValue(6, $endereco->getEstado());
                $stmt->bindValue(7, $idInventario);
                $stmt->bindValue(8, $endereco->getComplemento());
                $stmt->execute(); 
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