
<?php

include_once("funcionesEstacionamiento.php");


$patente=$_POST['patente'];

if ($patente!="")
{
	escribir($patente, "patentes.txt");
	echo "La patente se guardo en el txt!"; 
}
else{
	echo "ERROR, ingrese nro. de patente!!"; 
}



?>