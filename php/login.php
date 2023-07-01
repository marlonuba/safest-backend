<?php

    //sem estado - stateless
    session_start();

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    //conectar com o banco mysql
    $conn = new PDO("mysql:host=localhost;dbname=safest_v1", "root", "");
    $sql = "SELECT nome,email,senha FROM tecnicos WHERE email = ? and senha = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(1,$email);
    $stmt->bindValue(2,$senha);
    $stmt->execute();

    $tecnico = $stmt->fetch(PDO::FETCH_OBJ);

    //echo $tecnico->nome;

    if($tecnico == null){
    header('Location: login.html');
    }else{
    $_SESSION['nome'] = $tecnico->nome;
    $_SESSION['email'] = $tecnico->email;
    $_SESSION['senha'] = $tecnico->senha;
    header('Location: home.php?nome='/*.$tecnico->nome*/);
    }
    
?>