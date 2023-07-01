<?php
require_once "tabelaColetiva.php";

    class tabelaColetivaDAO {
        private static $conn;

        public static function setConnection(PDO $conn) {
            self::$conn = $conn;
        }

        public function salvar($tabela_coletiva) {
           try{
           
                $sql = "INSERT INTO tabelacoletiva(combinacao,conclusao,abreviacao) VALUES (?,?,?)";
                $stmt = self::$conn->prepare($sql);
                
                //foreach ($tabela_coletiva as $combinacao) {
                    $stmt->bindValue(1, $tabela_coletiva->getCombinacao());
                    $stmt->bindValue(2, $tabela_coletiva->getConclusao());
                    $stmt->bindValue(3, $tabela_coletiva->getAbreviacao());
                    $stmt->execute(); 
                //}
            }catch(PDOException $erro){
                echo $erro;
            }
        }
    }
?>