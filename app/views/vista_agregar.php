
<div id="cuerpo">
<form action="" method="post">

	Descripción <input type="text" name="descripcion" 
	value="<?php if(isset($_POST['descripcion'])){echo $_POST['descripcion'];}?>" />
	   <?=Valor($errores,'descripcion')?><br><br>
	   
	Persona de Contacto <input type="text" name="nombre" size='25'
	value="<?php if(isset($_POST['nombre'])){echo $_POST['nombre'];}?>" />
	 <?=Valor($errores,'nombre')?><br><br>
	
	Teléfono<input type="text" name="telefono"
	value="<?php if(isset($_POST['telefono'])){echo $_POST['telefono'];}?>" />
	 <?=Valor($errores,'telefono')?><br><br>
	
	Correo Electrónico <input type="text" size="20" name="correo"
	value="<?php if(isset($_POST['correo'])){echo $_POST['correo'];}?>" />
	<?=Valor($errores,'correo')?><br><br>
	
	Dirección <input type="text" size="30" name="direccion"
	value="<?php if(isset($_POST['direccion'])){echo $_POST['direccion'];}?>" />
	 <?=Valor($errores,'direccion')?><br><br>
	
	Población <input type="text" name="poblacion"
	value="<?php if(isset($_POST['poblacion'])){echo $_POST['poblacion'];}?>" />
	 <?=Valor($errores,'poblacion')?><br><br>
	
	Código Postal <input type="text" size="5" maxlength="5" name="codigo_postal"
	value="<?php if(isset($_POST['codigo_postal'])){echo $_POST['codigo_postal'];}?>" />
	 <?=Valor($errores,'codigo_postal')?><br><br>
	<!--crea select  -->
	 
	Provincias <?=CreaSelect('provincia', $lista_provincias, ValPost('provincia'))?><br>

	
	
	<p>Estado de la tarea:     
	      Pendiente<input type="radio" name="estado" value="Pendiente" checked="checked"/>
	      Realizada<input type="radio" name="estado" value="Realizada"/>
	      Cancelada<input type="radio" name="estado" value="Cancelada"/></p>
	      <?=Valor($errores,'estado')?>
	      
	Operario encargado <input type="text" name="operario" size='25'
	value="<?php if(isset($_POST['operario'])){echo $_POST['operario'];}?>" />
	<?=Valor($errores,'operario')?><br><br>
	
	Fecha de Realización <input type="date" name="fechar"
	value="<?php if(isset($_POST['fechar'])){echo $_POST['fechar'];}?>" />
	<?=Valor($errores,'fechar')?><br><br>
	
	Anotaciones Anteriores<textarea style="resize:none;" rows="3" cols="50" maxlength="50" name="anotacionesa"><?php if(isset($_POST['anotacionesa'])){echo $_POST['anotacionesa'];}?></textarea>
	<?=Valor($errores,'anotacionesa')?><br><br>
	

	Anotaciones Posteriores<textarea style="resize:none;" rows="3" cols="50" maxlength="50" name="anotacionesp"><?php if(isset($_POST['anotacionesp'])){echo $_POST['anotacionesp'];}?></textarea>
	<?=Valor($errores,'anotacionesp')?><br><br>

	
	<input type="submit" name="guardar" value="Guardar" >
	
<!-- placeolder? -->
</form>
</div>