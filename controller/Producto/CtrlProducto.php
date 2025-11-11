<?php
include_once '../DAO/Producto/ProductoDAO.php';
class CtrlProducto extends ProductoDAO
{

    public function getOption()
    {
        $listCliente = ProductoDAO::getInstance()->getAll();
        foreach ($listCliente as $key => $row) {
            echo '<option value="' . $row['pro_id'] . '" data-precio="' . $row['pro_precio'] . '">' . $row['pro_nombre'] . '</option>';
        }
    }
}
