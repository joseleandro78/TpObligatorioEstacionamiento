<?php

    include_once("funcionesEstacionamiento.php");

    $patente = $_POST['patente'];

    // guardarCobrados($patente, 'patentes.txt' ,'cobrados.txt');
    $datosPatente = buscarPatente($patente, "patentes.txt");
    guardarCobrados($datosPatente, "estacionados.txt");

?>