<?php


/*var_dump($_GET);

echo "<br>";

var_dump($_POST);*/

$mail=$_POST['correo'];

$clave=$_POST['clave']; 

$copiaclave=$_POST['copiaclave'];

/*echo "su email es ".$mail." su clave es ".$clave. " copiaclave ".$copiaclave;*/

if ($clave==$copiaclave)
{
	date_default_timezone_set("America/Argentina/Buenos_Aires");
	$ahora=date("Y-m-d H:i:s"); 
	$renglon= "\n".$mail."=>".$clave."=>".$ahora;

	$archivo= fopen("usuarios1.txt", "a"); //abrir un archivo//
	fwrite($archivo, $renglon);
	fclose($archivo);
}
else{
	echo "ERROR en clave"; 
}



?>