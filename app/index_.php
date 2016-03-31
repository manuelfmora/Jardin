<?php
require_once 'controllers/controlador_principal.php';
require_once 'controllers/controlador_agregar.php';
require_once 'controllers/controlador_listar.php';
require_once 'controllers/controlador_eliminar.php';
require_once 'controllers/controlador_modificar.php';
require_once 'controllers/controlador_buscar.php';

?>
<html>
<head>
<?php require_once '../assets/css.php';?>
</head>
<body>
<?php include 'views/vista_cabecera.php';?>
<div>
<?php	
$accion=isset($_REQUEST['accion']) ? $_REQUEST['accion'] : 'principal';
//si accion esta inicializada entonces te aparece la accion, sino te aparece la pagina principal
	$controlador=new controlador();
switch ($accion)
 {
	case'principal':
		$controlador->principal();
		break;

	case'lista':
		$controlador=new controlador_lista();
		$controlador->listar_tareas();
		break;
		
	case'agregar':
		$controlador->InsertarCont();
		break;
		
	case'modificar':
		$controlador->modificar_tareas();
		break;
		
	case'eliminar':
		$controlador=new controlador_eliminar();
		$controlador->eliminar_tareas();
		break;		
		
	case'buscar':
		$controlador=new buscar();
		$controlador->buscar_tareas();
		break;
  }
?>
</div>
<?php include 'views/vista_pie.php';?>
</body>
</html>	