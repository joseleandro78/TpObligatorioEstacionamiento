<?php

    include_once("funcionesEstacionamiento.php");

    $patente = $_POST['patente'];

    $datosPatente = buscarPatente($patente, "patentes.txt");
    if($datosPatente != NULL)
    {
        guardarCobrados($datosPatente, "estacionados.txt");
    }

?>