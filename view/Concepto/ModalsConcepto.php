<?php
class ModalsConcepto
{
    public static function modalCreate()
    {
?>
        <div class="modal fade" id="modalCreateConcepto" tabindex="-1">
            <div class="modal-dialog modal-xs">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Registro de Concepto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form name="frmCreateConcepto" action="<?php echo getUrl('Concepto', 'Concepto', 'postNew'); ?>" method="post">
                            <div class="mb-3">
                                <label class="form-label">Código</label>
                                <input type="number" name="idConcepto" id="idConcepto" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descripción</label>
                                <input type="text" name="descripcionConcepto" id="descripcionConcepto" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Estado</label>
                                <input type="text" name="estadoConcepto" id="estadoConcepto" class="form-control" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php
    }

    public static function modalEdit()
    {
?>
        <div class="modal fade" id="modalEditConcepto" tabindex="-1">
            <div class="modal-dialog modal-xs">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Concepto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form name="frmUpdateConcepto" action="<?php echo getUrl('Concepto', 'Concepto', 'postUpdate'); ?>" method="post">
                            <div class="mb-3">
                                <label class="form-label">Código</label>
                                <input type="number" name="idConceptoEdit" id="idConceptoEdit" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descripción</label>
                                <input type="text" name="descripcionConceptoEdit" id="descripcionConceptoEdit" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Estado</label>
                                <input type="text" name="estadoConceptoEdit" id="estadoConceptoEdit" class="form-control" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
?>
