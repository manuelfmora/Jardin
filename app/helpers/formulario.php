<?php

//funcion utilizada para pasar las variables al modelo.

function ValPost($campo)
{	
	if (isset($_POST[$campo]))
	{		
		return $_POST[$campo];
	}
	else
		return '';
	
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
 *
 * @param string $name Nombre del campo
 * @param array $opciones Opciones que tiene el select
 * 			clave array=valor option
 * 			valor array=texto option
 * @param string $valorDefecto Valor seleccionado
 * @return string
 */
function CreaSelect($name, $opciones, $valorDefecto='')
{
	$html="\n".'<select name="'.$name.'">';
	foreach($opciones as $value=>$text)
	{
		if ($value==$valorDefecto)
			$select='selected="selected"';
		else
			$select="";
		$html.= "\n\t<option value=\"$value\" $select>$text</option>";
		
	}
	$html.="\n</select>";

	return $html;
}