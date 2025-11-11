<?php
include_once '../Lib/Config/conexionSqli.php';
class FacturaDAO extends Connection
{
    private static $instance = NULL;
    public static function getInstance()
    {
        if (self::$instance == NULL)
            self::$instance = new FacturaDAO();
        return self::$instance;
    }
    public function addCabecera($id, $fecha, $cliente, $observaciones, $usuario, $total)
    {

        try {
            $sql = "INSERT INTO factura(`fact_id`, `fact_fecha`, `cli_nit`, `fact_observaciones`, `usu_crea`, `fact_total`, `fact_estado`)
        VALUES ($id, '" . $fecha . "', '" . $cliente . "', '" . $observaciones . "', '" . $usuario . "', $total, 'Activo' )";
            $result = $this->execute($sql);
            $rs = 1;
        } catch (PDOException $exc) {
            die('Error AddCabecera() FacturaDAO:<br/>' . $exc->getMessage());
            $rs = 0;
        }
        return $rs;
    }
    public function addDetalleFactura($idFactura, $idPro, $proPrecio, $cantidad, $subtotal)
    {
        $rs = "";
        try {
            $sql = "INSERT INTO detalle_factura(`fact_id`, `pro_id`, `pro_precio`, `drres_cantidad`, `drres_subtotal`)
            VALUES ('" . $idFactura . "', '" . $idPro . "', '" . $proPrecio . "','" . $cantidad . "', '" . $subtotal . "')";
            $result = $this->execute($sql);
            $rs = 1;
        } catch (PDOException $exc) {
            die('Error addDetalleFactura() FacturaDAO:<br/>' . $exc->getMessage());
            $rs = 0;
        }
        return $rs;
    }

    public function getLastFacturaId()
    {
        $sql = "SELECT doc_consecutivo AS last_id FROM consecutivo_doc where doc_codigo = 1";
        $result = $this->execute($sql);
        $row = $result->fetch_assoc();
        return $row['last_id'] ?? 0;
    }

    public function getUpdateFacturaId()
    {
        $sql = "update consecutivo_doc  set doc_consecutivo= doc_consecutivo +1  where doc_codigo = 1";
        $result = $this->execute($sql);
    }

    public function getReport($noFact, $fecha1, $fecha2, $cliente)
    {
        $condicion = '';
        if ($noFact <> "") {
            $condicion = " and fact_id=" . $noFact;
        } else {
            if ($cliente <> "0") {
                $condicion = " and factura.cli_nit=" . $cliente;
            }
        }
        try {
            $sql = 'SELECT `fact_id`,`fact_fecha`,cliente.cli_razon_social,`fact_total`,`fact_estado`
                FROM `factura` INNER JOIN cliente ON factura.cli_nit= cliente.cli_nit WHERE fact_fecha BETWEEN "' . $fecha1 . '" AND "' . $fecha2 . '"' . $condicion;
            $result = $this->execute($sql);
            return $result;
        } catch (PDOException $exc) {
            die('Error getReport() FacturaDAO:<br/>' . $exc->getMessage());
        }
    }
}
