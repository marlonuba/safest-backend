<?php

    class TabelaIndividual{
        private $combinacao;
        private $conclusao;
        private $abreviacao;
     

        //Combinação
        public function getCombinacao()
        {
            return $this->combinacao;
        }

        public function setCombinacao($combinacao)
        {
            $this->combinacao = $combinacao;            
        }

        //Conclusão
        public function getConclusao()
        {
            return $this->conclusao;
        }

        public function setConclusao($conclusao)
        {
            $this->conclusao = $conclusao;
            
        }

        //Abreviação
        public function getAbreviacao()
        {
            return $this->abreviacao;
        }

        public function setAbreviacao($abreviacao)
        {
            $this->abreviacao = $abreviacao;
           
        }
    }
?>