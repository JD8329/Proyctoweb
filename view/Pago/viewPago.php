<?php 

require_once 'ModalsPago.php'; 

class viewPago 
{
    public static function getRead()
    {
?>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Gestión de Pagos</h1> 
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Listar Pagos</li>
            </ol>
            
            <div class="row">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreatePago">CREAR</button>
            </div>
            
            <div class="row">
                <table id="dt_pago" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>CÓDIGO PAGO</th>
                            <th>VALOR</th> 
                            <th>CONCEPTO</th> <th>FECHA PAGO</th> <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
        
<?php
   
    ModalsPago::modalCreate();
    ModalsPago::modalEdit();

    }

}
?>
<script type="text/javascript" src="../View/Pago/pago.js"></script>