<?php
/**
 * Funciones de ayuda que nos permitirán trabajar con formularios
 * 
 */

/**
 * Devuelve el valor de una variable enviada por POST. Devolverá el valor
 * por defecto en caso de no existir.
 * 
 * @param string $campo
 * @param string $default   Valor por defecto en caso de no existir
 * @return string
 */
function VPost($campo, $default='')
{
    if (isset($_POST[$campo]))
    {
        return $_POST[$campo];
    }
    else
    {
        return $default;
    }
}

function ValorGet($campo)
{
	if (isset($_GET[$campo]))
	{
		return $_GET[$campo];
	}
	else
		return '';
}

function Valor($array,$campo)
{
	if (isset($array[$campo]))
	{		
		return $array[$campo];
	}
	else		
		return '';
}

/**
* Función que crea un select, en este caso de provincias.
* @param $array array del cuál se creará el select.
*/
function Creaselect($array)
{
  echo "<select class='form-control' name='provincia'>";
  foreach ($array as $key)
  {
    echo '<option value="'.$key['cod'].'">'.$key['nombre'].'</option>';
  }
  echo "</select>";
}

/**
 *
 * @param string $name Nombre del campo
 * @param array $opciones Opciones que tiene el select
 * 			clave array=valor option
 * 			valor array=texto option
 * @param string $valorDefecto Valor seleccionado
 * @return string
 */
//function CreaSelect($name, $opciones, $valorDefecto='')
//{
//	$html="\n".'<select name="'.$name.'">';
//	foreach($opciones as $value=>$text)
//	{
//		if ($value==$valorDefecto)
//			$select='selected="selected"';
//		else
//			$select="";
//		$html.= "\n\t<option value=\"$value\" $select>$text</option>";
//		
//	}
//	$html.="\n</select>";
//
//	return $html;
//}

/**
* Función que devuelve cuantos registros se muestran por pagina.
* @param $itemsnum numero de items totales.
* @return numero de registros por página.
*/
function regsnum($itemsnum)
{
	if (isset($_GET["pag"])) {
		$pagenum = $_GET["pag"];
	}
	else {
		$pagenum = 1;
	}

	$regsnum=($pagenum*PAGEELEMENTS)-PAGEELEMENTS;

	if($regsnum < 0) $regsnum = 0;

	return $regsnum;
}
/**
* Función que calcula el número de páginas totales.
* @param $regsnum numero de registros por página.
* @return numero de páginas.
*/
function pagenum($regsnum)
{
	return ceil($regsnum/PAGEELEMENTS);
}
/**
* Función que obtiene la página actual.
* @return página actuál.
*/
function actualPag()
{
    if (isset($_GET["pag"]))
    {
        $pagenum = $_GET["pag"];
    }
    else
    {
        $pagenum = 1;
    }
    return $pagenum;
}
/**
* Comprueba si existe un campo en un array y si no hace llamada a Valorpost.
* @param $array array del cuál queremos sabes si existen determinados campos.
* @param $id índice del array.
* @param $campo campo a validar.
*/
function Valorpostedit($array,$id,$campo)
{
  if(isset($array[$id][$campo]))
  {
    echo $array[$id][$campo];
  }
  else
  {
    Valorpost($campo);
  }
}