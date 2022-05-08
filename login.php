<?php
session_start();  //aqui se inicia la secion y asi podremos crear las variables para guardar los datos de la secion
if($_POST){
    if(($_POST["usuario"]=="gustavo") && ($_POST["password"]=="admin")){
        //si el usuario se logeo correctamente guardar su usuario en una variable de secion
        $_SESSION["usuario"]="gustavo";
        $_SESSION["password"]="admin";
        //en la variable secion es un array y cada variable es un indice

        
        header("location:index.php");
    }else{
        echo "<script> alert('El usuario o contraseña es incorrecto') </script>";
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="styleLogin.css">
  </head>
  <body>
      
      <div class="container bg">
         
              <div class="formulario">
                      <h1>Iniciar secion</h1>
                        <form action="login.php" method="post">
                        <input type="text" name="usuario" placeholder="introduce tu usuario" class="form-control">
                        </br>
                        <input type="password" name="password" placeholder="introduce tu contraseña" class="form-control"> 
                        </br>
                       <button type="submit" class="btn btn-success">Enviar</button>


                       </form> 
                  
                </div>
      </div>
     
  </body>
</html>