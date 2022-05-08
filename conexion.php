<?php

class conexion{
    private $servidor="localhost";
    private $usuario="root";
    private $password="admin";
    private $conexion;
//al instanciar la clase atomaticamente se ejecuta el conttructor
    public function __construct(){
        try{
            $this->conexion=new PDO("mysql:host=$this->servidor;dbname=portafolio",$this->usuario,$this->password); 
            //PDO es una clase que nos permiste conectar a la base de
            // datos y recive el nombre del servidor la base de datos el usuario y password
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); //se usa para obtener propiedades en este caso para manejar los errores
               //  echo "conexion exitosa";
            }catch(PDOException $error){
                        echo "error en la conexion".$error;      //aqui se mandeja el error  
            }
            //una vez que tenemos la conexion debemos ejecutar una acion de seleccion y de consulta
            

    }//fin de funcion construct
    //este metodo lo usaremos para insertar,borrar o actualizar registros
    public function ejecutar($sql){//ponemos una instruccion sql
        //le ponemos que vamos a usar esta conexxion con $this->conexion
        $this->conexion->exec($sql); //se usara la funcion exec() y ejecutara el $sql y nos retornara
        //datos
        return $this->conexion->lastInsertId();   //nos retornara la conexion
        //la  lienas anteriores 25 y 27 lo que hacen es ejecutar una consulta sql y retorna
        //id 
        

    }
//este metodo se usara para hacer consultas
public function mostrar($sql){
    $sentencia=$this->conexion->prepare($sql);  
    $sentencia->execute();
    return $sentencia->fetchAll();
}    
    
}
//colocaremos esto en el archivo de portafolio.php para hacer pruebas

?>