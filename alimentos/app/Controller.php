<?php
class Controller
{
	public function inicio()
	{
		$params=array(
			'mensaje'=>'Bienvenido al curso Symfony2',
			'fecha'=>date('dd-mm-yyyy',time())
		);
		require __DIR__ . '/templates/inicio.php';
	}
	
	public function listar()
	{
		$m=new Model(Config::$mvc_bd_nombre,Config::$mvc_bd_usuario,Config::$mvc_bd_clave,Config::$mvc_bd_hostname);
		$params=array(
			'alimentos'=>$m->dameAlimentos()
		);
		require __DIR__ . '/templates/mostrarAlimentos.php';
	}
	
	public function insertar()
	{
		$params=array(
			'nombre' => '',
			'energia' => '',
			'proteina' => '',
			'hc' => '',
			'fibra' => '',
			'grasa' => ''
		);
		$m=new Model(Config::$mvc_bd_nombre,Config::$mvc_bd_usuario,Config::$mvc_bd_clave,Config::$mvc_bd_hostname);
		if ($_SERVER['REQUEST_METHOD']=='POST')
		{
			//Comprobar campos formulario
			if ($m->validarDatos($_POST['nombre'],$_POST['energia'],$_POST['proteina'],$_POST['hc'],$_POST['fibra'],$_POST['grasa']))
			{
				$m->insertarAlimento($_POST['nombre'],$_POST['energia'],$_POST['proteina'],$_POST['hc'],$_POST['fibra'],$_POST['grasa']);
				header('Locatioin:index.php?ctl=listar');
			}
			else 
			{
				$params=array(
				'nombre' => $_POST['nombre'],
				'energia' => $_POST['energia'],
				'proteina' => $_POST['proteina'],
				'hc' => $_POST['hc'],
				'fibra' => $_POST['fibra'],
				'grasa' => $_POST['grasa']
				);
				$params['mensaje']='No se ha podido insertar el alimento. Revisa el formulario.';
			}
		}
		require __DIR__ . '/templates/formInsertar.php';
	}
	
	public function buscarPorNombre()
	{
		$params = array(
			'nombre'=>'',
			'resultado'=>array()
		);
		$m=new Model (Config::$mvc_bd_nombre,Config::$mvc_bd_usuario,Config::$mvc_bd_clave,Config::$mvc_bd_hostname);
		if ($_SERVER['REQUEST_METHOD']=='POST')
		{
			$params['nombre']=$_POST['nombre'];
			$params['resultado']=$m->buscarAlimentosPorNombre($_POST['nombre']);
		}
		require __DIR__ . '/templates/buscarPorNombre.php';
	}
	
	public function ver()
	{
		
		if (!isset($_GET['id']))
		{
			throw new Exception('Página no encontrada');
		}
		$id=$_GET['id'];
		$m=new Model (Config::$mvc_bd_nombre,Config::$mvc_bd_usuario,Config::$mvc_bd_clave,Config::$mvc_bd_hostname);
		$alimento=$m->dameAlimento($id);
		$params=$alimento;
		require __DIR__ . '/templates/verAlimento.php';
	}
	
	public function buscarPorEnergia()
	{
		$params = array(
			'energia'=>'',
			'resultado'=>array(),
		);
		$m=new Model(Config::$mvc_bd_nombre,Config::$mvc_bd_usuario,Config::$mvc_bd_clave,Config::$mvc_bd_hostname);
		if ($_SERVER['REQUEST_METHOD']=='POST')
		{
			$params['energia']=$_POST['energia'];
			$params['resultado']=$m->buscarAlimentosPorEnergia($_POST['energia']);
		}
		require __DIR__ . '/templates/buscarPorEnergia.php';
	}
	
	public function buscarCombinada()
	{
		$params = array(
			'nombre'=>'',
			'energia'=>'',
			'resultado'=>array(),
		);
		$m=new Model(Config::$mvc_bd_nombre,Config::$mvc_bd_usuario,Config::$mvc_bd_clave,Config::$mvc_bd_hostname);
		if ($_SERVER['REQUEST_METHOD']=='POST')
		{
			$params['nombre']=$_POST['nombre'];
			$params['energia']=$_POST['energia'];
			$params['resultado']=$m->buscarAlimentosCombindada($_POST['nombre'],$_POST['energia']);
		}
		require __DIR__ . '/templates/buscarCombinada.php';
	}
}

?>