<?php include("head.php");?> 
<?php include("conexion.php"); //usaremos la conexion aqui y crearemos uns instancia de la clase conexion?>  
<?php  

 if($_POST){
    $fecha=new DateTime();

    $nombre=$_POST["name"];
    $imagen=$fecha->getTimestamp()."_".$_FILES['imagen']['name'];
    $descripcion=$_POST["descripcion"];
    //adjuntando la imagen
    $imagenTemporal=$_FILES['imagen']['tmp_name'];
    move_uploaded_file($imagenTemporal,"imagenes/".$imagen); //mueve el achivo temporal al nombre de la imagen que es imagen
    $objConexion=new conexion();
 //usaremos la variable donde se creo la instancia de conexcion y crearemos una instruccion sql
 //accediendo al metodo ejecutar que creamos
 $sql="INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `descripcion`) VALUES (NULL, '$nombre', '$imagen', '$descripcion'); ";
 $objConexion->ejecutar($sql); //axedemos al metodo ejecutar y le pasamps un string el 
 //cual es el sql que qeremos ejecutar por ejemplo para insertar un registro seria
 //INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `descripcion`) VALUES (NULL, 'gus', 'nada.jpg', 'muy boni'); 
 //en conclucion lo que hace de la linea 2 a la 7 es crear una instancia de la clase conexion
 //despues creal la consulta y la almacena en la variable sql y al final se accede al metodo ejecutar el cual toma el sql
 //cada que se entre a portafolio se ejecutara el sql el cuañ inserta un registro
 //un error que tenia era que al enviar un registro y al actualizar la pagina el registro se 
     //volvia a hacer igual pasa con borra la solucion es difeccionarlo a la misma pagina
     header("location:portafolio.php");
 }
 //para borrar registros
 if($_GET){
     $objConexion=new conexion();
     $id=$_GET["borrar"];
     //para borrar la imagen primero hay que identificarla
     $imagen=$objConexion->mostrar("SELECT imagen FROM proyectos WHERE id=$id");
      unlink("imagenes/".$imagen[0]["imagen"]);  //usamos unlink para borrar

     
     $sql="DELETE FROM `proyectos` WHERE `proyectos`.`id` = $id";
     $objConexion->ejecutar($sql);
     //un error que tenia era que al enviar un registro y al actualizar la pagina el registro se 
     //volvia a hacer igual pasa con borra la solucion es difeccionarlo a la misma pagina
     header("location:portafolio.php");

 }
 //crear la parte de consultar datos
 $objConsulta=new conexion();
 $proyectos=$objConsulta->mostrar("SELECT*FROM proyectos ");

?>    

<div class="container">
    <div class="container card">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <h1>proyectos</h1>
                    <div class="card-body">
                       <form action="portafolio.php" method="post" enctype="multipart/form-data" > <!--para mandar los archivo usamo enctype--> 
                           nombre del proyecto: <input type="text" name="name" required class="form-control"> 
                           </br>
                           imagen: <input type="file" name="imagen" required class="form-control">
                          </br>
                           descripcion: <textarea name="descripcion" rows=5  required class="form-control"></textarea>
                           </br>
                           <input type="submit" value="enviar" class="btn btn-success">
                       
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
<table class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>nombre del proyecto</th>
            <th>imagen</th>
            <th>descripcion</th>
            <th>accion</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach($proyectos as $proyecto){?>
        <tr>
            <td><?php echo $proyecto["id"];?></td>     <!--aqui se imprimiran los datos que fueron consultados , en la tabla-->
            <td><?php echo $proyecto["nombre"];?></td> 

            <td>
                <img src="imagenes/<?php echo $proyecto["imagen"];?> " width=100 alt="" srcset="">
                 <!--mostrar imagern-->
            
            </td> 

            <td><?php echo $proyecto["descripcion"];?></td>       
            <td><a name="" id="" class="btn btn-danger" href="?borrar=<?php echo $proyecto["id"]?>" role="button">borrar</a></td>       

        </tr>
        <?php }?>
       
    </tbody>
</table>
                </div>

            
        </div>
    </div>
</div>
<?php include("footer.php");?>    
