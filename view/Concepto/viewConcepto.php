<?php
class viewConcepto
{
    public static function getRead()
    {
?>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Concepto</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Listar</li>
            </ol>
            <div class="row mb-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreateConcepto">CREAR</button>
            </div>
            <div class="row">
                <table id="dt_concepto" class="table table-bordered table-hover">
                    <thead>
                        <style>
/* Fondo general oscuro */
body {
  background-color: #121212 !important;
  color: #f5f5f5 !important;
}

/* Títulos */
h1, h2, h3, h4, h5 {
  color: #ffffff !important;
}

/* Tabla y contenido */
.table, .dataTables_wrapper {
  background-color: #1e1e1e !important;
  color: #eaeaea !important;
}

/* Encabezados */
table.dataTable thead th {
  background-color: #202020 !important;
  color: #ffffff !important;
  border-bottom: 2px solid #ff0000 !important;
  text-align: center;
}

/* Filas de la tabla */
table.dataTable tbody tr {
  background-color: #1e1e1e !important;
  color: #eaeaea !important;
  transition: background-color 0.2s ease;
}

/* Hover visible */
table.dataTable tbody tr:hover {
  background-color: #333333 !important;
  color: #ffffff !important;
}

/* Celdas */
table.dataTable td {
  color: #eaeaea !important;
  border-color: #333 !important;
}

/* Botón CREAR (rojo principal) */
.btn-primary {
  background-color: #e50914 !important;
  border: none !important;
  color: #ffffff !important;
  font-weight: bold !important;
  box-shadow: 0 2px 6px rgba(229, 9, 20, 0.5);
  transition: background-color 0.3s ease, transform 0.2s ease;
}

.btn-primary:hover {
  background-color: #b0060f !important;
  transform: scale(1.05);
}

/* Dropdown y botones de acción */
.nav-link.dropdown-toggle,
.dropdown-item,
.btn,
.btn-sm {
  color: #ffffff !important;
  background-color: #2a2a2a !important;
  border: none !important;
}

.nav-link.dropdown-toggle:hover,
.dropdown-item:hover,
.btn:hover {
  background-color: #ff0000 !important;
  color: #fff !important;
}

/* Dropdown menú */
.dropdown-menu {
  background-color: #2a2a2a !important;
  border: 1px solid #444 !important;
}

.dropdown-item {
  color: #f1f1f1 !important;
}

.dropdown-item:hover {
  background-color: #ff0000 !important;
  color: #fff !important;
}

/* Campo de búsqueda */
.dataTables_filter input {
  background-color: #222 !important;
  color: #fff !important;
  border: 1px solid #555 !important;
}

.dataTables_filter label {
  color: #fff !important;
}

/* Paginación */
.dataTables_paginate .paginate_button {
  background-color: #222 !important;
  color: #fff !important;
  border: none !important;
}

.dataTables_paginate .paginate_button:hover {
  background-color: #ff0000 !important;
  color: #fff !important;
}

.dataTables_paginate .paginate_button.current {
  background-color: #e50914 !important;
  color: #fff !important;
}

/* Scrollbar oscuro */
::-webkit-scrollbar {
  width: 10px;
}

::-webkit-scrollbar-thumb {
  background: #444;
  border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
  background: #ff0000;
}
</style>
<style>
/* === MODALES EN MODO OSCURO === */
.modal-content {
  background-color: #1c1c1c !important;
  color: #f5f5f5 !important;
  border: 1px solid #333 !important;
  border-radius: 10px;
  box-shadow: 0 0 20px rgba(229, 9, 20, 0.4);
}

.modal-header {
  background-color: #202020 !important;
  color: #ffffff !important;
  border-bottom: 1px solid #ff0000 !important;
}

.modal-title {
  color: #ff3b3b !important;
  font-weight: bold;
}

.modal-body {
  background-color: #1e1e1e !important;
  color: #eaeaea !important;
}

.modal-footer {
  background-color: #202020 !important;
  border-top: 1px solid #333 !important;
}

/* Inputs */
.modal-body input,
.modal-body select,
.modal-body textarea {
  background-color: #2a2a2a !important;
  color: #fff !important;
  border: 1px solid #555 !important;
  border-radius: 6px;
}

.modal-body input:focus,
.modal-body select:focus,
.modal-body textarea:focus {
  border-color: #ff0000 !important;
  box-shadow: 0 0 5px rgba(255, 0, 0, 0.5);
  outline: none;
}

/* Botones dentro del modal */
.modal-footer .btn-secondary {
  background-color: #444 !important;
  border: none !important;
  color: #fff !important;
}

.modal-footer .btn-secondary:hover {
  background-color: #666 !important;
}

.modal-footer .btn-primary {
  background-color: #e50914 !important;
  border: none !important;
  color: #fff !important;
  font-weight: bold !important;
  transition: background-color 0.3s ease, transform 0.2s ease;
}

.modal-footer .btn-primary:hover {
  background-color: #b0060f !important;
  transform: scale(1.05);
}
<style>
/* === SWEETALERT EN MODO OSCURO === */
.swal2-popup {
  background-color: #1e1e1e !important;
  color: #f5f5f5 !important;
  border: 1px solid #ff0000 !important;
  border-radius: 12px !important;
  box-shadow: 0 0 25px rgba(229, 9, 20, 0.3) !important;
}

.swal2-title {
  color: #ff3b3b !important;
  font-weight: bold !important;
  text-shadow: 0 0 5px rgba(255, 0, 0, 0.4);
}

.swal2-html-container {
  color: #e0e0e0 !important;
  font-size: 16px !important;
}

.swal2-confirm {
  background-color: #e50914 !important;
  border: none !important;
  color: #fff !important;
  border-radius: 6px !important;
  padding: 10px 25px !important;
  font-weight: bold !important;
  transition: background-color 0.3s ease, transform 0.2s ease;
}

.swal2-confirm:hover {
  background-color: #b0060f !important;
  transform: scale(1.05);
}

.swal2-cancel {
  background-color: #444 !important;
  color: #fff !important;
  border: none !important;
  border-radius: 6px !important;
  padding: 10px 25px !important;
}

.swal2-cancel:hover {
  background-color: #666 !important;
}

.swal2-icon.swal2-success {
  border-color: #00ff7f !important;
  color: #00ff7f !important;
}

.swal2-icon.swal2-error {
  border-color: #e50914 !important;
  color: #e50914 !important;
}
</style>


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
        </div>
<?php
        ModalsConcepto::modalCreate();
        ModalsConcepto::modalEdit();
    }
}
?>
<script src="../view/Concepto/Concepto.js"></script>
