<?php

   class Inventario{
    
    private $id;
    private $nome;
    private $data;
    private $endereco; 
    private $situacoes; 
    private $fotos; 
    private $tecnico;
    
    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }
    
    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }
    
    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco(Endereco $endereco) {
        $this->endereco = $endereco;
    }

    public function getSituacoes() {
        return $this->situacoes;
    }

    public function setSituacoes($situacoes) {
        $this->situacoes = $situacoes;
    }

    public function getFotos() {
        return $this->fotos;
    }

    public function setFotos($fotos) {
        $this->fotos = $fotos;
    }

    
    public function getTecnico() {
        return $this->tecnico;
    }

    public function setTecnico($tecnico) {
        $this->tecnico = $tecnico;
    }

   }

?>