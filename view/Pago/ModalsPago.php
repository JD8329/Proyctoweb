<?php 

include_once '../../controller/Concepto/CtrlConcepto.php'; 

class ModalsPago
{
    public static function modalCreate()
    {
?>
    <div class="modal fade" tabindex="-1" id="modalCreatePago">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Registrar Pago</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form name="frmCreatePago" action="<?php echo getUrl('Pago', 'Pago', 'postNew'); ?>" method="post">

                    <div class="mb-3">
                        <label for="idPago" class="form-label">Código Pago</label><br>
                        <input type="number" name="idPago" id="idPago" class="form-control" required><br>
                    </div>
                    <div class="mb-3">
                        <label for="valorPago" class="form-label">Valor</label><br>
                        <input type="number" step="0.01" name="valorPago" id="valorPago" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="idConcepto" class="form-label">Concepto</label><br>
                        <select name="idConcepto" id="idConcepto" class="form-control" required>
                            <option value="">--Seleccione Concepto--</option>
                            <?php
                            // Se llama al controlador de Concepto
                            // Se asume que el método se llama getConceptoOptions() o getOption()
                            $ctrlConcep = new CtrlConcepto();
                            // El controlador DEBE tener un método que imprima los <option>
                            $ctrlConcep->getConceptoOptions(); 
                            ?>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="fechaPago" class="form-label">Fecha Pago</label><br>
                        <input type="date" name="fechaPago" id="fechaPago" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php
    }
    
    public static function modalEdit()
    {
?>
    <div class="modal fade" tabindex="-1" id="modalEditPago">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Pago</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form name="frmUpdatePago" action="<?php echo getUrl('Pago', 'Pago', 'postUpdate');?>" method="post">
                        <div class="mb-3">
                            <label for="idPagoEdit" class="form-label">Código Pago</label><br>
                            <input type="number" name="idPagoEdit" id="idPagoEdit" class="form-control" required readonly><br>
                        </div>
                        <div class="mb-3">
                            <label for="valorPagoEdit" class="form-label">Valor</label><br>
                            <input type="number" step="0.01" name="valorPagoEdit" id="valorPagoEdit" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="idConceptoEdit" class="form-label">Concepto</label><br>
                            <select name="idConceptoEdit" id="idConceptoEdit" class="form-control" required>
                                <option value="">--Seleccione Concepto--</option>
                                <?php
                                // Reutilizamos la misma llamada para cargar las opciones
                                $ctrlConcep = new CtrlConcepto();
                                $ctrlConcep->getConceptoOptions();
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="fechaPagoEdit" class="form-label">Fecha Pago</label><br>
                            <input type="date" name="fechaPagoEdit" id="fechaPagoEdit" class="form-control" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php
    }

}