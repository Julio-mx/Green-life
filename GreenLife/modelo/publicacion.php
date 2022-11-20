<?php

class Publicacion {

    public function ObtenerPub($idUsuario){
        include 'conexion.php';
        $conectar=new Conexion();
        $consulta="SELECT * FROM publicacion WHERE usuarioId=:idUsuario";
        $query=$conectar->prepare($consulta); //preparas la consulta
        $query->bindParam(":idUsuario",$idUsuario,PDO::PARAM_STR);
        $query->execute(); //ejecutas
        $query->setFetchMode(PDO::FETCH_ASSOC);
        return $query->fetchAll();
    }
    
    public function InsertarPub($titulo,$descripcion,$idUsuario){
        try {
            include 'conexion.php';
            $conectar=new Conexion();
            $consulta=$conectar->prepare("INSERT INTO publicacion(titulo,descripcion,usuarioId)
                VALUES(:titulo, :descripcion, :idUsuario)");
            $consulta ->bindParam(":titulo",$titulo,PDO::PARAM_STR);   
            $consulta ->bindParam(":descripcion",$descripcion,PDO::PARAM_STR);  
            $consulta ->bindParam(":idUsuario",$idUsuario,PDO::PARAM_INT); 
            $consulta->execute();
            return true; 
        } catch (Exception $e) {
            return false; 
        }
        
    }

    public function ModificarPub($titulo,$descripcion,$id,$idUsuario){
        include 'conexion.php';
        $conectar=new Conexion();
        $idUsuario =  intval($idUsuario);
        $id = intval($id);
        $consulta=$conectar->prepare("UPDATE publicacion SET titulo=:titulo,descripcion=:descripcion
                                      WHERE id=:id AND usuarioId=:idUsuario");
                                     
                $consulta ->bindParam(":titulo",$titulo,PDO::PARAM_STR);   
                $consulta ->bindParam(":descripcion",$descripcion,PDO::PARAM_STR);
                $consulta ->bindParam(":id", $id, PDO::PARAM_INT);
                $consulta ->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
                                                           
        $consulta->execute();
        return true;
    }

    public function EliminarPub($id){
        include 'conexion.php';
        $conectar=new Conexion();
        $id = intval($id);
        $consulta=$conectar->prepare("DELETE FROM publicacion WHERE id=:id");
        
        $consulta->bindParam(":id",$id,PDO::PARAM_INT);

        $consulta->execute();
        return true;
    }


}

?>