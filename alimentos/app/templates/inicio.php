<?php ob_start()?>
<h1>Inicio</h1>
<h3>Fecha: <?php echo $params['fecha']?></h3>
<?php 
	echo $params['mensaje'];
	$contenido=ob_get_clean();
	include 'layout.php';
?>
