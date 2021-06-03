
<?php

include_once("funcionesEstacionamiento.php");


$patente=$_POST['patente'];

if ($patente!="")
{
	escribir($patente, "patentes.txt");
	echo "Vehiculo Estacionado"; 
}
else{
	echo "ERROR, ingrese nro. de patente!!"; 
}



?>