<?php

/*
var_dump($_GET);

echo "<br>";

var_dump($_POST);*/
if (isset($_POST['correo']))
{
	$mail=$_POST['correo'];	
}
else
{
	die(); /*die: mata la aplicacion*/
}
$mail=$_POST['correo'];
$clave=$_POST['clave'];
$listadoDeUsuarios= array();

$archivo=fopen("usuarios1.txt","r"); 

while (!feof($archivo)) 
{
	/*echo "renglon: ".fgets($archivo)."<br>";*/
	$renglon=fgets($archivo);

	$datosDeUnsuario=explode("=>", $renglon);
	if(isset($datosDeUnsuario[1]))//$datosdeUsuario[0]!=" ")
	{
		$listadoDeUsuarios[]=$datosDeUnsuario;
	}
	/*var_dump($datosDeUnsuario);
	echo "<br>";*/

	/*if ($datosDeUnsuario[0]==$mail)
	{
		if ($datosDeUnsuario[1]==$clave)
		{
			echo "Bienvenido!!";

		}

	}*/

}
	fclose($archivo);
	//var_dump($listadoDeUsuarios);
	$ingreso="No Ingreso";
	foreach ($listadoDeUsuarios as $datos) 
	{
		if ($datos[0]==$mail)
		{
			if ($datos[0]==$clave) 
			{
				echo "Bienvenido!!";
				$ingreso= "Ingreso";
				break;
			}

		}
	}
	if($ingreso=="No Ingreso")
	{
		echo "Datos Erroneos!!";
	}

?>