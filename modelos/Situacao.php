<?php

    class Situacao{
        private $funcao;
        private $descricaoAtividade;
        private $equipamento;
        private $tipoRisco;
        private $agenteCondicao;
        private $fonte;
        private $consequenciaExposicao;
        private $probabilidade;
        private $consequencia;
        private $medidasAdministrativas;
        private $probabilidadeReferencia;
        private $consequenciaReferencia;
        private $matrizAvaliacao;
        private $inventario;

        public function getFuncao()
        {
                return $this->funcao;
        }

        public function setFuncao($funcao)
        {
                $this->funcao = $funcao;

                return $this;
        }

        public function getDescricaoAtividade()
        {
                return $this->descricaoAtividade;
        }
 
        public function setDescricaoAtividade($descricaoAtividade)
        {
                $this->descricaoAtividade = $descricaoAtividade;

                return $this;
        }

        public function getEquipamento()
        {
                return $this->equipamento;
        }

        public function setEquipamento($equipamento)
        {
                $this->equipamento = $equipamento;

                return $this;
        }

        public function getTipoRisco()
        {
                return $this->tipoRisco;
        }
 
        public function setTipoRisco($tipoRisco)
        {
                $this->tipoRisco = $tipoRisco;

                return $this;
        }

        public function getAgenteCondicao()
        {
                return $this->agenteCondicao;
        }

        
        public function setAgenteCondicao($agenteCondicao)
        {
                $this->agenteCondicao = $agenteCondicao;

                return $this;
        }

     
        public function getConsequenciaExposicao()
        {
                return $this->consequenciaExposicao;
        }

        public function setConsequenciaExposicao($consequenciaExposicao)
        {
                $this->consequenciaExposicao = $consequenciaExposicao;

                return $this;
        }

        public function getProbabilidade()
        {
                return $this->probabilidade;
        }
 
        public function setProbabilidade($probabilidade)
        {
                $this->probabilidade = $probabilidade;

                return $this;
        }

        public function getConsequencia()
        {
                return $this->consequencia;
        }
 
        public function setConsequencia($consequencia)
        {
                $this->consequencia = $consequencia;

                return $this;
        }

        public function getMedidasAdministrativas()
        {
                return $this->medidasAdministrativas;
        }
 
        public function setMedidasAdministrativas($medidasAdministrativas)
        {
                $this->medidasAdministrativas = $medidasAdministrativas;

                return $this;
        }
 
        public function getProbabilidadeReferencia()
        {
                return $this->probabilidadeReferencia;
        }
 
        public function setProbabilidadeReferencia($probabilidadeReferencia)
        {
                $this->probabilidadeReferencia = $probabilidadeReferencia;

                return $this;
        }

        public function getConsequenciaReferencia()
        {
                return $this->consequenciaReferencia;
        }

        public function setConsequenciaReferencia($consequenciaReferencia)
        {
                $this->consequenciaReferencia = $consequenciaReferencia;

                return $this;
        }

        public function getMatrizAvaliacao()
        {
                return $this->matrizAvaliacao;
        }
 
        public function setMatrizAvaliacao($matrizAvaliacao)
        {
                $this->matrizAvaliacao = $matrizAvaliacao;

                return $this;
        }

        public function getFonte()
        {
                return $this->fonte;
        }

        public function setFonte($fonte): self
        {
                $this->fonte = $fonte;

                return $this;
        }
        function getInventario(){
                return $this->inventario;
            }
        function setInventario($inventario){
                $this->inventario = $inventario;
            }
    }



?>