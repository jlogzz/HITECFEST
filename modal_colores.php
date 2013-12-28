<?php

	require 'config/config.php';
	require 'config/sesion.php';

	if(isset($_GET['id'])){
		$color = R::load('colores', $_GET['id']);
		echo '
				<div class="modal-dialog" id="edit-modal">
			    <div class="modal-content">
			      <div class="modal-header">
				    <button type="button" class="close" data-dismiss="modal">×</button>
				    <h2>Editar Color: '.$color->nombre.'</h2>
				  </div>
				<!-- The async form to send and replace the modals content with its response -->
			    <form class="form-horizontal well" data-async id="modal-form" data-target="#edit-modal" action="/editar_color.php" method="POST">
				  <div class="modal-body">
				    
				      <fieldset>
				        <div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">COLOR</span>
								<input type="text" class="form-control" name="color" id="color" 
								placeholder="COLOR" value="'.$color->nombre.'" required>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<input type="text" class="pick-a-color-'.$color->nombre.'" 
									value="'.$color->hex.'" name="hex" id="hex" required>
							</div>
						</div>
				      </fieldset>
				  </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			        <button type="submit" id="modal-submit" class="btn btn-primary">Guardar Cambios</button>
			      </div>
			    </form>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
		';
	}else{
		echo '
				<div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
			      </div>
			      <div class="modal-body">
			        Color no valido.
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary">Save changes</button>
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
		';
	}

?>