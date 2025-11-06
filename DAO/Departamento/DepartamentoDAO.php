<?php
include_once '../lib/Config/conexionSqli.php';

class DepartamentoDAO extends Connection
{
    private static $instance = NULL;
    public static function getInstance()
    {
        if (self::$instance == NULL)
            self::$instance = new DepartamentoDAO();
        return self::$instance;
    }
    public function getAll()
    {
        $sql = "SELECT * FROM departamento";
        $result = $this->execute($sql);
        return $result;
    }
    public function add($id, $name)
    {
        $rs = "";
        try {
            $sql = "insert into departamento(id,nombre) values ('" . $id . "','" . $name . "')";
            $result = $this->execute($sql);
            $rs = 1;
        } catch (PDOException $exc) {
            die('Error Add() DepartamentoDAO:<br/>' . $exc->getMessage());
            $rs = 0;
        }
        return $rs;
    }
}
