<?php

$titulo=$_POST['titulo'];
$descripcion=$_POST['desc'];
$idUsuario = $_POST['idUsuario'];
$id = $_POST['id']; 

require_once '../modelo/publicacion.php';
$nuevaPub=new Publicacion();
$resultado=$nuevaPub->ModificarPub($titulo,$descripcion,$id,$idUsuario);
if($resultado){
    
    header("Location:../misQuejas.php");
}
else{
    //echo $resultado; 
    header("Location: ../menuPrincipal.php");
}
?>