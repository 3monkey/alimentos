<?php ob_start() ?>
<form name="formBusqueda" action="index.php?ctl=buscar" method="POST">

 <table>
 <tr>
 <td>nombre alimento:</td>
 <td><input type="text" name="nombre" value="<?php echo $params['nombre']?>">(puedes utilizar '%' como comodín)</td>

 <td><input type="submit" value="buscar"></td>
 </tr>
 </table>
 </form>

 <?php 
 	include 'tablaAlimentos.php';
 	$contenido = ob_get_clean();
 	include 'layout.php';
 ?>