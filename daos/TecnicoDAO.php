<?php
    require_once "./modelos/Tecnico.php";
   
    class TecnicoDAO{

        public static function salvar($tecnico, $conexao){
            try {
                
                $sql = "INSERT INTO Tecnicos(nome,cpf,email,senha) VALUES (?,?,?,?)";
                $stmt = $conexao->prepare($sql);
                $stmt->bindValue(1,$tecnico->getNome());
                $stmt->bindValue(2,$tecnico->getCpf());
                $stmt->bindValue(3,$tecnico->getEmail());
                $hash = password_hash($tecnico->getSenha(),PASSWORD_DEFAULT);
                $stmt->bindValue(4,$hash);
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

        public static function autenticar($tecnico,$conexao){

            try {         
               
                $sql = "SELECT * FROM Tecnicos WHERE email = ?";
                $stmt = $conexao->prepare($sql);
                $stmt->bindValue(1,$tecnico->getEmail());
                $stmt->execute();
                $tecnicoDoBanco = $stmt->fetch(PDO::FETCH_OBJ);

                if (password_verify($tecnico->getSenha(), $tecnicoDoBanco->senha)) {
                    
                    $tecnico = new Tecnico();
                    $tecnico->setId($tecnicoDoBanco->id);
                    $tecnico->setCpf($tecnicoDoBanco->cpf);
                    $tecnico->setNome($tecnicoDoBanco->nome);
                    $tecnico->setEmail($tecnicoDoBanco->email);
                    $tecnico->setSenha($tecnicoDoBanco->senha);
                    
                    return $tecnico;                    
                }else{
                    throw new Exception("Usuário ou senha inválidos");
                }                

            } catch (PDOException $erro) {
                throw $erro;
            }

        }

    }

?>