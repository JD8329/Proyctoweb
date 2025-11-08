<?php 
class viewFormaPago 
{
    public static function getRead() 
    {
?>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Forma de Pago</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Registrar</li>
            </ol>
            <div class="row mb-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreateFormaPago">Registrar Forma de Pago</button>
            </div>
            <div class="row">
                <table id="dt_forma_pago" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Método</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

<?php
    ModalsFormaPago::modalCreate();
    }
}
?>
<script type="text/javascript" src="../view/FormaPago/FormaPago.js"></script>
