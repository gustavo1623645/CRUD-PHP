<?php
session_start(); //aqui se manda llamar el inicio de secion 
session_destroy();  //despues la secion se destruye y borra los datos de las variales de secion
header("location:login.php"); //y lo saca de el index y lo manda al login si quiere volver a entrar
?>