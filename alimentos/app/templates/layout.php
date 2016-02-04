<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<title>Información Alimentos</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel='stylesheet' type='text/css' href="<?php echo 'css/'.Config::$mvc_vis_css?>" />
</head>
    <body>
		<div class='cabecera'>
			<h1>Información de alimentos</h1>
		</div>
		
		<div class='menu'>
			<ul>
				<li><a href='index.php?ctl=inicio'>inicio</a></li>
				<li><a href='index.php?ctl=listar'>ver alimentos</a></li>
				<li><a href='index.php?ctl=insertar'>insertar alimento</a></li>
				<li><a href='index.php?ctl=buscar'>buscar por nombre</a></li>
				<li><a href='index.php?ctl=buscarAlimentosPorEnergia'>buscar por energía</a></li>
				<li><a href='index.php?ctl=buscarAlimentosCombinada'>búsqueda combinada</a></li>
			</ul>
		</div>
		
		<div class='contenido'>
			<?php echo $contenido ?>
		</div>
		
		<div class='pie'>
			<div align='center'>- Pie de página -</div>
		</div>
    </body>
</html>