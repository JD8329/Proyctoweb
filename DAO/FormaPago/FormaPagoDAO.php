<?php
include_once '../lib/Config/conexionSqli.php';

class FormaPagoDAO extends connection
{
    private static $instance = NULL;

    public static function getInstance()
    {
        if (self::$instance == NULL)
            self::$instance = new FormaPagoDAO();
        return self::$instance;
    }

    // 🔹 Obtener todos los registros
    public function getAll()
    {
        $sql = "SELECT * FROM concepto ORDER BY con_id ASC";
        $result = $this->execute($sql);
        return $result;
    }

    // 🔹 Agregar una nueva forma de pago
    public function add($id, $metodo, $valor)
    {
        try {
            $sql = "INSERT INTO concepto (con_id, con_descripcion, con_estado)
                    VALUES ('$id', '$metodo', '$valor')";
            $this->execute($sql);
            return 1;
        } catch (PDOException $exc) {
            error_log("Error Add() FormaPagoDAO: " . $exc->getMessage());
            return 0;
        }
    }

    // 🔹 Buscar una forma de pago por ID
    public function findById($id)
    {
        try {
            $sql = "SELECT * FROM concepto WHERE con_id = '$id'";
            $result = $this->execute($sql);
            return $result;
        } catch (PDOException $exc) {
            error_log("Error findById() FormaPagoDAO: " . $exc->getMessage());
            return [];
        }
    }

    // 🔹 Actualizar una forma de pago existente
    public function update($id, $metodo, $valor)
    {
        try {
            $sql = "UPDATE concepto 
                    SET con_descripcion = '$metodo', con_estado = '$valor'
                    WHERE con_id = '$id'";
            $this->execute($sql);
            return 1;
        } catch (PDOException $exc) {
            error_log("Error update() FormaPagoDAO: " . $exc->getMessage());
            return 0;
        }
    }

    // 🔹 Eliminar una forma de pago
    public function delete($id)
    {
        try {
            $sql = "DELETE FROM concepto WHERE con_id = '$id'";
            $this->execute($sql);
            return 1;
        } catch (PDOException $exc) {
            error_log("Error delete() FormaPagoDAO: " . $exc->getMessage());
            return 0;
        }
    }
}
?>
