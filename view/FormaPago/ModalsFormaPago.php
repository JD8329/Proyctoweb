<?php
class ModalsFormaPago
{
    public static function modalCreate() { ?>
        <div class="modal fade" id="modalCreateFormaPago">
            <div class="modal-dialog modal-xs">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Registrar Forma de Pago</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <form action="<?php echo getUrl('FormaPago', 'FormaPago', 'postNew'); ?>" method="post">
                            
                            <label>Código</label>
                            <input type="number" name="idFP" class="form-control mb-2">

                            <label>Descripción</label>
                            <input type="text" name="descripcionFP" class="form-control mb-2">

                            <label>Estado</label>
                            <input type="text" name="estadoFP" class="form-control mb-2">

                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button class="btn btn-primary">Registrar</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
<?php }

    public static function modalEdit() { ?>
        <div class="modal fade" id="modalEditFormaPago">
            <div class="modal-dialog modal-xs">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Editar Forma de Pago</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <form action="<?php echo getUrl('FormaPago', 'FormaPago', 'postUpdate'); ?>" method="post">

                            <label>Código</label>
                            <input type="number" id="idFPEdit" name="idFPEdit" readonly class="form-control mb-2">

                            <label>Descripción</label>
                            <input type="text" id="descripcionFPEdit" name="descripcionFPEdit" class="form-control mb-2">

                            <label>Estado</label>
                            <input type="text" id="estadoFPEdit" name="estadoFPEdit" class="form-control mb-2">

                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button class="btn btn-primary">Guardar Cambios</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
<?php }
}
?>
