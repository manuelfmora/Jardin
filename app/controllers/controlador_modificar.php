<?php
include_once 'helpers/formulario.php';
include_once 'models/modelo.php';
/**
 * Clase controlador_modificar
 * 
 *
 */
class modificar
{

	private $modelo;
	
	/**
	 * constructor de el modelo para el controlador modificar
	 */
	public function __construct()
	{
		$this->modelo = new Modelo();
	}

	public function filtrar()
	{
		
		$errores=array();
		$descripcion=ValPost('descripcion');
		$nombre=ValPost('nombre');
		$telefono=ValPost('telefono');
		$correo=ValPost('correo');
		$direccion=ValPost('direccion');
		$poblacion=ValPost('poblacion');
		$codigo_postal=ValPost('codigo_postal');
		$provincia=ValPost('provincia');
		$estado=ValPost('estado');
		$fechac=ValPost('fechac');
		$operario=ValPost('operario');
		$fechar=ValPost('fechar');
		$anotacionesa=ValPost('anotacionesa');
		$anotacionesp=ValPost('anotacionesp');
		//-------------FILTRADO--------------------
	
		//Descripción
		if($descripcion==''||(is_numeric($descripcion)))
		{
			$errores['descripcion']='<span style="color:red">Campo Incorrecto..</span>';
		}
		//Nombre
		if (!preg_match("/^[A-Za-záéíóúñ]{2,}([\s][A-Za-záéíóúñ]{2,})+$/", $nombre))
		{
			$errores['nombre']='<p style="color:red;">Campo Incorrecto...</p>';
		}
		//Teléfono
		if (!preg_match("/^[9|6|7][0-9]{8}$/", $telefono))
		{
			$errores['telefono']='<p style="color:red;">Teléfono Incorrecto</p>';
		}
		//Correo
		if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $correo))
		{
			$errores['correo']='<p style="color:red;">Correo Incorrecto</p>';
		}
	
		//Dirección
	
		if($direccion=='')
		{
			$errores['direccion']='<span style="color:red">Campo Incorrecto..</span>';
		}
		//Población
		if($poblacion==''||(is_numeric($poblacion)))
		{
			$errores['direccion']='<span style="color:red">Campo Incorrecto..</span>';
		}
		//Código Postal
		if($codigo_postal==''||(!is_numeric($codigo_postal)))
		{
			$errores['codigo_postal']='<span style="color:red">Campo Incorrecto..</span>';
		}
		//Operario
		if (!preg_match("/^[A-Za-záéíóúñ]{2,}([\s][A-Za-záéíóúñ]{2,})+$/", $operario))
		{
			$errores['operario']='<p style="color:red;">Campo Incorrecto...</p>';
		}
		//Fecha Realización
	
		if($this->fecha($fechar)==FALSE)
		{
	
			$error['fechar']='<p style="color:red;">Inserte una fecha válida</p>';
		}
		
		return $errores;
	
	
	}
/**
 * Funcion modificar
 * Si id esta vacia muestra la tabla modificar,pero si id no esta vacia muestra el formulario para 
 * modificar la tarea que previamente hemos elegido,
 */
	public function modificar_tareas()
	{
		
		$idmod=(ValorGet('id'));//recogemos el campo id en una variable
	   if ($idmod=='')//si id esta vacia muestra la lista de tareas
	   {
		$lista_tareas=$this->modelo->lista();
		include_once 'views/vista_modificar.php';
	  }
	  else if ($idmod!='')//si id no esta vacia
	  {
	  	
	  	$datos=$this->modelo->carga_tarea($idmod);//le pasa la variable id 
	  	//al modelo para que muestr los datos de la tarea con la id que le hemos pasado
	  	//estos son los datos que ya tenemos y queremos modificar
	  	$lista_provincias=$this->modelo->listaProvinciasParaSelect();//llamamos a la funcion que se encuentra dentro del modelo
	  	 	
	  	if (isset($_POST['modificar']))//si hemos enviado los datos dandole a modificar
	  	{//recogera los nuevos datos que queremos modificar
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
	  	    
	  	$errores=$this->filtrar();//filtramo datos	  	
	  	include_once 'views/vista_deseaModifica.php';
	  	$this->modelo->modificar((ValorGet('id')),$dato);//enviara al modelo
	  	//los datos que vamos a modificar y la id para poder realizar la consulta
	  	?>
	    <div id="cuerpo3">
	  	<?php 
	  	include_once 'helpers/exito.php';//te dice que la operacion esta bien y puedes volver al menu.
	  	?></div>
	  	<?php 
	  	}
	  	else
	  	{
	  		/**
	  		 * Si no se ha enviado nada mostramos la vista
	  		 */
	  		Include_once'views/vista_deseaModifica.php';
	  	}
	  	
	  }
	  
	}	

	public function fecha($fechar)
	{
		$correccion=TRUE;
		$division=explode("/",$fechar);
			
		if(count($division)!=3)//si la fecha no tiene tres partes
		{
			$correccion=FALSE;//devuelve que la fecha es incorrecto
		}
		else
		{
			if ((!is_numeric($division[0]))||(!is_numeric($division[1]))||(!is_numeric($division[2])))
			{
				$correccion=FALSE;
			}
	
			else
			{
				if ($division[2]<1 || $division[2]>31)
				{
					$correccion=FALSE;
				}
				else
				{
					if($division[1]<1 || $division[1]>12)
					{
						$correccion=FALSE;
					}
					else
					{
						if(strlen($division[0])!=2)
						{
							$correccion=FALSE;
						}
					}
				}
			}
		}
	
		return $correccion;
	}
	
	
	

	
}
?>