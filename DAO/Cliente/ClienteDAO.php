<?php
include_once '../Lib/Config/conexionSqli.php';

class ClienteDAO extends Connection
{
    private static $instance = NULL;
    public static function getInstance()
    {
        if (self::$instance == NULL)
            self::$instance = new ClienteDAO();
        return self::$instance;
    }
    public function getAll($status = "")
    {
        $condicion = "";
        if ($status != "") {
            $condicion = " where cli_estado = '" . $status . "'";
        }
        $sql = "SELECT * FROM cliente " . $condicion;
        $result = $this->execute($sql);
        return $result;
    }
}
