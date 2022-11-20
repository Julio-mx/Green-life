<?php
$titulo=$_POST['title'];
$descripcion=$_POST['desc'];
$idUsuario=$_POST['id'];

require_once '../modelo/publicacion.php';
$nuevaPub=new Publicacion();
$resultado=$nuevaPub->InsertarPub($titulo,$descripcion,$idUsuario);
if($resultado){
    
    header("Location:../misQuejas.php");
}
else{
    //echo $resultado; 
    header("Location: ../crearQueja.php");
}
?>