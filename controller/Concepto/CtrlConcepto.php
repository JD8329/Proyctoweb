<?php
include_once '../DAO/Concepto/ConceptoDAO.php';
class CtrlConcepto extends ConceptoDAO
{
    public function read()
    {
        include_once '../view/Concepto/ModalsConcepto.php';
        include_once '../view/Concepto/viewConcepto.php';
        viewConcepto::getRead();
    }

    public function data()
    {
        $listConcepto = [];
        $array = [];
        $listConcepto = $this->getAll();

        foreach ($listConcepto as $key => $rowConcepto) {
            $array['data'][$key]['con_id'] = $rowConcepto['con_id'];
            $array['data'][$key]['con_descripcion'] = $rowConcepto['con_descripcion'];
            $array['data'][$key]['con_estado'] = $rowConcepto['con_estado'];
            $array['data'][$key]['buttons'] = '<ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarCiudad" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-edit fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarConcepto">
                        <li><a class="dropdown-item btnShowEdit" href="#!" data-bs-toggle="modal" data-bs-target="#modalEditConcepto" data-url="' . getUrl('Concepto', 'Concepto', 'getData', array('con_id' => $rowConcepto['con_id']), 'ajax') . '" role="button">Editar</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Eliminar</a></li>
                    </ul>
                </li>
            </ul>';
        }
        echo json_encode($array);
    }

    public function postNew()
    {
        $id = $_POST['idConcepto'] ?? null;
        $descripcion = $_POST['descripcionConcepto'] ?? null;
        $estado = $_POST['estadoConcepto'] ?? null;

        if (empty($id) || empty($descripcion) || empty($estado)) {
            messageSweetAlert("Error", "Faltan datos para registrar el concepto.", "error", "#f7060d", getUrl('Concepto', 'Concepto', 'read'));
            return;
        }

        $rs = $this->add($id, $descripcion, $estado);

        if ($rs == 1) {
            messageSweetAlert("¡Éxito!", "Concepto creado correctamente.", "success", "#4CAF50", getUrl('Concepto', 'Concepto', 'read'));
        } else {
            messageSweetAlert("Advertencia!", "No fue posible crear el concepto.", "warning", "#f7060d", getUrl('Concepto', 'Concepto', 'read'));
        }
    }

    public function getData()
    {
        $id = $_GET['con_id'];
        $array = [];

        $rs = ConceptoDAO::getInstance()->findById($id);

        foreach ($rs as $key => $rowConcepto) {
            $array['id'] = $rowConcepto['con_id'];
            $array['descripcion'] = $rowConcepto['con_descripcion'];
            $array['estado'] = $rowConcepto['con_estado'];
        }

        echo json_encode($array);
    }

    // 👇 NUEVA FUNCIÓN PARA EDITAR UN CONCEPTO
    public function postUpdate()
    {
        $id = $_POST['idConceptoEdit'];
        $descripcion = $_POST['descripcionConceptoEdit'];
        $estado = $_POST['estadoConceptoEdit'];

        $rs = $this->update($id, $descripcion, $estado);

        if ($rs == 1) {
            messageSweetAlert("¡Éxito!", "Concepto actualizado correctamente.", "success", "#4CAF50", getUrl('Concepto', 'Concepto', 'read'));
        } else {
            messageSweetAlert("Error", "No fue posible actualizar el concepto.", "error", "#f7060d", getUrl('Concepto', 'Concepto', 'read'));
        }
    }
}
