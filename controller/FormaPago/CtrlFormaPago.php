<?php
include_once '../DAO/Concepto/ConceptoDAO.php';

class CtrlFormaPago extends ConceptoDAO
{
    public function read()
    {
        include_once '../view/FormaPago/ModalsFormaPago.php';
        include_once '../view/FormaPago/viewFormaPago.php';
        viewFormaPago::getRead();
    }

    public function data()
    {
        $listFormaPago = $this->getAll();
        $array = [];

        foreach ($listFormaPago as $key => $row) {
            $array['data'][$key]['con_id'] = $row['con_id'];
            $array['data'][$key]['con_descripcion'] = $row['con_descripcion'];
            $array['data'][$key]['con_estado'] = $row['con_estado'];
        }

        echo json_encode($array);
    }

    public function postNew()
    {
        $id = $_POST['idFormaPago'] ?? null;
        $metodo = $_POST['metodoFormaPago'] ?? null;
        $valor = $_POST['valorFormaPago'] ?? null;

        if (empty($id) || empty($metodo) || empty($valor)) {
            messageSweetAlert("Error", "Faltan datos para registrar la forma de pago.", "error", "#f7060d", getUrl('FormaPago', 'FormaPago', 'read'));
            return;
        }

        $rs = $this->add($id, $metodo, $valor);

        if ($rs == 1) {
            messageSweetAlert("¡Éxito!", "Forma de pago generada con éxito.", "success", "#4CAF50", getUrl('FormaPago', 'FormaPago', 'read'));
        } else {
            messageSweetAlert("Advertencia!", "No fue posible registrar la forma de pago.", "warning", "#f7060d", getUrl('FormaPago', 'FormaPago', 'read'));
        }
    }
}
?>
