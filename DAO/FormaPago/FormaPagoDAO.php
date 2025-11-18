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

    public function getAll()
    {
        $sql = "SELECT * FROM forma_pago";
        return $this->execute($sql);
    }

    public function add($id, $descripcion, $estado)
    {
        $sql = "
            INSERT INTO forma_pago (fp_id, fp_descripcion, fp_estado)
            VALUES ('$id', '$descripcion', '$estado')
        ";
        return $this->execute($sql) ? 1 : 0;
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM forma_pago WHERE fp_id = '$id'";
        return $this->execute($sql);
    }

    public function update($id, $descripcion, $estado)
    {
        $sql = "
            UPDATE forma_pago 
            SET fp_descripcion='$descripcion',
                fp_estado='$estado'
            WHERE fp_id='$id'
        ";
        return $this->execute($sql) ? 1 : 0;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM forma_pago WHERE fp_id='$id'";
        return $this->execute($sql) ? 1 : 0;
    }
}
?>
