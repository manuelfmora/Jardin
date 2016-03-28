<?php
/**
 * Manuel Francisco Mora Martín
 * 2º DAW
 */
include_once 'models/modelo.php';

class buscar
{

	private $modelo;
	
	/**
	 * constructor de el modelo para el controlador buscar
	 */
	public function __construct()
	{
		$this->modelo = new Modelo();
	}
	/**
	 * funcion que usramos para que busque la tarea que le pasamos desde la vista
	 */
	public function buscar_tareas()
	{

	if ($_POST)//si hemos pasado algun dato entonces...
	{
         //le pasamos el campo que vamos a buscar y el valor
		$buscamos= $_POST;
		unset($buscamos['buscar']);
		if(isset($_POST['campo']))
		{
			$dato= $_POST['dato'];//valor que queremos buscar
			$nombre= $_POST['campo'];//campo por el que vamos a buscar nuestro dato
			$lista_tareas=$this->modelo->buscar($dato,$nombre);//llamamos ala funcion que
			//esta dentro del modelo apra que efectue la consulta buscar
			include 'views/vista_listar.php';//mostramos la vista lista con nuestro resultado.
		}
	
		}
		else
		{
			
			 //Si no se ha enviado nada mostramos la vista
			 
			Include_once'views/vista_buscar.php';
		}
	}
	
}