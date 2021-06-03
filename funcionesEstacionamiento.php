<?php

function calcularTiempo($fechaIngreso)
{
    $horaIngreso = obtenerHora($fechaIngreso);
    $fechaEgreso = date("Y-d-m H-i-s");
    $horaEgreso = obtenerHora($fechaEgreso);
    $minutos = (strtotime($horaIngreso) - strtotime($horaEgreso)) / 60;
    $minutos = abs($minutos);
    $minutos = floor($minutos);
    return $minutos;
}

function calcularImporte($tiempo)
{
    return $tiempo * 50;
}


function guardarEstacionados($patente, $archivoTexto)
{
    escribir($patente, $archivoTexto);
}


function guardarCobrados($datosPatente, $cobradosTxt)
{
    $patente = $datosPatente[0];
    $fechaIngreso = $datosPatente[1];

    escribir($patente, $cobradosTxt);
    $tiempo = calcularTiempo($fechaIngreso);
    $totalPagar = calcularImporte($tiempo);
    cobrar($patente, $fechaIngreso, $tiempo, $totalPagar);
}

function buscarPatente($patente, $estacionadosTxt)
{
    $existe = "No";
    $lasPatentes = array();

    if (file_exists($estacionadosTxt)) {

        $archivo = fopen($estacionadosTxt, "r");

        while (!feof($archivo)) {
            $renglon = fgets($archivo);
            $unaPatente = explode("=>", $renglon);

            if (isset($unaPatente[1])) {
                $lasPatentes[] = $unaPatente;
            }
        }

        fclose($archivo);

        foreach ($lasPatentes as $una) {
            if ($una[0] == $patente) {
                $patenteEncontrada = $una;
                $existe = "Si";
            }
        }

        if ($existe == "No") {

            echo "La patente NO existe!";
        } 
        else 
        {
            return $patenteEncontrada;
        }
    } 
    else 
    {
        echo "No hay patentes estacionados";
    }
}

function escribir($patente, $archivoTexto)
{
    date_default_timezone_set("America/Argentina/Buenos_Aires");
    $ahora = date("Y-m-d H-i-s");
    $renglon = "\n" . $patente . "=>" . $ahora;

    $archivo = fopen($archivoTexto, "a"); //abrir un archivo//
    fwrite($archivo, $renglon);
    fclose($archivo);
}

function cobrar($patente, $fechaIngreso, $tiempo, $totalPagar)
{
    $fechaEgreso = date("Y-m-d H-i-s");
    echo "Patente: $patente " . "<br>Fecha ingreso: " . $fechaIngreso;
    echo "<br>Fecha egreso: " . $fechaEgreso;
    echo "<br>Tiempo estacionado: $tiempo minutos";
    echo "<br><b>Total a pagar: $$totalPagar</b>";
}

function obtenerHora($fecha)
{
    $fechaCompleta = explode(" ", $fecha);

    if (isset($fechaCompleta[1])) {
        $fechaCompleta[1] = str_replace("-", ":", $fechaCompleta[1]);
    }
    return $fechaCompleta[1];
}
