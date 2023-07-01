<?php
    class RouterController {

        private $request;
        private $token;
        
        public function __construct($request) {
            $this->request = $request;
            $this->token = md5('teste');
        }   

        public function Index() {
            
            //@Rotas Privadas (tem um token).
            if(isset($this->request['token'])) {
                if($this->request['token'] == $this->token) {
                    switch($this->request['rota']) {
                        case 'InserirInventario':
                            
                            break;
                    }
                }

                return;
            }

            //@Rotas publicas (não possui um token).
            if(!isset($this->request['token'])) {
                switch($this->request['rota']) {
                    //@Autenticar técnico!
                    case 'autenticarTecnico': 
                        
                        $email = $_POST['email'];
                        $senha = $_POST['senha'];

                        $tecnico = new Tecnico();
                        $tecnico->setEmail($email);
                        $tecnico->setSenha($senha);

                        try{
                            $conexao = new Conexao(); 
                            $conn = $conexao->conectar();
                            $tecnico = TecnicoControlador::autenticar($tecnico,$conn);
                            $resultSet['id'] = $tecnico->getId(); 
                            $resultSet['token'] = $this->token; 
                            echo json_encode($resultSet);
                        }catch(Exception $erro){
                            echo json_encode(array('status' => $erro->getMessage()));
                        }
                    break;
                }

                return;
            }

            //@404 not-found.
            if(empty($this->request)) {
                echo "SAFEST API - Rota inválida!";
                return;
            }
        }

        public function getRequest(){
            return $this->request;
        }

        public function getToken(){
            return $this->token;
        }
    }
?>