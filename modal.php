<?php

$id_empresa = $_GET['id_empresa'];

?>
<div class="modal fade" id="delete_modal_<?php echo $id_empresa;?>" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
  <div class="modal-content">
   
    <div class="modal-body">
      <p>Está seguro de que quiere borrar esta empresa de id <?php echo $id_empresa;?> ? </p>
    </div>
    <div class="modal-footer">
      <button type="button" onclick="borrar_empresa(<?php echo $id_empresa;?>);" class="btn btn-primary">Borrar empresa</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    </div>
  </div>
</div>
</div>