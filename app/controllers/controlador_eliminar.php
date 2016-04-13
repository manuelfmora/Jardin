<?php
/**
 * Manuel Francisco Mora Martín
 * 2º DAW
 */
include_once 'models/modelo.php';
class controlador_eliminar
{

	private $modelo;
	
	/**
	 * constructor de el modelo para el controlador modificar
	 */
	public function __construct()
	{
		$this->modelo = new Modelo();
	}

	public function eliminar_tareas()
	{
	  $idmod=(ValorGet('id'));//recogemos la id en una variable
	  if ($idmod=='')//si id esta vacio nos devuelve...
	  {
		$lista_tareas=$this->modelo->lista();//la vista eliminar(lista con funcion de eliminar)
		include_once 'views/vista_eliminar.php';
	  }
	  else if ($idmod!='')//si id no esta vacia es decir se la hemos pasado
	  {
	  	
	  	$datos=$this->modelo->carga_tarea($idmod);//recupera los datos de la tarea con la id pasada

	  	include_once 'views/vista_deseaEliminar.php';
	  	
	  	if (isset($_POST['eliminar']) )//&& $_POST['eliminar']=="Si"si hemos pulsado si(eliminar)
	  	{//le pasa los datos de la tarea que queremos elimiar
		  	     $dato=array(
		  		'descripcion'=>ValPost('descripcion'),
				'nombre'=>ValPost('nombre'),
				'telefono'=>ValPost('telefono'),
				'correo'=>ValPost('correo'),
				'direccion'=>ValPost('direccion'),
				'poblacion'=>ValPost('poblacion'),
				'codigo_postal'=>ValPost('codigo_postal'),
				'provincia'=>ValPost('provincia'),
				'estado'=>ValPost('estado'),
				'fechac'=>ValPost('fechac'),
				'operario'=>ValPost('operario'),
				'fechar'=>ValPost('fechar'),
				'anotacionesa'=>ValPost('anotacionesa'),
				'anotacionesp'=>ValPost('anotacionesp'),);
	
		  	$this->modelo->eliminar((ValorGet('id')),$dato);//llama ala funcion eliminar que se encuentra en el modelo
		  	?><div id="cuerpo3"><?php 
		  	include_once 'helpers/exito.php';//te dice que la operacion esta bien y puedes volver al menu.
		  	?></div>
		  	<?php
	  	}
	  	else
	  	{  		
	  		/**
	  		 * Si no se ha enviado nada mostramos la vista
	  		 */
	  	     include_once 'views/vista_deseaEliminar.php';			  
	  	}
	  	if (isset($_POST['no']) )//pulsamos el botón de no eliminar tarea
	  	{  		
	  		$lista_tareas=$this->modelo->lista();//la vista eliminar(lista con funcion de eliminar)
	  		include_once 'views/vista_eliminar.php';
	  		
	  	}
	  	
	  }
	  
	}
}
?>