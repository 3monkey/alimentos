<?php

//Carga del modelo y los controladores
require_once __DIR__ . '/../app/Config.php';
require_once __DIR__ . '/../app/Controller.php';
require_once __DIR__ . '/../app/Model.php';

//Enrutamiento
$map=array(
	'inicio' =>array('Controller'=>'Controller','action'=>'inicio'),
	'listar' =>array('Controller'=>'Controller','action'=>'listar'),
	'insertar' =>array('Controller'=>'Controller','action'=>'insertar'),
	'buscar' =>array('Controller'=>'Controller','action'=>'buscarPorNombre'),
	'ver' =>array('Controller'=>'Controller','action'=>'ver'),
	'buscarAlimentosPorEnergia'=>array('Controller'=>'Controller','action'=>'buscarPorEnergia'),
	'buscarAlimentosCombinada'=>array('Controller'=>'Controller','action'=>'buscarCombinada'),
	);

//Parseo de la ruta
if(isset($_GET['ctl']))
{
	if (isset($map[$_GET['ctl']]))
	{
		$ruta=$_GET['ctl'];
	}
	else 
	{
		header('Status : 404 Not Found');
		echo("<h1>Error 404 : No existe la ruta".$_GET['ctl']."</h1>");
		exit();
	}
}
else 
{
	$ruta='inicio';	
}

$controlador=$map[$ruta];
	

//Ejecución del controlador asociado a la ruta
if (method_exists($controlador['Controller'], $controlador['action']))
{
	call_user_func(array(new $controlador['Controller'],$controlador['action']));
}
else 
{
	header('Status : 404 Not Found');
	echo("<h1>Error 404 : El controlador".$controlador['Controller']." - ".$controlador['action']." no existe</h1>");
}
?>