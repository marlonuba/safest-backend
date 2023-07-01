<?php
require_once "tabelaIndividual.php";

    class tabelaIndividualDAO {
        private static $conn;

        public static function setConnection(PDO $conn) {
            self::$conn = $conn;
        }

        public function salvar($tabelaIndividual) {
           try{
           
                $sql = "INSERT INTO tabelaIndividual(combinacao,conclusao,abreviacao) VALUES (?,?,?)";
                $stmt = self::$conn->prepare($sql);
                
                //foreach ($tabelaIndividual as $combinacao) {
                    $stmt->bindValue(1, $tabelaIndividual->getCombinacao());
                    $stmt->bindValue(2, $tabelaIndividual->getConclusao());
                    $stmt->bindValue(3, $tabelaIndividual->getAbreviacao());
                    $stmt->execute(); 
                //}
            }catch(PDOException $erro){
                echo $erro;
            }
        }
    }
?>