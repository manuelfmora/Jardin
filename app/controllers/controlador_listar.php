<?php 
include_once 'models/modelo.php';

class controlador_lista
{
	private $modelo;

	public function __construct()
	{
		$this->modelo = new Modelo();
	}
/**
 * funcion que llama ala funcion lista()del modelo y muestra la lista en vista_lista
 */
	public function listar_tareas()
	{	
		$lista_tareas=$this->modelo->lista();//llamamos ala funcion que se encuentra dentro del modelo
		//que nos devolvera el resultado de la consulta que hemos realizado               
                Include_once'views/vista_listar.php';//mostramos la vista que contiene los datos que hemos consultado       

	}
}

