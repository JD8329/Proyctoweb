<?php
class ModalsDepartamento
{
    public static function modalCreate()
    {
?>
        <div class="modal" tabindex="-1" id="modalCreateDepto">
            <div class="modal-dialog modal-xs">
                <div class="modal-content">
                    <div class="modal-header">

                        <h5 class="modal-title">Registro Departamento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form name="frmCreateDepto" action="<?php echo getUrl('Departamento', 'Departamento', 'postNew'); ?>" method="post">

                            <div class="mb-3">
                                <label for="codigo" class="from-label">codigo</label><br>
                                <input type="number" name="idDepto" id="idDepto" class="form-control" require><br>
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="from-label">nombre</label><br>
                                <input type="text" name="nameDepto" id="nameDepto" class="form-control" require>
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
        <div class="modal" tabindex="-1" id="modalEditDepto">
            <div class="modal-dialog modal-xs">
                <div class="modal-content">
                    <div class="modal-header">

                        <h5 class="modal-title">Editar Departamento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form name="frmUpdateDepto" action="<?php echo getUrl('Departamento', 'Departamento', 'postUpdate'); ?>" method="post">

                            <div class="mb-3">
                                <label for="codigo" class="from-label">codigo</label><br>
                                <input type="number" name="idDeptoEdit" id="idDeptoEdit" class="form-control" require readonly><br>
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="from-label">nombre</label><br>
                                <input type="text" name="nameDeptoEdit" id="nameDeptoEdit" class="form-control" require>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
<?php
    }
}
