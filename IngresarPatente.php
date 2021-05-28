<?php



$patente=$_POST['patente'];

if ($patente!="")
{
	date_default_timezone_set("America/Argentina/Buenos_Aires");
	$ahora=date("Y-m-d H-i-s"); 
	$renglon= "\n".$patente."=>".$ahora;

	$archivo= fopen("patentes.txt", "a"); //abrir un archivo//
	fwrite($archivo, $renglon);
	fclose($archivo);
}
else{
	echo "ERROR, ingrese nro. de patente!!"; 
}



?>