<?php
class ModalsConcepto 
{
    public static function modalCreate()
    {
?>
        <div class="modal" tabindex="-1" id="modalCreateConcepto"> <div class="modal-dialog modal-xs">
                <div class="modal-content">
                    <div class="modal-header">

                        <h5 class="modal-tittle">Registro de Concepto</h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>
                    <div class="modal-body">
                        <form name="frmCreateConcepto" action="<?php echo getUrl('Concepto', 'Concepto', 'postNew'); ?>" method="post">
                            <div class="mb-3">
                                <label for="codigo" class="from-label">Código</label><br>
                                <input type="number" name="idConcepto" id="idConcepto" class="form-control" required> <br> </div>
                            <div class="mb-3">
                                <label for="tipo" class="from-label">Tipo</label><br>
                                <input type="text" name="tipoConcepto" id="tipoConcepto" class="form-control" required> </div>
                            <div class="mb-3">
                                <label for="estado" class="form-label">Estado</label><br>
                                <input type="text" name="estadoConcepto" id="estadoConcepto" class="form-control" required> </div>
                        
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
        <div class="modal" tabindex="-1" id="modalEditConcepto"> <div class="modal-dialog modal-xs">
                <div class="modal-content">
                    <div class="modal-header">

                    <h5 class="modal-title">Editar Concepto</h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>
                    <div class="modal-body">
                        <form name="frmUpdateConcepto" action="<?php echo getUrl('Concepto', 'Concepto', 'postUpdate'); ?>" method="post">
                            <div class="mb-3">
                                <label for="codigo" class="from-label">Código</label><br>
                                <input type="number" name="idConceptoEdit" id="idConceptoEdit" class="form-control" required> <br> </div>
                            <div class="mb-3">
                                <label for="descripcion" class="from-label">Descripción</label><br>
                                <input type="text" name="descripcionConceptoEdit" id="descripcionConceptoEdit" class="form-control" required> </div>
                            <div class="mb-3">
                                <label for="tipo" class="from-label">Tipo</label><br>
                                <input type="text" name="tipoConceptoEdit" id="tipoConceptoEdit" class="form-control" required> </div>
                            <div class="mb-3">
                                <label for="estado" class="form-label">Estado</label><br>
                                <input type="text" name="estadoConceptoEdit" id="estadoConceptoEdit" class="form-control" required> </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button> </div>
                    </form>
                </div>

            </div>
        </div>
    <?php
    }
}