<?php
include_once '../lib/Config/conexionSqli.php';
class CiudadDAO extends Connection
{
    private static $instance = NULL;
    public static function getInstance()
    {
        if (self::$instance == NULL)
            self::$instance = new CiudadDAO();
        return self::$instance;
    }
    public function getAll()
    {
        $sql = "select ciudad.id, ciudad.nombre, habitantes, departamento.nombre as nomDepto from ciudad INNER JOIN departamento on ciudad.idDepto= departamento.id";
        $result = $this->execute($sql);
        return $result;
    }
    public function add($id, $name, $idDepto, $habitantes)
    {
        $rs = "";
        try {
           $sql = "insert into ciudad(id,nombre,idDepto,habitantes) values ('" . $id . "','" . $name . "','" . $idDepto . "'," . $habitantes . ")";
            $result = $this->execute($sql);
            $rs = 1;
        } catch (PDOException $exc) {
            die('Error Add() CiudadDAO:<br/>' . $exc->getMessage());
            $rs = 0;
        }
        return $rs;
    }
     public function findById($id){
        try{
       $sql = "SELECT * FROM ciudad WHERE id = '".$id."'";
         $result = $this->execute($sql);
         return $result;
        }catch(PDOException $exc) {
            die('Error findById() CiudadDAO:<br/>' . $exc->getMessage());
            $rs=0;
        }
    }
 

}
