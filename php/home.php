<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <title>Home</title>
</head>
<body>
    
  <?php

  // Refatorar o cadastro do técnico, implementando a consulta parametrizada
    session_start();
    
    if (!isset($_SESSION['nome']) || !isset($_SESSION['senha'])){
      header('Location: login.html');
    }
    echo "<p>Bem vindo ao sistema ".$_SESSION['nome']." </p>";

    //SE TENTAR ENTRAR POR OUTRA PAGINA NO HOME ELE ACESSA MESMO SEM LOGAR(localhost)
  ?>
 
</body>
</html>