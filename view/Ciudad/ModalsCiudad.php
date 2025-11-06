<?php   
class ModalsCiudad
{
    public static function modalCreate()
    {
?>
    <div class="modal" tabindex="-1" id="modalCreateCiudad">
        <div class="modal-dialog modal-xs">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title">Registro Ciudad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form name="frmCreateCiudad" action="<?php echo getUrl('Ciudad', 'Ciudad', 'postNew'); ?>" method="post">

                    <div class="mb-3">
                        <label for="codigo" class="from-laberl">codigo</label><br>
                        <input type="number" name="idCiudad" id="idCiudad" class="form-control" require><br>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="from-label">nombre</label><br>
                        <input type="text" name="nameCiudad" id="nameCiudad" class="form-control" require>               
                    </div>
                    <div class="mb-3">
                        <label for="codigo" class="from-label">Departamento</label><br>
                        <select name="idDepto" id="idDepto" class="form-control" require>
                            <option value="">--Seleccione--</option>
                            <?php
                            
                            $ctrlDepto = new CtrlDepartamento();
                            $ctrlDepto->getOption();
                            ?>
                        </select>
                    </div>
                   
                    <div class="mb-3">
                        <label for="habitantes" class="from-label">habitantes</label><br>
                        <input type="text" name="habitantes" id="habitantes" class="form-control" require>
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
    <div class="modal" tabindex="-1" id="modalEditCiudad">
        <div class="modal-dialog modal-xs">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title">Editar Ciudad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                
                </div>
                <div class="modal-body">
                    <form name="frmUpdateCiudad" action="<?php echo getUrl('Ciudad', 'Ciudad', 'postUpdate');?>" method="post">
                        <div class="mb-3">
                            <label for="codigo" class="from-label">codigo</label><br>
                            <input type="number" name="idCiudadEdit" id="idCiudadEdit" class="form-control" require readonly><br>                        
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="from-label">nombre</label><br>
                            <input type="text" name="nameCiudadEdit" id="nameCiudadEdit" class="form-control" require>
                        </div>
                        <div class="mb-3">
                            <label for="codigo" class="from-label">codigo</label><br>
                            <input type="number" name="idDeptoEdit" id="idDeptoEdit" class="form-control" require><br>
                        </div>
                        <div class="mb-3">
                            <label for="habitantes" class="from-label">habitantes</label><br>
                            <input type="text" name="habitantesEdit" id="habitantesEdit" class="form-control" require>
                        
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
