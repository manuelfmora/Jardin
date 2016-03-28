<div id="cuerpo">
<h1>Eliminar tarea</h1>
<table>
    
    <tr bgcolor=#D8F6CE>
    <td width="79" height="10"><b>Descripción</b></td>
    <td width="128"><b>Nombre</b></td>
    <td width="125"><b>Teléfono</b></td>
    <td width="100"><b>Correo </b></td>
    <td width="103"><b>Dirección </b></td>
    <td width="91"><b>Población </b></td>
    <td width="39"><b>Codigo Postal</b></td>
    <td width="79"><b>Provincia </b></td>
    <td width="73"><b>Estado Tarea </b></td>
    <td width="73"><b>Fecha Creación</b></td>
    <td width="196"><b>Operario </b></td>
    <td width="73"><b>Fecha Realización </b></td> 
    <td width="79"><b>Eliminar</b></td>
  </tr>
<?php foreach ($lista_tareas as $valor) : ?>
    
    <?php $fechac=date_create_from_format('Y-m-d', $valor['fechac'])?>
    <?php $fechar=date_create_from_format('Y-m-d', $valor['fechar'])?>
	<tr>
    <td><?=$valor['descripcion']?></td>
    <td><?=$valor['nombre']?></td>
    <td><?=$valor['telefono']?></td>
	<td><?=$valor['correo']?></td>
	<td><?=$valor['direccion']?></td>
	<td><?=$valor['poblacion']?></td>
	<td><?=$valor['codigo_postal']?></td>
	<td><?= $this->modelo->GetNombreProvincias($valor['provincia']);?></td>
	<td><?=$valor['estado']?></td>	
	<td><?=date_format($fechac,'d-m-Y')?></td>
	<td><?=$valor['operario']?></td>
	<td><?=date_format($fechar,'d-m-Y')?></td>	
	<td><a name="eliminar" href="?accion=eliminar&id=<?=$valor['id']?>">Eliminar</a><br></td>
   </tr>

<?php endforeach; ?>
</table>


</div>