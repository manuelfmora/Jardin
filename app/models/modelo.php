<?php 
include_once 'db.php'; 

class Modelo
{
	private $db;
	private $tarea;
	//private  $total_paginas;
	/**
	 * Constructor
	 */
	public function __construct()
	{		
		$this->db=$bd=Db::getInstance();//conexion  base de datos	
	}
	/**
	 * funcion lista(muestra la lista de tareas de nuestra tarea)
	 * @return multitype:
	 */

	public function lista()//muestra la lista con todos los datos de nuestras tareas
	{
		$instruccion = "SELECT * FROM tareas ORDER BY fechac";
		$result=$this->db->query($instruccion);
        
		
		while ($fila=$this->db->obtener_fila($result,0))//strm=result
		{
			$this->tarea[]=$fila;
		}
		
		return $this->tarea;//devuelve el tarea
	}
	
	/**
	 * funcion listaProvincia(muestra la lista de las provincias)
	 * @return multitype:
	 */
	public function listaProvinciasParaSelect()//muestra la lista con todos los datos de nuestras tareas
	{
		$instruccion = "SELECT * FROM tbl_provincias";
		$result=$this->db->query($instruccion);
		
		$provincias=array();
	
		while ($fila=$this->db->obtener_fila($result,0))//strm=result
		{
			$provincias[$fila['cod']]=$fila['nombre'];
		}
	
		return $provincias;
	}	
     /**
      *funcion agregar(agrega un nuevo tarea a nuestra lista de tareas) 
      * @param unknown_type $datos
      */
	 public function agregar($datos) // array datos
	{
		$campos='';
		$valores='';
		foreach ($datos as $c=>$v)
		{
			if($campos!='')
			{
				$campos.=',';
				$valores.=',';
			}
			
			$campos.='`'.$c.'`';
			$valores.='"'.$v.'"';
		}
		$instruccion='INSERT INTO tareas ('.$campos.') VALUES ('.$valores.')';
		$result=$this->db->execsql($instruccion);
	}
	
	public function modificar($id,$datos)//modifica los datos que le pasemos segun la id
	{
		$campos='';
		$valores='';
		foreach ($datos as $c=>$v)
		{
			if($campos!='')
			{
				$campos.=',';
				$valores.=',';
			}
				
			$campos.=''.$c.'="'.$v.'"';
			//$valores.='"'.$v.'"';
		}
		$instruccion='UPDATE `tareas` SET '.$campos.' WHERE id='.$id.';';
		$result=$this->db->execsql($instruccion);
	}
 	
	public function eliminar($id,$datos)//elimina el tarea que le pasemos segun su id
	{
		$instruccion='DELETE  FROM `tareas` WHERE id='.$id;
		$result=$this->db->execsql($instruccion);
	
	}
	/**
	 * funcion que devuelve los datos de un registro
	 */
	public function carga_tarea($id)
	{
		$instruccion = "SELECT * FROM tareas WHERE id=".$id.";";
		$result=$this->db->query($instruccion);
		
	while ($fila=$this->db->obtener_fila($result,0))//strm=result
		{
			$this->tarea[]=$fila;//x=fila
		} 
		
		return $this->tarea[0];//te coge el primer registro
	}
	//----------- FUNCIÓN MODIFICADA TENGO QUE QUITARLA--------------
 	public function buscar($nombre,$dato)//Nos muestra los datos de la tarea que le pasemos segun el dato y valor
 	
 	{
		$instruccion="SELECT * FROM tareas WHERE $dato LIKE '%$nombre%' ";
		$result=$this->db->execsql($instruccion);
		$lista_tareas=array();
		while ($fila=$this->db->obtener_fila($result,0))//strm=result
		{
			$lista_tareas[]=$fila;
		}
		
		return $lista_tareas;

	}
	/**
	 * Función devuelve el nombre de la provincia.
	 * @param unknown $cod
	 */
        function GetNombreProvincias($cod){
                $instruccion="SELECT nombre
                FROM tbl_provincias
                        where cod=$cod";
                $result=$this->db->execsql($instruccion); 
                while ($fila=$this->db->obtener_fila($result,0))//strm=result
                {
                        echo $fila['nombre'];
                }
        }

}