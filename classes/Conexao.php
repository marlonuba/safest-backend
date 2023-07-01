<?php

    //Classe Conexão
    class Conexao{
        private $localhost;
        private $baseDados;
        private $usuario;
        private $senha;
        private $conexao;

        public function __construct(){
            $this->localhost = "localhost";
            $this->baseDados = "safest_v1";
            $this->usuario = "root";
            $this->senha = "";
        }

        public function conectar(){
            try {
                $conn = "mysql:host={$this->localhost};dbname={$this->baseDados};charset=utf8mb4";
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ];
    
                $this->conexao = new PDO($conn, $this->usuario, $this->senha, $options);
                return $this->conexao;
            } catch (PDOException $e) {
                throw new Exception("Erro de conexão: " . $e->getMessage());
            }
        }
    
        public function desconectar(){
            $this->conexao = null;
        }
    }
?>