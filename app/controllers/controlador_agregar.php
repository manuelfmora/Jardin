<?php
/**
 * Manuel Francisco Mora Martín
 * 2º DAW
 */
//prueba
include_once 'helpers/formulario.php';
include_once 'models/modelo.php';

class insertar
{
	
    private $modelo;
	
	
	public function __construct()
	{		
		$this->modelo = new Modelo();
	}
	
	
	public function InsertarCont()
	{
		$lista_provincias=$this->modelo->listaProvinciasParaSelect();//llamamos ala funcion que se encuentra dentro del modelo
		
		if(isset($_POST['guardar'])){
			
				$errores=$this->filtrar();//filtramo datos
				
				if(count($errores)==0)
				{
					$DatoFor=array(
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
					'anotacionesp'=>ValPost('anotacionesp'),					
					);
					$this->modelo->agregar($DatoFor);//llama a la funcion del modelo que agrega nueva tarea
				}
				else
				{					
					//$this->nuevoform($errores);//Mostrara el formulario indicando los errores que hay.
					Include_once'views/vista_agregar.php';//llamamos a la vista donde vamos a indicar los errores
				}
				
           }
           else
           {
           	   //Si no se ha enviado nada mostramos la vista          
	           	$errores=array();//creamo el array de errores
	           	Include_once'views/vista_agregar.php';//si no se han enviado ningun dato
	           	//mostramos la vista agregar(formulario para agregar )
           }
          
           
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
			$errores['nombre']='<span style="color:red;">Campo Incorrecto</span>';
		}	
		//Teléfono
		if (!preg_match("/^[9|6|7][0-9]{8}$/", $telefono))
		{
			$errores['telefono']='<span style="color:red;">Teléfono Incorrecto</span>';
		}	
		//Correo
		if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $correo))
		{
			$errores['correo']='<span style="color:red;">Correo Incorrecto</span>';
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
			$errores['operario']='<span style="color:red;">Campo Incorrecto</span>';
		}
		//Fecha Realización
		
		if($this->fecha($fechar)==FALSE)
		{
				
			$error['fechar']='<span style="color:red;">Inserte una fecha válida</span>';		
		}			
		return $errores;
		
		
	}
	public function nuevoform($errores,$DatoFor=NULL)	
	{
		Include_once'views/vista_agregar.php';//llamamos a la vista donde vamos a indicar los errores
		
		$descripcion=$DatoFor['descripcion'];		
		$nombre=$DatoFor['nombre'];
		$telefono=$DatoFor['telefono'];
		$correo=$DatoFor['correo'];
		$direccion=$DatoFor['direccion'];
		$poblacion=$DatoFor['poblacion'];
		$codigo_postal=$DatoFor['codigo_postal'];
		$provincia=$DatoFor['provincia'];
		$estado=$DatoFor['estado'];
		$fechac=$DatoFor['fechac'];
		$operario=$DatoFor['operario'];
		$fechar=$DatoFor['fechar'];
		$anotacionesa=$DatoFor['anotacionesa'];
		$anotacionesp=$DatoFor['anotacionesp'];
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
