<?php

class Endereco {
    private $id;
    private $cidade;
    private $estado;
    private $rua;
    private $bairro;
    private $numero;
    private $cep;
    private $complemento;
    private $data;
    private $inventario;
    
    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }
    
    public function getCidade() {
        return $this->cidade;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getRua() {
        return $this->rua;
    }

    public function setRua($rua) {
        $this->rua = $rua;
    }
    
    public function getBairro() {
        return $this->bairro;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }
    
    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }
    
    public function getCep() {
        return $this->cep;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }
    
    public function getComplemento() {
        return $this->cep;
    }

    public function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    public function getInventario() {
        return $this->inventario;
    }

    public function setInventario($inventario) {
        $this->inventario = $inventario;
    }
    
}

?>