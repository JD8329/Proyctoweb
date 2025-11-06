<?php

require_once '../../DAO/Pago/PagoDAO.php';
require_once '../../lib/helpers.php'; 
class CtrlPago 
{
    
    public function index() 
    {
        
        include_once '../controller/Concepto/CtrlConcepto.php';
        
     
        include_once '../view/Pago/ModalsPago.php';
        include_once '../view/Pago/viewPago.php';
        viewPago::getRead(); 
    }

    public function data()
    {
        $listPago = []; 
        $array = ['data' => []];
        
   
        $listPago = PagoDAO::getInstance()->getAll(); 

        if ($listPago) {
            foreach ($listPago as $key => $rowPago) { 

             
                $array['data'][$key]['idPago'] = $rowPago['id']; 
                $array['data'][$key]['valor'] = $rowPago['valor']; 
                $array['data'][$key]['nomConcepto'] = $rowPago['nomConcepto']; 
                $array['data'][$key]['fecha'] = $rowPago['fecha']; 
                
                // Botones adaptados a Pago
                $array['data'][$key]['buttons']  = '<ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarPago" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-edit fa-fw"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarPago">
                            <li>
                                <a class="dropdown-item btnShowEdit" href="#!" data-bs-toggle="modal" 
                                    data-bs-target="#modalEditPago" 
                                    data-url="' . getUrl('Pago', 'Pago', 'getData', array('id' => $rowPago['id']), 'ajax') . '" role="button">
                                    Editar
                                </a>
                            </li>
                            <li><hr class="dropdown-divider" /></li>
                            <li><a class="dropdown-item" href="#!">Eliminar</a></li>                                 
                        </ul>
                    </li>
                </ul>';
            }
        }
        header('Content-Type: application/json');
        echo json_encode($array);
    } 

    public function postNew()
    {
       
        $id = $_POST['idPago'];
        $valor = $_POST['valorPago'];
        $idConcepto = $_POST['idConcepto']; 
        $fecha = $_POST['fechaPago']; 
       
        $rs = PagoDAO::getInstance()->add($id, $valor, $idConcepto, $fecha);

        if ($rs == 1) {
           
            messageSweetAlert("¡Éxito!", "Pago registrado correctamente.", "success", "#4CAF50", getUrl('Pago', 'Pago', 'index'));
        } else {
            messageSweetAlert("Advertencia!", "No fue posible registrar el pago.", "warning", "#f7060d", getUrl('Pago', 'Pago', 'index'));
        }
    }
    
    public function getData(){
        $id = $_GET['id']; 
        $array = [];
        
        $rs = PagoDAO::getInstance()->findById($id);
        
        
        if ($rs) {
            foreach($rs as $key => $rowPago){     
                
                $array['id'] = $rowPago['id']; 
                $array['valor'] = $rowPago['valor']; 
                $array['idConcepto'] = $rowPago['idConcepto']; 
                $array['fecha'] = $rowPago['fecha']; 
                
                break; 
            } 
        }      
        header('Content-Type: application/json');
        echo json_encode($array);
    }
}