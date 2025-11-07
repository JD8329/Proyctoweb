<?php
include_once '../lib/Config/conexionSqli.php';

class ConceptoDAO extends connection
{
    private static $instance = NULL;

    public static function getInstance()
    {
        if (self::$instance == NULL)
            self::$instance = new ConceptoDAO();
        return self::$instance;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM concepto";
        $result = $this->execute($sql);
        return $result;
    }

    public function add($id, $descripcion, $estado)
    {
        $rs = "";
        try {
            $sql = "INSERT INTO concepto (con_id, con_descripcion, con_estado) 
                    VALUES ('" . $id . "','" . $descripcion . "','" . $estado . "')";
            $result = $this->execute($sql);
            $rs = 1;
        } catch (PDOException $exc) {
            die('Error Add() ConceptoDAO:<br/>' . $exc->getMessage());
            $rs = 0;
        }
        return $rs;
    }

    public function findById($id)
    {
        try {
            $sql = "SELECT * FROM concepto WHERE con_id = '" . $id . "'";
            $result = $this->execute($sql);
            return $result;
        } catch (PDOException $exc) {
            die('Error findById() ConceptoDAO:<br/>' . $exc->getMessage());
            return 0;
        }
    }

    // método agregado para actualizar un concepto
    public function update($id, $descripcion, $estado)
    {
        try {
            $sql = "UPDATE concepto 
                    SET con_descripcion = '" . $descripcion . "', 
                        con_estado = '" . $estado . "'
                    WHERE con_id = '" . $id . "'";
            $this->execute($sql);
            return 1;
        } catch (PDOException $exc) {
            die('Error update() ConceptoDAO:<br/>' . $exc->getMessage());
            return 0;
        }
    }
}
?>
