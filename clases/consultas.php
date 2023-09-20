<?php
require_once __DIR__ . '/SingletonConexion.php';

class datos{

    static public function entradas(){

        $instancia = SingletonConexion::getInstance();
        $conn = $instancia->getConnection();

        $query = "SELECT * FROM entrada ORDER BY fecha_entrega DESC";

        $result = mysqli_query($conn, $query);
        
        return $result->fetch_all(MYSQLI_ASSOC);

    }

    static public function entradas_id($id){

        $instancia = SingletonConexion::getInstance();
        $conn = $instancia->getConnection();

        $query = "SELECT * FROM entrada WHERE id = ?";

        $result = $conn->prepare($query);

        $result->bind_param('i', $id);

        $result->execute();

        $result = $result->get_result();

        return $result->fetch_assoc();

    }

    static public function eliminar_entrada($id){

        $instancia = SingletonConexion::getInstance();
        $conn = $instancia->getConnection();

        $query = "DELETE FROM entrada WHERE id = $id";

        if(mysqli_query($conn, $query)){
            return true;
        } else{
            return false;
        }
    }

    static public function eliminar_salida($codigo){

        $instancia = SingletonConexion::getInstance();
        $conn = $instancia->getConnection();

        $query = "DELETE FROM salida WHERE codigo = $codigo";

        if(mysqli_query($conn, $query)){
            return true;
        } else{
            return false;
        }
    }

    static public function salidas(){

        $instancia = SingletonConexion::getInstance();
        $conn = $instancia->getConnection();

        $query = "SELECT * FROM salida ORDER BY fecha_retiro DESC";
        
        $result = mysqli_query($conn, $query);
        
        return $result->fetch_all(MYSQLI_ASSOC);

    }

    static public function salidas_id($id){

        $instancia = SingletonConexion::getInstance();
        $conn = $instancia->getConnection();

        $query = "SELECT * FROM salida WHERE id = ?";

        $result = $conn->prepare($query);

        $result->bind_param('i', $id);

        $result->execute();

        $result = $result->get_result();

        return $result->fetch_assoc();

    }

    static public function salidas_codigo($codigo){

        $instancia = SingletonConexion::getInstance();
        $conn = $instancia->getConnection();

        $query = "SELECT * FROM salida WHERE codigo = ? ";

        $result = $conn->prepare($query);

        $result->bind_param('i', $codigo);

        $result->execute();

        $result = $result->get_result();

        return $result->fetch_assoc();

    }

    static public function guardar_entrada($taller,$fecha,$producto,$cantidad,$valor){

        $instancia = SingletonConexion::getInstance();
        $conn = $instancia->getConnection();

        $query = "INSERT INTO entrada(nombre_taller, fecha_entrega, producto, cantidad, restante, valor)
        VALUES (?, ?, ?, ?, ?, ?)";

        $result = $conn->prepare($query);

        $result->bind_param('sssiis', $taller, $fecha, $producto, $cantidad, $cantidad, $valor);

        $result->execute();
            
        if($result) return true;
        else return false;

    }

    static public function guardar_salida($codigo,$taller,$fecha,$producto,$cantidad,$enviado,$valor,$observacion){

        $instancia = SingletonConexion::getInstance();
        $conn = $instancia->getConnection();

        $query = "INSERT INTO salida(codigo, nombre_taller, fecha_retiro, producto, cantidad, enviado, valor, observacion)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $result = $conn->prepare($query);

        $result->bind_param('isssiiss', $codigo, $taller, $fecha, $producto, $cantidad, $enviado, $valor, $observacion);

        $result->execute();
            
        if($result) return true;
        else return false;

    }
    
    static public function editar_restante_entrada($codigo,$restante){

        $instancia = SingletonConexion::getInstance();
        $conn = $instancia->getConnection();

        $query = "UPDATE entrada SET restante = ? WHERE id = ?";

        $result = $conn->prepare($query);

        $result->bind_param('ii', $restante, $codigo);

        $result->execute();
            
        if($result) return true;
        else return false;

    }
    
    static public function editar_entrada($id,$taller,$fecha,$producto,$cantidad,$valor){

        $instancia = SingletonConexion::getInstance();
        $conn = $instancia->getConnection();

        $query = "UPDATE entrada SET nombre_taller = ?,fecha_entrega = ?,producto = ?,cantidad = ?,
        valor = ? WHERE id = ?";

        $result = $conn->prepare($query);

        $result->bind_param('sssisi', $taller,$fecha,$producto,$cantidad,$valor,$id);

        $result->execute();
            
        if($result) return true;
        else return false;

    }

    static public function editar_salida($id,$taller,$fecha,$producto,$cantidad,$enviado,$valor,$observacion){

        $instancia = SingletonConexion::getInstance();
        $conn = $instancia->getConnection();

        $query = "UPDATE salida SET nombre_taller = ?,fecha_retiro = ?,producto = ?,cantidad = ?,
        enviado = ?, valor = ?, observacion = ? WHERE id = ?";

        $result = $conn->prepare($query);

        $result->bind_param('sssiissi', $taller,$fecha,$producto,$cantidad,$enviado,$valor,$observacion,$id);

        $result->execute();
            
        if($result) return true;
        else return false;

    }
}
