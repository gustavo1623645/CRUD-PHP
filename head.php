<?php
session_start(); //se inicia la secion para crear las variables de secion
//aqui validaremos si existe una secion activa para mostrar la pagina de lo contrario
//redireccionaremos al login
if(isset($_SESSION["usuario"])!="gustavo"){ //aqui valida si el usuario no es valido  lo direcciona al login
    //para que se loguee
header("location:login.php"); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<!--<nav class="navbar navbar-dark bg-dark">
    
    </nav>-->
    <div class="container">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
  <a class="navbar-brand" href="index.php">inicio</a>
    <a class="navbar-brand" href="portafolio.php">portafolio</a>
    <a class="navbar-brand" href="cerrar.php">cerrar</a>  </div>
</nav>


<body>