<?php
class Model
{
	protected $conexion;
	
	public function __construct($dbname,$dbuser,$dbpass,$dbhost)
	{
		$mvc_bd_conexion=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
		if (!$mvc_bd_conexion)
		{
			die('No ha sido posible realizar la conexión con la base de datos'.mysqli_error());
		}
		
		$this->conexion=$mvc_bd_conexion;
		mysqli_set_charset($this->conexion,'UTF-8');
	}
	
	public function bd_conexion()
	{
		
	}
	
	public function dameAlimentos()
	{
		$sql='SELECT * FROM alimentos ORDER BY energia DESC';
		$result=$this->conexion->query($sql);
		$alimentos=array();
		while ($row=$result->fetch_assoc())
		{
			$alimentos[]=$row;
		}
		return $alimentos;
	}
	
	public function buscarAlimentosPorNombre($nombre)
	{
		$nombre=htmlspecialchars($nombre);
		$sql="SELECT * FROM alimentos WHERE nombre LIKE '%".$nombre."%' ORDER BY energia DESC";
		$result=$this->conexion->query($sql);
		$alimentos=array();
		while ($row=$result->fetch_assoc()) 
		{
			$alimentos[]=$row;
		}
		return $alimentos;
	}
	
	public function buscarAlimentosPorEnergia($energia)
	{
		$energia=htmlspecialchars($energia);
		$sql="SELECT * FROM alimentos WHERE energia LIKE ".$energia." ORDER BY energia DESC";
		$result=$this->conexion->query($sql);
		$alimentos=array();
		while ($row=$result->fetch_assoc()) 
		{
			$alimentos[]=$row;
		}
		return $alimentos;
	}
	
	public function buscarAlimentosCombindada($nombre,$energia)
	{
		$nombre=htmlspecialchars($nombre);
		$energia=htmlspecialchars($energia);
		$sql="SELECT * FROM alimentos WHERE nombre LIKE '%".$nombre."%' AND energia  LIKE ".$energia." ORDER BY energia DESC";
		$result=$this->conexion->query($sql);
		$alimentos=array();
		while ($row=$result->fetch_assoc()) 
		{
			$alimentos[]=$row;
		}
		return $alimentos;
	}
	
	public function dameAlimento($id)
	{
		$id=htmlspecialchars($id);
		$sql='SELECT * FROM alimentos WHERE id LIKE '.$id.' ORDER BY energia DESC';
		$result=$this->conexion->query($sql);
		$alimentos=array();
		$row=$result->fetch_assoc(); 
		return $row;
	}
	
	public function insertarAlimento($nombre,$energia,$proteina,$hidratocarbono,$fibra,$grasatotal)
	{
		$nombre=htmlspecialchars($nombre);
		$energia=htmlspecialchars($energia);
		$proteina=htmlspecialchars($proteina);
		$hidratocarbono=htmlspecialchars($hidratocarbono);
		$fibra=htmlspecialchars($fibra);
		$grasatotal=htmlspecialchars($grasatotal);
		
		$sql="INSERT INTO alimentos (nombre,energia,proteina,hidratocarbono,fibra,grasatotal) VALUES('".$nombre."',".$energia.",".$proteina.",".$hidratocarbono.",".$fibra.",".$grasatotal.")";
		$result=$this->conexion->query($sql);
		return $result;
	}
	
	public function validarDatos($nombre,$energia,$proteina,$hidratocarbono,$fibra,$grasatotal)
	{
		return (is_string($nombre) & is_numeric($energia) & is_numeric($proteina) & is_numeric($hidratocarbono) & is_numeric($fibra) & is_numeric($grasatotal));
	}
}

?>