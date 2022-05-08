<?php include("head.php");?>    
<?php include("conexion.php");?>  


<div class="p-5 bg-black">
    <div class="container">
        <h1 class="display-3">Bienvenido</h1>
        <p class="lead">Este es mi portafolio</p>
        <hr class="my-2">
        <p>Mas informacion</p>
       
    </div>
</div>


<?php
     $objConexion=new conexion();
     $proyectos=$objConexion->mostrar("SELECT*FROM proyectos ");

 ?>

 <div class="row row-cols-1 row-cols-md-3 g-4">
 <?php foreach($proyectos as $proyecto){?>

  <div class="col">
    <div class="card h-100">
      <img src="imagenes/<?php echo $proyecto["imagen"];?>" class="card-img-top" width="100" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php echo $proyecto["nombre"];?></h5>
        <p class="card-text"><?php echo $proyecto["descripcion"];?></p>
      </div>
    </div>
    </div>

    <?php }?>


 

  

</div>
<?php include("footer.php");?>



