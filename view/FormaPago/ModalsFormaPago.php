<?php
class ModalsFormaPago 
{
    public static function modalCreate()
    {
?>
        <div class="modal" tabindex="-1" id="modalCreateFormaPago">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Registrar Forma de Pago</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form name="frmCreateFormaPago" action="<?php echo getUrl('FormaPago', 'FormaPago', 'postNew'); ?>" method="post">
                            <div class="mb-3">
                                <label for="idFormaPago" class="form-label">Código</label>
                                <input type="number" name="idFormaPago" id="idFormaPago" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="metodoFormaPago" class="form-label">Método</label>
                                <select name="metodoFormaPago" id="metodoFormaPago" class="form-select" required>
                                    <option value="">Seleccione...</option>
                                    <option value="Nequi">Nequi</option>
                                    <option value="Bancolombia">Bancolombia</option>
                                    <option value="Davivienda">Davivienda</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="valorFormaPago" class="form-label">Valor</label>
                                <input type="number" step="0.01" name="valorFormaPago" id="valorFormaPago" class="form-control" required>
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
}
?>
