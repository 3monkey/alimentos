<?php ob_start() ?>

<h1><?php echo $params['nombre']?></h1>
<table border=1>
	<tbody>
		<tr><td>Energía</td><td><?php echo $alimento['energia']?></td></tr>
		<tr><td>Proteína</td><td><?php echo $alimento['proteina']?></td></tr>
		<tr><td>Hidratos de Carbono</td><td><?php echo $alimento['hidratocarbono']?></td></tr>
		<tr><td>Fibra</td><td><?php echo $alimento['fibra']?></td></tr>
		<tr><td>Grasa total</td><td><?php echo $alimento['grasatotal']?></td></tr>
	</tbody>

</table>
<?php 
	$contenido=ob_get_clean();
	include 'layout.php';
?>