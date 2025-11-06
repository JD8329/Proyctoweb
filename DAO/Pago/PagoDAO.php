<?php

include_once '../lib/Config/conexionSqli.php'; 


class PagoDAO extends Connection
{
    private static $instance = NULL;
    
    public static function getInstance()
    {
        if (self::$instance == NULL)
            self::$instance = new PagoDAO();
        return self::$instance;
    }

 
    public function getAll()
    {
     
        $sql = "SELECT p.id, p.valor, p.fecha, c.nombre AS nomConcepto 
                FROM pago p 
                INNER JOIN concepto c ON p.idConcepto = c.id"; 
       
        
        $result = $this->execute($sql);
        return $result;
    }

  
    public function add($id, $valor, $idConcepto, $fecha)
    {
        try {
           
            $sql = "INSERT INTO pago (id, valor, idConcepto, fecha) VALUES (?, ?, ?, ?)";
            
          
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("idis", $id, $valor, $idConcepto, $fecha); 
            
            $stmt->execute();
            return 1;
            
        } catch (Exception $exc) { // Se usa Exception ya que PDOException solo aplica si usas PDO
            error_log('Error Add() PagoDAO: ' . $exc->getMessage()); 
            // Se usa error_log en lugar de die() para no detener la aplicación.
            return 0;
        }
    }

  
    public function findById($id){
        try{
        
            $sql = "SELECT * FROM pago WHERE id = ?"; 
            
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $id); 
            $stmt->execute();
            
            $result = $stmt->get_result(); 
            return $result->fetch_all(MYSQLI_ASSOC); 
            
        }catch(Exception $exc) {
            error_log('Error findById() PagoDAO: ' . $exc->getMessage());
            return [];
        }
    }
}