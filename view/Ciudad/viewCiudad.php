<?php class viewCiudad
{
    public static function getRead()
    {
?>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Ciudad</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Listar</li>
            </ol>
            <div class="row">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreateCiudad">CREAR</button>
            </div>
            <div class="row">
                <table id="dt_ciudad" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>CODIGO</th>
                            <th>CIUDAD</th>
                            <th>DEPARTAMENTO</th>
                            <th>HABITANTES</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
        
<?php
    ModalsCiudad::modalCreate();
    ModalsCiudad::modalEdit();

    }

}
?>
<script type="text/javascript" src="../View/Ciudad/ciudad.js"></script>
