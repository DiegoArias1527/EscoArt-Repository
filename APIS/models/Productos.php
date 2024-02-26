<?php
class Producto extends Conectar{
    public function get_producto(){
        $conectar = parent :: conexion();
        parent:: set_names();
        $sql="SELECT * FROM productos";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

    public function get_producto_x_id($id_Producto){
        $conectar= parent::Conexion();
        parent::set_names();
        $sql="SELECT * FROM productos WHERE id_Producto = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_Producto);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_producto($Id_Producto,$Nom_Producto,$Precio_Producto,$Desc_Producto,$Id_Categoria,$Id_Proveedor){
        $conectar= parent::Conexion();
        parent::set_names();
        $sql="INSERT INTO productos (Id_Producto,Nom_Producto,Precio_Producto,Desc_Producto,Id_Categoria,Id_Proveedor) VALUES (?, ?, ?, ?, ?, ?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $Id_Producto);
        $sql->bindValue(2, $Nom_Producto);
        $sql->bindValue(3, $Precio_Producto);
        $sql->bindValue(4, $Desc_Producto);
        $sql->bindValue(5, $Id_Categoria);
        $sql->bindValue(6, $Id_Proveedor);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }


    public function update_producto($Id_Producto,$Nom_Producto,$Precio_Producto,$Desc_Producto,$Id_Categoria,$Id_Proveedor) {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "UPDATE productos SET
                Nom_Producto = ?,
                Precio_Producto = ?,
                Desc_Producto = ?,
                Id_Categoria = ?,
                Id_Proveedor = ?
                WHERE
                Id_Producto = ?";
    
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $Nom_Producto);
        $sql->bindValue(2, $Precio_Producto);
        $sql->bindValue(3, $Desc_Producto);
        $sql->bindValue(4, $Id_Categoria);
        $sql->bindValue(5, $Id_Proveedor);
        $sql->bindValue(6, $Id_Producto);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }


    
    public function delete_producto($Id_Producto){
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "DELETE FROM productos WHERE Id_Producto = ?";
        
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $Id_Producto);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    


}
?>