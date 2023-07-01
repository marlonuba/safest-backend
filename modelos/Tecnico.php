<?php

class Tecnico implements JsonSerializable{

    private $id;
    private $cpf;
    private $nome;
    private $email;
    private $senha;
    
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

    public function getCpf(){
        return $this->cpf;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }


    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }


    public function jsonSerialize(){

        return [
            'id' => $this->id, 
            'cpf' => $this->cpf,
            'nome' => $this->email,
            'senha' => $this->senha
        ];

    }

}
?>