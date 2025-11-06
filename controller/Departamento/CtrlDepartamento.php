<?php
include_once '../DAO/Departamento/DepartamentoDAO.php';
class   CtrlDepartamento extends DepartamentoDAO
{

    public function read()
    {
        include_once '../view/Departamento/Modalsdepartamento.php';
        include_once '../view/Departamento/viewDepartamento.php';
        viewDepartamento::getRead();
    }

    public function data()
    {
        $listDepto = [];
        $array = [];
        $listDepto = $this->getAll();
        foreach ($listDepto as $key => $rowDepto) {
            $array['data'][$key]['idDepartamento'] = $rowDepto['id'];
            $array['data'][$key]['nomDepartamento'] = $rowDepto['nombre'];
            $array['data'][$key]['buttons']  = '<ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDepto" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-edit fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDepto">
                        <li><a class="dropdown-item btnShowEdit" href="#!" data-bs-toggle="modal" data-bs-target="#modalEditDepto" data-url="' . getUrl('Departamento', 'Departamento', 'getData', array('idDepto' => $rowDepto['id']), 'ajax') . '" role="button">Editar</a></li>
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
        $id = $_POST['idDepto'];
        $name = $_POST['nameDepto'];

        $rs = DepartamentoDAO::getInstance()->add($id, $name);

        if ($rs == 1) {
            // Redirecciona con mensaje de éxito
            messageSweetAlert("¡Éxito!", "Departamento creado correctamente.", "success", "#4CAF50", getUrl('Departamento', 'Departamento', 'read'));
        } else {
            // Redirecciona con mensaje de error
            messageSweetAlert("Advertencia!", "No fue posible crear el departamento", "warning", "#f7060d", getUrl('Departamento', 'Departamento', 'read'));
        }
    }
    public function getOption()
    {
        $listDepto = $this->getAll();
        $options = "";
        foreach ($listDepto as $rowDepto) {
            echo $options = '<option value="' . $rowDepto['id'] . '">' . $rowDepto['nombre'] . '</option>';
        }
        
    }
}