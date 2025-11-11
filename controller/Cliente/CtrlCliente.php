<?php
include_once '../DAO/Cliente/ClienteDAO.php';
class CtrlCliente extends ClienteDAO
{

    public function getOption()
    {
        $listCliente = ClienteDAO::getInstance()->getAll();
        foreach ($listCliente as $key => $row) {
            echo '<option value="' . $row['cli_nit'] . '">' . $row['cli_razon_social'] . '</option>';
        }
    }
}
