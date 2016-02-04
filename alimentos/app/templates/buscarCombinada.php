<?php ob_start() ?>
<form name="formBusqueda" action="index.php?ctl=buscarAlimentosCombinada" method="POST">

 <table>
 <tr>
 <td>Nombre:</td><td><input type="text" name="nombre" value="<?php echo $params['nombre']?>"></td>
 </tr>
 <tr>
 <td>Valor energía:</td>
 <td><input type="text" name="energia" value="<?php echo $params['energia']?>">(puedes utilizar '%' como comodín)</td>
 </tr>
 <tr><td><input type="submit" value="buscar"></td></tr>
 </table>
 </form>

 <?php 
 	include 'tablaAlimentos.php';
 	$contenido = ob_get_clean();
 	include 'layout.php';
 ?>