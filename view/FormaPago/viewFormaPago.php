<?php
class viewFormaPago
{
    public static function getRead()
    { ?>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Forma de Pago</h1>

            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalCreateFormaPago">
                CREAR
            </button>

            <table id="dt_formapago" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>CÓDIGO</th>
                        <th>DESCRIPCIÓN</th>
                        <th>ESTADO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

<?php
        ModalsFormaPago::modalCreate();
        ModalsFormaPago::modalEdit();
    }
}
?>

<script src="../view/FormaPago/FormaPago.js"></script>
