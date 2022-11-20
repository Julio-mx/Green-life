<?php
$id = $_GET['id']; 

require_once '../modelo/publicacion.php';
$nuevaPub=new Publicacion();
$resultado=$nuevaPub->EliminarPub($id);
if($resultado){
    
    header("Location:../misQuejas.php");
}
else{
    //echo $resultado; 
    header("Location: ../menuPrincipal.php");
}
?>