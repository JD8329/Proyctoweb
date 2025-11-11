<?php
include_once '../DAO/Factura/FacturaDAO.php';
class CtrlFactura extends FacturaDAO
{

    public function read()
    {

        include_once '../Controller/Producto/CtrlProducto.php';
        include_once '../Controller/Cliente/CtrlCliente.php';
        include_once '../View/Factura/frmFactura.php';
    }

    public function postNew()
    {
        $numFact = $_POST['nofact'];
        $datefact = $_POST['datefact'];
        $cliente = $_POST['cliente'];
        $observaciones = $_POST['observaciones'];
        $producto = $_POST['producto'];
        $listPrecio = $_POST['listPrecio'];
        $listCantidad = $_POST['listCantidad'];
        $listSubtotal = $_POST['listSubtotal'];
        $total = array_sum($listSubtotal);
        

        $res = FacturaDAO::getInstance()->addCabecera($numFact, $datefact, $cliente, $observaciones, "123", $total);

        if ($res == 1) {

            for ($i = 0; $i < count($producto); $i++) {
                FacturaDAO::getInstance()->addDetalleFactura($numFact, $producto[$i], $listPrecio[$i], $listCantidad[$i], $listSubtotal[$i]);
            }
            FacturaDAO::getInstance()->getUpdateFacturaId();
            redirect(getUrl('Factura', 'Factura', 'read', ['mensaje' => 'facturaCreada']));
        } else {
            redirect(getUrl('Factura', 'Factura', 'read', ['mensaje' => 'error']));
        }
    }

    public function getNextFacturaId()
    {
        $lastId = FacturaDAO::getInstance()->getLastFacturaId();
        $nextId = $lastId ;
        echo json_encode(['next_id' => $nextId]);
    }
    public function readReport()
    {

        include_once '../Controller/Cliente/CtrlCliente.php';
        include_once '../View/Factura/reportFactura.php';
    }

    public function getReportFactura()
    {
        setlocale(LC_TIME, 'es_ES.UTF-8');
        $array = array();
        $arraySeries = array();
        $listVenta = [];
        $listMes = [];
        $months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

        $list = FacturaDAO::getInstance()->getReport($_POST['nofact'], $_POST['fecha1'], $_POST['fecha2'], $_POST['cliente']);

        foreach ($list as $key => $row) {
            $array['data'][$key]['noFact'] = $row['fact_id'];
            $array['data'][$key]['date'] = $row['fact_fecha'];
            $array['data'][$key]['customer'] = $row['cli_razon_social'];
            $array['data'][$key]['total'] = $row['fact_total'];
            $array['data'][$key]['status'] = $row['fact_estado'];

            $mes = date("F", strtotime($row['fact_fecha']));
            $listVenta[$row['cli_razon_social']][$mes]['valor'] = (isset($listVenta[$row['cli_razon_social']][$mes]['valor'])) ? $listVenta[$row['cli_razon_social']][$mes]['valor'] + $row['fact_total'] : $row['fact_total'];
        }

        //organizar array para la grafica
        foreach ($listVenta as $keyRow => $row) {
            $i = 0;
            $listData = [];
            foreach ($months as $rowMonth) {
                if (array_key_exists($rowMonth, $row)) {
                    $listData[$i] = $row[$rowMonth]['valor'];
                } else {
                    $listData[$i] = 0;
                }
                $i++;
            }
            array_push($arraySeries, array("name" => $keyRow, "data" => $listData));
        }

        $array['series'] = $arraySeries;
        //dd($array);    
        echo json_encode($array);
    }
}
