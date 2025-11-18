<?php
include_once '../DAO/FormaPago/FormaPagoDAO.php';

class CtrlFormaPago extends FormaPagoDAO
{
    public function read()
    {
        include_once '../view/FormaPago/ModalsFormaPago.php';
        include_once '../view/FormaPago/viewFormaPago.php';
        viewFormaPago::getRead();
    }

    public function data()
    {
        $list = $this->getAll();
        $array = [];

        foreach ($list as $key => $row) {
            $array['data'][$key]['fp_id'] = $row['fp_id'];
            $array['data'][$key]['fp_descripcion'] = $row['fp_descripcion'];
            $array['data'][$key]['fp_estado'] = $row['fp_estado'];

            $array['data'][$key]['buttons'] = '
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-edit fa-fw"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item btnShowEdit" href="#!" data-bs-toggle="modal" 
                                   data-bs-target="#modalEditFormaPago" 
                                   data-url="' . getUrl('FormaPago', 'FormaPago', 'getData', array('fp_id' => $row['fp_id']), 'ajax') . '">Editar</a></li>
                            <li><hr class="dropdown-divider" /></li>
                            <li><a class="dropdown-item btnDelete" href="#!" 
                                   data-url="' . getUrl('FormaPago', 'FormaPago', 'deleteFormaPago', array('fp_id' => $row['fp_id']), 'ajax') . '">Eliminar</a></li>
                        </ul>
                    </li>
                </ul>';
        }
        echo json_encode($array);
    }

    public function postNew()
    {
        $id = $_POST['idFP'];
        $desc = $_POST['descripcionFP'];
        $estado = $_POST['estadoFP'];

        $result = $this->add($id, $desc, $estado);

        if ($result == 1) {
            messageSweetAlert("OK", "Forma de pago creada correctamente.", "success", "#4CAF50", getUrl('FormaPago', 'FormaPago', 'read'));
        } else {
            messageSweetAlert("ERROR", "No se pudo crear la forma de pago.", "error", "#f7060d", getUrl('FormaPago', 'FormaPago', 'read'));
        }
    }

    public function getData()
    {
        $id = $_GET['fp_id'];
        $rs = $this->findById($id);

        $array['fp_id'] = $rs[0]['fp_id'];
        $array['fp_descripcion'] = $rs[0]['fp_descripcion'];
        $array['fp_estado'] = $rs[0]['fp_estado'];

        echo json_encode($array);
    }

    public function postUpdate()
    {
        $id = $_POST['idFPEdit'];
        $desc = $_POST['descripcionFPEdit'];
        $estado = $_POST['estadoFPEdit'];

        $result = $this->update($id, $desc, $estado);

        if ($result == 1) {
            messageSweetAlert("OK", "Forma de pago actualizada.", "success", "#4CAF50", getUrl('FormaPago', 'FormaPago', 'read'));
        } else {
            messageSweetAlert("ERROR", "Error actualizando.", "error", "#f7060d", getUrl('FormaPago', 'FormaPago', 'read'));
        }
    }

    public function deleteFormaPago()
    {
        $id = $_GET['fp_id'];
        $result = $this->delete($id);

        echo json_encode(['status' => $result == 1 ? 'success' : 'error']);
    }
}
?>
