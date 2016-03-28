<div id="cuerpo">
<h1>Busqueda de Tareas</h1>

<form Method="POST">
    <table>
    <tr>
        <td>Nombre Contacto</td>
        <td>
        <select name="nombre">
        <option value="igual">Igual</option>
        <option value="empieza">Empieza</option>
        <option value="contiene">Contiene</option>
        </select>
        </td>
        <td>
        <input type="text" name="tnombre" value=""><br><br>
        </td>
    </tr>
     <tr>
        <td>Dirección</td>
        <td>
        <select name="direccion">
        <option value="igual">Igual</option>
        <option value="empieza">Empieza</option>
        <option value="contiene">Contiene</option>
        </select>
        </td>
        <td>
        <input type="text" name="tdireccion" value=""><br><br>
        </td>
    </tr>
     <tr>
        <td>Población</td>
        <td>
        <select name="poblacion">
        <option value="igual">Igual</option>
        <option value="empieza">Empieza</option>
        <option value="contiene">Contiene</option>
        </select>
        </td>
        <td>
        <input type="text" name="tpoblacion" value=""><br><br>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="buscar" value="Buscar"></td>
    </tr>   
</table>
</form>
</div>