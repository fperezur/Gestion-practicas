<?php

$id_alumno = $_GET['id_alumno'];

?>
<div class="modal fade" id="delete_modal_<?php echo $id_alumno;?>" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
  <div class="modal-content">
   
    <div class="modal-body">
      <p>Está seguro de que quiere borrar esta alumno de id <?php echo $id_alumno;?> ? </p>
    </div>
    <div class="modal-footer">
      <button type="button" onclick="borrar_alumno(<?php echo $id_alumno;?>);" class="btn btn-primary">Borrar alumno</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    </div>
  </div>
</div>
</div>