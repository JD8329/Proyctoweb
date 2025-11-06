<?php 
class viewConcepto 
{
    public static function getRead() 
    {
?>
        <div class="container-flui px-4">
            <h1 class="mt-4">Concepto</h1> <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Listar</li>
            </ol>
            <div class="row">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreateConcepto">CREAR</button> </div>
            <div class="row">
                <table id="dt_concepto" class="table table-bordered table-hover"> <thead>
                        <tr>
                            <th>CÓDIGO</th>
                            <th>DESCRIPCIÓN</th> 
                            <th>TIPO</th>        
                            <th>ESTADO</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    
<?php
   
    ModalsConcepto::modalCreate();
    ModalsConcepto::modalEdit();
    }
}
?>
<script type="text/javascript" src="../view/Concepto/Concepto.js"></script>