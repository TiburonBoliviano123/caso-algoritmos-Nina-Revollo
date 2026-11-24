<?php

// Cantidad de clientes que vamos a probar
$tamanos = [1000, 2000, 4000, 8000];

// Cantidad de busquedas por prueba
$repeticiones = 10000;

// Busqueda lineal utilizando el CI del cliente
function busquedaLineal($clientes, $ci)
{
    foreach ($clientes as $cliente) {
        if ($cliente['ci'] === $ci) {
            return $cliente;
        }
    }

    return null;
}

// Busqueda mediante una tabla hash utilizando el CI
function busquedaHash($clientesHash, $ci)
{
    return $clientesHash[$ci] ?? null;
}

echo "COMPARACION DE BUSQUEDA DE CLIENTES POR CI\n";
echo "------------------------------------------\n\n";

echo str_pad("Clientes", 12);
echo str_pad("Lineal (ms)", 18);
echo str_pad("Hash (ms)", 18);
echo "\n";

foreach ($tamanos as $cantidad) {

    $clientes = [];
    $clientesHash = [];

    // Generamos clientes ficticios
    for ($i = 1; $i <= $cantidad; $i++) {

        $ci = "800" . str_pad($i, 7, "0", STR_PAD_LEFT);

        $cliente = [
            'ci' => $ci,
            'nombre' => 'Cliente ' . $i,
            'telefono' => '70000000'
        ];

        $clientes[] = $cliente;
        $clientesHash[$ci] = $cliente;
    }

    // Preparamos las busquedas
    $cis = [];

    for ($i = 0; $i < $repeticiones; $i++) {
        $posicion = rand(1, $cantidad);

        $cis[] = "800" . str_pad($posicion, 7, "0", STR_PAD_LEFT);
    }

    // Calentamiento de ambos metodos
    foreach ($cis as $ci) {
        busquedaLineal($clientes, $ci);
        busquedaHash($clientesHash, $ci);
    }

    $totalLineal = 0;
    $totalHash = 0;

    // Realizamos tres mediciones
    for ($r = 0; $r < 3; $r++) {

        // Medicion de busqueda lineal
        $inicio = microtime(true);

        foreach ($cis as $ci) {
            busquedaLineal($clientes, $ci);
        }

        $fin = microtime(true);
        $totalLineal += ($fin - $inicio) * 1000;

        // Medicion de busqueda hash
        $inicio = microtime(true);

        foreach ($cis as $ci) {
            busquedaHash($clientesHash, $ci);
        }

        $fin = microtime(true);
        $totalHash += ($fin - $inicio) * 1000;
    }

    // Calculamos los promedios
    $promedioLineal = $totalLineal / 3;
    $promedioHash = $totalHash / 3;

    echo str_pad($cantidad, 12);
    echo str_pad(number_format($promedioLineal, 4), 18);
    echo str_pad(number_format($promedioHash, 4), 18);
    echo "\n";
}

echo "\nPrueba finalizada.\n";
?>