<div id="cuerpo2">
<?php 
	if(isset($_POST['descripcion']))
		$datos = $_POST;
	?>
<form action="" method="post">

	Descripción <input type="text" name="descripcion" 
	value="<?php if(isset($datos['descripcion'])){echo $datos['descripcion'];}?>" />
	 <?php if(isset($errores)) echo Valor($errores,'descripcion');?><br><br>
	   
	Persona de Contacto <input type="text" name="nombre" 
	value="<?php if(isset($datos['nombre'])){echo $datos['nombre'];}?>" />
	 <?php if(isset($errores)) echo Valor($errores,'nombre')?><br><br>
	
	Teléfono<input type="text" name="telefono"
	value="<?php if(isset($datos['telefono'])){echo $datos['telefono'];}?>" />
	 <?php if(isset($errores)) echo Valor($errores,'telefono')?><br><br>
	
	Correo Electrónico <input type="text" size="20" name="correo"
	value="<?php if(isset($datos['correo'])){echo $datos['correo'];}?>" />
	<?php if(isset($errores)) echo Valor($errores,'correo')?><br><br>
	
	Dirección <input type="text" size="30" name="direccion"
	value="<?php if(isset($datos['direccion'])){echo $datos['direccion'];}?>" />
	<?php if(isset($errores)) echo Valor($errores,'direccion')?><br><br>
	
	Población <input type="text" name="poblacion"
	value="<?php if(isset($datos['poblacion'])){echo $datos['poblacion'];}?>" />
	 <?php if(isset($errores)) echo Valor($errores,'poblacion')?><br><br>
	
	Código Postal <input type="text" size="5" maxlength="5" name="codigo_postal"
	value="<?php if(isset($datos['codigo_postal'])){echo $datos['codigo_postal'];}?>" />
	 <?php if(isset($errores)) echo Valor($errores,'codigo_postal')?><br><br>
	<!--crea select  -->
	 
	Provincias <?=CreaSelect('provincia', $lista_provincias, $datos['provincia'])?><br>
	
	<p>Estado de la tarea:     
	      Pendiente<input type="radio" name="estado" value="Pendiente" checked="checked"/>
	      Realizada<input type="radio" name="estado" value="Realizada"/>
	      Cancelada<input type="radio" name="estado" value="Cancelada"/></p>
	      
	Operario encargado <input type="text" name="operario"
	value="<?php if(isset($datos['operario'])){echo $datos['operario'];}?>" />
	<?php if(isset($errores)) echo Valor($errores,'operario')?><br><br>
	
	Fecha de Realización <input type="date" name="fechar"
	value="<?php if(isset($datos['fechar'])){echo $datos['fechar'];}?>" />
	<?php if(isset($errores)) echo Valor($errores,'fechar')?><br><br>
	
	Anotaciones Anteriores<textarea style="resize:none;" rows="3" cols="50" maxlength="50" name="anotacionesa"><?php if(isset($datos['anotacionesa'])){echo $datos['anotacionesa'];}?></textarea>
	<?php if(isset($errores)) echo Valor($errores,'anotacionesa')?><br><br>
	

	Anotaciones Posteriores<textarea style="resize:none;" rows="3" cols="50" maxlength="50" name="anotacionesp"><?php if(isset($datos['anotacionesp'])){echo $datos['anotacionesp'];}?></textarea>
	<?php if(isset($errores)) echo Valor($errores,'anotacionesp')?><br><br>

	
	<input type="submit" name="modificar" value="modificar" >	

</form>
</div>