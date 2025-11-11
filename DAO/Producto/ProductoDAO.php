<?php
include_once '../Lib/Config/conexionSqli.php';

class ProductoDAO extends Connection
{
    private static $instance = NULL;
    public static function getInstance()
    {
        if (self::$instance == NULL)
            self::$instance = new ProductoDAO();
        return self::$instance;
    }
    public function getAll($status = "")
    {
        $condicion = "";
        if ($status != "") {
            $condicion = " where cli_estado = '" . $status . "'";
        }
        $sql = "SELECT * FROM producto " . $condicion;
        $result = $this->execute($sql);
        return $result;
    }


    public function findById($id)
    {
        try {
            $sql = "SELECT pro_precio FROM producto WHERE pro_id ='" . $id . "'";
            $result = $this->execute($sql);
            return $result;
        } catch (PDOException $exc) {
            die('Error findById() ProductoDAO:<br/>' . $exc->getMessage());
            $rs = 0;
        }
    }
}
