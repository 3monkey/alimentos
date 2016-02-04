<?php ob_start() ?>
<form name="formBusqueda" action="index.php?ctl=buscarAlimentosPorEnergia" method="POST">

 <table>
 <tr>
 <td>valor energía:</td>
 <td><input type="text" name="energia" value="<?php echo $params['energia']?>">(puedes utilizar '%' como comodín)</td>

 <td><input type="submit" value="buscar"></td>
 </tr>
 </table>
 </form>

 <?php
 	include 'tablaAlimentos.php'; 
 	$contenido = ob_get_clean();
 	include 'layout.php';
 ?>