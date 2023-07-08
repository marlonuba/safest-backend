<?php

class RouterController
{

    private $request;
    private $token;

    public function __construct($request)
    {
        $this->request = $request;
        $this->token = md5('teste');
    }

    public function Index()
    {

        //@Rotas Privadas (tem um token).
        if (isset($this->request['token'])) {
            if ($this->request['token'] == $this->token) {
                switch ($this->request['rota']) {

                    case 'insertInventory':

                        $inventarioDaTela = json_decode(file_get_contents('php://input'),false);

                        $inventarioControlador = new InventarioControlador();
                        $conexao = new Conexao();
                        $conn = $conexao->conectar();

                        $inventario = new Inventario();
                        $inventario -> setNome($inventarioDaTela->nomeInve); 
                        $inventario -> setData($inventarioDaTela->data);
                        $idTecnico = intval($inventarioDaTela->idTecnico);
                        
                        $endereco = new Endereco();
                        $endereco -> setCidade($inventarioDaTela->cidade);
                        $endereco -> setEstado($inventarioDaTela->estado);
                        $endereco -> setRua($inventarioDaTela->rua);
                        $endereco -> setBairro($inventarioDaTela->bairro);
                        $endereco -> setNumero($inventarioDaTela->numero);
                        $endereco -> setCep($inventarioDaTela->cep);
                        $endereco -> setComplemento($inventarioDaTela->complemento);
                        $inventario -> setEndereco($endereco);
                        //$inventario -> setTecnico($inventarioDaTela->idTecnico);

                        $situacoes = array();
                        foreach($inventarioDaTela->situacoes as $situacaoDatela){

                            $situacao = new Situacao();
                            $situacao -> setNomeFuncionario($situacaoDatela->funcionario); 
                            $situacao -> setSetor ($situacaoDatela->setor); 
                            $situacao -> setFuncao($situacaoDatela->funcao); 
                            $situacao -> setDescricaoAtividade ($situacaoDatela->descricao); 
                            $situacao -> setEquipamento($situacaoDatela->epi);
                            $situacao -> setTipoRisco($situacaoDatela->tiporisco);
                            $situacao -> setAgenteCondicao($situacaoDatela->agente);
                            $situacao -> setConsequenciaExposicao($situacaoDatela->exposicao);
                            $situacao -> setProbabilidade($situacaoDatela->classificacaoProbabilidade);
                            $situacao -> setConsequencia($situacaoDatela->classificacaoConsequencia);
                            $situacao -> setMedidasAdministrativas($situacaoDatela->medidasControle);
                            $situacao -> setProbabilidadeReferencia($situacaoDatela->classificacaoProbabilidadeReferencia);
                            $situacao -> setConsequenciaReferencia($situacaoDatela->classificacaoConsequenciaReferencia);
                            $situacao -> setMatrizAvaliacao($situacaoDatela->matriz);
                            $situacao -> setFonte($situacaoDatela->fonte);
                            $situacao -> setInventario($inventario->getId());
                            array_push($situacoes,$situacao);
                        }

                        $fotos = array();
                        foreach($inventarioDaTela->fotos as $fotoDaTela){
                            $foto = new Foto();
                            $foto->setNome($fotoDaTela->nome);
                            $foto->setTipo($fotoDaTela->tipo);
                            //$foto->setTamanho($fotoDaTela->tamanho);
                            $foto->setConteudo($fotoDaTela->conteudo);
                            array_push($fotos,$foto);
                        }

                        $inventario->setSituacoes($situacoes);
                        $inventario->setFotos($fotos);

                        $inventarioControlador->salvar($inventario,$idTecnico,$conn);
                        
                        //$inventario = JSON_decode($this->request['data']);
                        
                        //var_dump($inventarioDaTela->rua);
                        break;
                }
            }
          
            return;
        }

        //@Rotas publicas (não possui um token).
        if (!isset($this->request['token'])) {
            switch ($this->request['rota']) {
                //@Autenticar técnico!
                case 'autenticarTecnico':

                    $email = $_POST['email'];
                    $senha = $_POST['senha'];

                    $tecnico = new Tecnico();
                    $tecnico->setEmail($email);
                    $tecnico->setSenha($senha);

                    try {
                        $conexao = new Conexao();
                        $conn = $conexao->conectar();
                        $tecnico = TecnicoControlador::autenticar($tecnico, $conn);
                        $resultSet['id'] = $tecnico->getId();
                        $resultSet['name'] = $tecnico->getNome();
                        $resultSet['token'] = $this->token;
                        $resultSet['status'] = 200;
                        echo json_encode($resultSet);
                    } catch (Exception $erro) {
                        echo json_encode(array('status' => 500));
                    }
                    break;
                //@Registrar técnico!
                case 'RegistrarTecnico':

                    $nome = $_POST['nome'];
                    $cpf = $_POST['cpf'];
                    $email = $_POST['email'];
                    $senha = $_POST['senha'];

                    $tecnico = new Tecnico();
                    $tecnico->setNome($nome);
                    $tecnico->setCpf($cpf);
                    $tecnico->setEmail($email);
                    $tecnico->setSenha($senha);

                    try {
                        $conexao = new Conexao();
                        $conn = $conexao->conectar();
                        TecnicoControlador::salvar($tecnico, $conn);
                        echo json_encode(array('status' => 200));
                    } catch (Exception $erro) {
                        echo json_encode(array('status' => 500));
                    }
                    break;

                    case 'InserirSituacao':
                        header('Location:http://localhost/front/pages/insertSituation.php');
                        //echo json_encode(array('url' => '../front/pages/insertSituation.php'));

            }

            return;
        }

        //@404 not-found.
        if (empty($this->request)) {
            echo "SAFEST API - Rota inválida!";
            return;
        }
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function getToken()
    {
        return $this->token;
    }
}
?>