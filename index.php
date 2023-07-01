<?php
   
   require_once "./controladores/rota.php";
   require_once "./modelos/Tecnico.php";
   require_once "./controladores/TecnicoControlador.php";
   require_once "./modelos/Inventario.php";
   require_once "./controladores/InventarioControlador.php";
   require_once "./modelos/Endereco.php";
   require_once "./modelos/Situacao.php";
   require_once "./controladores/SituacaoControlador.php";
   require_once "./modelos/Foto.php";
   require_once "./controladores/FotoControlador.php";

   $router = new RouterController($_GET);
   $router->Index();
?>